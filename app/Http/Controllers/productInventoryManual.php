<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\TransactionItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\StoreProductList;
use App\Price;

class productInventoryManual extends Controller
{

  public function edit_adjustment(Request $request){
      
      $datamanual =  DB::table('manualaddorminusview')
      ->where('id',$request->id)
      ->first();

      $units= DB::table('units')->groupBy('unit')->get();
        $lots = DB::table('lots')->groupBy('lot_no')->get();
        $locations = DB::table('locations')->groupBy('location')->get();
        $racks = DB::table('racks')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelf_locations')->groupBy('shelf')->get();
        $now = Carbon::now()->format('d-m-Y');
       
       $t = strtotime($datamanual->expiration_date);
       $datamanual->expiration_date=date('d-m-Y',$t);
     
        return view('inventory.productManualAdd.addManualProductEdit',compact('now','lots','locations','racks','shelf_locations','units','datamanual'));
  }

  public function edit_Product(Request $request){
    DB::beginTransaction();
    try {
        $auth_id =Auth::id();
        $TransactionItem = TransactionItem::find($request->transaction_Id);
        $TransactionItem->user_id= $auth_id;
        $TransactionItem->units= $request->units;
        $TransactionItem->invoice_num= $request->invoice_number;
        $TransactionItem->po_id= $request->POnumber;
        $TransactionItem->product_id= $request->productSelect;
        $TransactionItem->price= $request->OrderPrice;
        if($request->action_state == "Add"){
          $TransactionItem->transaction_type= "MANUAL ADD";
          DB::table('store_product_lists')->where('id',$request->productSelect)->update([
            'capital' =>  $request->OrderPrice,
            'selling_price' =>$request->OrderPrice,
          ]);
        }else{
          $TransactionItem->transaction_type= "MANUAL MINUS";
        }
        
        $TransactionItem->quantity= $request->qunatity_po;
        $TransactionItem->location_address=  $request->location_po;
        $TransactionItem->shelf= $request->shelf_po;
        $TransactionItem->rock= $request->rock_po;
        $TransactionItem->rock= $request->rock_po;            
        if(isset($request->lot_no)){
            $TransactionItem->lot_no= $request->lot_no;
        }
        if(isset($request->exp_date)){
            $TransactionItem->expiration_date= date('Y-m-d', strtotime($request->exp_date ));
        }
        $TransactionItem->remarks= $request->remarks; 
        $TransactionItem->save();

    
        DB::commit();
        return "okay";
      } catch (Exception $e) {
        DB::rollback();
         return response()->json([
            'message'=>$e->getMessage()
        ],500);
    }
  }
      public function delete_Product_manual(Request $request){

        DB::table('transaction_items')
        ->where('id',$request->id)
        ->delete();
        return "deleted";
      }
      public function price_update_Product(Request $request){
        
        try {
          DB::beginTransaction();
              $StoreProductList =  StoreProductList::find($request->id);
              $selling_price=$StoreProductList->selling_price;
              $capital=$StoreProductList->capital;
              $StoreProductList->selling_price=$request->selling;
              $StoreProductList->capital=$request->capital;
              $StoreProductList->save();
              
              $Price= new Price();
              $Price->product_id=  $request->id;
              $Price->price_before=  $capital;
              $Price->price_update= $request->capital;
              $Price->selling_price_before= $selling_price;
              $Price->selling_price_update= $request->selling ;
              $Price->save();

          DB::table('store_product_lists')->where('id',$request->id)->update([
            "edit_state"=>1,
          ]);
          DB::commit();
          return "ok";
          } catch (Exception $e) {
              DB::rollback();
               return response()->json([
                  'message'=>$e->getMessage()
              ],500);
          }

      }
      public function price_data_Product(Request $request){

        $BaseDetails= DB::table("store_product_lists")->get();
      
        $totalData = count($BaseDetails);       
        $totalFiltered = $totalData;
        $columns = array( 
          0 => 'capital',
          1 => 'selling_price',
          2 => 'brand',
          3 => 'product_code',
          4 =>'productname',  
          5 => 'product_description',
        
      );
        $limit = $request->input('length');
        $start = $request->input('start');
    
         $dir = $request->input('order.0.dir');
    

         $order = $columns[$request->input('order.0.column')];
        $BaseDetails="";
        $state=0;
        if(empty($request->input('search.value'))){  

          if($request->filter=="all"){
            $state=$state;
          }

          $BaseDetails= DB::table("store_product_lists")
          ->orderBy($order,$dir)
          ->offset($start)
          ->limit($limit)    
          ->get();
          
        }else{
          $search = $request->input('search.value');
          if($request->filter=="all"){
            $state=0;
          }     
          
            $BaseDetails= DB::table("store_product_lists")
           /*  ->where('edit_state',$state)    */                             	                                                      	   
            ->where(function($query) use ($search){
            $query->orWhere("brand",'like', "%$search%")                        
            ->orWhere("product_code",'like', "%$search%")                                                  	                                                      	   
            ->orWhere("productname",'like', "%$search%")                                                   	                                                      	   
            ->orWhere("product_description",'like', "%$search%")                                                   	                                                      	   
            ->orWhere("capital",'like', "%$search%")                                                   	                                                      	   
            ->orWhere("selling_price",'like', "%$search%");                                                   	                                                      	   
             })
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)  
             ->get(); 

            $totalFiltered=count($BaseDetails);
        }
       $data = array();
        if($BaseDetails){
            $lot="";$exp="";
            foreach ($BaseDetails as $BaseDetail) {    
            
              $nestedData['capital'] = $BaseDetail->capital;  
              $nestedData['selling_price'] = $BaseDetail->selling_price;  
              $nestedData['brand'] = $BaseDetail->brand;  
              $nestedData['product_code'] = $BaseDetail->product_code;  
              $nestedData['productname'] = $BaseDetail->productname;  
              $nestedData['product_description'] = $BaseDetail->product_description;  
                   
                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                 <ul class='dropdown-menu'>
                
                 <li><a href='#' onclick=btn_action($BaseDetail->id,$BaseDetail->capital,$BaseDetail->selling_price) class='dropdown-item' title='Edit Price'>Edit Price</a></li>                                  
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
    }

    public function price_data_Product_dashboard(Request $request){

      $BaseDetails= DB::table("store_product_lists")->get();
    
      $totalData = count($BaseDetails);       
      $totalFiltered = $totalData;
      $columns = array( 
        0 => 'capital',
        1 => 'selling_price',
        2 => 'brand',
        3 => 'product_code',
        4 =>'productname',  
        5 => 'product_description',
        6 => 'updated_at',
      
    );
      $limit = $request->input('length');
      $start = $request->input('start');
  
       $dir = $request->input('order.0.dir');
  

       $order = $columns[$request->input('order.0.column')];
      $BaseDetails="";
      if(empty($request->input('search.value'))){  
        $BaseDetails= DB::table("store_product_lists")
        ->orderBy($order,$dir)
        ->offset($start)
        ->limit($limit)    
        ->get();
      }else{
          $search = $request->input('search.value');
          $BaseDetails= DB::table("store_product_lists")                                	                                                      	   
          ->where(function($query) use ($search){
          $query->orWhere("brand",'like', "%$search%")                        
          ->orWhere("product_code",'like', "%$search%")                                                  	                                                      	   
          ->orWhere("productname",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("product_description",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("capital",'like', "%$search%")                                                   	                                                      	   
          ->orWhere("selling_price",'like', "%$search%");                                                   	                                                      	   
           })
           ->orderBy($order,$dir)
           ->offset($start)
           ->limit($limit)  
           ->get(); 
          $totalFiltered=count($BaseDetails);
      }
     $data = array();
      if($BaseDetails){
          $lot="";$exp="";
          foreach ($BaseDetails as $BaseDetail) {    
          
            $nestedData['capital'] = $BaseDetail->capital;  
            $nestedData['selling_price'] = $BaseDetail->selling_price;  
            $nestedData['brand'] = $BaseDetail->brand;  
            $nestedData['product_code'] = $BaseDetail->product_code;  
            $nestedData['productname'] = $BaseDetail->productname;  
            $nestedData['product_description'] = $BaseDetail->product_description;  
            $nestedData['updated_at'] = $BaseDetail->updated_at;  
                 
              
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
  }


    public function priceAdjust(){
      return view('inventory.productManualAdd.index-price');
     // return 'joe';
    }
    public function creatProduct(Request $request){
        $units= DB::table('units')->groupBy('unit')->get();
        $lots = DB::table('lots')->groupBy('lot_no')->get();
        $locations = DB::table('locations')->groupBy('location')->get();
        $racks = DB::table('racks')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelf_locations')->groupBy('shelf')->get();
        $now = Carbon::now()->format('d-m-Y');
        return view('inventory.productManualAdd.addManualProduct',compact('now','lots','locations','racks','shelf_locations','units'));
    }
    public function importview(Request $request){

      $lots = DB::table('lots')->get();
      $locations = DB::table('locations')->get();
      $racks = DB::table('racks')->get();
      $shelf_locations = DB::table('shelf_locations')->get();
      $now = Carbon::now()->format('d-m-Y');
      return view('inventory.productManualAdd.addManualProductImport',compact('now','lots','locations','racks','shelf_locations'));
  }
    
    public function list_Product(){
        return view('inventory.productManualAdd.index');        
    }
    public function productInventoryDataListPdf(Request $request){
        $data = array();
        $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->join('users','users.id','=','transaction_items.user_id')
        ->select('transaction_items.invoice_num','transaction_items.po_id','transaction_items.transaction_type','users.name',DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'transaction_items.product_id as product_id','store_product_lists.unit as unit','store_product_lists.brand as brand')
        ->orwhere("transaction_type", "MANUAL ADD")
        ->orwhere("transaction_type", "MANUAL MINUS")
        ->groupBy('transaction_items.location_address','transaction_items.product_id','transaction_items.transaction_type')
        ->orderBy('TotalQuantity', 'DESC') 
        ->get();
        foreach ($BaseDetails as $BaseDetail) {    
          $nestedData['invoice_num'] = $BaseDetail->invoice_num;  
          $nestedData['po_id'] = $BaseDetail->po_id;  

          $nestedData['transaction_type'] = $BaseDetail->transaction_type;  
          $nestedData['name'] = $BaseDetail->name;  
          $nestedData['quantity'] = $BaseDetail->TotalQuantity;  
          $nestedData['product_code'] = $BaseDetail->product_code;  
          $nestedData['productname'] = $BaseDetail->productname;  
          $nestedData['brand'] = $BaseDetail->brand;  
          $nestedData['unit'] = $BaseDetail->unit;  
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
        $pdf = PDF::loadview('pdf.ProductInventoryListPdfManual',compact('data','now','BaseDetailscount'))->setPaper('legal', 'landscape');
        return $pdf->stream('PO-list.pdf');
        return json_encode($data);
      }
    public function list_data_Product(Request $request){
       
        $BaseDetails= DB::table("manualaddorminusview")
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
          $BaseDetails= DB::table("manualaddorminusview")        
          ->orderBy($order,$dir)
          ->offset($start)
          ->limit($limit)    
          ->get();
        }else{
            $search = $request->input('search.value');
             $BaseDetails= DB::table("manualaddorminusview")                                                    	                                                      	   
            ->where(function($query) use ($search){
            $query->orWhere("product_code",'like', "%$search%")                        
            ->orWhere("productname",'like', "$search%")  
            ->orWhere("product_description",'like', "$search%")  
            ->orWhere("invoice_num",'like', "$search%")                
            ->orWhereDate("expiration_date", 'like', "$search%")	                                                                                              	   
            ->orWhere("location_address",'like', "$search%")                                                   	                                                      	   
            ->orWhere("lot_no",'like', "$search%")                                                   	                                                      	   
            ->orWhere("shelf",'like', "$search%")                                                   	                                                      	   
            ->orWhere("rock",'like', "$search%");                                                   	                                                      	   
             })
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)  
             ->get(); 
            $totalFiltered=count($BaseDetails);
        }
       $data = array();
        if($BaseDetails){
            $lot="";$exp="";
            foreach ($BaseDetails as $BaseDetail) {    
  
              $nestedData['invoice_num'] = $BaseDetail->invoice_num;    
              $nestedData['po_id'] = $BaseDetail->po_id;  

              $nestedData['name'] = $BaseDetail->name;    
              $nestedData['quantity'] = $BaseDetail->TotalQuantity;  
                $nestedData['product_code'] = $BaseDetail->product_code.' '.$BaseDetail->productname.' '.$BaseDetail->product_description;  
                $nestedData['productname'] = $BaseDetail->productname;  
                $nestedData['brand'] = $BaseDetail->brand;  
                $nestedData['unit'] = $BaseDetail->units;  
                $nestedData['remarks'] = $BaseDetail->remarks;  
                $nestedData['transaction_type'] = $BaseDetail->transaction_type;  
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
                  $buttons = "<div class='dropdown'>
                  <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button>
                   <ul class='dropdown-menu'> ";
                   $auth_id =Auth::id();

                   $premission = DB::table('user_permissions')->where('user_id',$auth_id)->first();
                   if($premission->editAddManualDetails==1){
                    $buttons .="<li><a href='#' onclick=btn_action($BaseDetail->id,'Edit') class='dropdown-item' title='Edit'>Edit</a></li>";
                   }                                 
                   if($premission->deleteAddManualDetails==1){
                    $buttons .="<li><a href='#' onclick=btn_action($BaseDetail->id,'Delete') class='dropdown-item' title='Relocate'>Delete</a></li> ";
                   }
                   
                   
                   $buttons .= "</ul></div>"; 

                $nestedData['action'] = $buttons;
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
    }
    
    public function save_Product(Request $request){
  
        
        DB::beginTransaction();
        try {
            $auth_id =Auth::id();
            $TransactionItem = new TransactionItem();
            $TransactionItem->user_id= $auth_id;
            $TransactionItem->units= $request->units;
            $TransactionItem->invoice_num= $request->invoice_number;
            $TransactionItem->po_id= $request->POnumber;
            $TransactionItem->product_id= $request->productSelect;
            $TransactionItem->price= $request->OrderPrice;
            if($request->action_state == "Add"){
              $TransactionItem->transaction_type= "MANUAL ADD";
              DB::table('store_product_lists')->where('id',$request->productSelect)->update([
                'capital' =>  $request->OrderPrice,
                'selling_price' =>$request->OrderPrice,
              ]);
            }else{
              $TransactionItem->transaction_type= "MANUAL MINUS";
            }
            
            $TransactionItem->quantity= $request->qunatity_po;
            $TransactionItem->location_address=  $request->location_po;
            $TransactionItem->shelf= $request->shelf_po;
            $TransactionItem->rock= $request->rock_po;
            $TransactionItem->rock= $request->rock_po;            
            if(isset($request->lot_no)){
                $TransactionItem->lot_no= $request->lot_no;
            }
            if(isset($request->exp_date)){
                $TransactionItem->expiration_date= date('Y-m-d', strtotime($request->exp_date ));
            }
            $TransactionItem->remarks= $request->remarks; 
            $TransactionItem->save();
    
        
            DB::commit();
            return "okay";
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }
    
}
