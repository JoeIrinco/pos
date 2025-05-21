<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StoreReplacedItem;
use App\StoreItem;
use App\StoreOrder;
use App\TransactionItem;
use Carbon\Carbon;

class StoreReplacedItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            /* return $request; */
            /* $remaining_days = Carbon::now()->diffInDays(Carbon::parse($request->created_at));
            return $remaining_days; */
            //return $request;
            $dt = Carbon::now()->format('Y-m-d');
            $auth_id =Auth::id();
            $auth_user = Auth::user()->name;
            //return $auth_user;
            $Order = new StoreOrder();

            $Order->invoice_no= $request->invoice_no;
            $Order->date= $request->created_at;
            $Order->customer_name= $request->customer_name;
            $Order->customer_address= $request->customer_address;
            $Order->invoice_type= $request->invoice_type;
            $Order->transaction_type= $request->transaction_type;
            $Order->encoder= $auth_user;
            $Order->payment= $request->payment;
            $Order->payment_status= $request->payment_status;
            $Order->check_no= $request->check_no;
            $Order->check_date= $request->check_date;
            $Order->id_no= $request->id_no;
            $Order->bank_name= $request->bank_name;
            $Order->reference_no= $request->reference_no;
            $Order->ewt= $request->ewt;
            $Order->vat_exempt= $request->vat_exempt;
            $Order->net_of_vat= $request->net_of_vat;
            $Order->vat= $request->vat;
            $Order->discount= $request->discount;
            $Order->total_orders= $request->total;
            $Order->final_total= $request->final_total;
            //$Order->balance= $request->final_total;
            $Order->terms= $request->terms;
            $Order->terms_end= Carbon::now()->addDays($request->terms);
            $Order->status= 'PAID';
            if($request->other_bank_name != ''){
                $Order->bank_name= $request->other_bank_name;
            }
            if($Order->date != $dt){
                $Order->status= 'FOR APPROVAL';
            }if($Order->terms != ''){
                $Order->status= 'UNPAID';
            }
            if($Order->status === 'UNPAID'){
                $Order->balance = $request->final_total;
            }

            if($Order->save()){

            $contents = DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)->get();

            $odata = array();
            foreach ($contents as $content) {
            $odata['productname'] = $content->product_name;
            $odata['quantity'] = $content->quantity;

            DB::table('store_product_lists')
            ->where('productname',$content->product_name)
            ->update(['stock' => DB::raw('stock -' .$content->quantity)]);

            }

            DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)
            ->update(array('orders_id' => $Order->id));

            $arr = array('message' => 'Transaction Complete', 'title' => 'Congratulations!');

            return $arr;
             }else{
                 return 'err';
             }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function store_replaced_items(Request $request){
        
        //count of total items (temporary disabled)
        /* $countItems = DB::table('store_items')
        ->where('product_id', $request->product_id)
        ->where('transaction_id',$request->transaction_id)
        ->sum('quantity'); */
        
        //count of total items (temporary disabled)
        /* $countReturned = DB::table('store_replaced_items')
        ->where('transaction_id',$request->transaction_id)
        ->where('status','RETURNED')
        ->sum('quantity'); */
        
        //count of total items (temporary disabled)
        /* $totalOfReturnedItems = $countReturned + $request->num_of_replace_no; */

        //temporary disabled due to front end changes
        /* if($totalOfReturnedItems > $countItems ){
            $arr = array('message' => 'err', 'title' => 'Invalid No. of returned items!');
                return $arr;
        } */

        //temporary disabled due to front end changes
        /* if($request->num_of_replace_no == ''){
            $arr = array('message' => 'err', 'title' => 'Number of returned item is required!');
                return $arr;
        } */


        $currentReplacedQty = DB::table('store_items')
        ->where('transaction_id', $request->transaction_id)
        ->where('product_id', $request->product_id)
        ->where('id', $request->item_id)
        ->first();
        
        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $Item = new StoreReplacedItem();

        $Item->item_id =$request->id_product;
        $Item->replaced_product_id = $request->product_id;
        $Item->transaction_id =$request->transaction_id;
        $Item->product_name =$request->productSelect;
        $Item->quantity=$request->qty;
        $Item->unit=$request->unit;
        $Item->user_id=$auth_id;
        $Item->encoder=$auth_user;
        $Item->amount=$request->srp;
        $Item->total=$request-> qty * $request->srp;
        $Item->lot_no = $request->select_lot_no;
        $Item->rack= $request->select_rack2;
        $Item->shelf = $request->select_shelf2;

        $Item->expiration_date = $request->select_expiry;
        $Item->status='REPLACEMENT';
        //item status here custom price
        
        if($Item->save()){
        //
        
        /* start ng code ng returned items to store_replaced_item ililipat sa save item*/
        /* $returned = DB::table('store_items')
        ->where('id','=',$request->item_id)
        ->where('product_id','=',$request->product_id)
        ->where('transaction_id', $request->transaction_id)
        ->first();
        
        $secondItem = new StoreReplacedItem();

        $secondItem->item_id = $returned->product_id;
        $secondItem->transaction_id = $returned->transaction_id;
        $secondItem->brand = $returned->brand;
        $secondItem->product_name = $returned->product_name;
        $secondItem->product_description = $returned->product_description;
        $secondItem->quantity = $request->num_of_replace_no;
        $secondItem->unit = $returned->unit;
        $secondItem->user_id = $auth_id;
        $secondItem->encoder = $auth_user;
        $secondItem->amount = $returned->amount;
        $secondItem->total = $returned-> total;
        $secondItem->lot_no = $currentReplacedQty->lot_no;
        $secondItem->rack = $request->select_rack;
        $secondItem->shelf = $request->select_shelf;
        $secondItem->expiration_date = $currentReplacedQty->expiration_date;
        $secondItem->status='RETURNED';
        $secondItem->save(); */

            /* if($secondItem->save()){ */

                //update 
                DB::table('store_items')
                ->where('transaction_id', $request->transaction_id)
                ->where('product_id', $request->product_id)
                ->where('id', $request->item_id)
                ->limit(1)
                ->update(array('return_replace' => 'REPLACED'/* ,'replaced_qty' => $currentReplacedQty->replaced_qty + $request->num_of_replace_no */));

            $arr = array('message' => 'Item Saved', 'title' => 'Congratulations!');
                //echo json_encode($arr);
                return $arr;
            /* }else{
                return 'err';
            } */

        }else{
            return 'err';
        }

    }
    public function returnedProduct(Request $request){
        
        $auth_id =Auth::id();
        $auth_name = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("returned",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

        $return_count = DB::table('store_items')
            ->where('transaction_id',$request->transaction_id)
            ->where('return_qty', '!=','')->count();

        $return_slip_count = DB::table('store_orders')
            ->where('invoice_no',$request->return_slip_no)
            ->count();
        if($request->return_slip_no == ''){
            $arr = array('message' => 'req', 'title' => 'Return Slip no. is required');
            return $arr;
        }
        if($return_slip_count >= 1){
            $arr = array('message' => 'dup', 'title' => 'Return Slip no. already exist');
            return $arr;
        }if($request->return_slip_no == ''){
            $arr = array('message' => 'req', 'title' => 'Return Slip no. is required');
            return $arr;
        }
        if($return_count >= 1){

            $get_info = DB::table('store_orders')
                ->where('transaction_id',$request->transaction_id)->first();

            $store_orders = new StoreOrder();
            $store_orders->invoice_no = $request->return_slip_no;
            $store_orders->customer_name = $get_info->customer_name;
            $store_orders->customer_address = $get_info->customer_address;
            $store_orders->transaction_type = "RETURN SLIP";
            $store_orders->status = "RETURN SLIP";
            $store_orders->encoder = $auth_name;
            $store_orders->encoder_id = $auth_id;
            $store_orders->invoice_type = "RETURN SLIP";
            $store_orders->date = $request->return_date;
            $store_orders->remarks = $request->remarks;
            $store_orders->total_orders = $request->return_change * -1;
            $store_orders->save();

            $now = Carbon::now();
            $invID = str_pad($store_orders->id, 4, '0', STR_PAD_LEFT);
            DB::table('store_orders')->orderBy('id', 'DESC')
                ->limit(1)
                ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));

            if($store_orders->save()){

                $contents = DB::table('store_items')
                    ->where('transaction_id',$request->transaction_id)
                    ->where('return_qty', '!=','')->get();

                foreach ($contents as $content) {

                    $store_item = new StoreItem();
                    $store_item->product_id = $content->product_id;
                    $store_item->user_id = $auth_id;
                    /*$store_item->transaction_id = $content->transaction_id;*/
                    $store_item->invoice_no = $request->label_invoice_no;
                    $store_item->encoder = $auth_name;
                    $store_item->brand = $content->brand;
                    $store_item->product_name = $content->product_name;
                    $store_item->product_description = $content->product_description;
                    $store_item->unit = $content->unit;
                    $store_item->quantity = $content->return_qty;
                    $store_item->amount = $content->amount;
                    $store_item->expiration_date = $content->expiration_date;
                    $store_item->lot_no = $content->lot_no;
                    $store_item->save();

                    $transaction_item = new TransactionItem();
                    $transaction_item->user_id = $auth_id;
                    $transaction_item->invoice_num =$request->label_invoice_no;
                    $transaction_item->product_id = $content->product_id;
                    $transaction_item->item_id = $content->id;
                    $transaction_item->transaction_type = 'RETURNED';
                    $transaction_item->quantity = $content->return_qty;
                    $transaction_item->lot_no = $content->lot_no;
                    $transaction_item->shelf = $content->shelf;
                    $transaction_item->rock = $content->rock;
                    $transaction_item->location_address = 'STORE';
                    $transaction_item->remarks = $request->return_remarks;
                    /* $transaction_item->rack = $request->select_rock;
                    $transaction_item->shelf = $request->select_shelf; */
                    $transaction_item->expiration_date = $content->expiration_date;

                    $transaction_item->save();
                    if($store_item->save()){

                        $now = Carbon::now();
                        $invID = str_pad($store_orders->id, 4, '0', STR_PAD_LEFT);
                        DB::table('store_items')->orderBy('id', 'DESC')
                            ->limit(1)
                            ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));

                    }
                }

                DB::table('store_items')
                    ->where('transaction_id', $request->transaction_id)
                    ->update(array('return_qty' => ''));

                $arr = array('message' => 'success', 'title' => 'Save');
                return $arr;
            }

        }else{
            $arr = array('message' => 'err', 'title' => 'Invalid returned qty');
            return $arr;
        }


    }
    function posremovedata(Request $request)
    {

        $items = StoreItem::find($request->id);
        /* return view('dashboard',compact('items')); */
        if($items->delete())
        {
            /* echo 'Data Deleted'; */
            return $request->id;
        }
    }



    public function checkStock(Request $request){
            /* return $request; */

          $auth_id =Auth::id();
          $auth_name = Auth::user()->name;

          if ($request->cardN <= 0 ){

            $arr = array('message' => 'invalid_qty', 'title' => 'Invalid Quantity!');
            return $arr;

            }

          $store_items = DB::table('store_items')           //100
                             ->where('id',$request->id)
                             ->where('transaction_id',$request->transaction_id)
                             ->sum('quantity');
            


                             
          $return_qty = DB::table('transaction_items')      //80
                             ->where('product_id',$request->product_id)
                             ->where('invoice_num',$request->invoice_no)
                             ->where('item_id',$request->id)
                             ->where('transaction_type','RETURNED')
                             ->sum('quantity');

          /* $request_qty = DB::table('store_replaced_items')      //80
                             ->where('product_id',$request->product_id)
                             ->where('invoice_num',$request->invoice_no)
                             ->where('item_id',$request->id)
                             ->where('transaction_type','RETURNED')
                             ->sum('quantity');
                            ->where('replacement_slip_no',null) */


           $returnable_product = $store_items - $return_qty;

         if ($request->cardN > $returnable_product){

             $arr = array('message' => 'invalid_qty', 'title' => 'Invalid Quantity!');
             return $arr;

         }else{
                
                $if_already_returned = DB::table('store_replaced_items')
                ->where('product_list_id','=',$request->id)
                ->where('item_id','=',$request->product_id)
                ->where('transaction_id', $request->transaction_id)
                ->where('replacement_slip_no', null)
                ->count();

                if($if_already_returned == 1){

                    DB::table('store_replaced_items')
                    ->where('product_list_id','=',$request->id)
                    ->where('item_id','=',$request->product_id)
                    ->where('transaction_id', $request->transaction_id)
                    ->where('replacement_slip_no', null)
                    ->update(array('quantity' => $request->cardN));

                }else{

                    $returned = DB::table('store_items')
                ->where('id','=',$request->id)
                ->where('product_id','=',$request->product_id)
                ->where('transaction_id', $request->transaction_id)
                ->first();
                
                $secondItem = new StoreReplacedItem();

                $secondItem->product_list_id = $returned->id;
                $secondItem->item_id = $returned->product_id;
                $secondItem->transaction_id = $returned->transaction_id;
                $secondItem->brand = $returned->brand;
                $secondItem->product_name = $returned->product_name;
                $secondItem->product_description = $returned->product_description;
                $secondItem->quantity = $request->cardN;
                $secondItem->unit = $returned->unit;
                $secondItem->user_id = $auth_id;
                $secondItem->encoder = $auth_name;
                $secondItem->amount = $returned->amount;
                $secondItem->total = $returned-> total;
                $secondItem->lot_no = $returned->lot_no;
                $secondItem->rack = $returned->rock;
                $secondItem->shelf = $returned->shelf;
                $secondItem->expiration_date = $returned->expiration_date;
                $secondItem->status='RETURNED';
                $secondItem->save();

                if($secondItem->save()){

                $arr = array('message' => 'Item Saved', 'title' => 'Congratulations!');
                    //echo json_encode($arr);
                    return $arr;
                }else{
                    return 'err';
                }

            }

                


                                                                        /* here - check if okay bukas ang pag se save*/
         }
    }



}
