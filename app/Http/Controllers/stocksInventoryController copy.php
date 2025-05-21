<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class stocksInventoryController extends Controller
{
    public function expiredProduct(){
       
       /*  $now = Carbon::now();
        $branches= DB::table('branches')->where('status',0)->get();  */
        return view('inventory.inventory-list.expiration');
    }

    public function criticalProduct(){
       return view('inventory.inventory-list.criticalqty');
   }

   public function productDataCriticalListPdf(){
     


     $totalData = 0;       
     $totalFiltered = 0;
     $columns = array( 
      0 => 'TotalQuantity',
      1 => 'product_code',
      2 =>'productname',  
      6 => 'expiration_date',
     );

  
    $BaseDetails="";
    
      $BaseDetails= DB::table("transaction_items")
     ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
     ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert', 'transaction_items.product_id as product_id','store_product_lists.unit as unit','store_product_lists.brand as brand')->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")
     ->where("transaction_items.transaction_type", "RECEIVE PO")
     ->orwhere("transaction_items.transaction_type", "MANUAL ADD")
     ->orwhere("transaction_items.transaction_type", "IMPORT")
     ->orwhere("transaction_items.transaction_type", "REPLACE_INVOICE")     
     ->groupBy('transaction_items.location_address','transaction_items.product_id')
     ->get();
    
   $data = array();
    if($BaseDetails){
        $lot="";$exp="";
        foreach ($BaseDetails as $BaseDetail) {  
          $product_id = $BaseDetail->product_id;  
           $deductqty= DB::table("transaction_items")
          ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'))            
          ->where('transaction_items.product_id',$product_id) 
          ->where(function($query) use ($product_id){
          $query->orwhere("transaction_type", "POS")            
          ->orwhere("transaction_type", "DISPOSE") 
       ->orwhere("transaction_type", "TRANSFERRED") 
          ->orwhere("transaction_type", "RETURN_P_PO")   
          ->orwhere("transaction_type", "REPLACEMENT_P_PO")            
          ->orwhere("transaction_type", "MANUAL MINUS");             
          })
          ->first();
          if($deductqty->TotalQuantity== null){
            $deductqty->TotalQuantity=0;
          }
          

          $return= DB::table("transaction_items")
          ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'))            
          ->where('transaction_items.product_id',$product_id) 
          ->where('transaction_items.transaction_type','RETURN_P_PO') 
          ->where('transaction_items.status',1)        
          ->first();
          if($return->TotalQuantity== null){
            $return->TotalQuantity=0;
          }


          $critical= DB::table("store_product_lists")
          ->where('store_product_lists.critical_alert', '>=', ($BaseDetail->TotalQuantity - $deductqty->TotalQuantity)-$return->TotalQuantity)
          ->where('store_product_lists.id',$product_id)
          ->count();

          if($critical == 0){
            continue;
          }
        
            $nestedData['quantity'] = ($BaseDetail->TotalQuantity - $deductqty->TotalQuantity)-$return->TotalQuantity;  
            $nestedData['product_code'] = $BaseDetail->product_code;  
            $nestedData['productname'] = $BaseDetail->productname;  
            $nestedData['brand'] = $BaseDetail->brand;  
            $nestedData['unit'] = $BaseDetail->unit; 
            $nestedData['critical'] = $BaseDetail->critical_alert;  
            if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
              $lot = "N/A";
              }else{
                  $lot = $BaseDetail->lot_no;
                  }
                  $nestedData['lot_no'] =$lot;
            $nestedData['location'] = $BaseDetail->location_address;
            $nestedData['rack'] = $BaseDetail->rock;
            $nestedData['shelf'] = $BaseDetail->shelf;
            if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
              $exp = "N/A";
            }else{
              $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));;
              }
              $nestedData['exp'] =$exp;      
           
            $data[] = $nestedData;         

        }
    }  
   

     

     $BaseDetailscount = count($data);
      $now = Carbon::now()->format('d-m-Y');
      $pdf = PDF::loadview('pdf.ProductCriticalListPdf',compact('data','now','BaseDetailscount'))->setPaper('legal', 'landscape');
      return $pdf->stream('PO-list.pdf');
      return json_encode($data);

   }

    public function expiredProductPDF(){
        $now = Carbon::now()->format('Y-m-d');
        $transaction_items= DB::table('transaction_items')
        ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
        ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
        ->where('store_purchase_orders.status',"RECEIVE")
        ->whereDate('expiration_date','<=',$now)->get();  

     }

     public function getExpiredProductPdf(Request $request){  
      $nowtmp = Carbon::now()->format('Y-m-d');
      $now= date('Y-m-d', strtotime("+6 months", strtotime($nowtmp))); 
        $po_list="";
 
            $po_list= DB::table('transaction_items')
            ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
            ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
            ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
            ->where("transaction_items.transaction_type", "RECEIVE PO")
            ->orwhere("transaction_items.transaction_type", "MANUAL ADD")
            ->orwhere("transaction_items.transaction_type", "REPLACE_INVOICE")            
            ->orwhere("transaction_items.transaction_type", "IMPORT")
            ->whereDate('transaction_items.expiration_date','<=',$now)           	   
            ->get(); 
        
       $data = array();
        if($po_list){
            foreach ($po_list as $po_lists) { 
              $nestedData['quantity'] = $po_lists->quantity;  
              $nestedData['product_code'] = $po_lists->product_code;  
                $nestedData['productname'] = $po_lists->productname;  
                $nestedData['po_no'] = $po_lists->po_no;  
                $nestedData['invoice_num'] = $po_lists->invoice_num;
                $nestedData['lot_no'] = $po_lists->lot_no;
                $nestedData['location_address'] = $po_lists->location_address;
                $nestedData['expiration_date'] =  date('M-d-Y', strtotime($po_lists->expiration_date));               
                $nestedData['order_date'] =     date('M-d-Y', strtotime($po_lists->order_date));            
                $nestedData['receive_date'] = date('M-d-Y', strtotime($po_lists->receive_date ));                
                $data[] = $nestedData; 
            }
        }       
       
 
        $BaseDetailscount = count($data);
        $now = Carbon::now()->format('d-m-Y');
        $pdf = PDF::loadview('pdf.ProductnearExpiry',compact('data','now','BaseDetailscount'))->setPaper('legal', 'landscape');
        return $pdf->stream('nearly_expiry_product.pdf');
        return json_encode($data);      
     }


    public function getExpiredProduct(Request $request){  
      $nowtmp = Carbon::now()->format('Y-m-d');
      $now= date('Y-m-d', strtotime("+6 months", strtotime($nowtmp))); 

        $po_list= DB::table('transaction_items')
        ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
        ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
        ->where("transaction_items.transaction_type", "RECEIVE PO")
        ->orwhere("transaction_items.transaction_type", "MANUAL ADD")
        ->orwhere("transaction_items.transaction_type", "REPLACE_INVOICE")            
        ->orwhere("transaction_items.transaction_type", "IMPORT")
        ->whereDate('transaction_items.expiration_date','<=',$now)->get();  
        $totalData = count($po_list);       
        $totalFiltered = $totalData;
        
        $limit = $request->input('length');
        $start = $request->input('start');
 
         $dir = $request->input('order.0.dir');
 
 
 
        $po_list="";
        if(empty($request->input('search.value'))){  
            $po_list= DB::table('transaction_items')
            ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
            ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
            ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
            ->where("transaction_items.transaction_type", "RECEIVE PO")
            ->orwhere("transaction_items.transaction_type", "MANUAL ADD")
            ->orwhere("transaction_items.transaction_type", "REPLACE_INVOICE")            
            ->orwhere("transaction_items.transaction_type", "IMPORT")
            ->whereDate('transaction_items.expiration_date','<=',$now)         
            ->offset($start)
            ->limit($limit)   	   
            ->get(); 
        }else{
            $search = $request->input('search.value');
            $po_list= DB::table('transaction_items')
            ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
            ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
            ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
            ->where("transaction_items.transaction_type", "RECEIVE PO")           
            ->whereDate('transaction_items.expiration_date','<=',$now)
            ->orwhere(function($query) use ($search){
              $query->orwhere("transaction_items.transaction_type", "MANUAL")
              ->orwhere("transaction_items.transaction_type", "IMPORT")
              ->orwhere("transaction_items.quantity", 'like', "{%$search%}")
              ->orwhere("store_product_lists.product_code", 'like', "{%$search%}")             
              ->orwhere("store_product_lists.productname", 'like', "{%$search%}")            
              ->orwhere("store_purchase_orders.po_no", 'like', "{%$search%}")            
              ->orwhere("transaction_items.invoice_num", 'like', "{%$search%}")             
              ->orwhere("transaction_items.lot_no", 'like', "{%$search%}")             
              ->orwhere("transaction_items.location_address", "{%$$search%}");             
                     
              })
            ->get(); 
         
            $totalFiltered=count($po_list);
        }
       $data = array();
        if($po_list){
            foreach ($po_list as $po_lists) { 
              $nestedData['quantity'] = $po_lists->quantity;  
              $nestedData['product_code'] = $po_lists->product_code;  
                $nestedData['productname'] = $po_lists->productname;  
                $nestedData['po_no'] = $po_lists->po_no;  
                $nestedData['invoice_num'] = $po_lists->invoice_num;
                $nestedData['lot_no'] = $po_lists->lot_no;
                $nestedData['location_address'] = $po_lists->location_address;
                $nestedData['expiration_date'] =  date('M-d-Y', strtotime($po_lists->expiration_date));               
                $nestedData['order_date'] =     date('M-d-Y', strtotime($po_lists->order_date));            
                $nestedData['receive_date'] = date('M-d-Y', strtotime($po_lists->receive_date ));                
                $data[] = $nestedData; 
            }
        }       
       $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data" => $data   
        );
 
        echo json_encode($json_data);         
     }


     public function getcriticalProduct(Request $request){  
      

       $BaseDetails= DB::table("transaction_items")
      ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
      ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id')
      ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")
      ->orwhere("transaction_type", "MANUAL ADD")
      ->orwhere("transaction_type", "IMPORT")
      ->orwhere("transaction_type", "REPLACE_INVOICE")      
      ->groupBy('transaction_items.location_address','transaction_items.product_id')
      ->get();
  
       $totalData = 0;       
       $totalFiltered = 0;
      $columns = array( 
        0 => 'TotalQuantity',
        1 => 'product_code',
        2 =>'productname',  
        6 => 'expiration_date',

    );
      $limit = $request->input('length');
      $start = $request->input('start');

       $dir = $request->input('order.0.dir');

       
       $order = $columns[$request->input('order.0.column')];
      $BaseDetails="";
      if(empty($request->input('search.value'))){  
        $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','store_product_lists.critical_alert as critical_alert','transaction_items.id as TI_id', 'transaction_items.product_id as product_id','store_product_lists.unit as unit','store_product_lists.brand as brand')
        ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")
        ->orwhere("transaction_type", "MANUAL ADD")
        ->orwhere("transaction_type", "IMPORT")
        ->orwhere("transaction_type", "REPLACE_INVOICE") 
        ->groupBy('transaction_items.location_address','transaction_items.product_id')
        ->orderBy($order,$dir)
        /* ->offset($start)
        ->limit($limit)  */   
        ->get();
      }else{
          $search = $request->input('search.value');
           $BaseDetails= DB::table("transaction_items")
           ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
           ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert', 'transaction_items.product_id as product_id','store_product_lists.unit as unit','store_product_lists.brand as brand')
           ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")   
           ->orwhere("transaction_type", "MANUAL ADD") 
           ->orwhere("transaction_type", "IMPORT")                                        	                                                      	   
          ->where(function($query) use ($search){
          $query->orWhere("transaction_items.invoice_num",'like', "%$search%")   
          ->orWhereDate("transaction_items.expiration_date", 'like', "%$search%")	                                  
          ->orWhere("product_code",'like', "%$search%")                        
          ->orWhere("productname",'like', "%$search%")                                                  	   
          ->orWhere("transaction_items.location_address",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("transaction_items.lot_no",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("transaction_items.rock",'like', "%$search%");                                                   	                                                      	   
           })
           ->groupBy('transaction_items.location_address','transaction_items.product_id')
           ->orderBy($order,$dir)
          /*  ->offset($start)
           ->limit($limit)   */
           ->get(); 
          $totalFiltered=count($BaseDetails);
      }
     $data = array();
      if($BaseDetails){
          $lot="";$exp="";
          foreach ($BaseDetails as $BaseDetail) {  
            $product_id = $BaseDetail->product_id;  
             $deductqty= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'))            
            ->where('transaction_items.product_id',$product_id) 
            ->where(function($query) use ($product_id){
            $query->orwhere("transaction_type", "POS")            
            ->orwhere("transaction_type", "DISPOSE") 
       ->orwhere("transaction_type", "TRANSFERRED") 
            ->orwhere("transaction_type", "RETURN_P_PO")   
            ->orwhere("transaction_type", "REPLACEMENT_P_PO");            
            })
            ->first();

            if($deductqty->TotalQuantity== null){
              $deductqty->TotalQuantity=0;
            }

             $return= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'))            
            ->where('transaction_items.product_id',$product_id) 
            ->where('transaction_items.transaction_type','RETURN_P_PO') 
            ->where('transaction_items.status',1)        
            ->first();
            if($return->TotalQuantity== null){
              $return->TotalQuantity=0;
            }

            
              
             $critical= DB::table("store_product_lists")
            ->where('store_product_lists.critical_alert', '>=', ($BaseDetail->TotalQuantity - $deductqty->TotalQuantity) -  $return->TotalQuantity)
            ->where('store_product_lists.id',$product_id)
            ->count();

            if($critical == 0){
              continue;
            }
           //   return "joe";
              $nestedData['quantity'] = ($BaseDetail->TotalQuantity - $deductqty->TotalQuantity)-  $return->TotalQuantity;  
              $nestedData['product_code'] = $BaseDetail->product_code;  
              $nestedData['productname'] = $BaseDetail->productname;  
              $nestedData['brand'] = $BaseDetail->brand;  
              $nestedData['unit'] = $BaseDetail->unit; 
              $nestedData['critical'] = $BaseDetail->critical_alert;  
              if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
                $lot = "N/A";
                }else{
                    $lot = $BaseDetail->lot_no;
                    }
                    $nestedData['lot_no'] =$lot;
              $nestedData['location'] = $BaseDetail->location_address;
              $nestedData['rack'] = $BaseDetail->rock;
              $nestedData['shelf'] = $BaseDetail->shelf;
              if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
                $exp = "N/A";
              }else{
                $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));;
                }
                $nestedData['exp'] =$exp;      
             
              $data[] = $nestedData; 
              $totalData ++;
              $totalFiltered++;
           

          }
      }  
      // dd($data);     
     $json_data = array(
      "draw"            => intval($request->input('draw')),  
      "recordsTotal"    => intval($totalData),  
      "recordsFiltered" => intval($totalFiltered), 
      "data" => $data   
      );

      echo json_encode($json_data);          
     }

     public function productInventory(Request $request){
         return view('inventory.inventory-list.product-inventory');
     }

     public function productInventoryView(Request $request){
    return view('inventory.inventory-list.product-inventory-view');
    }


     public function productInventoryDataListPdf(Request $request){
      $data = array();
      $BaseDetails= DB::table("transaction_items")
      ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
      ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id','store_product_lists.brand')
      ->where("transaction_type", "RECEIVE PO")
       ->orwhere("transaction_type", "RELOCATED")
      ->orwhere("transaction_type", "MANUAL ADD")
      ->orwhere("transaction_type", "REPLACE_INVOICE") 
      ->orwhere("transaction_type", "IMPORT")
      ->groupBy('transaction_items.location_address','transaction_items.lot_no','transaction_items.product_id','transaction_items.expiration_date','transaction_items.rock','transaction_items.shelf')
      ->get();
      foreach ($BaseDetails as $BaseDetail) {    

       
        if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
          $deductqty= DB::table("transaction_items")
          ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
          ->where(function($query) use ($BaseDetail){
            $query->where("transaction_type", "POS")   
            ->orwhere("transaction_type", "DISPOSE") 
            ->orwhere("transaction_type", "TRANSFERRED") 
            ->orwhere("transaction_type", "MANUAL MINUS")     
            ->orwhere("transaction_type", "RETURN_P_PO")   
           // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
            ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
             })
          ->where('transaction_items.product_id',$BaseDetail->product_id)
          ->where('expiration_date',$BaseDetail->expiration_date)
          ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
          ->where('transaction_items.location_address',$BaseDetail->location_address)                             
          ->where('transaction_items.rock',$BaseDetail->rock)                             
          ->where('transaction_items.shelf',$BaseDetail->shelf)                             
          ->get(); 
          
          }else  if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && !isset($BaseDetail->lot_no) && $BaseDetail->lot_no == null && $BaseDetail->lot_no =="" ){
            $deductqty= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
            ->where(function($query) use ($BaseDetail){
              $query->where("transaction_type", "POS")   
              ->orwhere("transaction_type", "DISPOSE") 
              ->orwhere("transaction_type", "TRANSFERRED") 
              ->orwhere("transaction_type", "MANUAL MINUS")     
              ->orwhere("transaction_type", "RETURN_P_PO")   
             // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
              ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
               })
            ->where('transaction_items.product_id',$BaseDetail->product_id)
            ->where('expiration_date',$BaseDetail->expiration_date) 
            ->where('transaction_items.location_address',$BaseDetail->location_address)                             
            ->where('transaction_items.rock',$BaseDetail->rock)                             
            ->where('transaction_items.shelf',$BaseDetail->shelf)                             
            ->get(); 
            
            }elseif(!isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date == null && $BaseDetail->expiration_date ==""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
              $deductqty= DB::table("transaction_items")
              ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
              ->where(function($query) use ($BaseDetail){
                $query->where("transaction_type", "POS")   
                ->orwhere("transaction_type", "DISPOSE") 
                ->orwhere("transaction_type", "TRANSFERRED") 
                ->orwhere("transaction_type", "MANUAL MINUS")     
                ->orwhere("transaction_type", "RETURN_P_PO")   
               // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
                ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                 })
              ->where('transaction_items.product_id',$BaseDetail->product_id)
              ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
              ->where('transaction_items.location_address',$BaseDetail->location_address)                             
              ->where('transaction_items.rock',$BaseDetail->rock)                             
              ->where('transaction_items.shelf',$BaseDetail->shelf)                             
              ->get(); 
              
              }{
              $deductqty= DB::table("transaction_items")
              ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
              ->where(function($query) use ($BaseDetail){
                $query->where("transaction_type", "POS")   
                ->orwhere("transaction_type", "DISPOSE") 
                ->orwhere("transaction_type", "TRANSFERRED") 
                ->orwhere("transaction_type", "MANUAL MINUS")     
                ->orwhere("transaction_type", "RETURN_P_PO")   	                                                      	   
                ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                 })
              ->where('transaction_items.product_id',$BaseDetail->product_id)
              
              ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
              ->where('transaction_items.location_address',$BaseDetail->location_address)                             
              ->where('transaction_items.rock',$BaseDetail->rock)                             
              ->where('transaction_items.shelf',$BaseDetail->shelf)                             
              ->get();  
          }

           $totalDeduction=0;
           if(isset($deductqty[0]->TotalQuantitys)){
            $totalDeduction = $deductqty[0]->TotalQuantitys;
           }
        $nestedData['quantity'] = $BaseDetail->TotalQuantity-$totalDeduction;    
        $nestedData['product_code'] = $BaseDetail->product_code;  
        $nestedData['productname'] = $BaseDetail->productname;  
        $nestedData['brand'] = $BaseDetail->brand;  
        $nestedData['unit'] = $BaseDetail->units; 
        $nestedData['critical'] = $BaseDetail->critical_alert;  
        if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
          $lot = "N/A";
          }else{
              $lot = $BaseDetail->lot_no;
              }
              $nestedData['lot_no'] =$lot;
        $nestedData['location'] = $BaseDetail->location_address;
        $nestedData['rack'] = $BaseDetail->rock;
        $nestedData['shelf'] = $BaseDetail->shelf;
        if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
          $exp = "N/A";
        }else{
          $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));;
          }
          $nestedData['exp'] =$exp;      
        
        $data[] = $nestedData; 
      }
      $BaseDetailscount = count($BaseDetails);
      $now = Carbon::now()->format('d-m-Y');
      $pdf = PDF::loadview('pdf.ProductInventoryListPdf',compact('data','now','BaseDetailscount'))->setPaper('legal', 'landscape');
      return $pdf->stream('PO-list.pdf');
      return json_encode($data);
    }
     
     public function productInventoryDataList(Request $request){
       try {
          
      $search="";
      $BaseDetails= DB::table("transaction_items")
     ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
     ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id')
     ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")
     ->orwhere("transaction_type", "MANUAL ADD")
     ->orwhere("transaction_type", "REPLACE_INVOICE") 
     ->orwhere("transaction_type", "IMPORT")
     ->orwhere("transaction_type", "DELETED")
     ->groupBy('transaction_items.location_address','transaction_items.lot_no','transaction_items.product_id','transaction_items.expiration_date','transaction_items.rock','transaction_items.shelf')
     ->get();
 
     $totalData = count($BaseDetails);       
     $totalFiltered = $totalData;
     $columns = array( 
       0 => 'TotalQuantity',
       1 => 'product_code',
       2 =>'productname',  
       6 => 'expiration_date',

   );
     $limit = $request->input('length');
     $start = $request->input('start');

      $dir = $request->input('order.0.dir');

      
      $order = $columns[$request->input('order.0.column')];
     $BaseDetails="";
     if(empty($request->input('search.value'))){  
       $BaseDetails= DB::table("transaction_items")
       ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
       ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','store_product_lists.critical_alert as critical_alert','transaction_items.id as TI_id', 'transaction_items.product_id as product_id','store_product_lists.unit as unit','store_product_lists.brand as brand','store_product_lists.product_description')
       ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "RELOCATED")
       ->orwhere("transaction_type", "MANUAL ADD")
       ->orwhere("transaction_type", "REPLACE_INVOICE") 
       ->orwhere("transaction_type", "IMPORT")
       ->orwhere("transaction_type", "DELETED")
       ->groupBy('transaction_items.location_address','transaction_items.lot_no','transaction_items.product_id','transaction_items.expiration_date','transaction_items.rock','transaction_items.shelf')
       ->orderBy($order,$dir)
       ->offset($start)
       ->limit($limit)    
       ->get();
     }else{
        
      $search= $request->input('search.value');
          $BaseDetails= DB::table("inventoryview")                                 	                                                      	   
         ->where(function($query) use ($search){
         $query->orWhere("invoice_num",'like', "$search%")   
         ->orWhereDate("expiration_date", 'like', "$search%")	                                  
         ->orWhere("product_code",'like', "%$search%")                        
         ->orWhere("productname",'like', "%$search%")                                                  	   
         ->orWhere("product_description",'like', "%$search%")                                                  	   
         ->orWhere("location_address",'like', "%$search%")                                                      	   
         ->orWhere("lot_no",'like', "%$search%")
         ->orWhere("shelf",'like', "%$search%")                                                   
         ->orWhere("rock",'like', "%$search%")                                         
         ->orWhere("brand",'like', "%$search%");                                            
          })
          ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')          
          ->get(); 
         $totalFiltered=count($BaseDetails);
     }
    $data = array();
     if($BaseDetails){
         $lot="";$exp="";
         if($search!=""){

         }else{
           $search="";
         }//product_id
         foreach ($BaseDetails as $BaseDetail) {    
         /*    $deductqty= DB::table("transaction_items")
           ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
           ->where(function($query) use ($BaseDetail){
             $query->where("transaction_type", "POS")   
             ->orwhere("transaction_type", "DISPOSE") 
            ->orwhere("transaction_type", "TRANSFERRED") 
             ->orwhere("transaction_type", "MANUAL MINUS")     
             ->orwhere("transaction_type", "RETURN_P_PO")   
             ->orwhere("transaction_type", "REPLACEMENT_P_PO")  
             ->orwhere('expiration_date',$BaseDetail->expiration_date);                                                                           	                                                      	   
              })
           ->where('transaction_items.product_id',$BaseDetail->product_id)
           ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
           ->where('transaction_items.location_address',$BaseDetail->rock)  
           ->where('transaction_items.location_address',$BaseDetail->location_address)  
           ->where('transaction_items.location_address',$BaseDetail->shelf)
                                
           ->get();      */

           if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
            $deductqty= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
            ->where(function($query) use ($BaseDetail){
              $query->where("transaction_type", "POS")   
              ->orwhere("transaction_type", "DISPOSE") 
              ->orwhere("transaction_type", "TRANSFERRED") 
              ->orwhere("transaction_type", "MANUAL MINUS")     
              ->orwhere("transaction_type", "RETURN_P_PO")   
             // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
              ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
               })
            ->where('transaction_items.product_id',$BaseDetail->product_id)
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
            ->where('transaction_items.location_address',$BaseDetail->location_address)                             
            ->where('transaction_items.rock',$BaseDetail->rock)                             
            ->where('transaction_items.shelf',$BaseDetail->shelf)                             
            ->get(); 
            
            }else  if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && !isset($BaseDetail->lot_no) && $BaseDetail->lot_no == null && $BaseDetail->lot_no =="" ){
              $deductqty= DB::table("transaction_items")
              ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
              ->where(function($query) use ($BaseDetail){
                $query->where("transaction_type", "POS")   
                ->orwhere("transaction_type", "DISPOSE") 
                ->orwhere("transaction_type", "TRANSFERRED") 
                ->orwhere("transaction_type", "MANUAL MINUS")     
                ->orwhere("transaction_type", "RETURN_P_PO")   
               // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
                ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                 })
              ->where('transaction_items.product_id',$BaseDetail->product_id)
              ->where('expiration_date',$BaseDetail->expiration_date) 
              ->where('transaction_items.location_address',$BaseDetail->location_address)                             
              ->where('transaction_items.rock',$BaseDetail->rock)                             
              ->where('transaction_items.shelf',$BaseDetail->shelf)                             
              ->get(); 
              
              }elseif(!isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date == null && $BaseDetail->expiration_date ==""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
                $deductqty= DB::table("transaction_items")
                ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
                ->where(function($query) use ($BaseDetail){
                  $query->where("transaction_type", "POS")   
                  ->orwhere("transaction_type", "DISPOSE") 
                  ->orwhere("transaction_type", "TRANSFERRED") 
                  ->orwhere("transaction_type", "MANUAL MINUS")     
                  ->orwhere("transaction_type", "RETURN_P_PO")   
                 // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
                  ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                   })
                ->where('transaction_items.product_id',$BaseDetail->product_id)
                ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
                ->where('transaction_items.location_address',$BaseDetail->location_address)                             
                ->where('transaction_items.rock',$BaseDetail->rock)                             
                ->where('transaction_items.shelf',$BaseDetail->shelf)                             
                ->get(); 
                
                }/* {
                $deductqty= DB::table("transaction_items")
                ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
                ->where(function($query) use ($BaseDetail){
                  $query->where("transaction_type", "POS")   
                  ->orwhere("transaction_type", "DISPOSE") 
                  ->orwhere("transaction_type", "TRANSFERRED") 
                  ->orwhere("transaction_type", "MANUAL MINUS")     
                  ->orwhere("transaction_type", "RETURN_P_PO")   	                                                      	   
                  ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                   })
                ->where('transaction_items.product_id',$BaseDetail->product_id)
                
                ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
                ->where('transaction_items.location_address',$BaseDetail->location_address)                             
                ->where('transaction_items.rock',$BaseDetail->rock)                             
                ->where('transaction_items.shelf',$BaseDetail->shelf)                             
                ->get();  
            } */


           $totalDeduction=0;
           if(isset($deductqty[0]->TotalQuantitys)){
            $totalDeduction = $deductqty[0]->TotalQuantitys;
           }
             $nestedData['quantity'] = $BaseDetail->TotalQuantity-$totalDeduction;  
             $nestedData['product_code'] = $BaseDetail->product_code;  
             $nestedData['productname'] = $BaseDetail->productname." ".$BaseDetail->product_description;  
             $nestedData['brand'] = $BaseDetail->brand;  
             $nestedData['unit'] = $BaseDetail->units; 
             $nestedData['critical'] = $BaseDetail->critical_alert;  
             if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
               $lot = "N/A";
               }else{
                   $lot = $BaseDetail->lot_no;
                   }
                   $nestedData['lot_no'] =$lot;
             $nestedData['location'] = $BaseDetail->location_address;
             $nestedData['rack'] = $BaseDetail->rock;
             $nestedData['shelf'] = $BaseDetail->shelf;
             if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
               $exp = "N/A";
             }else{
               $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
               }
               $nestedData['exp'] =$exp;      
             $nestedData['action'] = "<div class='dropdown'>
             <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                 <span class='caret'></span></button>
              <ul class='dropdown-menu'>
              <li><a href='#' onclick=btn_action('$BaseDetail->product_id','view') class='dropdown-item' title='View Invoice Details'>View</a></li>  
              <li><a href='#' onclick=btn_action('$BaseDetail->product_id%".$BaseDetail->id."','relocate') class='dropdown-item' title='Relocate'>Relocate</a></li>                                  
             </ul>
             </div>" ;
             $data[] = $nestedData; 
         }
     }  
      $data;     
    $json_data = array(
     "draw"            => intval($request->input('draw')),  
     "recordsTotal"    => intval($totalData),  
     "recordsFiltered" => intval($totalFiltered), 
     "data" => $data   
     );

     echo json_encode($json_data);   
       } catch (\Throwable $th) {
         return $th->getMessage();
       }      
   }
  public function productInventoryViewData(Request $request){
    

    try {
          
      $search="";
      $BaseDetails=  DB::table('productHistoryView')->where('product_id',$request->id)->get();
 
     $totalData = count($BaseDetails);       
     $totalFiltered = $totalData;
     $columns = array( 
       0 => 'TotalQuantity',
       1 => 'product_code',
       2 =>'productname',  
       6 => 'expiration_date',

   );
     $limit = $request->input('length');
     $start = $request->input('start');

      $dir = $request->input('order.0.dir');

      
      $order = $columns[$request->input('order.0.column')];
     $BaseDetails="";
     if(empty($request->input('search.value'))){  
       $BaseDetails=  DB::table('productHistoryView')->where('product_id',$request->id)->get();
     }else{
        
      $search= $request->input('search.value');
          $BaseDetails=  DB::table('productHistoryView')->where('product_id',$request->id)->get();
         $totalFiltered=count($BaseDetails);
     }
    $data = array();
     if($BaseDetails){
         $lot="";$exp="";
         if($search!=""){

         }else{
           $search="";
         }
         foreach ($BaseDetails as $BaseDetail) {  
                                                                        	                                                      	   
          
            if($BaseDetail->transaction_type == 'POS' ||$BaseDetail->transaction_type == 'DISPOSE' ||$BaseDetail->transaction_type == 'TRANSFERRED' ||$BaseDetail->transaction_type == 'MANUAL MINUS' ||$BaseDetail->transaction_type == 'RETURN_P_PO' ||$BaseDetail->transaction_type == 'REPLACEMENT_P_PO'){
              $transactionType = "Out";
            }else{
              $transactionType = "In";
            }
             $nestedData['transactionType'] = $transactionType;  
             $nestedData['quantity'] = $BaseDetail->TotalQuantity;  
             $nestedData['product_code'] = $BaseDetail->product_code;  
             $nestedData['productname'] = $BaseDetail->productname." ".$BaseDetail->product_description;  
             $nestedData['brand'] = $BaseDetail->brand;  
             $nestedData['unit'] = $BaseDetail->units; 
             $nestedData['critical'] = $BaseDetail->critical_alert;  
             if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
               $lot = "N/A";
               }else{
                   $lot = $BaseDetail->lot_no;
                   }
                   $nestedData['lot_no'] =$lot;
             $nestedData['location'] = $BaseDetail->location_address;
             $nestedData['rack'] = $BaseDetail->rock;
             $nestedData['shelf'] = $BaseDetail->shelf;
             if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
               $exp = "N/A";
             }else{
               $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));;
               }
               $nestedData['exp'] =$exp;              
               $nestedData['transactionDate'] = date('M-d-Y', strtotime($BaseDetail->created_at));             
             $data[] = $nestedData; 
         }
     }  
      $data;     
    $json_data = array(
     "draw"            => intval($request->input('draw')),  
     "recordsTotal"    => intval($totalData),  
     "recordsFiltered" => intval($totalFiltered), 
     "data" => $data   
     );

     echo json_encode($json_data);   
       } catch (\Throwable $th) {
         return $th->getMessage();
       }   
   
  }
  
  



  public function processProductInventoryDataList(){
    try {
       


       $BaseDetails= DB::table("inventoryview")                                 	                                                      	   
       ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf') 
       /* ->where('product_id', 1372)  
       ->where('rock','B')      */  
       ->get();   
  $data = array();
  if($BaseDetails){

      foreach ($BaseDetails as $BaseDetail) {    
        if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
         $deductqty= DB::table("transaction_items")
         ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
         ->where(function($query) use ($BaseDetail){
           $query->where("transaction_type", "POS")   
           ->orwhere("transaction_type", "DISPOSE") 
           ->orwhere("transaction_type", "TRANSFERRED") 
           ->orwhere("transaction_type", "MANUAL MINUS")     
           ->orwhere("transaction_type", "RETURN_P_PO")   
          // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
           ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
            })
         ->where('transaction_items.product_id',$BaseDetail->product_id)
         ->where('expiration_date',$BaseDetail->expiration_date)
         ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
         ->where('transaction_items.location_address',$BaseDetail->location_address)                             
         ->where('transaction_items.rock',$BaseDetail->rock)                             
         ->where('transaction_items.shelf',$BaseDetail->shelf)                             
         ->get(); 
         
         }else  if(isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date != null && $BaseDetail->expiration_date !=""  && !isset($BaseDetail->lot_no) && $BaseDetail->lot_no == null && $BaseDetail->lot_no =="" ){
           $deductqty= DB::table("transaction_items")
           ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
           ->where(function($query) use ($BaseDetail){
             $query->where("transaction_type", "POS")   
             ->orwhere("transaction_type", "DISPOSE") 
             ->orwhere("transaction_type", "TRANSFERRED") 
             ->orwhere("transaction_type", "MANUAL MINUS")     
             ->orwhere("transaction_type", "RETURN_P_PO")   
            // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
             ->orwhere("transaction_type","REPLACEMENT_P_PO");                                                                         	                                                      	   
              })
           ->where('transaction_items.product_id',$BaseDetail->product_id)
           ->where('expiration_date',$BaseDetail->expiration_date) 
           ->where('transaction_items.location_address',$BaseDetail->location_address)                             
           ->where('transaction_items.rock',$BaseDetail->rock)                             
           ->where('transaction_items.shelf',$BaseDetail->shelf)                             
           ->get(); 
           
           }elseif(!isset($BaseDetail->expiration_date) && $BaseDetail->expiration_date == null && $BaseDetail->expiration_date ==""  && isset($BaseDetail->lot_no) && $BaseDetail->lot_no != null && $BaseDetail->lot_no !="" ){
             $deductqty= DB::table("transaction_items")
             ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
             ->where(function($query) use ($BaseDetail){
               $query->where("transaction_type", "POS")   
               ->orwhere("transaction_type", "DISPOSE") 
               ->orwhere("transaction_type", "TRANSFERRED") 
               ->orwhere("transaction_type", "MANUAL MINUS")     
               ->orwhere("transaction_type", "RETURN_P_PO")   
              // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
               ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
                })
             ->where('transaction_items.product_id',$BaseDetail->product_id)
             ->where('transaction_items.lot_no',$BaseDetail->lot_no)  
             ->where('transaction_items.location_address',$BaseDetail->location_address)                             
             ->where('transaction_items.rock',$BaseDetail->rock)                             
             ->where('transaction_items.shelf',$BaseDetail->shelf)                             
             ->get(); 
             
             }


        $totalDeduction=0;
        if(isset($deductqty[0]->TotalQuantitys)){
         $totalDeduction = $deductqty[0]->TotalQuantitys;
        }

        if($BaseDetail->TotalQuantity-$totalDeduction >0 || $BaseDetail->TotalQuantity-$totalDeduction ==0){
          continue;
        }
         $BaseDetail->TotalQuantity-$totalDeduction;
          $nestedData['quantity'] = $BaseDetail->TotalQuantity-$totalDeduction;  
          $nestedData['product_code'] = $BaseDetail->product_code;  
          $nestedData['productname'] = $BaseDetail->productname." ".$BaseDetail->product_description;  
          $nestedData['brand'] = $BaseDetail->brand;  
          $nestedData['unit'] = $BaseDetail->units; 
          $nestedData['critical'] = $BaseDetail->critical_alert;  
          if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
            $lot = "N/A";
            }else{
                $lot = $BaseDetail->lot_no;
                }
                $nestedData['lot_no'] =$lot;
          $nestedData['location'] = $BaseDetail->location_address;
          $nestedData['rack'] = $BaseDetail->rock;
          $nestedData['shelf'] = $BaseDetail->shelf;
          if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null){
            $exp = "N/A";
          }else{
            $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
            }
            $nestedData['exp'] =$exp;      
       
            
          $data[] = $nestedData; 
      }
  }  
  return  $data;     


  echo json_encode($json_data);   
    } catch (\Throwable $th) {
      return $th->getMessage();
    }      
}
}
