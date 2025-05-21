<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Excel;
use Yajra\Datatables\DataTables;
use App\Exports\inventoryExport;
use DateTime;

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
            if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
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
 
        $po_list= DB::table('totalinverntory')
        ->whereDate('expiration_date','<=',$now
        ->orderBy($order,$dir)
        ->offset($start)
        ->limit($limit) 
        )->get();  

        
       $data = array();
        if($po_list){
            foreach ($po_list as $po_lists) { 

              $po_list= DB::table('store_purchase_orders')->where('po_no',$po_lists->po_id)->first();          
              if(isset($po_list)){
                $po_lists->order_date =date('M-d-Y', strtotime($po_list->created_at));
              }else{
                $po_lists->order_date ="Beginning";
              }

              $nestedData['quantity'] = $po_lists->quantity;  
              $nestedData['product_code'] = $po_lists->product_code;  
                $nestedData['productname'] = $po_lists->productname;  
                $nestedData['po_no'] = $po_lists->po_no;  
                $nestedData['invoice_num'] = $po_lists->invoice_num;
                $nestedData['lot_no'] = $po_lists->lot_no;
                $nestedData['location_address'] = $po_lists->location_address;
                $nestedData['expiration_date'] =  date('M-d-Y', strtotime($po_lists->expiration_date));               
                $nestedData['order_date'] =     $po_lists->order_date;            
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

        $po_list= DB::table('totalinverntory')
        ->whereDate('expiration_date','<=',$now)

        ->get();  
        $totalData = count($po_list);       
        $totalFiltered = $totalData;
        
        $limit = $request->input('length');
        $start = $request->input('start');
 
        $dir = $request->input('order.0.dir');
        $columns = array( 
          0 => 'quantity',
          1 => 'product_code',
          2 =>'productname',  
          6 => 'expiration_date',
  
      );
        $order = $columns[$request->input('order.0.column')];
 
        $po_list="";
        if(empty($request->input('search.value'))){  
            $po_list= DB::table('totalinverntory')
            ->whereDate('expiration_date','<=',$now)         
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)   	   
            ->get(); 
        }else{
            $search = $request->input('search.value');
            $po_list= DB::table('totalinverntory')          
            ->whereDate('expiration_date','<=',$now)
            ->orwhere(function($query) use ($search){
              $query->orwhere("transaction_type", "MANUAL")
              ->orwhere("transaction_type", "IMPORT")
              ->orwhere("quantity", 'like', "{%$search%}")
              ->orwhere("product_code", 'like', "{%$search%}")             
              ->orwhere("productname", 'like', "{%$search%}")            
              ->orwhere("po_no", 'like', "{%$search%}")            
              ->orwhere("invoice_num", 'like', "{%$search%}")             
              ->orwhere("lot_no", 'like', "{%$search%}")             
              ->orwhere("location_address", "{%$$search%}");             
                     
              })
              ->orderBy($order,$dir)
              ->offset($start)
              ->limit($limit)  
              ->get(); 
         
            $totalFiltered=count($po_list);
        }
       $data = array();
        if($po_list){
            foreach ($po_list as $po_lists) { 
              $po_list= DB::table('store_purchase_orders')->where('po_no',$po_lists->po_id)->first();          
              if(isset($po_list)){
                $po_lists->order_date =date('M-d-Y', strtotime($po_list->created_at));
              }else{
                $po_lists->order_date ="Beginning";
              }
              $nestedData['quantity'] = $po_lists->quantity;  
              $nestedData['product_code'] = $po_lists->product_code;  
                $nestedData['productname'] = $po_lists->productname;  
                $nestedData['po_no'] = $po_lists->po_id;  
                $nestedData['invoice_num'] = $po_lists->invoice_num;
                $nestedData['lot_no'] = $po_lists->lot_no;
                $nestedData['location_address'] = $po_lists->location_address;
                $nestedData['expiration_date'] =  date('M-d-Y', strtotime($po_lists->expiration_date));               
                $nestedData['order_date'] =     $po_lists->order_date;            
                $nestedData['receive_date'] = date('M-d-Y', strtotime($po_lists->created_at ));                
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
      $datenow = date("Y-m-d");
      $now = Carbon::now()->format('d-m-Y');
         return view('inventory.inventory-list.product-inventory',compact('datenow','now'));
     }

     public function productInventoryView(Request $request){
    return view('inventory.inventory-list.product-inventory-view');
    }
    public function productInventoryDataListPdfexcel($end){

        $end = $end;
        $dateString =   $end ;
        $dateTime = new DateTime($dateString);
        $end = $dateTime->format('Y-m-d');
              if(isset($request->end)){
                $BaseDetails= DB::table("transaction_items")
              ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
              ->whereDate('created_at','<=',$end)  
              ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
              ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
              ->get();      
        
            }else{
              $BaseDetails= DB::table("transaction_items")
              ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`') 
              ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
              ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
              ->get();
        
            }
          
               
      


      $data = array();


      foreach ($BaseDetails as $BaseDetail) {   
        
        
        $store_product_lists= DB::table("store_product_lists")
        ->where('id',$BaseDetail->product_id)
        ->first();
        if(!isset($store_product_lists)){
          continue;
        }
        if($BaseDetail->lot_no == null){
          if(isset($request->end)){
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)            
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->whereDate('created_at','<=',$end)  
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }else{
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }
           
        }else{
          if(isset($request->end)){
          $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)            
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->where('lot_no',$BaseDetail->lot_no)
            ->whereDate('created_at','<=',$end)  
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }else{
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('lot_no',$BaseDetail->lot_no)
            ->where('shelf',$BaseDetail->shelf)
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }
        }


        
        $totalDeductionData  = 0;
        if(isset($deducttionDetails->TotalQuantity_deduct)){
          $totalDeductionData = (int)$BaseDetail->totalQty - (int)$deducttionDetails->TotalQuantity_deduct;
        }else{
          $totalDeductionData = (int)$BaseDetail->totalQty;
        }
        $nestedData['quantity'] = $totalDeductionData;  
        $nestedData['product_code'] = $store_product_lists->product_code;  
        $nestedData['productname'] = $store_product_lists->productname." ".$store_product_lists->product_description;  
        $nestedData['brand'] = $store_product_lists->brand;  
        $nestedData['unit'] = $store_product_lists->unit; 
        $nestedData['critical'] = $store_product_lists->critical_alert;  
        if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
          $lot = "N/A";
          }else{
              $lot = $BaseDetail->lot_no;
              }
              $nestedData['lot_no'] =$lot;
        $nestedData['location'] = $BaseDetail->location_address;
        $nestedData['rack'] = $BaseDetail->rock;
        $nestedData['shelf'] = $BaseDetail->shelf;
        if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
          $exp = "N/A";
        }else{
          $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
          }
          $nestedData['exp'] =$exp;
        $data[] = $nestedData; 
    }
    


      return Excel::download(new inventoryExport(json_encode($data)), 'Inverntory '.date("Y-m-d").'.xlsx');


    }


    public function productInventoryDataListPdfexcelAll(){
            $BaseDetails= DB::table("totalinverntory")   
            ->orderBy('totalQty','desc')
            ->get();
      $data = array();


      foreach ($BaseDetails as $BaseDetail) {    
        
        $nestedData['quantity'] = $BaseDetail->totalQty;  
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
        if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
          $exp = "N/A";
        }else{
          $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
          }
          $nestedData['exp'] =$exp;      
        $data[] = $nestedData; 
    }
    


      return Excel::download(new inventoryExport(json_encode($data)), 'Inverntory '.date("Y-m-d").'.xlsx');


    }

     public function productInventoryDataListPdf(Request $request){
      $data = array();
      $BaseDetails= DB::table("totalinverntory")      
      ->get();
      foreach ($BaseDetails as $BaseDetail) {    
       
        $nestedData['quantity'] = $BaseDetail->totalQty;    
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
        if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
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
     
     /* public function productInventoryDataList(Request $request){
       try {
          
      $search="";
      $BaseDetails= DB::table("totalinverntory")->get();
 
     $totalData = count($BaseDetails);       
     $totalFiltered = $totalData;
     $columns = array( 
       0 => 'totalQty',
       1 => 'product_code',
       2 =>'productname',  
       6 => 'expiration_date',
      );
     $limit = $request->input('length');
     $start = $request->input('start');

      $dir = $request->input('order.0.dir');

      
      $order = $columns[$request->input('order.0.column')];
      $BaseDetails="";
      if(isset($request->end)){

          $end = $request->end;
            // Your string containing the date
          $dateString =   $end ;

          // Create a DateTime object from the string
          $dateTime = new DateTime($dateString);

          // Format the date as you need
          $end = $dateTime->format('Y-m-d');

        
          
            $BaseDetails= DB::table("totalinverntory_w_date")
           ->where('transaction_date', '<=', $end)
          ->orderBy($order,$dir)
          ->offset($start)
          ->limit($limit)    
          ->get();    
          $BaseDetailscount= DB::table("inventoryview")  
          ->count();  
          $totalFiltered=$BaseDetailscount;
        
     }else{
      if(empty($request->input('search.value'))){  
        $BaseDetails= DB::table("totalinverntory")
        ->orderBy($order,$dir)
        ->offset($start)
        ->limit($limit)    
        ->get();
      }else{

      $end = $request->end;
      $dateString =   $end ;
      $dateTime = new DateTime($dateString);
      $end = $dateTime->format('Y-m-d');

         
       $search= $request->input('search.value');
           $BaseDetails= DB::table("totalinverntory")   
           ->where('created_at', '<=', $end)                              	                                                      	   
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
           ->orderBy($order,$dir)
           ->offset($start)
           ->limit($limit) 
       
           ->get(); 
          $totalFiltered=count($BaseDetails);
      }
     }
    
     
    $data = array();
     if($BaseDetails){
         $lot="";$exp="";
         foreach ($BaseDetails as $BaseDetail) {    
        

        
             $nestedData['quantity'] = $BaseDetail->totalQty;  
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
             if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
               $exp = "N/A";
             }else{
               $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
               }
               $nestedData['exp'] =$exp;   
               $routeData = $BaseDetail->product_id."%".$BaseDetail->location_address."%".$BaseDetail->rock."%".$BaseDetail->shelf."%".$BaseDetail->expiration_date."%".str_replace(" ","e0j",$lot);   
             $nestedData['action'] = "<div class='dropdown'>
             <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                 <span class='caret'></span></button>
              <ul class='dropdown-menu'>
              <li><a href='#' onclick=btn_action('$routeData','view') class='dropdown-item' title='View Invoice Details'>View</a></li>  
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
   } */



   public function productInventoryDataList(Request $request){
    try {
       
   $search="";
  $columns = array( 
    0 => 'totalQty',
    1 => 'product_code',
    2 =>'productname',  
    6 => 'expiration_date',
   );
  $limit = $request->input('length');
  $start = $request->input('start');

   $dir = $request->input('order.0.dir');

   
   $order = $columns[$request->input('order.0.column')];
   $BaseDetails="";

    

   $end = $request->end;
    $dateString =   $end ;
    $dateTime = new DateTime($dateString);
    $end = $dateTime->format('Y-m-d');
    
   if(empty($request->input('search.value'))){  
  
    if(isset($request->searchBox)){
          $search= $request->input('search.value');
          if(isset($request->searchBox)){
            $search = $request->searchBox;
          }
            $BaseDetails_count= DB::table("transaction_items")
          ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`') 
          ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
          ->where(function($query) use ($search){
          $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
          ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
          ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
          ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
          ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
          ->orWhere("store_product_lists.brand",'like', "%$search%")
          ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
          ->orWhere("transaction_items.lot_no",'like', "%$search%")
          ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
          ->orWhere("transaction_items.rock",'like', "%$search%");                                            
          })
          ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
          ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
          ->get();

          $BaseDetails= DB::table("transaction_items") 
          ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
            ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
            ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
          ->where(function($query) use ($search){
          $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
          ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
          ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
          ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
          ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
          ->orWhere("store_product_lists.brand",'like', "%$search%")
          ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
          ->orWhere("transaction_items.lot_no",'like', "%$search%")
          ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
          ->orWhere("transaction_items.rock",'like', "%$search%");                                            
          })
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->get();

  }else if(isset($request->end)){
       $BaseDetails_count= DB::table("transaction_items")
      ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
      ->whereDate('created_at','<=',$end)  
      ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
      ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
      ->get();

      $BaseDetails= DB::table("transaction_items") 
      ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
      ->whereDate('created_at','<=',$end)  
       ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
       ->orderBy($order,$dir)
       ->offset($start)
       ->limit($limit)
       ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
       ->get();


    }else{
      $BaseDetails_count= DB::table("transaction_items")
      ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`') 
      ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
      ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
      ->get();

      $BaseDetails= DB::table("transaction_items") 
      ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
       ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
       ->orderBy($order,$dir)
       ->offset($start)
       ->limit($limit)
       ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
       ->get();
    }
    

     $totalFiltered=count($BaseDetails_count);
     $totalData = $BaseDetails_count;
   

     
   }else{
    if(isset($request->end)){
      $BaseDetails_count= DB::table("transaction_items")
     ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
     ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
     ->where(function($query) use ($search){
     $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
     ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
     ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
     ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
     ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
     ->orWhere("store_product_lists.brand",'like', "%$search%")
     ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
     ->orWhere("transaction_items.lot_no",'like', "%$search%")
     ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
     ->orWhere("transaction_items.rock",'like', "%$search%");                                            
     })
     ->whereDate('transaction_items.created_at','<=',$end)  
     ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
     ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
     ->get();

     $BaseDetails= DB::table("transaction_items") 
     ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
     ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
     ->where(function($query) use ($search){
     $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
     ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
     ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
     ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
     ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
     ->orWhere("store_product_lists.brand",'like', "%$search%")
     ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
     ->orWhere("transaction_items.lot_no",'like', "%$search%")
     ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
     ->orWhere("transaction_items.rock",'like', "%$search%");                                            
     })
     ->whereDate('transaction_items.created_at','<=',$end)  
      ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
      ->orderBy($order,$dir)
      ->offset($start)
      ->limit($limit)
      ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
      ->get();


   }else{
    $search= $request->input('search.value');
    
      $BaseDetails_count= DB::table("transaction_items")
     ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`') 
     ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
     ->where(function($query) use ($search){
     $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
     ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
     ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
     ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
     ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
     ->orWhere("store_product_lists.brand",'like', "%$search%")
     ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
     ->orWhere("transaction_items.lot_no",'like', "%$search%")
     ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
     ->orWhere("transaction_items.rock",'like', "%$search%");                                            
     })
     ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
     ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
     ->get();

     $BaseDetails= DB::table("transaction_items") 
     ->selectRaw('sum(`transaction_items`.`quantity`) AS `totalQty`,`transaction_items`.`id` AS `id`,`transaction_items`.`transaction_id` AS `transaction_id`,`transaction_items`.`cancelled_id` AS `cancelled_id`,`transaction_items`.`user_id` AS `user_id`,`transaction_items`.`invoice_num` AS `invoice_num`,`transaction_items`.`po_id` AS `po_id`,`transaction_items`.`product_id` AS `product_id`,`transaction_items`.`units` AS `units`,`transaction_items`.`item_id` AS `item_id`,`transaction_items`.`price` AS `price`,`transaction_items`.`transaction_type` AS `transaction_type`,`transaction_items`.`quantity` AS `quantity`,`transaction_items`.`lot_no` AS `lot_no`,`transaction_items`.`location_address` AS `location_address`,`transaction_items`.`shelf` AS `shelf`,`transaction_items`.`rock` AS `rock`,`transaction_items`.`expiration_date` AS `expiration_date`,`transaction_items`.`remarks` AS `remarks`,`transaction_items`.`status` AS `status`,`transaction_items`.`created_at` AS `created_at`,`transaction_items`.`updated_at` AS `updated_at`')
      ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")
      ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')                              	                                                      	   
     ->where(function($query) use ($search){
     $query->orWhere("transaction_items.invoice_num",'like', "$search%")   
     ->orWhereDate("transaction_items.expiration_date", 'like', "$search%")	                                  
     ->orWhere("store_product_lists.product_code",'like', "%$search%")                        
     ->orWhere("store_product_lists.productname",'like', "%$search%")                                                  	   
     ->orWhere("store_product_lists.product_description",'like', "%$search%")                                            
     ->orWhere("store_product_lists.brand",'like', "%$search%")
     ->orWhere("transaction_items.location_address",'like', "%$search%")                                                      	   
     ->orWhere("transaction_items.lot_no",'like', "%$search%")
     ->orWhere("transaction_items.shelf",'like', "%$search%")                                                   
     ->orWhere("transaction_items.rock",'like', "%$search%");                                            
     })
      ->orderBy($order,$dir)
      ->offset($start)
      ->limit($limit)
      ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
      ->get();
   }
      
    
   }
  
   $totalFiltered=count($BaseDetails_count);
   $totalData = $BaseDetails_count;
 $data = array();
  if($BaseDetails){
      $lot="";$exp="";
      foreach ($BaseDetails as $BaseDetail) {    
        
        $store_product_lists= DB::table("store_product_lists")
        ->where('id',$BaseDetail->product_id)
        ->first();

        if($BaseDetail->lot_no == null){
          if(isset($request->end)){
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)            
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->whereDate('created_at','<=',$end)  
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO','REPLACEMENT_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }else{
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO','REPLACEMENT_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }
           
        }else{
          if(isset($request->end)){
          $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)            
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('shelf',$BaseDetail->shelf)
            ->where('lot_no',$BaseDetail->lot_no)
            ->whereDate('created_at','<=',$end)  
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO','REPLACEMENT_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }else{
            $deducttionDetails= DB::table("transaction_items") 
            ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
            ->where('product_id',$BaseDetail->product_id)
            ->where('location_address',$BaseDetail->location_address)
            ->where('expiration_date',$BaseDetail->expiration_date)
            ->where('rock',$BaseDetail->rock)
            ->where('lot_no',$BaseDetail->lot_no)
            ->where('shelf',$BaseDetail->shelf)
            ->whereRaw("transaction_type in ('POS','DISPOSE','TRANSFERRED','MANUAL MINUS','RETURN_P_PO','REPLACEMENT_P_PO')")        
            ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
            ->first();
          }
        }
       
          $totalDeductionData  = 0;
          if(isset($deducttionDetails->TotalQuantity_deduct)){
            $totalDeductionData = (int)$BaseDetail->totalQty - (int)$deducttionDetails->TotalQuantity_deduct;
          }else{
            $totalDeductionData = (int)$BaseDetail->totalQty;
          }
          $nestedData['quantity'] = $totalDeductionData;  
          $nestedData['product_code'] = $store_product_lists->product_code;  
          $nestedData['productname'] = $store_product_lists->productname." ".$store_product_lists->product_description;  
          $nestedData['brand'] = $store_product_lists->brand;  
          $nestedData['unit'] = $store_product_lists->unit; 
          $nestedData['critical'] = $store_product_lists->critical_alert;  
          if($BaseDetail->lot_no=="" || $BaseDetail->lot_no == null){
            $lot = "N/A";
            }else{
                $lot = $BaseDetail->lot_no;
                }
                $nestedData['lot_no'] =$lot;
          $nestedData['location'] = $BaseDetail->location_address;
          $nestedData['rack'] = $BaseDetail->rock;
          $nestedData['shelf'] = $BaseDetail->shelf;
          if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
            $exp = "N/A";
          }else{
            $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));
            }
            $nestedData['exp'] =$exp;   
            $routeData = $BaseDetail->product_id."%".$BaseDetail->location_address."%".$BaseDetail->rock."%".$BaseDetail->shelf."%".$BaseDetail->expiration_date."%".str_replace(" ","e0j",$lot);   
          $nestedData['action'] = "<div class='dropdown'>
          <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
              <span class='caret'></span></button>
           <ul class='dropdown-menu'>
           <li><a href='#' onclick=btn_action('$routeData','view') class='dropdown-item' title='View Invoice Details'>View</a></li>  
           <li><a href='#' onclick=btn_action('$routeData','relocate') class='dropdown-item' title='Relocate'>Relocate</a></li>                                  
          </ul>
          </div>" ;
          $data[] = $nestedData; 
      }
  }  
   $data;     
 $json_data = array(
  "draw"            => intval($request->input('draw')),  
  "recordsTotal"    => $totalData,  
  "recordsFiltered" => $totalFiltered, 
  "data" => $data   
  );

  echo json_encode($json_data);   
    } catch (\Throwable $th) {
      return $th->getLine();
    }      
}


  public function productInventoryViewData(Request $request){
    

    try {
      $search="";
      if($request->lot == 'NA'){
        $BaseDetails=  DB::table('productHistoryView')
        ->where('product_id',$request->id)
        ->where('location_address',$request->location_address)
        ->where('rock',$request->rock)
        ->where('shelf',$request->shelf)  
        ->Where('expiration_date','like','%'.$request->exp.'%')
        ->orderBy('created_at','desc')                 
        ->get();
      }else{
        $request->lot = str_replace("e0j"," ",$request->lot);
        $BaseDetails=  DB::table('productHistoryView')
        ->where('product_id',$request->id)
        ->where('location_address',$request->location_address)
        ->where('rock',$request->rock)
        ->where('shelf',$request->shelf)  
        ->Where('expiration_date','like','%'.$request->exp.'%')
        ->Where('lot_no','like','%'.$request->lot.'%')     
        ->orderBy('created_at','desc')                 
        ->get();
      }
      
 
     $totalData = count($BaseDetails);       
     $totalFiltered = $totalData;
  /*    $columns = array( 
       0 => 'created_at',

   ); */
     $limit = $request->input('length');
     $start = $request->input('start');

/*       $dir = $request->input('order.0.dir');

      
      $order = $columns[$request->input('order.0.column')]; */
     $BaseDetails="";
     if(empty($request->input('search.value'))){ 
      if($request->lot == 'NA'){
        $BaseDetails=  DB::table('productHistoryView')
          ->where('product_id',$request->id)
          ->where('location_address',$request->location_address)
          ->where('rock',$request->rock)
          ->where('shelf',$request->shelf)   
           ->Where('expiration_date','like','%'.$request->exp.'%')            
           ->orderBy('created_at','desc')  
           ->offset($start)  
           ->limit($limit)             
          ->get();
      }else{
        $BaseDetails=  DB::table('productHistoryView')
        ->where('product_id',$request->id)
        ->where('location_address',$request->location_address)
        ->where('rock',$request->rock)
        ->where('shelf',$request->shelf)   
         ->Where('expiration_date','like','%'.$request->exp.'%')
         ->Where('lot_no','like','%'.$request->lot.'%')
         ->orderBy('created_at','desc')  
         ->offset($start)  
         ->limit($limit)           
         ->get();
      }
      
      
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
             $nestedData['transactionType_raw'] = $BaseDetail->transaction_type;  
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
             if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
               $exp = "N/A";
             }else{
               $exp= date('M-d-Y', strtotime($BaseDetail->expiration_date));;
               }
               $nestedData['exp'] =$exp;              
               $nestedData['transactionDate'] = date('M-d-Y', strtotime($BaseDetail->created_at));    
               if($BaseDetail->transaction_type == 'TRANSFERRED'){
                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                 <ul class='dropdown-menu'>               
                 <li><a href='#' onclick=btn_action('$BaseDetail->product_id%".$BaseDetail->id."','delete') class='dropdown-item' title='Relocate'>Delete</a></li>                                  
                </ul>
                </div>" ;  
               }else{
                $nestedData['action'] ="No Action";
               }
                     
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
  
  
  
  public function detetransactionhistory(Request $request){
    try {
       $data = DB::table('transaction_items')
      ->where('id',$request->transId)
      ->where('product_id',$request->prodId)
      ->first();

      DB::table('tbl_transaction_deleted_data')->insert([
        'json'=> json_encode($data)
      ]);

      DB::table('transaction_items')
      ->where('id',$request->transId)
      ->where('product_id',$request->prodId)
      ->delete();

      $data2 = DB::table('transaction_items')
      ->where('product_id',$data->product_id)
      ->where('transaction_type','RELOCATED')
      ->where('lot_no',$data->lot_no)
      ->where('quantity',$data->quantity)
      ->where('expiration_date',$data->expiration_date)
      ->first();

     

      DB::table('tbl_transaction_deleted_data')->insert([
        'json'=> json_encode($data2)
      ]);
      DB::table('transaction_items')
      ->where('product_id',$data->product_id)
      ->where('transaction_type','RELOCATED')
      ->where('lot_no',$data->lot_no)
      ->where('quantity',$data->quantity)
      ->where('expiration_date',$data->expiration_date)
      ->delete();

      return "deleted";
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
             ->orwhere("transaction_type", "RETURN_P_PO")  ; 
            // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
                                                                                   	                                                      	   
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
               ->orwhere("transaction_type", "RETURN_P_PO");   
              // ->orwhere('expiration_date',$value->expiration_date)                                                                          	                                                      	   
                                                                                 	                                                      	   
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
          if($BaseDetail->expiration_date=="" || $BaseDetail->expiration_date == null || $BaseDetail->expiration_date == '0000-00-00'){
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
