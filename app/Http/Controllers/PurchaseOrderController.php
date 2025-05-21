<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use App\StoreItem;
use App\StoreProductList;
use App\StoreOrder;
use Carbon\Carbon;
use App\TransactionItem;
use App\StoreClientInfo;
use App\StorePurchaseItem;
use App\StorePurchaseOrder;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use App\Price;
use App\Supplier;
use PDF;
use \stdClass;

class PurchaseOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

public function getInvoce(Request $request){
    $store_purchase_orders = /* DB::table('transaction_items')->where('invoice_num',$request->invoice)->count() */ 0; 

    $ids = explode("-",$request->product_ids);
    $orderPo=0;
    foreach ($ids as  $value) {
        
        $store_purchase_orders= DB::table('store_purchase_orders')->where('po_no',$request->po)->first();

        $orderPo= DB::table('store_purchase_items')->where('product_id',$value)->where('orders_id',$store_purchase_orders->id)->where('status','Cancel')->count();
    }
    return compact('store_purchase_orders','orderPo');
}

public function changeProduct(Request $request){
    try {
    DB::beginTransaction();
    //
    $store_purchase_items = DB::table('store_purchase_items')->where('id',$request->oldId)->first();

    $store_purchase_orders = DB::table('store_purchase_orders')->where('id',$store_purchase_items->orders_id)->first();


    $productList = DB::table('store_product_lists')->where('id',$request->productId)->first();


    DB::table('store_purchase_orders')->where('id',$store_purchase_items->orders_id)->update([
        'total_price' => ($store_purchase_orders->total_price - $store_purchase_items->total) + ($request->qty * $productList->capital),
    ]);

    DB::table('store_purchase_items')->where('id',$request->oldId)->update([
        'replaceProductId' =>$request->productId
    ]);
    
    $auth_id =Auth::id();
    $auth_name =Auth::user()->name;

    

    DB::table('store_purchase_items')->insert([
        'user_id' => $auth_id,
        'encoder' => $auth_name,
        'orders_id' => $store_purchase_items->orders_id,
        'product_id' => $request->productId,
        'product_name' => $productList->productname,
        'product_code' => $productList->product_code,
        'unit' => $request->unit,
        'quantity' => $request->qty,
        'amount' => $request->sellingprice,
        'total' => $request->qty * $request->sellingprice,
      ]);



    DB::commit();
    return "success";
    } catch (\Throwable $th) {
         DB::rollback();
             return response()->json([
                'message'=>$th->getMessage()
            ],500);
        //throw $th;
    }
    


    
}
public function po_receive_data(){
    return $store_purchase_orders = DB::table('store_purchase_orders')
    ->join('transaction_items', 'transaction_items.po_id', '=','store_purchase_orders.po_no')
    ->where('transaction_items.invoice_num','!=',null)
    ->where('store_purchase_orders.status','=',"Completed")
    //->groupBy('transaction_items.invoice_num')
    ->orderBy('transaction_items.created_at', 'desc')
    ->get();
}
    public function getproductsOrder($invoice,$productId,$po){
        $product_details=[];
        $ids = explode("-",$productId);
        foreach ($ids as  $value) {
            $store_purchase_orders = DB::table('store_purchase_orders')->where('po_no',$po)->first();
            $transaction_items = DB::table('transaction_items')->where('product_id',$value)->count();
            if($transaction_items>0){
                 $store_purchase_orders = DB::table('store_purchase_items')
                ->join('store_product_lists', 'store_purchase_items.product_id', '=','store_product_lists.id')
                ->join('transaction_items', 'transaction_items.product_id', '=','store_product_lists.id')
                ->select('*','store_product_lists.id as product_id','store_purchase_items.quantity as quantityData')
                ->where('store_purchase_items.orders_id',$store_purchase_orders->id)
                ->where('store_purchase_items.product_id',$value)
                ->where('transaction_items.invoice_num','!=',null)
                ->where('store_purchase_items.status','!=',"Completed")
                ->orderBy('transaction_items.created_at', 'desc')
                ->first();
            }else{
                 $store_purchase_orders = DB::table('store_purchase_items')
                ->join('store_product_lists', 'store_purchase_items.product_id', '=','store_product_lists.id')
                ->select('*','store_product_lists.id as product_id','store_purchase_items.quantity as quantityData')
                ->where('store_purchase_items.orders_id',$store_purchase_orders->id)
                ->where('store_purchase_items.product_id',$value)
                ->where('store_purchase_items.status','!=',"Completed")
                ->first();
            }
            if($store_purchase_orders!=null){
                $transaction_items_sum = DB::table('transaction_items')->where('transaction_type','RECEIVE PO')->where('product_id',$value)->where('po_id',$po)->sum('quantity');

                $object =$store_purchase_orders;
                $object->remaining= $store_purchase_orders->quantityData-$transaction_items_sum;               
                array_push($product_details,$object);
            }

        }
       
        $lots = DB::table('lotview')->select('lot_no')->whereraw('lot_no is not null')->groupBy('lot_no')->get();
        $units = DB::table('units')->get();        
        $locations = DB::table('locationview')->select('location')->whereraw('location is not null')->groupBy('location')->get();
        $racks = DB::table('rackfview')->select('rack')->whereraw('rack is not null')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelfview')->select('shelf')->whereraw('shelf is not null')->groupBy('shelf')->get();
           json_encode($product_details);
        $now = Carbon::now()->format('d-m-Y');
        
        return view('inventory.po-receive.productsetup',compact('now','product_details','invoice','po','lots','locations','racks','shelf_locations','units'));
        //return $request->product_ids;
    }

    public function updatePO(Request $request){
     //  return $request->commentSection_data;
        DB::beginTransaction();
        try {

        $po_status = $request->status_po;
        $po_no=$request->po_id;
         $store_purchase_orders = DB::table('store_purchase_orders')->where('po_no',$po_no)->first();
        $StorePurchaseOrder = StorePurchaseOrder::findOrFail($store_purchase_orders->id);
        $StorePurchaseOrder->status = $po_status ;
        if($po_status =="Cancel"){
            $StorePurchaseOrder->comment = $request->commentSection_data;
        }
        $StorePurchaseOrder->save();

        $purchase_item_id = $request['purchase_item_id_array'];
        foreach ($purchase_item_id as $i => $value) {
            $StorePurchaseItem =  StorePurchaseItem::find($request['purchase_item_id_array'][$i]);
            $StorePurchaseItem->quantity=$request['qunatity_array'][$i];
            $StorePurchaseItem->status=$request['status_product_array'][$i];
            $StorePurchaseItem->save();
        }


        DB::commit();
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

        return  $request;
    }
    public function editPO($id){
        $now = Carbon::now()->format('d-m-Y');
        $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$id)->first();
         $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->select('*','store_purchase_items.status as items_status','store_purchase_items.id as store_purchase_items_id')
        ->where('orders_id',$store_purchase_orders->id)->get();
        $store_purchase_items_count = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->select('*','store_purchase_items.status as items_status')
        ->where('orders_id',$store_purchase_orders->id)->count();
        return view('inventory.po-receive.EditPo',compact('store_purchase_orders','store_purchase_items','now','store_purchase_items_count'));
   }

     public function index(){
         $purchase_orders = PurchaseOrder::all();
         return view('purchase-order', compact('purchase_orders'));
    }

    public function index2(){
        $auth_id =Auth::id();
        $permission = DB::table('user_permissions')->where('user_id', $auth_id)->first();
        $branches= DB::table('branches')->where('status',0)->get();
        return view('inventory.purchaseOrder.index',compact('branches', 'permission'));
    }

    public function get_po_product(Request $request){
        $transaction_items="";
          $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_purchase_orders', 'store_purchase_orders.id', '=', 'store_purchase_items.orders_id')
        ->where('store_purchase_orders.po_no',$request->po_num)
        ->where('store_purchase_items.product_id',$request->id)
        ->get();

        $transaction_items = DB::table('transaction_items')
        ->where('po_id',$request->po_num)
        ->where('product_id',$request->id)
        ->get();
         return compact('store_purchase_items','transaction_items');
    }
    public function getOnePo($id){
        $now = Carbon::now()->format('d-m-Y');
        $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->select('store_purchase_orders.po_no as po_no','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$id)->first();
          $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->select('*','store_purchase_items.status as items_status','store_purchase_items.id as rowId')
        ->where('orders_id',$store_purchase_orders->id)
        ->whereNull('replaceProductId')
        ->get();
        $datas = [];
        foreach ($store_purchase_items as  $store_purchase_item) {

             $transaction_items = DB::table('transaction_items')
                 ->where('transaction_type','RECEIVE PO')
                 ->where('product_id',$store_purchase_item->product_id)
                 ->where('po_id',$store_purchase_orders->po_no)->sum('quantity');
                 
            $tmp = [
            'id'=>$store_purchase_item->rowId,
            'product_id'=>$store_purchase_item->product_id,
            'product_name'=> $store_purchase_item->product_code. " ".$store_purchase_item->product_name. " ".$store_purchase_item->product_description. " ".$store_purchase_item->brand,
            'quantity'=>$store_purchase_item->quantity,
            'unit'=>$store_purchase_item->unit,
            'amount'=>$store_purchase_item->amount,
            'total'=>$store_purchase_item->total,
            'created_at'=>$store_purchase_item->created_at,
            'Remaining_Order'=>$store_purchase_item->quantity- $transaction_items,
            'items_status'=>$store_purchase_item->items_status
            ];
            array_push($datas,$tmp);
            //JoeManuel
        }
        return view('inventory.po-receive.index',compact('store_purchase_orders','datas','now'));
    }

    public function del_receive_po(Request $request){
        DB::beginTransaction();
        try {
                $TransactionItem = TransactionItem::find($request->id);
                $TransactionItem->delete();
                DB::commit();
            } catch (Exception $e) {
              DB::rollback();
               return response()->json([
                  'message'=>$e->getMessage()
              ],500);
          }

    }

    public function setReturnDetails(Request $request){
      
        $auth_id =Auth::id();

          DB::beginTransaction();
        try {
            foreach ($request->product_data as  $value) {
                if(DB::table('transaction_items')->where('id',$request->transaction_id )->where('status',1)->count() >0){
                    return "already";
                }else{                   
                    $status=0;
                    //$this->averaging($value['id'],$value['qunatity_po'],$value['price']);
                    $status="";
                    
                    $TransactionItem = new TransactionItem();
                    $TransactionItem->user_id= $auth_id;
                    $TransactionItem->invoice_num= $request->invoice;
                    $TransactionItem->po_id= $request->po_id;
                    $TransactionItem->product_id=  $request->product_id_final;
                    $TransactionItem->units=  $request->unit;
                    $TransactionItem->price=$value['price'];                    
                    $TransactionItem->transaction_type= "REPLACE_INVOICE";
                    $TransactionItem->quantity= $value['qunatity_po'];
                    $TransactionItem->location_address= $value['location_po'];
                    $TransactionItem->shelf= $value['shelf_po'];
                    $TransactionItem->rock= $value['rock_po'];
                    if(isset($value['lot_no'])){
                        $TransactionItem->lot_no= $value['lot_no'];
                    }
                    if(isset($value['exp_date'])){
                        $TransactionItem->expiration_date= date('Y-m-d', strtotime( $value['exp_date']));
                    }
                    $TransactionItem->save();
                    
                    $REPLACE_INVOICE=DB::table('transaction_items')
                    ->where('po_id',$request->po_id)
                    ->where('invoice_num',$request->invoice)
                    ->where('transaction_type',"REPLACE_INVOICE")
                    ->where('status',0)
                    ->first();
    
                    $RETURN_P_PO=DB::table('transaction_items')
                    ->where('po_id',$request->po_id)
                    ->where('invoice_num',$request->invoice)
                    ->where('transaction_type',"REPLACEMENT_P_PO")
                    ->where('status',0)
                    ->first();
                    $qtyTmp = $REPLACE_INVOICE->quantity+$value['qunatity_po'] ;
                    if($qtyTmp== $RETURN_P_PO->quantity){
                        $status=1;
                    }
                    $transaction_items=DB::table('transaction_items')->where('id',$request->transaction_id)->first();
                     if($transaction_items->quantity == $value['qunatity_po']){
                        $status=1;
                     }

                     if($request->statusState != ""){
                        $status=1;
                    }

                      DB::table('transaction_items')
                    ->where('id',$request->transaction_id)
                    ->update(['status' => $status]);
                }
                


            }
            
        DB::commit();
        return true;
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function setProductDetails(Request $request){
        $auth_id =Auth::id();

          DB::beginTransaction();
        try {
            foreach ($request->product_data as  $value) {
                //$this->averaging($value['id'],$value['qunatity_po'],$value['price']);
                $TransactionItem = new TransactionItem();
                $TransactionItem->user_id= $auth_id;
                $TransactionItem->invoice_num= $request->invoice;
                $TransactionItem->units= $request->units;
                $TransactionItem->po_id= $request->po_id;
                $TransactionItem->product_id= $value['id'];
                $TransactionItem->price=$value['price'];
                $TransactionItem->transaction_type= "RECEIVE PO";
                $TransactionItem->quantity= $value['qunatity_po'];
                $TransactionItem->location_address= $value['location_po'];
                $TransactionItem->shelf= $value['shelf_po'];
                $TransactionItem->rock= $value['rock_po'];
                if(isset($value['lot_no'])){
                    $TransactionItem->lot_no= $value['lot_no'];
                }
                if(isset($value['exp_date'])){
                    $TransactionItem->expiration_date= date('Y-m-d', strtotime( $value['exp_date']));
                }
                $TransactionItem->save();
                $store_product_lists = DB::table('store_product_lists')->where('id', $value['id'])->first();
                $updatedQty = $store_product_lists->stock + $value['qunatity_po'];

                  DB::table('store_product_lists')
                ->where('id',$value['id'])
                ->update(['stock' => $updatedQty]);


                $po = DB::table('store_purchase_orders')
                ->where('po_no', $request->po_id)
                ->first();

                $sum = DB::table('transaction_items')
                ->where('product_id',$value['id'])
                ->where('po_id', $request->po_id)
                ->sum('quantity');

                DB::table('store_purchase_items')
                ->where('orders_id',$po->id)
                ->where('product_id',$value['id'])
                ->where('quantity',$sum)
                ->update(['status' => "Completed"]);

                $StateForUpdate = DB::table('store_purchase_items')
                ->where('orders_id',$po->id)
                ->where('status',"Pending")
                ->count();
                if($StateForUpdate==0){
                DB::table('store_purchase_orders')
                ->where('id',$po->id)
                ->update(['status' => "Completed"]);
                }
            }

        DB::commit();
        return $po->id;
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }


    public function setInvoiceForm(Request $request){

    }

    private function averaging($productID,$content_quantity,$content_amount){
    DB::beginTransaction();
        try {
           
        $stocks= DB::table("transaction_items")
      ->select(DB::raw('SUM(transaction_items.quantity) as stocks'))
      ->where("transaction_type", "RECEIVE PO")
      ->orwhere("transaction_type", "MANUAL ADD")
      ->orwhere("transaction_type", "IMPORT")
      ->groupBy('transaction_items.product_id')
      ->orderBy('stocks', 'DESC') 
      ->where('transaction_items.product_id',$productID)
      ->first();

        $deductqty= DB::table("transaction_items")
        ->select(DB::raw('SUM(transaction_items.quantity) as product_out'))
        ->where("transaction_type", "POS")   
        ->orwhere("transaction_type", "DISPOSE") 
        ->orwhere("transaction_type", "RETURN_P_PO")   
        ->orwhere("transaction_type", "REPLACEMENT_P_PO")
        ->orwhere("transaction_type", "MANUAL MINUS") 
        ->where('transaction_items.product_id',$productID)
        ->first();

        $current = DB::table('store_product_lists')
        ->where('id', $productID)->first();
        if($deductqty->product_out == null){
            DB::commit(); 
            return 0;
        }
        $current_stock =$stocks->stocks -$deductqty->product_out;

        $price_data=($current->capital * $current_stock + $content_amount * $content_quantity) / ($current_stock + $content_quantity) ;

        DB::table('store_product_lists')
        ->where('id',$productID)
        ->update(array('selling_price' =>($price_data+($price_data*.60))
            ,'capital' =>($price_data) ));


        $Price= new Price();
        $Price->product_id=  $productID;
        $Price->price_before=  $current->capital;
        $Price->price_update=  $price_data;
        $Price->selling_price_before= $current->selling_price;
        $Price->selling_price_update=  $price_data+($price_data*.60);
        $Price->save();
        
        DB::commit();        
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }

    
    public function setInvoice(Request $request){
        $auth_id =Auth::id();
        DB::beginTransaction();
        try {
        if(DB::table('transaction_items')
        ->where('user_id', $auth_id)
        ->where('po_id', $request->po_num)
        ->where('invoice_num', null )
        ->update(['invoice_num' => $request->invoice_number]) && DB::table('store_purchase_orders')->where('po_no', $request->po_num)->update(['status' => "Receive"])){

              $transaction_items=DB::table('transaction_items')
        ->where('user_id', $auth_id)
        ->where('po_id', $request->po_num)->get();
        foreach ($transaction_items as $po_receive) {

            $store_purchase_orders = DB::table('store_purchase_orders')
            ->where('po_no',$request->po_num)->first();

            $status =   DB::table('store_purchase_items')
            ->where('product_id',$po_receive->product_id)
            ->where('orders_id',$store_purchase_orders->id)
            ->where('quantity', $po_receive->quantity)
            ->update(['status' => "Receive"]);

            $status =   DB::table('store_purchase_items')
            ->where('product_id',$po_receive->product_id)
            ->where('orders_id',$store_purchase_orders->id)
            ->where('quantity', '>', $po_receive->quantity)
            ->update(['status' => "Pending"]);

        }

            /* joe */
            DB::commit();
            return "Receive";
        }


        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function submit_po(Request $request){
        return $request;
    }
    public function poList(Request $request){

       $po_list= DB::table('store_purchase_orders')->get();
       $totalData = count($po_list);
       $totalFiltered = $totalData;
       $columns = array( 
            0 => 'po_num',
            1 => 'user_name',
            2 =>'total_price',  
            3 =>'status',  
            5 => 'created_at',
        );
       $limit = $request->input('length');
       $start = $request->input('start');

        $dir = $request->input('order.0.dir');


        $order = $columns[$request->input('order.0.column')];
       $po_list="";
       if(empty($request->input('search.value')) && empty($request->data)){
           $po_list= DB::table('store_purchase_orders')
           ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
           ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
           ->orderBy($order,$dir)
           ->offset($start)
           ->limit($limit)  
           ->get();
       }else{
            $search = $request->input('search.value');
            if(isset($request->data)){
            $search= $request->data;
            }
            $po_list= DB::table('store_purchase_orders')
            ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
            ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
           ->orwhere(function($query) use ($search){
           $query->orwhere('store_purchase_orders.po_no','like',"%$search%")
           ->orwhere('store_purchase_orders.status',$search)
           ->orwhere('store_purchase_orders.created_at','like',"%$search%")
           ->orwhere('users.name','like',"%$search%");
            })->get();
           $po_list_temp= DB::table('store_purchase_orders')
           ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
           ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
           ->orwhere(function($query) use ($search){
               $query->orwhere('store_purchase_orders.po_no','like',"%$search%")
               ->orwhere('store_purchase_orders.status',$search)
                ->orwhere('users.name','like',"%$search%")
                ->orwhere('store_purchase_orders.created_at','like',"%$search%");
                })
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)  ->get();
           $totalFiltered=count($po_list_temp);
       }

        $id = Auth::user()->id;
       $permission = UserPermission::where('user_id', $id)->first();
       $add_product = "";
      $data = array();
       if($po_list){



           foreach ($po_list as $po_lists) {

            if($permission->add_product == 1) {
                $add_product = $po_lists->id;
            }

                $nestedData['po_num'] = $po_lists->po_num;
                $nestedData['user_name'] = $po_lists->user_name;
                $nestedData['total_price'] = $po_lists->total_price;
                $nestedData['status'] = $po_lists->status;
                $nestedData['comment'] = $po_lists->comment;
                $nestedData['created_at'] = date('M-d-Y', strtotime($po_lists->created_at));

                if($po_lists->status=="Receive"){
                    $nestedData['action'] = "<div class='dropdown'>";
                    $nestedData['action'] = "<button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                        <span class='caret'></span></button>
                        <ul class='dropdown-menu'>";
                    if($permission->view_polist == 1) {
                        $nestedData['action'] .= "<li><a href='#' onclick=btn_action($po_lists->id,'view') class='dropdown-item' title='View PO Details'>View</a></li>";
                    } else {
                        $nestedData['action'] .= "<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='View PO Details'>View</a></li>";
                    }
                    $nestedData['action'] .= "</ul></div>";
                }else{
                        $nestedData['action'] = "<div class='dropdown'>";
                        $nestedData['action'] .= "<button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu'>";


                        // view polist
                        if($permission->view_polist == 1) {
                            $nestedData['action'] .= "<li><a href='#' onclick=btn_action($po_lists->id,'view') class='dropdown-item' title='View PO Details'>View</a></li>";
                        } else {
                            $nestedData['action'] .= "<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='View PO Details'>View</a></li>";
                        }

                        //receive po list
                        if($permission->receive_polist == 1) {
                            if($po_lists->status !="Cancel"){
                                $nestedData['action'] .= "<li><a href='#' onclick=btn_action($po_lists->id,'receive_po') class='dropdown-item' title='Receive PO Details'>Receive PO Details</a></li>";
                            }
                        } else {
                            $nestedData['action'] .= "<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='Receive PO Details'>Receive PO Details</a></li>";
                        }

                        //edit po list
                        if($permission->receive_polist == 1) {
                            $nestedData['action'] .= "<li><a href='#' onclick=btn_action($po_lists->id,'edit') class='dropdown-item' title='Edit PO Details'>Edit</a></li>   ";
                        } else {
                            $nestedData['action'] .= "<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='Edit PO Details'>Edit</a></li>   </li>";
                        }
                    $nestedData['action'] .= "</ul></div>";

                    // $nestedData['action'] = "<div class='dropdown'>
                    // <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    //     <span class='caret'></span></button>
                    //  <ul class='dropdown-menu'>
                    //  <li><a href='#' onclick=btn_action($po_lists->id,'view') class='dropdown-item' title='View PO Details'>View</a></li>
                    //  <li><a href='#' onclick=btn_action($po_lists->id,'receive_po') class='dropdown-item' title='receive PO Details'>receive PO Details</a></li>
                    //  <li><a href='#' onclick=btn_action($po_lists->id,'edit') class='dropdown-item' title='Edit PO Details'>Edit</a></li>
                    // </ul>
                    // </div>" ;
                }


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

    public function GetpoListPDF(Request $request){
        $now = Carbon::now()->format('d-m-Y');
         $search =$request->id;
            if($request->id=="all"){
            $search= "*";
            }
            if($search == "*"){
                $po_lists= DB::table('store_purchase_orders')
                ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
                ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
                ->get();
                $po_list_count= DB::table('store_purchase_orders')
                ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
                ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
                ->count();
            }else{
                $po_lists= DB::table('store_purchase_orders')
                ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
                ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
                ->where('status',$search)
                ->get();
                $po_list_count= DB::table('store_purchase_orders')
                ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
                ->select('store_purchase_orders.comment as comment','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
                ->where('status',$search)
                ->count();
            }

            $pdf = PDF::loadview('pdf.po-list-pdf',compact('po_lists','now','po_list_count'));
            return $pdf->stream('PO-list.pdf');
    }
    public function Poform(){
        $userId = Auth::id();

        $units= DB::table('units')->where('status',0)->get();
        $store_purchase_orders= DB::table('store_purchase_orders')->where('status',0)->get();
        $branches= DB::table('branches')->where('status',0)->get();
        $poCount = DB::table('store_purchase_orders')->count();
        $now = Carbon::now();
        $poCount = $poCount+1;
        $po_num = "VE-".$now->year."-".$now->month."-00".$poCount;
        //$po_num = "VL-".$now->year."-".$now->month."-00".$poCount;
        $permission = DB::table('user_permissions')->where('user_id', $userId)->first();
        return view('inventory.purchaseOrder.po_form', compact('po_num','branches','store_purchase_orders','units', 'permission'));

    }


    public function storegetPoItems(Request $request)
    {
        $columns = array(
            0 => 'product_name',
            1 => 'total'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $totalitems = DB::table('store_purchase_items')->get()->count();
         if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StorePurchaseItem::select("*")->where('user_id', $auth_id)
            ->where('orders_id',null)
            ->where(function($query) use ($searchByUser){
            $query->where('product_name','LIKE',"%".$searchByUser."%")
            ->orWhere('total','LIKE',"%".$searchByUser."%")
            ->orWhere('quantity','LIKE',"%".$searchByUser."%")
            ->orWhere('unit','LIKE',"%".$searchByUser."%")
            ->orWhere('amount','LIKE',"%".$searchByUser."%");
            })->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            $totalfilteritems = $totalitems;
        }else{
            $auth_id =Auth::id();
            $items = DB::table('store_purchase_items')->where('user_id', $auth_id)
            ->where('orders_id', null)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            $totalfilteritems = $totalitems;
        }
         $data = array();
        if($items){
            foreach ($items as $item)
            {
                $nestedData['product_name'] = "<button id='delete' data-id='{$item->id}' class='icon-close btn btn-sm btn-outline-danger'></button>   $item->quantity $item->unit @ $item->amount  <strong>$item->product_name</strong>";

                $nestedData['total'] = number_format($item->total);
                $data[] = $nestedData;

            }
        }
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalitems,
            'recordsFiltered'=> $totalfilteritems,
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

    public function storeselectgetproduct(Request $request){

        $search = $request->search;
        $user = Auth::user();
        $branch = $user->branch;
        if($search == ''){
           $employees = StoreProductList::orderby('id','asc')
        //   ->where('branch',$branch)
           ->where('status',"Active")
           ->limit(5)->get();
        }else{
           $employees = StoreProductList::orderby('id','asc')
           //->where('branch',$branch)
           ->where('status',"Active")
           ->where(function($query) use ($search){
           $query->where('productname','LIKE',"%".$search."%")
           ->orWhere('product_description','LIKE',"%".$search."%")
           ->orWhere('brand','LIKE',"%".$search."%")
           ->orWhere('product_code','LIKE',"%".$search."%");
           })
           ->limit(20)->get();
        }
        $response = array();
        foreach($employees as $employee){
            $productname=  $employee->product_code.' '.$employee->productname.' '.$employee->product_description.' '.$employee->brand;
           $response[] = array(
                "id"=>$employee->id,
                "text"=>$productname
           );
        }

        echo json_encode($response);
        exit;
     }

     public function storeselectgetSupplier(Request $request){
        /* joe */
        $search = $request->search;
        if($search == ''){
           $Suppliers = Supplier::orderby('id','asc')->select('id','name')
           ->where('status',"active")
           ->limit(5)->get();
        }else{
           $Suppliers = Supplier::orderby('id','asc')->select('id','name')
           ->where('name','like',$search."%")
           ->where('status',"active")
           ->limit(20)->get();
        }
        $response = array();
        foreach($Suppliers as $Supplier){
           $response[] = array(
                "id"=>$Supplier->id,
                "text"=>$Supplier->name
           );
        }

        echo json_encode($response);
        exit;
     }


     public function GetpoDetails(Request $request){
         $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->join('suppliers', 'suppliers.id', '=', 'store_purchase_orders.supplier_id')
        ->select('suppliers.name','suppliers.address','suppliers.email','suppliers.contact_person','suppliers.mobile_no','suppliers.landline','suppliers.name','suppliers.tin','suppliers.payment_term','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$request->id)->first();
        $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->where('orders_id',$store_purchase_orders->id)->get();
        return response()->json(
            [
                'po' => $store_purchase_orders,
                'product' => $store_purchase_items,
            ]
        );
     }

     public function GetpoDetailsPendingPDF($id){


        $now = Carbon::now()->format('d-m-Y');
        $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->select('store_purchase_orders.po_no as po_no','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$id)->first();
          $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->select('*','store_purchase_items.status as items_status')
        ->where('orders_id',$store_purchase_orders->id)->get();

        $datas = [];
        $totalPricesData=0;
        foreach ($store_purchase_items as  $store_purchase_item) {
            $dataObj = new stdClass;
             $transaction_items = DB::table('transaction_items')->where('transaction_type','RECEIVE PO')->where('product_id',$store_purchase_item->product_id)->where('po_id',$store_purchase_orders->po_no)->sum('quantity');

             $dataObj->product_id=$store_purchase_item->product_id;
             $dataObj->product_name=$store_purchase_item->product_name;
             $dataObj->quantity=$store_purchase_item->quantity;
             $dataObj->unit=$store_purchase_item->unit;
             $dataObj->amount=$store_purchase_item->amount;
             $dataObj->total=$store_purchase_item->amount*($store_purchase_item->quantity-$transaction_items);
             $dataObj->created_at=$store_purchase_item->created_at;
             $dataObj->Remaining_Order= $store_purchase_item->quantity-$transaction_items;
             $dataObj->items_status=$store_purchase_item->items_status;
             $totalPricesData +=$store_purchase_item->amount*($store_purchase_item->quantity-$transaction_items);
            array_push($datas,$dataObj);
        }

         $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->join('suppliers', 'suppliers.id', '=', 'store_purchase_orders.supplier_id')
        ->select('suppliers.name','suppliers.address','suppliers.email','suppliers.contact_person','suppliers.mobile_no','suppliers.landline','suppliers.name','suppliers.tin','suppliers.payment_term','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$id)->first();
        $store_purchase_items = $datas;

        $date=date('d-m-Y', strtotime($store_purchase_orders->created_at));
        $pdf = PDF::loadview('pdf.pendingOrder',compact('store_purchase_orders','store_purchase_items','totalPricesData'));
        return  $pdf->stream('PO-Pending-List.pdf', array("Attachment" => false));
        //return view('pdf.invoice',compact('store_purchase_orders','store_purchase_items'));
     }
     public function GetpoDetailsPDF($request){
        $store_purchase_orders = DB::table('store_purchase_orders')
        ->join('users', 'store_purchase_orders.user_id', '=', 'users.id')
        ->join('suppliers', 'suppliers.id', '=', 'store_purchase_orders.supplier_id')
        ->select('suppliers.name','suppliers.address','suppliers.email','suppliers.contact_person','suppliers.mobile_no','suppliers.landline','suppliers.name','suppliers.tin','suppliers.payment_term','store_purchase_orders.po_no AS po_num', 'users.name as user_name','store_purchase_orders.total_price as total_price','store_purchase_orders.status as status' ,'store_purchase_orders.created_at as created_at','store_purchase_orders.id as id')
        ->where('store_purchase_orders.id',$request)->first();
        $date=date('d-m-Y', strtotime($store_purchase_orders->created_at));
        $store_purchase_items = DB::table('store_purchase_items')
        ->join('store_product_lists', 'store_product_lists.id', '=', 'store_purchase_items.product_id')
        ->where('orders_id',$store_purchase_orders->id)->get();
        $pdf = PDF::loadview('pdf.poPDF',compact('store_purchase_orders','store_purchase_items'));
        return $pdf->stream('PO.pdf');
        return view('pdf.invoice',compact('store_purchase_orders','store_purchase_items'));
     }
    public function submit(Request $request){
           \DB::table('purchase_orders')->insert([
            'accountname' => $request->accountname, //This Code coming from ajax request
            'address' => $request->address, //This Chief coming from ajax request
            'contactperson' => $request->contactperson, //This Code coming from ajax request
            'contactnumber' => $request->contactnumber, //This Chief coming from ajax reques
             //This Chief coming from ajax reques
        ]);



        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
}
