<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StoreItem;
use App\StoreProductList;
use App\StoreOrder;
use Carbon\Carbon;
use App\StoreClientInfo;
use App\TransactionHistory;
use App\TransactionItem;

use \stdClass;


class StoreTellerController extends Controller
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
    {       /* return $request; */
            /* return $request;
            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($request->created_at));
            return $remaining_days;*/
            $dt = Carbon::now()->format('Y-m-d');
            $auth_id =Auth::id();
            $auth_user = Auth::user()->name;
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
            $Order->terms= $request->terms;
            $Order->account_name= $request->account_name;
            $Order->terms_end= Carbon::now()->addDays($request->terms);
            $Order->status= 'PAID';
            if($request->invoice_type === 'PRIVATE'){
                // return "atc1 ".$request->atc1. " atc2".$request->atc2. " tin".$request->nic;
                 if($request->atc1 == "" || $request->nic == ""){
                     /* return "pending"; */
                     $Order->status_documents = 'PENDING';
                 }else{
                     /* return "Complete"; */
                     $Order->status_documents = 'COMPLETE';
                 }
                 /* return"ok"; */
             }
            if($request->invoice_type === 'GOVERNMENT'){
               // return "atc1 ".$request->atc1. " atc2".$request->atc2. " tin".$request->nic;
                if($request->atc1 == "" || $request->atc2 == "" || $request->nic == ""){
                    /* return "pending"; */
                    $Order->status_documents = 'PENDING';
                }else{
                    /* return "Complete"; */
                    $Order->status_documents = 'COMPLETE';
                }
                /* return"ok"; */
            }
            if( $request->paid_amount < $request->final_total ){
                $Order->status= 'UNPAID';
            }
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
                /* return 'err'; */
            }

            if($Order->save()){

                $now = Carbon::now();
                $invID = str_pad($Order->id, 4, '0', STR_PAD_LEFT);
                DB::table('store_orders')->orderBy('id', 'DESC')
                ->limit(1)
                ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));

                /* if($request->payment != 'UNPAID'){ */
                    $payment = new TransactionHistory();
                    $payment->transaction_id = $now->year. '-' .$now->month. '-' . $invID ;
                    $payment->invoice_no = $request->invoice_no;
                    $payment->customer_name = $request->customer_name;
                    $payment->total_payment = $request->paid_amount;
                    $payment->encoder = $auth_user;
                    $payment->transaction_type = $request->invoice_type;
                    $payment->payment_type = $request->payment;
                    $payment->payment_status= $request->payment_status;
                    $payment->check_number = $request->check_no;
                    $payment->bank = $request->bank_name;
                    $payment->check_date = $request->check_date;
                    $payment->ref_no = $request->reference_no;
                    $payment->account_name = $request->account_name;
                    $payment->date= $request->created_at;
                    $payment->save();                      //for checking redundnt column
                /* } */
                                     //for checking redundnt column
                /* $payment->amount = */
                /* $payment->date =  */                               // for checking if created at not working

            // update stock pero mali kasi naka product name hindi ID ahahaha
            /* $contents = DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)->get();

            $odata = array();
            foreach ($contents as $content) {
            $odata['productname'] = $content->product_name;
            $odata['quantity'] = $content->quantity;

            DB::table('store_product_lists')
            ->where('productname',$content->product_name)
            ->update(['stock' => DB::raw('stock -' .$content->quantity)]);

            } */

                /*CODE FOR INSERT IN PRODUCT*/

                $contents = DB::table('store_items')
                    ->where('user_id', $auth_id)
                    ->where('orders_id', null)->get();

                /*$odata = array();*/

                foreach ($contents as $content) {

                    /*$odata['user_id'] = $content->user_id;
                    $odata['invoice_num'] = $request->invoice_no;
                    $odata['product_id'] = $content->product_id;
                    $odata['transaction_type'] = 'POS';
                    $odata['quantity'] = $content->quantity;
                    $odata['lot_no'] = $content->lot_no;
                    $odata['expiration_date'] = $content->expiration_date;*/
                    /*$odata['productname'] = $content->product_name;
                    $odata['quantity'] = $content->quantity;*/

                    $transaction_item = new TransactionItem();
                    $transaction_item->user_id = $content->user_id;
                    $transaction_item->invoice_num = $request->invoice_no;
                    $transaction_item->product_id = $content->product_id;
                    $transaction_item->transaction_type = 'POS';
                    $transaction_item->quantity = $content->quantity;
                    $transaction_item->lot_no = $content->lot_no;
                    $transaction_item->expiration_date = $content->expiration_date;
                    $transaction_item->save();
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
    public function storeClient(Request $request)
    {
            /* return $request; */
            /* $dt = Carbon::now()->format('Y-m-d');
            $auth_id =Auth::id(); */
            $auth_user = Auth::user()->name;

            $accountNameChecker = StoreClientInfo::where('account_name',$request->client_account_name)
            ->where('account_type',$request->client_account_type)
            ->count();

            if($accountNameChecker>0){
                $arr = array('message' => 'err', 'title' => 'Account name already exist!');
                return $arr;
            }

            $Client = new StoreClientInfo();

            if($request->client_account_type === 'REGULAR'){

                if($request->client_account_name === null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->client_address === null){

                    $arr = array('message' => 'err', 'title' => 'Address is required!');
                    return $arr;

                }

                $Client->account_type = $request->client_account_type;
                $Client->account_name = strtoupper($request->client_account_name);
                $Client->address = strtoupper($request->client_address);

                if($Client->save()){

                        $now = Carbon::now();
                        $invID = str_pad($Client->id, 4, '0', STR_PAD_LEFT);
                        DB::table('store_client_infos')->orderBy('id', 'DESC')
                        ->limit(1)
                        ->update(array('account_no' => $now->year. '-' .$now->month. '-' .$invID ));

                        $arr = array('message' => '', 'title' => 'Transaction Complete!');
                        return $arr;

                     }else{
                         return 'err';
                     }
            }
            if($request->client_account_type === 'SENIOR'){

                if($request->client_account_name === null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->client_address === null){

                    $arr = array('message' => 'err', 'title' => 'Address is required!');
                    return $arr;

                }
                if($request->client_senior_id === null){

                    $arr = array('message' => 'err', 'title' => 'ID is required!');
                    return $arr;

                }
                $Client->account_type = $request->client_account_type;
                $Client->account_name = strtoupper($request->client_account_name);
                $Client->address = strtoupper($request->client_address);
                $Client->contact_no = $request->client_contact_no;
                $Client->email = $request->client_email;
                $Client->senior_id = $request->client_senior_id;
                if($Client->save()){

                    $now = Carbon::now();
                    $invID = str_pad($Client->id, 4, '0', STR_PAD_LEFT);
                    DB::table('store_client_infos')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('account_no' => $now->year. '-' .$invID ));

                    $arr = array('message' => '', 'title' => 'Transaction Complete!');
                    return $arr;

                 }else{
                     return 'err';
                 }
            }
            if($request->client_account_type === 'PWD'){

                if($request->client_account_name === null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->client_address === null){

                    $arr = array('message' => 'err', 'title' => 'Address is required!');
                    return $arr;

                }
                if($request->client_pwd_id === null){

                    $arr = array('message' => 'err', 'title' => 'ID is required!');
                    return $arr;

                }
                $Client->account_type = $request->client_account_type;
                $Client->account_name = strtoupper($request->client_account_name);
                $Client->address = strtoupper($request->client_address);
                $Client->contact_no = $request->client_contact_no;
                $Client->email = $request->client_email;
                $Client->pwd_id = $request->client_pwd_id;
                if($Client->save()){

                    $now = Carbon::now();
                    $invID = str_pad($Client->id, 4, '0', STR_PAD_LEFT);
                    DB::table('store_client_infos')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('account_no' => $now->year. '-' .$invID ));

                    $arr = array('message' => '', 'title' => 'Transaction Complete!');
                    return $arr;

                 }else{
                     return 'err';
                 }
            }
            if($request->client_account_type === 'PRIVATE'){

                if($request->client_account_name === null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->client_address === null){

                    $arr = array('message' => 'err', 'title' => 'Address is required!');
                    return $arr;

                }
                $Client->account_type = $request->client_account_type;
                $Client->account_name = strtoupper($request->client_account_name);
                $Client->address = strtoupper($request->client_address);
                $Client->contact_no = $request->client_contact_no;
                $Client->email = $request->client_email;
                $Client->contact_person = $request->client_contact_person;
                /*$Client->tin = $request->nic1;
                $Client->atc = $request->atcSelect;
                $Client->atc2 = $request->atcSelect2;*/

                if($Client->save()){

                    $now = Carbon::now();
                    $invID = str_pad($Client->id, 4, '0', STR_PAD_LEFT);
                    DB::table('store_client_infos')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('account_no' => $now->year. '-' .$invID ));

                    $arr = array('message' => '', 'title' => 'Transaction Complete!');
                    return $arr;

                 }else{
                     return 'err';
                 }
            }
            if($request->client_account_type === 'GOVERNMENT'){

                if($request->client_account_name === null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->client_address === null){

                    $arr = array('message' => 'err', 'title' => 'Address is required!');
                    return $arr;

                }

                $Client->account_type = $request->client_account_type;
                $Client->account_name = strtoupper($request->client_account_name);
                $Client->address = strtoupper($request->client_address);
                $Client->contact_no = $request->client_contact_no;
                $Client->email = $request->client_email;
                $Client->contact_person = $request->client_contact_person;
                $Client->tin = $request->nic1;
                $Client->atc = $request->atcSelect;
                $Client->atc2 = $request->atcSelect2;
                if($Client->save()){

                    $now = Carbon::now();
                    $invID = str_pad($Client->id, 4, '0', STR_PAD_LEFT);
                    DB::table('store_client_infos')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('account_no' => $now->year. '-' .$invID ));

                    $arr = array('message' => '', 'title' => 'Transaction Complete!');
                    return $arr;

                 }else{
                     return 'err';
                 }
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
    public function destroy($id)
    {
        //
    }

    public function storegetItems(Request $request)
    {
        $columns = array(
            0 => 'status',
            1 => 'product_name',
            2 => 'expiration_date',
            3 => 'lot_no',
            4 => 'total',
            5 => 'action'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $totalitems = StoreItem::get()->count();

         if($request->input('search.value')){

            //query is correct brb later

            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StoreItem::select("*")->where('user_id', $auth_id)
            ->where('orders_id',null)
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('quantity','LIKE',"%".$searchByUser."%")
                   ->orWhere('unit','LIKE',"%".$searchByUser."%")
                   ->orWhere('product_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('expiration_date','LIKE',"%".$searchByUser."%")
                   ->orWhere('lot_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('total','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();

            $items = StoreItem::where('user_id', $auth_id)
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
                $nestedData['status'] = "$item->item_status";
                $nestedData['product_name'] = "$item->quantity $item->unit @ &#8369; $item->amount  <strong>$item->product_name</strong>";
                $nestedData['expiration_date'] = "$item->expiration_date";
                $nestedData['lot_no'] = "$item->lot_no";
                if($item->item_status === "REGULAR"){
                    $nestedData['status'] =  "<label class='btn btn-outline-primary activate '><input type='checkbox' checked class='btn btn-outline-success discount' data-id='$item->id'> REGULAR</label>";
                    $nestedData['total'] = $item->original_total;
                    $nestedData['action'] = "<button data-value='$item->original_total' data-id='$item->id' class='ti-close btn btn-sm btn-outline-danger update_btn delete' type='button'></button>";
                    $nestedData['expiration_date'] = "$item->expiration_date";
                    $nestedData['lot_no'] = "$item->lot_no";
                }
                if($item->item_status === "DISCOUNTED"){
                    $nestedData['status'] =  "<label class='btn btn-outline-success activate ' ><input type='checkbox' checked class='btn btn-outline-success discount' data-id='$item->id'> DISCOUNTED</label>";
                    $nestedData['total'] =  $item->total;
                    $nestedData['action'] = "<button data-value='$item->original_total' data-id='$item->id' class='ti-close btn btn-sm btn-outline-danger update_btn delete' type='button'></button>";
                    $nestedData['expiration_date'] = "$item->expiration_date";
                    $nestedData['lot_no'] = "$item->lot_no";
                }
                if($item->item_status === "CUSTOM DISCOUNT"){
                    $var = $item->custom_total / $item->quantity;
                    $nestedData['product_name'] = "$item->quantity $item->unit @ &#8369; $var  <strong>$item->product_name</strong>";
                    $nestedData['status'] =  "<label class='btn btn-outline-success activate ' ><input type='checkbox' checked class='btn btn-outline-success discount' data-id='$item->id'> DISCOUNTED</label>";
                    $nestedData['total'] =  $item->custom_total;
                    $nestedData['action'] = "<button data-value='$item->custom_total' data-id='$item->id' class='ti-close btn btn-sm btn-outline-danger update_btn delete' type='button'></button>";
                    $nestedData['expiration_date'] = "$item->expiration_date";
                    $nestedData['lot_no'] = "$item->lot_no";
                }

                //$nestedData['action'] = "<button data-value='$item->original_total' data-id='$item->id' class='ti-close btn btn-sm btn-outline-danger update_btn delete' type='button'></button>";
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
        //return $request;
        $search = $request->search;
        $user = Auth::user();
        $branch = $user->branch;

        if($search == ''){
           $employees = StoreProductList::orderby('id','asc')->select('id','productname')->where('branch',$branch)->limit(5)->get();
        }else{
           $employees = StoreProductList::orderby('id','asc')->select('id','productname')->where('branch',$branch)->where('productname', 'like', '%' .$search . '%')->limit(20)->get();
        }

        $response = array();
        foreach($employees as $employee){
           $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->productname
           );
        }

        echo json_encode($response);
        exit;
     }
     public function storefindProductList(Request $request){

         $data=StoreProductList::select('id','unit','productname','capital','markup','selling_price','status')->where('id',$request->id)->first();//->take(100)->get();
         /* $storeQty= DB::table("transaction_items")
         ->where("product_id",$data->id)
         ->where("transaction_type",'STORE')
         ->pluck("quantity","expiration_date","lot_no")
         ->toArray();
         $posQty= DB::table("transaction_items")
         ->select('quantity','expiration_date','lot_no')
         ->where("product_id",$data->id)
         ->where("transaction_type",'POS')
         ->orderBy("expiration_date",'asc')
         ->get(); */

         $expiry= DB::table("transaction_items")
             ->where("product_id",$data->id)
             ->where("transaction_type",'STORE')
             ->orderBy("expiration_date",'asc')
             ->pluck("expiration_date")
             ->unique()
             ->toArray();
         $lot_no= DB::table("transaction_items")
             ->where("product_id",$data->id)
             ->where("transaction_type",'STORE')
             ->where("expiration_date",$expiry)
             ->pluck("lot_no")
             ->unique()
             ->toArray();
         
         /* $stockData=TransactionItem::select('quantity','expiration_date','lot_no')
             ->where('product_id',$request->id)
             ->where('transaction_type','STORE')->get();
         $soldData=TransactionItem::select('quantity','expiration_date','lot_no')
             ->where('product_id',$request->id)
             ->where('transaction_type','POS')->get();

        
             
        $collection = collect($storeQty);
            
        return $collection->diff([$posQty]); */
            
            







         $object = new stdClass();
         $object = $data;

         
         /* $object->stockData = $soldData;
         $object->soldData = $stockData; */
         $object->expirationDate = $expiry;
         $object->lotNo = $lot_no;
         /* $object->diff = $diff;
         $object->storeQty = $storeQty;
         $object->posQty = $posQty; */
         return $object;

     }
     public function storeselectgetclient(Request $request){
        /* return $request; */
        $search = $request->search;
        $user = Auth::user();

        if($search == ''){

           $employees = StoreClientInfo::orderby('id','asc')
           ->select('id','account_name')
           ->where('account_type',$request->type)
           ->limit(20)->get();

        }else{

           $employees = StoreClientInfo::orderby('id','asc')
           ->select('id','account_name')
           ->where('account_type',$request->type)
           ->where('account_name', 'like', '%' .$search . '%')
           ->limit(20)->get();

        }

        $response = array();
        foreach($employees as $employee){
           $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->account_name
           );
        }

        echo json_encode($response);
        exit;
     }
     public function storefindClientList(Request $request){
        $data=StoreClientInfo::select('account_no','account_name','account_type','address','senior_id','pwd_id')/* ->where('account_type',$request->ttype) */->where('id',$request->id)->first();//->take(100)->get();
         return response()->json($data);
     }
    public function findItemlotNo(Request $request){
        /*return $request;*/
        $data=DB::table("transaction_items")
            ->where('product_id',$request->item_id)
            ->where('expiration_date',$request->expiration_date)
            ->where('transaction_type','STORE')
            ->pluck("lot_no")
            ->toArray();

        return $data;
    }
    public function findRemainingQty(Request $request){
        return $request;
        $data=DB::table("transaction_items")
            ->where('product_id',$request->item_id)
            ->where('expiration_date',$request->expiration_date)
            ->where('transaction_type','STORE')
            ->pluck("lot_no")
            ->toArray();

        return $data;
    }

     public function storefindTotalPrice(Request $request){
            /* return $request; */

            /* $auth_id =Auth::id();
            $data = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->sum('original_total');
            return response()->json(['original_total'=> $data],200); */
            if($request->type === 'si_senior' || $request->type === 'si_pwd' ){

                $auth_id =Auth::id();
                DB::table('store_items')
                ->where('user_id', $auth_id)
                ->where('orders_id', null)
                ->update(array('item_status' => 'DISCOUNTED','custom_total' => 0,'custom_discount' => 0));

                $auth_id =Auth::id();
                $contents = DB::table('store_items')
                ->where('user_id', $auth_id)
                ->where('orders_id', null)->get();

                $odata = array();
                foreach ($contents as $content) {

                $odata['productname'] = $content->product_name;
                $odata['vatexemptsales'] = $content->original_total / 1.12;
                $odata['discount'] = $odata['vatexemptsales'] * 0.20;
                $odata['finaltotal'] = $odata['vatexemptsales'] - $odata['discount'];


                DB::table('store_items')
                ->where('orders_id', null)
                ->where('id',$content->id)
                ->update(['total' => DB::raw($odata['finaltotal'])]);

                }

            }else{

                $auth_id =Auth::id();
                DB::table('store_items')
                ->where('user_id', $auth_id)
                ->where('orders_id', null)
                ->update(array('item_status' => 'REGULAR','custom_total' => 0,'custom_discount' => 0));

            }

            $auth_id = Auth::id();
            $data = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->sum('original_total');


            $count= DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)
            ->count();

            return response()->json(['original_total'=> $data, 'count'=> $count],200);
     }

     public function store_save_items(Request $request){
        /*return $request;*/
        $auth_id =Auth::id();
        $auth_user = Auth::user()->name;
        $Item = new StoreItem();

        $Item->product_id = $request->item_id;
        $Item->product_name =$request->productSelect;
        $Item->quantity=$request->qty;
        $Item->unit=$request->unit;
        $Item->user_id=$auth_id;
        $Item->encoder=$auth_user;
        $Item->amount=$request->srp;
        $Item->expiration_date=$request->select_expiry;
        $Item->lot_no=$request->select_lot_no;
        $Item->original_total=$request-> qty * $request->srp;
        $Item->total=$request->price;

        if($request->custom_price != ''){
            //$Item->original_total=$request-> qty * $request->srp;
            $Item->custom_total=$request->custom_price;
            $Item->custom_discount=$request->price - $request->custom_price;
            $Item->total=$request->price - ($request->price - $request->custom_price);
            $Item->item_status = 'CUSTOM DISCOUNT';
        }
        if($request->custom_price === null){
            $Item->status = 'REGULAR';
            $Item->item_status = 'REGULAR';
        }
        if($request->status ==='PWD'){
            $Item->status = 'PWD';
            $Item->item_status = 'DISCOUNTED';
        }
        if($request->status ==='SENIOR'){
            $Item->status = 'SENIOR';
            $Item->item_status = 'DISCOUNTED';
        }
        /* if($request->status ==='REGULAR'){
            $Item->status = 'REGULAR';
            $Item->item_status = 'REGULAR';
            if($request->custom_price != ''){
                //$Item->original_total=$request-> qty * $request->srp;
                $Item->custom_total=$request->custom_price;
                $Item->custom_discount=$request->price - $request->custom_price;
                $Item->total=$request->price - ($request->price - $request->custom_price);
                $Item->status = 'REGULAR';
                $Item->item_status = 'CUSTOM DISCOUNT';
            }else{
                $Item->status = 'REGULAR';
                $Item->item_status = 'REGULAR';
            }
        }else{

            $Item->status = $request->status;
            $Item->item_status = 'REGULAR';
            if($request->custom_price != ''){
                $Item->item_status = 'CUSTOM DISCOUNT';
            }
        } */
        if($Item->save()){

        $arr = array('message' => 'Item Saved', 'title' => 'Congratulations!');
            //echo json_encode($arr);
            return $arr;
        }else{
            return 'err';
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

    function updateDiscount(Request $request)
    {
        //return $request;
        $items = StoreItem::find($request->id);

        if($items->item_status === 'REGULAR'){

            $items->item_status = 'DISCOUNTED';
            $items->save();

        }
        else if($items->item_status === 'DISCOUNTED'){

            $items->item_status = 'REGULAR';
            //$items->total = 0;
            $items->save();
        }
            $auth_id =Auth::id();
            $data_discounted = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->where('item_status', 'DISCOUNTED')->sum('original_total');
            $data_regular = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->where('item_status', 'REGULAR')->sum('original_total');
            return response()->json(['data_discounted'=> $data_discounted,'data_regular'=> $data_regular],200);
            //return response()->json(['data'=> $data,$items]);

    }
    function deleteDiscount(Request $request)
    {
            //return $request;
            $items = StoreItem::find($request->id);

            $auth_id =Auth::id();
            $data_discounted = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->where('item_status', 'DISCOUNTED')->sum('original_total');
            $data_regular = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->where('item_status', 'REGULAR')->sum('original_total');
            return response()->json(['data_discounted'=> $data_discounted,'data_regular'=> $data_regular],200);
            //return response()->json(['data'=> $data,$items]);

    }

    public function findTotalWithAtc(Request $request){
        return $request;

        if($request->type1 == 'WI158' || $request->type1 == 'WI640' || $request->type1 == 'WC158' || $request->type1 == 'WC640'){

            $auth_id =Auth::id();

            $auth_id =Auth::id();
            $contents = DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)->get();

            $odata = array();
            foreach ($contents as $content) {

            $odata['productname'] = $content->product_name;
            $odata['vatexemptsales'] = $content->original_total / 1.12;
            $odata['discount'] = $odata['vatexemptsales'] * 0.20;
            $odata['finaltotal'] = $odata['vatexemptsales'] - $odata['discount'];


            DB::table('store_items')
            ->where('orders_id', null)
            ->where('id',$content->id)
            ->update(['total' => DB::raw($odata['finaltotal'])]);

            }

        }else{

            $auth_id =Auth::id();
            DB::table('store_items')
            ->where('user_id', $auth_id)
            ->where('orders_id', null)
            ->update(array('item_status' => 'REGULAR','custom_total' => 0,'custom_discount' => 0));

        }

        $auth_id = Auth::id();
        $data = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->sum('original_total');


        $count= DB::table('store_items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->count();

        return response()->json(['original_total'=> $data, 'count'=> $count],200);
 }

 public function checkInvoice(Request $request)
 {
         /* return $request; */
         $invoiceChecker = StoreOrder::where('invoice_no',$request->input_invoice)
         ->where('transaction_type',$request->input_transaction)
         ->count();

        if($invoiceChecker>0){
            $arr = array('message' => 'err', 'title' => 'Invoice no. already exist!');
            return $arr;
        }
 }
 public function searchInvoice(Request $request){
    //return $request;
    $search = $request->search;
    $user = Auth::user();
    $branch = $user->branch;

    if($search == ''){
       $employees = StoreOrder::orderby('id','asc')->select('id','invoice_no')
                                ->limit(5)->get();
    }else{
       $employees = StoreOrder::orderby('id','asc')->select('id','invoice_no')
                                ->where('invoice_no', 'like', '%' .$search . '%')
                                ->limit(20)->get();
    }

    $response = array();
    foreach($employees as $employee){
       $response[] = array(
            "id"=>$employee->invoice_no,
            "text"=>$employee->invoice_no
       );
    }

    echo json_encode($response);
    exit;
 }
 public function getInvoiceInfo(Request $request){

    $getTransaction_id=StoreOrder::select('transaction_id')
    ->where('invoice_no',$request->id)->first();

    $client=StoreOrder::select('id','transaction_id','customer_name','transaction_type'
    ,'invoice_no','invoice_type','balance','final_total','atc1','atc2','tin')
    ->where('transaction_id',$getTransaction_id->transaction_id)->get();

    $payment = TransactionHistory::where('transaction_id',$getTransaction_id->transaction_id)->sum('total_payment');

    /* $data=StoreOrder::select('customer_name','invoice_no','transaction_type', 'invoice_type','transaction_id')->where('invoice_no',$request->id)->first(); */
    return response()->json(['client'=>$client,'payment'=>$payment/* ,'data'=>$data */]);

 }

}
