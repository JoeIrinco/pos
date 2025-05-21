<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \stdClass;
use PDF;
use App\TransactionItem;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function returnItem(Request $request){
       
        DB::beginTransaction('transaction_items');
        try {
            DB::table('transaction_items')
            ->where('id',$request->id)
            ->update([
                'status' => 1, // 1 for Product Returned to return by supplier
                /* 'transaction_type' => "REPLACEMENT_P_PO_ACPT" */
            ]);
        DB::commit();
        return "ok";
            //code...
        } catch (\Throwable $th) {
            DB::rollback();  
           return "error";
        }
    }


    public function rejectedItem(Request $request){
       
        DB::beginTransaction('transaction_items');
        try {
            DB::table('transaction_items')
            ->where('id',$request->id)
            ->update([
                'status' => 2, // 2 for Product Rejected to return by supplier
                /* 'transaction_type' => "RETURN_P_PO_ACPT" */
            ]);
        DB::commit();
        return "ok";
            //code...
        } catch (\Throwable $th) {
            DB::rollback();  
           return "error";
        }
    }

    public function delelteItem(Request $request){
       
        DB::beginTransaction('transaction_items');
        try {
            DB::table('transaction_items')
            ->where('id',$request->id)
            ->delete();
            /* ->update([
                'status' => 3 // 3 for Product Deleted
            ]); */
        DB::commit();
        return "ok";
            //code...
        } catch (\Throwable $th) {
            DB::rollback();  
           return "error";
        }
    }



   public function replacePrint(Request $request){


    $replaceData = DB::table('transaction_items')
    ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
    ->join('users', 'users.id','=','transaction_items.user_id')
    ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
    ->where('transaction_items.invoice_num', $request->id)
    ->where('transaction_items.transaction_type','REPLACE_INVOICE')
    ->get();


    $returnDatalist = DB::table('transaction_items')       
    ->select(DB::raw('sum(quantity) as receivePRoduct'))
    ->where('transaction_items.invoice_num',$request->id)
    ->where('transaction_items.transaction_type','REPLACE_INVOICE')->first();

    $now = Carbon::now()->format('d-m-Y');
    $ReturnData = DB::table('transaction_items')
    ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
    ->join('users', 'users.id','=','transaction_items.user_id')
    ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
    ->where('transaction_items.invoice_num', $request->id)
    ->where('transaction_items.transaction_type','RETURN_P_PO')
    ->first();

    $pdf = PDF::loadview('pdf.replace-pdf',compact('ReturnData','now','replaceData','returnDatalist'));
    return $pdf->stream('Replace-'.$now.'.pdf');

   }
    
    public function replaceReturnList(Request $request){ 
        
       
         $details = DB::table('transaction_items')
         ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
         ->join('users', 'users.id','=','transaction_items.user_id')
         ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
         ->where('transaction_items.id', $request->id)
         ->where('transaction_items.transaction_type','REPLACEMENT_P_PO')
         ->first();
         
         $returnDatalist = DB::table('transaction_items')       
         ->select(DB::raw('sum(quantity) as receivePRoduct'))
         ->where('transaction_items.invoice_num',$details->invoice_num)
         ->where('transaction_items.transaction_type','REPLACE_INVOICE')->first();
         $requestId = $request->id;
        return view('inventory.return.recieve-index',compact('details','returnDatalist','requestId'));
    }
    public function index(){              
        return view('inventory.inventory-list.invoices');
    }

    public function returnList(){              
        return view('inventory.return.index');
    }

    public function returndatalistrecieve(Request $request){

        
        $dataDetails = DB::table('transaction_items')->where('id',$request->id)->first();

        $returnDatalist = DB::table('transaction_items')
        ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
        ->join('users', 'users.id','=','transaction_items.user_id')
        ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
        ->where('transaction_items.invoice_num',$dataDetails->invoice_num)
        ->where('transaction_items.transaction_type','REPLACE_INVOICE')
        ->get();

        $totalData = count($returnDatalist);       
        $totalFiltered = count($returnDatalist);
        $columns = array( 
            0 => 'quantity',
            1 => 'invoice',            
            2 => 'po',
            3 => 'productName',
            4 => 'lot',
            5 => 'location_address',
            6 => 'shelf',
            7 => 'rock',
            8 => 'expiration_date',
            9 => 'name',
            10 => 'remarks',
           
        );
        $limit = $request->input('length');
        $start = $request->input('start');
 
         $dir = $request->input('order.0.dir');
 
 
         $order = $columns[$request->input('order.0.column')];
        $returnDatalist="";
        if(empty($request->input('search.value'))){  
            $returnDatalist= DB::table('transaction_items')
            ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
            ->join('users', 'users.id','=','transaction_items.user_id')
            ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
            ->where('transaction_items.invoice_num',$dataDetails->invoice_num)
            ->where('transaction_items.transaction_type','REPLACE_INVOICE')
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)                  	   
            ->get(); 
        }else{
            $search = $request->input('search.value');
             $returnDatalist= DB::table('transaction_items')
             ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
             ->join('users', 'users.id','=','transaction_items.user_id')
             ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
             ->where('transaction_items.transaction_type','REPLACE_INVOICE')
             ->where('transaction_items.invoice_num',$dataDetails->invoice_num)
            ->where(function($query) use ($search){
            $query->orWhere("transaction_items.invoice_num",'like', "%$search%")                        
            ->orWhere("users.name",'like', "%$search%")                        
            ->orWhere("transaction_items.po_id",'like', "%$search%")                        
            ->orWhere("transaction_items.created_at",'like', "%$search%");                                                   	   
             })->groupBy('transaction_items.invoice_num')
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)  
             ->get(); 
            $totalFiltered=count($returnDatalist);
        }
       $data = array();
        if($returnDatalist){
            foreach ($returnDatalist as $returnData) {
              
                $supplier_data = DB::table('store_purchase_orders')
                ->join('suppliers','suppliers.id','=','store_purchase_orders.supplier_id')
                ->select('suppliers.name as supplierName')
                ->where("po_no", $returnData->po_id)
                ->first();
 
                $status="Pending";
                if($returnData->status==1){
                $status="Replaced";
                }
                $nestedData['quantity'] = $returnData->quantity;  
                $nestedData['invoice'] = $returnData->invoice_num;  
                $nestedData['po'] = $returnData->po_id;  
                $nestedData['productName'] = $returnData->productname.' '. $returnData->product_description.' '. $returnData->brand;  
                $nestedData['lot'] = $returnData->lot_no;  
                $nestedData['supplier_name'] = $supplier_data->supplierName;               
                $nestedData['expiration_date'] = isset($returnData->expiration_date) ? $returnData->expiration_date : "N/A";  
                $nestedData['name'] = $returnData->name;                                                                                    
                $nestedData['status'] = $status;                                            
                $nestedData['created_at'] = date('M-d-Y', strtotime($returnData->created_at)); 
                if($returnData->status==1){
                    $nestedData['action'] = "<div class='dropdown'>
                    <button  class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                        <span class='caret'></span></button>
                     <ul class='dropdown-menu'>
                   
                     <li><a href='replace-return-view/".$returnData->id."'  class='dropdown-item' title='Return Invoice Details'>Item Replace</a></li>                  
                    </ul>
                    </div>" ;
                }else{
                    $nestedData['action'] = "<div class='dropdown'>
                    <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                        <span class='caret'></span></button>
                     <ul class='dropdown-menu'>
                   
                     <li><a href='#' id='deleteBtn' data-id='$returnData->id' class='dropdown-item' title='Delete'>Delete</a></li>                  
                    </ul>
                    </div>" ;
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
    }

    public function deleteReplacement(Request $request){
        DB::beginTransaction();
        
        try {
            if(DB::table('transaction_items')->where('id',$request->id)->delete()){
                DB::table('transaction_items')->where('id',$request->requestId)->update([
                    'status' => 0
                ]);
                DB::commit();
                return"deleted";
            }
        
            //code...
        } catch (\Throwable $th) {
        DB::rollback(); 
            //throw $th;
        }
        return $request;
    }

    public function returndatalist(Request $request){

        if($request->state==""){
            $returnDatalist = DB::table('transaction_items')
            ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
            ->join('users', 'users.id','=','transaction_items.user_id')
            ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
            ->where('transaction_items.transaction_type','RETURN_P_PO')
            ->orwhere('transaction_items.transaction_type','REPLACEMENT_P_PO')
            ->get();
        }else{
            $returnDatalist = DB::table('transaction_items')
            ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
            ->join('users', 'users.id','=','transaction_items.user_id')
            ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
            ->where('transaction_items.transaction_type',$request->state)            
            ->get();
        }
       

        $totalData = count($returnDatalist);       
        $totalFiltered = count($returnDatalist);
        $columns = array( 
            0 => 'quantity',
            1 => 'invoice',            
            2 => 'po',
            3 => 'productName',
            4 => 'lot',
            5 => 'location_address',
            6 => 'shelf',
            7 => 'rock',
            8 => 'expiration_date',
            9 => 'name',
            10 => 'remarks',
           
        );
        $limit = $request->input('length');
        $start = $request->input('start');
 
         $dir = $request->input('order.0.dir');
 
 
         $order = $columns[$request->input('order.0.column')];
        $returnDatalist="";
        if(empty($request->input('search.value'))){  

            if($request->state==""){
                $returnDatalist= DB::table('transaction_items')
                ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
                ->join('users', 'users.id','=','transaction_items.user_id')
                ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
                ->where('transaction_items.transaction_type','RETURN_P_PO')
                ->orwhere('transaction_items.transaction_type','REPLACEMENT_P_PO')
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)                  	   
                ->get(); 
            }else{
                $returnDatalist= DB::table('transaction_items')
                ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
                ->join('users', 'users.id','=','transaction_items.user_id')
                ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
                ->where('transaction_items.transaction_type',$request->state)
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)                  	   
                ->get(); 
            }           
        }else{
            $search = $request->input('search.value');

            if($request->state==""){
                $returnDatalist= DB::table('transaction_items')
                ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
                ->join('users', 'users.id','=','transaction_items.user_id')
                ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
                ->where('transaction_items.transaction_type','RETURN_P_PO')
               ->orwhere('transaction_items.transaction_type','REPLACEMENT_P_PO')
               ->where(function($query) use ($search){
               $query->orWhere("transaction_items.invoice_num",'like', "%$search%")                        
               ->orWhere("users.name",'like', "%$search%")                        
               ->orWhere("transaction_items.po_id",'like', "%$search%")                        
               ->orWhere("transaction_items.created_at",'like', "%$search%");                                                   	   
                })->groupBy('transaction_items.invoice_num')
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)  
                ->get(); 
            }else{
                $returnDatalist= DB::table('transaction_items')
                ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
                ->join('users', 'users.id','=','transaction_items.user_id')
                ->select('users.name','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
                ->where('transaction_items.transaction_type',$request->state)
               ->where(function($query) use ($search){
               $query->orWhere("transaction_items.invoice_num",'like', "%$search%")                        
               ->orWhere("users.name",'like', "%$search%")                        
               ->orWhere("transaction_items.po_id",'like', "%$search%")                        
               ->orWhere("transaction_items.created_at",'like', "%$search%");                                                   	   
                })->groupBy('transaction_items.invoice_num')
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)  
                ->get(); 
            }
            $totalFiltered=count($returnDatalist);
        }
       $data = array();
        if($returnDatalist){
            foreach ($returnDatalist as $returnData) {
                $remaining=$returnData->quantity;                
                if($returnDatalist!=null){
                    $transaction_items_return = DB::table('transaction_items')->where("transaction_type", "REPLACE_INVOICE")->where('invoice_num',$returnData->invoice_num)->where('po_id',$returnData->po_id)->sum('quantity');
        
                    $remaining = $returnData->quantity-$transaction_items_return;               
                }
                $supplier_data = DB::table('store_purchase_orders')
                ->join('suppliers','suppliers.id','=','store_purchase_orders.supplier_id')
                ->select('suppliers.name as supplierName')
                ->where("po_no", $returnData->po_id)
                ->first();
                
                if($returnData->transaction_type == "RETURN_P_PO"){
                    $transactionType ="For Return";
                    $remaining ="N/A";
                }else{
                    $transactionType ="For Replacement";
                }
                
               
                $status="Pending";
                if($returnData->status==1){
                    if($transactionType == "For Return"){
                        $status="Returned";
                    }else{
                        $status="Completed";
                    }
                
                }elseif($returnData->status==2){
                    $status="Rejected";
                }else{
                    $statusChangerForRplcmnt= DB::table('transaction_items')
                    ->where('transaction_type','REPLACE_INVOICE')
                    ->where('invoice_num',$returnData->invoice_num)
                    ->count();
                    if($statusChangerForRplcmnt >0 &&  $transactionType =="For Replacement"){
                        $status="Incomplete";
                    }
                }
                $nestedData['quantity'] = $returnData->quantity;  
                $nestedData['invoice'] = $returnData->invoice_num;  
                $nestedData['po'] = $returnData->po_id;  
                $nestedData['productName'] = $returnData->productname.' '. $returnData->product_description.' '. $returnData->brand;  
                $nestedData['lot'] = $returnData->lot_no;  
                $nestedData['supplier_name'] = $supplier_data->supplierName;               
                $nestedData['expiration_date'] = isset($returnData->expiration_date) ? $returnData->expiration_date : "N/A";  
                $nestedData['name'] = $returnData->name;  
                $nestedData['transactionType'] = $transactionType;                                                            
                $nestedData['remarks'] = $returnData->remarks;                                            
                $nestedData['remaining'] = $remaining;                                            
                $nestedData['status'] = $status;                                            
                $nestedData['created_at'] = date('M-d-Y', strtotime($returnData->created_at)); 

                $auth_id =Auth::id();      

                $userPermission = DB::table('user_permissions')->where('user_id',$auth_id)->first();
                if($transactionType=="For Replacement"){

                    if( $remaining != $returnData->quantity){
                        $button ="<div class='dropdown'>
                        <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                         <ul class='dropdown-menu'>
                       
                         <li><a href='#' onclick=btn_action($returnData->id,'return') class='dropdown-item' title='Return Invoice Details'>Replace</a></li>  
                         <li><a href='#'  onclick = 'myFunction_rejected(\"".$returnData->id."\")' class='dropdown-item' title='Return Invoice Details'>Rejected</a></li>                    
                         <li><a href='replace-return-view/".$returnData->id."'  class='dropdown-item' title='Return Invoice Details'>Item Replace</a></li>  
                                      
    
                        </ul>
                        </div>" ;
                    }else{                        
                        $button ="<div class='dropdown'>
                        <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                         <ul class='dropdown-menu'>                       
                         <li><a href='#' onclick=btn_action($returnData->id,'return') class='dropdown-item' title='Return Invoice Details'>Replace</a></li><li><a href='#'  onclick = 'myFunction_rejected(\"".$returnData->id."\")' class='dropdown-item' title='Return Invoice Details'>Rejected</a></li>";
                        
                        if($userPermission->requestDelete == 1){
                            $button =$button."<li><a href='#' onclick = 'myFunction_delete(\"".$returnData->id."\")' class='dropdown-item' title='Delete Request Details'>Delete Request</a></li>";
                        }

                        $button =$button."</ul>
                        </div>" ;
                    }
                   
                    if($returnData->status==1 || $returnData->status==2){
                        $nestedData['action'] =  "<div class='dropdown'>
                        <button  class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                         <ul class='dropdown-menu'>
                       
                         <li><a href='replace-return-view/".$returnData->id."'  class='dropdown-item' title='Return Invoice Details'>Item Replace</a></li>                  
                        </ul>
                        </div>";
                    }else{
                        $nestedData['action'] = $button;
                    }     
                }else{

                    if($returnData->status==1 || $returnData->status==2){
                        $nestedData['action'] =  "<div class='dropdown'>
                        <button disabled  class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                         <ul class='dropdown-menu'>
                       
                         <li><a href='#'  onclick = 'myFunction(\"".$returnData->id."\")' class='dropdown-item' title='Return Invoice Details'>Return</a></li>                  
                        </ul>
                        </div>";
                    }else{
                        $button =  "<div class='dropdown'>
                        <button  class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                         <ul class='dropdown-menu'>
                       
                         <li><a href='#' onclick = 'myFunction(\"".$returnData->id."\")' class='dropdown-item' title='Return Invoice Details'>Return</a></li>    
                         <li><a href='#'  onclick = 'myFunction_rejected(\"".$returnData->id."\")' class='dropdown-item' title='Return Invoice Details'>Rejected</a></li>";
                         if($userPermission->requestDelete == 1){
                            $button =$button."<li><a href='#' onclick = 'myFunction_delete(\"".$returnData->id."\")' class='dropdown-item' title='Delete Request Details'>Delete Request</a></li>";
                        }  
                        

                        $button =$button."</ul>
                        </div>";



                        $nestedData['action'] = $button;
                    }


                    
                }                                   
                
                $data[] = $nestedData; 
            }
        }  
         //$data;     
       $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data" => $data   
        );
        echo json_encode($json_data);    
    }

    public function returnView($invoiceNum){

     $invoicelist= DB::table("transaction_items")
      ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
      ->select('transaction_items.*','store_product_lists.*','transaction_items.id as transaction_id')   
      ->where("transaction_items.invoice_num", $invoiceNum)
      ->where("transaction_items.transaction_type", "RECEIVE PO")      
      ->groupBy('transaction_items.product_id','transaction_items.lot_no','transaction_items.rock','transaction_items.shelf')
      ->get();



      $invoicelist_actual = $invoicelist;
      $x=0;
      
      foreach ($invoicelist as $value) {
        $quantityData = 0;
           if(isset($value->expiration_date) || $value->expiration_date != null || $value->expiration_date !=""){
            $deductqty= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))                      
            ->where("transaction_type", "RETURN_P_PO")  
            ->where('transaction_items.product_id',$value->product_id)
            ->where('expiration_date',$value->expiration_date)
            ->where('transaction_items.lot_no',$value->lot_no)  
            ->where('transaction_items.location_address',$value->location_address)                             
            ->where('transaction_items.rock',$value->rock)                             
            ->where('transaction_items.shelf',$value->shelf)   
            ->orwhere("transaction_type", "REPLACEMENT_P_PO")
            ->where('transaction_items.product_id',$value->product_id)
            ->where('expiration_date',$value->expiration_date)
            ->where('transaction_items.lot_no',$value->lot_no)  
            ->where('transaction_items.location_address',$value->location_address)                             
            ->where('transaction_items.rock',$value->rock)                             
            ->where('transaction_items.shelf',$value->shelf)                         
            ->get(); 
            
            }else{
                $deductqty= DB::table("transaction_items")
                ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))                          
                ->where("transaction_type", "RETURN_P_PO")  
                ->where('transaction_items.product_id',$value->product_id)                
                ->where('transaction_items.lot_no',$value->lot_no)  
                ->where('transaction_items.location_address',$value->location_address)                             
                ->where('transaction_items.rock',$value->rock)                             
                ->where('transaction_items.shelf',$value->shelf)
                ->orwhere("transaction_type", "REPLACEMENT_P_PO")
                ->where('transaction_items.product_id',$value->product_id)                
                ->where('transaction_items.lot_no',$value->lot_no)  
                ->where('transaction_items.location_address',$value->location_address)                             
                ->where('transaction_items.rock',$value->rock)                             
                ->where('transaction_items.shelf',$value->shelf)                     
                ->get();  
            }            
           if(isset($deductqty[0]->TotalQuantitys)){
              $invoicelist[$x]->quantity =  $value->quantity-$deductqty[0]->TotalQuantitys;
            
           }
         $x++;
      }
      
      return view('inventory.inventory-list.return-view',compact('invoicelist','invoicelist_actual'));
    }
    public function dataList(Request $request){
      
          $invoices= DB::table("transaction_items")
        ->join('store_purchase_orders','store_purchase_orders.po_no','=','transaction_items.po_id')
        ->select('transaction_items.*','store_purchase_orders.id as order_id')
        ->where("transaction_type", "RECEIVE PO")
        ->groupBy('transaction_items.invoice_num')
        ->get();
        $totalData = count($invoices);       
        $totalFiltered = $totalData;
        $columns = array( 
            0 => 'invoice_num',
            1 => 'po_id',            
            3 => 'created_at',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
 
         $dir = $request->input('order.0.dir');
 
 
         $order = $columns[$request->input('order.0.column')];
        $invoices="";
        if(empty($request->input('search.value'))){  
            $invoices= DB::table("transaction_items")
            ->join('store_purchase_orders','store_purchase_orders.po_no','=','transaction_items.po_id')
            ->select('transaction_items.*','store_purchase_orders.id as order_id')
            ->where("transaction_type", "RECEIVE PO")                        
            ->groupBy('transaction_items.invoice_num')
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)                  	   
            ->get(); 
           // dd($invoices);
        }else{
            $search = $request->input('search.value');
             $invoices= DB::table("transaction_items")
            ->join('store_purchase_orders','store_purchase_orders.po_no','=','transaction_items.po_id')
            ->select('transaction_items.*','store_purchase_orders.id as order_id')
            ->where("transaction_items.transaction_type", "RECEIVE PO")
            ->where(function($query) use ($search){
            $query->orWhere("transaction_items.invoice_num",'like', "%$search%")                        
            ->orWhere("transaction_items.po_id",'like', "%$search%")                        
            ->orWhere("transaction_items.created_at",'like', "%$search%");                                                   	   
             })->groupBy('transaction_items.invoice_num')
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)  
             ->get(); 
            $totalFiltered=count($invoices);
        }
       $data = array();
        if($invoices){
            foreach ($invoices as $invoicesData) {
                $productCount= DB::table("transaction_items")
                ->where("transaction_type", "RECEIVE PO")
                //->where("product_id", $invoicesData->product_id)
                //->where("po_id", $invoicesData->po_id)
                ->where("invoice_num", $invoicesData->invoice_num)
                ->count(); 
                $nestedData['invoice'] = $invoicesData->invoice_num;  
                $nestedData['po_num'] = $invoicesData->po_id;  
                $nestedData['count_id'] = $productCount;  
                $nestedData['created_at'] =  date('M-d-Y', strtotime($invoicesData->created_at));;
                         
                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                 <ul class='dropdown-menu'>
               
                 <li><a href='#'  data-action='edit' data-id='".$invoicesData->invoice_num."' class='dropdown-item btn_action' title='Edit List'>Edit List</a></li>                  
                 <li><a href='#'  data-action='return' data-id='".$invoicesData->invoice_num."' class='dropdown-item btn_action' title='Return Invoice Details'>Return</a></li>                  
                 <li><a href='#'  data-action='download' data-id='".$invoicesData->invoice_num."' class='dropdown-item btn_action' title='PDF View'>Download PDF</a></li>                  
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

     public function editInvoice($invoiceData){
        
        $transaction_items = DB::table('transaction_items')
        ->join('store_product_lists', 'store_product_lists.id','=','transaction_items.product_id')
        ->select('transaction_items.id','transaction_items.product_id','store_product_lists.productname','store_product_lists.product_description','store_product_lists.no_expiration','store_product_lists.no_lot_no','transaction_items.price','store_product_lists.brand','store_product_lists.product_code','transaction_items.units','transaction_items.quantity','transaction_items.lot_no','transaction_items.location_address','transaction_items.rock','transaction_items.shelf')
        ->where('invoice_num', $invoiceData)
        ->where('transaction_type', "RECEIVE PO")
        ->get();   
        $lots = DB::table('lotview')->select('lot_no')->whereraw('lot_no is not null')->groupBy('lot_no')->get();
        $units = DB::table('units')->get();        
        $locations = DB::table('locationview')->select('location')->whereraw('location is not null')->groupBy('location')->get();
        $racks = DB::table('rackfview')->select('rack')->whereraw('rack is not null')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelfview')->select('shelf')->whereraw('shelf is not null')->groupBy('shelf')->get();

        $now = Carbon::now()->format('d-m-Y');

        return view("inventory.inventory-list.edit-list",compact('transaction_items','locations','racks','shelf_locations','units','lots','now','invoiceData'));
     }

     public function updateOnetransactionReturn(Request $request){
        
        $returnData  = DB::table('vallery.transaction_items')->where('id',$request->id)->update([            
            'price' => $request->OrderPrice,
           'units' => $request->unit,
            'quantity' => $request->qunatity_po,
           'lot_no' => $request->lot_no,
           'expiration_date' => $request->exp_date,
           'location_address' => $request->location_po,
            'rock' => $request->rock_po,
            'shelf'=> $request->shelf_po,
        ]);

        if($returnData){
            return "edited";
        }else{
            return "noChange";
        }
     }

    public function getOnetransactionReturn(Request $request){     
           
         $transaction_items = DB::table('transaction_items')->where('id', $request->id)->first();

         $returnItem = DB::table('transaction_items')
         ->select(DB::raw('sum(quantity) as requestQty'))
         ->where('invoice_num', $transaction_items->invoice_num)
         ->where('transaction_type', 'RETURN_P_PO')
         ->groupBy('transaction_items.product_id')
         ->first();
         if(!isset($returnItem)){
            $requestQty=0;
         }else{
            $requestQty=$returnItem->requestQty;
            if($returnItem->requestQty>=$transaction_items->quantity){
                return "invalidQuantity";
            }
         }
       
         $transaction_items->finalQty=$transaction_items->quantity-$requestQty;
         return $transaction_items ;
    }

    public function saveReturn(Request $request){   
        
        $auth_id =Auth::id();      

        
        $transactionType ="";
        if($request->operationData == "replacement"){
            $transactionType = "REPLACEMENT_P_PO";
        }else{
            //return
            $transactionType = "RETURN_P_PO";

        }
   
        
        DB::beginTransaction();
        try {
         $transaction_items = DB::table('transaction_items')->where('id', $request->id)->first();
            /* if($request->operationData == "replacement"){
                $returnChecker  = DB::table('transaction_items')
                ->where('po_id', $transaction_items->po_id)
                ->where('invoice_num', $transaction_items->invoice_num)
                ->where('product_id', $transaction_items->product_id)
                ->where('lot_no', $transaction_items->lot_no)
                ->where('shelf', $transaction_items->shelf)
                ->where('rock', $transaction_items->rock)
                ->where('expiration_date', $transaction_items->expiration_date)
                ->where('location_address', $transaction_items->location_address)
                ->where('units', $transaction_items->units)
                ->where('transaction_type', 'RETURN_P_PO')
                ->count();
                if($returnChecker ==0 ){
                    return "noReturn";
                }
            } */
         if($request->qty > $transaction_items->quantity){
            return "qtyU";
         }else{  
            if( $request->product >0 ){
                $request->remarks_return = $request->remarks_return. " replace not same ITEM" ;
                $transaction_items->product_id = $request->product;
            }
            
            
            $TransactionItem = new TransactionItem();
            $TransactionItem->user_id= $auth_id;
            $TransactionItem->invoice_num= $transaction_items->invoice_num;
            $TransactionItem->po_id= $transaction_items->po_id;
            $TransactionItem->product_id= $transaction_items->product_id;
            $TransactionItem->price=$transaction_items->price;
            $TransactionItem->transaction_type=   $transactionType; //"RETURN_P_PO";
            $TransactionItem->quantity= $request->qty;
            $TransactionItem->location_address= $transaction_items->location_address;
            $TransactionItem->shelf= $transaction_items->shelf;
            $TransactionItem->rock= $transaction_items->rock;
            $TransactionItem->lot_no= $transaction_items->lot_no;
            $TransactionItem->units= $transaction_items->units;            
            $TransactionItem->expiration_date= $transaction_items->expiration_date;
            $TransactionItem->remarks= $request->remarks_return;
            $TransactionItem->save();
         }
         DB::commit();
         return "ok";
        return $po->id;
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }

    
    public function returnViewList($id){
        /* joe */
      $product_detailed = DB::table('transaction_items')
        ->join('store_product_lists', 'store_product_lists.id', '=' ,'transaction_items.product_id')
        ->select('store_product_lists.no_lot_no','store_product_lists.no_expiration','transaction_items.*','store_product_lists.productname' ,'store_product_lists.product_description','store_product_lists.brand')
        ->where('transaction_items.id',$id)->first();
        $now = Carbon::now()->format('d-m-Y');
        $invoice = $product_detailed->invoice_num;
        $po =$product_detailed->po_id;
        $product_detailed->remaining=$product_detailed->quantity;
        if($product_detailed!=null){
            $transaction_items_return = DB::table('transaction_items')->where("transaction_type", "REPLACE_INVOICE")->where('invoice_num',$invoice)->where('po_id',$po)->sum('quantity');

            $product_detailed->remaining= $product_detailed->quantity-$transaction_items_return;               
        }


        $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('store_purchase_items', 'store_purchase_items.orders_id', '=' ,'store_purchase_orders.id')
        ->where('store_purchase_orders.po_no',$po)
        ->first();

        $amount = $store_purchase_orders->amount;

        $lots = DB::table('lotview')->select('lot_no')->whereraw('lot_no is not null')->groupBy('lot_no')->get();       
        $locations = DB::table('locationview')->select('location')->whereraw('location is not null')->groupBy('location')->get();
        $racks = DB::table('rackfview')->select('rack')->whereraw('rack is not null')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelfview')->select('shelf')->whereraw('shelf is not null')->groupBy('shelf')->get();

        $transaction_id = $id;
        $units = DB::table('units')->get();
        return view('inventory.replace.replaceform',compact('product_detailed','invoice','po','lots','locations','racks','shelf_locations','amount','transaction_id','now','units'));
      
    }

     public function invoicePDFData($id){
               $invoices= DB::table("transaction_items")
            ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
           // ->select(DB::raw('transaction_items.quantity * 1 as total_Price'),'*')
            ->where("transaction_items.transaction_type", "RECEIVE PO")                        
            ->where("transaction_items.invoice_num", $id)                        
            ->get(); 
            $data =[];
           
            $totalPriceData=0;
            foreach ($invoices as $value) {
                $object = new stdClass();
                $totalPrice=0;
                 $price=floatval($value->price);
                  $quantity=floatval($value->quantity);
                 $totalPrice= $price*$quantity;
                 $totalPriceData=floatval($totalPriceData)+floatval($totalPrice);
                $object->productName=$value->productname;
                $object->productcode=$value->product_code;
                $object->qty=$value->quantity;
                $object->price=number_format($value->price,2);
                $object->Tprice=number_format($totalPrice,2);
                $object->exp=$value->expiration_date;
                if(!isset($value->expiration_date)){
                    $object->exp="N/A";
                }
                array_push($data,$object);
               
            }
            $pdf = PDF::loadview('pdf.invoice-pdf',compact('data','id','totalPriceData'));
        return $pdf->stream($id.'#-Details.pdf');
        return view('pdf.invoice',compact('data','id','totalPriceData'));
        return ($data);
     }
    
}
