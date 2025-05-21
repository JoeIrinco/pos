<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StorePurchaseOrder;
use App\StoreOrder;
use App\TransactionHistory;
use App\Atc;

class StoreArController extends Controller
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

    public function index()
    {
        return view('store.ar');
    }
    public function index2($transaction_id)
    {
        /* $store_orders=DB::table('store_orders')->where('id',$id)->first();
        $getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$id)->first();
        $gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$id)->sum('total_payment');
        $transaction_histories=DB::table('transaction_histories')
        ->join('store_orders', 'store_orders.id','transaction_histories.transaction_id')
        ->select('transaction_histories.*','store_orders.*')
        ->where('store_orders.id','=',$id)
        ->get(); */
        $store_orders=DB::table('store_orders')->where('transaction_id',$transaction_id)->first();
        $getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->first();
        $gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$store_orders->transaction_id)->sum('total_payment');
        $transaction_histories=DB::table('transaction_histories')
        ->join('store_orders', 'store_orders.transaction_id','transaction_histories.transaction_id')
        ->select('transaction_histories.*','store_orders.*')
        ->where('store_orders.transaction_id','=',$store_orders->transaction_id)
        ->get();

        return view('store.ar-invoice', compact('store_orders','getpurchasenumber','transaction_histories','gettotalpayment'));

    }
    public function findAtc(Request $request){
        $data=Atc::select('atc')->where('id',$request->id)->first();//->take(100)->get();
         return response()->json($data);
     }

    public function atc(Request $request){

        $search = $request->search;
        $user = Auth::user();
        $branch = $user->branch;

        if($search == ''){

           $atcs = Atc::orderby('id','asc')->select('id','atc')->limit(20)->get();
        }else{
            $atcs =Atc::orderby('id','asc')->where(function ($query) use($search) {
                $query->where('atc', 'like', '%' . $search . '%');
              })
        ->get();

        }

        $response = array();
        foreach($atcs as $atc){
           $response[] = array(
                "id"=>$atc->id,
                "text"=>$atc->atc
           );
        }

        echo json_encode($response);
        exit;
     }

        //get datatable items
    public function storeGetAr(Request $request)
    {
        $columns = array(

            0 => 'id',
            1 => 'transaction_type',
            2 => 'invoice_no',
            3 => 'customer_name',
            4 => 'customer_address',
            5 => 'status',
            6 => 'total_orders',
            7 => 'balance',
            8 => 'encoder',
            9 => 'created_at',
            10 => 'terms',
            11 => 'terms_end',
            12 => 'action'

        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $totalitems = DB::table('store_orders')->get()->count();
         if($request->input('search.value')){

            $searchByUser = $request->input('search.value');
            $items = StoreOrder::select("*")->where('status', 'UNPAID')
            ->where(function($query) use ($searchByUser){
                   $query->where('transaction_id','LIKE',"%".$searchByUser."%")
                   ->orWhere('total_orders','LIKE',"%".$searchByUser."%")
                   ->orWhere('status','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_address','LIKE',"%".$searchByUser."%")
                   ->orWhere('created_at','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $items = DB::table('store_orders')
            ->where('status', 'UNPAID')
            ->orWhere('status', 'IN PROCESS')
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
                $balance = DB::table('transaction_histories')
                ->where('transaction_id', $item->transaction_id)
                ->sum('total_payment');
                
                $nestedData['id'] = $item->transaction_id;
                $nestedData['transaction_type'] = $item->transaction_type .'/'. $item->invoice_type;
                $nestedData['invoice_no'] = $item->invoice_no;
                $nestedData['customer_name'] = $item->customer_name;
                $nestedData['customer_address'] = $item->customer_address;
                $nestedData['status'] = $item->status;
                $nestedData['total_orders'] = number_format($item->final_total, 2, '.', ',');
                $nestedData['balance'] = number_format($item->final_total - $balance, 2, '.', ',');
                $nestedData['encoder'] = $item->encoder;
                $nestedData['created_at'] = $item->created_at;
                $nestedData['terms'] = $item->terms .'&nbsp'.'Days';
                $nestedData['terms_end'] = Carbon::now()->diffInDays(Carbon::parse($item->terms_end)).'&nbsp'.'Days';
                $nestedData['action'] = "<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a id='paid' class='dropdown-item update_btn' href='#' data-id='{$item->transaction_id}' ><i class='icon-paper-plane text-success pr-2'></i> Update Payment</a>
                            <a class='dropdown-item' href='return-replace/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> Return / Replace</a>
                            <a class='dropdown-item' href='ar-invoice/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                            <a class='dropdown-item' href='ar-invoice/{$item->transaction_id}'><i class='icon-close text-danger pr-2'></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>";;

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

    /* function processAr(Request $request)
    {
        $stat = DB::table('store_orders')->where('id', $request->id)->update(['status' => "PAID"]);
        return response()->json($stat);

    } */
    public function getTransationByid($transactionid)
    {
       /* return $transactionid; */
       $client=StoreOrder::select('id','transaction_id','customer_name','transaction_type','invoice_no','invoice_type','balance','final_total','atc1','atc2','tin')->where('transaction_id',$transactionid)->get();//->take(100)->get();
       $payment = TransactionHistory::where('transaction_id',$transactionid)->sum('total_payment');
       /* return $payment; */
       return response()->json(['client'=>$client,'payment'=>$payment]);
    }

    public function updatePayment(Request $request)
    {
         /* return $request; */
        $auth_id =Auth::id();
        $auth_user = Auth::user()->name;
        
        $getInvoiceAmount = StoreOrder::where('invoice_no',$request->display_invoice_no)->first();
        
        /* if($request->other_payment_or_no == ''){

            $arr = array('message' => 'err', 'title' => 'O.R No. is required!');
            return $arr;

        }
        $count = TransactionHistory::where('or_no',$request->other_payment_or_no)->count();

        if($count >= 1){

            $arr = array('message' => 'err', 'title' => 'O.R No. Already exist!');
            return $arr;

        } */

        if($request->other_payment_date == ''){

            $arr = array('message' => 'err', 'title' => 'O.R date is required!');
            return $arr;

        }


        if($request->display_invoice_type == "GOVERNMENT"){
            if($request->atcSelect1 != "" && $request->atcSelect2 != "" && $request->tin != ""){

                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1  ,'atc2' => $request->atcSelect2, 'status_documents' => 'COMPLETE']);

            }else{
                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1  ,'atc2' => $request->atcSelect2, 'status_documents' => 'PENDING']);
            }

        }

        if($request->display_invoice_type == "PRIVATE"){

            if($request->atcSelect1 != "" && $request->tin != ""){

                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1, 'status_documents' => 'COMPLETE']);

            }else{
                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1, 'status_documents' => 'PENDING']);
            }

        }

        if($request->input_amount > $request->display_balance ){
            $arr = array('message' => 'err', 'title' => 'Invalid amount');
            return $arr;
        }
        if($request->input_payment_method == null){

            $arr = array('message' => 'err', 'title' => 'Please select payment type');
            return $arr;

        }

        /* if($request->display_invoice_type == "REGULAR" || $request->display_invoice_type == "SENIOR" || $request->display_invoice_type == "PWD"){ */

            if($request->input_payment_method == "CASH"){

                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "CHECK"){

                if($request->input_check_number == null){

                    $arr = array('message' => 'err', 'title' => 'Check number is required!');
                    return $arr;

                }
                if($request->input_bank == null){

                    if($request->input_bank == null){

                        if($request->input_other_bank == null){

                            $arr = array('message' => 'err', 'title' => 'Bank is required!');
                            return $arr;

                        }

                    }

                }
                if($request->input_check_date == null){

                    $arr = array('message' => 'err', 'title' => 'Check date is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "CARD"){

                if($request->input_bank == null){

                    if($request->input_bank == null){

                        if($request->input_other_bank == null){

                            $arr = array('message' => 'err', 'title' => 'Bank is required!');
                            return $arr;

                        }

                    }

                }
                if($request->input_account_name == null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "GCASH"){

                if($request->input_ref == null){

                    $arr = array('message' => 'err', 'title' => 'Reference no. is required!');
                    return $arr;

                }
                if($request->input_account_name == null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "PAYMAYA"){

                if($request->input_ref == null){

                    $arr = array('message' => 'err', 'title' => 'Reference no. is required!');
                    return $arr;

                }
                if($request->input_account_name == null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "DEPOSIT"){

                if($request->input_bank == null){

                    if($request->input_bank == null){

                        if($request->input_other_bank == null){

                            $arr = array('message' => 'err', 'title' => 'Bank is required!');
                            return $arr;

                        }

                    }

                }
                if($request->input_ref == null){

                    $arr = array('message' => 'err', 'title' => 'Reference no. is required!');
                    return $arr;

                }
                if($request->input_account_name == null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            if($request->input_payment_method == "ONLINE BANK TRANSFER"){

                if($request->input_bank == null){

                    if($request->input_bank == null){

                        if($request->input_other_bank == null){

                            $arr = array('message' => 'err', 'title' => 'Bank is required!');
                            return $arr;

                        }

                    }

                }
                if($request->input_ref == null){

                    $arr = array('message' => 'err', 'title' => 'Reference no. is required!');
                    return $arr;

                }
                if($request->input_account_name == null){

                    $arr = array('message' => 'err', 'title' => 'Account name is required!');
                    return $arr;

                }
                if($request->input_amount == null){

                    $arr = array('message' => 'err', 'title' => 'Amount is required!');
                    return $arr;

                }

            }
            $auth_user = Auth::user()->name;
            $transaction = new TransactionHistory();


            $transaction->transaction_id = $request->transaction_id;
            $transaction->date_of_invoice = $getInvoiceAmount->date;
            $transaction->invoice_amount = $getInvoiceAmount->final_total;
            $transaction->invoice_no = $request->display_invoice_no;
            $transaction->customer_name = $request->display_client_name;
            $transaction->total_payment = $request->input_amount;
            $transaction->encoder = $auth_user;
            $transaction->transaction_type  = $request->display_transaction;
            $transaction->payment_type = $request->input_payment_method;
            $transaction->check_number = $request->input_check_number;
            $transaction->bank = $request->input_bank;
            $transaction->check_date = $request->input_check_date;
            $transaction->ref_no = $request->input_ref;
            $transaction->account_name = $request->input_account_name;
            $transaction->amount = $request->input_amount;
            $transaction->or_no = $request->other_payment_or_no;
            $transaction->other_payment = $request->other_payment_other_payment;
            $transaction->date = $request->other_payment_date;
            $transaction->other_payment_description = $request->other_payment_description;
            $transaction->remarks = $request->remarks;
            if($transaction->save()){

                 $getInfo = StoreOrder::where('invoice_no',$request->display_invoice_no)
                        ->where('invoice_type',$request->display_invoice_type)
                        ->first();

                $insertToOrders = new StoreOrder();

                $now = Carbon::now();

                //put transaction id after save
                /*$invID = str_pad($Order->id, 4, '0', STR_PAD_LEFT);
                DB::table('store_orders')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));*/

                if($request->display_invoice_type == "REGULAR"){

                    $amount = $request->input_amount;
                    $vat = $amount / 1.12;
                    $net_of_vat = $vat * 0.12;

                    $insertToOrders->vat = $vat;
                    $insertToOrders->net_of_vat = $net_of_vat;
                    DB::table('transaction_histories')
                        ->where('or_no',$request->other_payment_or_no)
                        ->update(array('ewt' => 'N/A'));

                }
                if($request->display_invoice_type == "SENIOR" || $request->display_invoice_type == "PWD"){

                    $amount = $request->input_amount;
                    $vat_exempt_sales = $amount / 1.12;
                    $discount = $vat_exempt_sales * 0.20;
                    $total_amount_due = $vat_exempt_sales - $discount;

                    $insertToOrders->vat_exempt = $vat_exempt_sales;
                    $insertToOrders->discount = $discount;


                }
                if($request->display_invoice_type == "GOVERNMENT"){

                    $amount = $request->input_amount;
                    $gov_vat = $amount / 1.12;
                    $vat = $gov_vat * 0.12;
                    $gov_ewt = $amount * 0.06;
                    $ewt = $gov_ewt / 1.12;

                    $insertToOrders->vat = $vat;
                    $insertToOrders->ewt = $ewt;

                    if($request->tin == 'N/A'){

                        $insertToOrders->vat = 0;
                        $insertToOrders->ewt = 0;

                    }else{
                        $insertToOrders->vat = $vat;
                        $insertToOrders->ewt = $ewt;

                        DB::table('transaction_histories')
                            ->where('or_no',$request->other_payment_or_no)
                            ->update(array('ewt' => $ewt));
                    }





                }
                if($request->display_invoice_type == "PRIVATE"){

                    $amount = $request->input_amount;
                    $gov_vat = $amount / 1.12;
                    $vat = $gov_vat * 0.12;
                    $gov_ewt = $amount * 0.01;
                    $ewt = $gov_ewt / 1.12;

                    $insertToOrders->vat = $vat;
                    $insertToOrders->ewt = $ewt;

                    if($request->tin == 'N/A'){

                        $insertToOrders->vat = 0;
                        $insertToOrders->ewt = 0;

                    }else{

                        $insertToOrders->vat = $vat;
                        $insertToOrders->ewt = $ewt;

                        DB::table('transaction_histories')
                            ->where('or_no',$request->other_payment_or_no)
                            ->update(array('ewt' => $ewt));

                    }



                }

                $insertToOrders->date = $request->other_payment_date;
                $insertToOrders->invoice_no = $request->other_payment_or_no;
                $insertToOrders->customer_name = $request->display_client_name;
                $insertToOrders->final_total = $request->input_amount;
                $insertToOrders->transaction_type = "O.R";
                $insertToOrders->payment = $request->input_payment_method;
                $insertToOrders->payment_status = $request->input_payment_status;
                $insertToOrders->total_orders = $request->input_amount;
                $insertToOrders->reference_no = $request->input_ref;
                
                /*$insertToOrders->vat = ;
                $insertToOrders->net_of_vat = ;
                $insertToOrders->ewt = ;
                $insertToOrders->vat_exempt = ;
                $insertToOrders->discount = ;*/
                
                $insertToOrders->invoice_type = $request->display_invoice_type;
                $insertToOrders->customer_address = $getInfo->customer_address;
                $insertToOrders->remarks = $request->payment_remarks;
                
                $insertToOrders->save();

                if($insertToOrders->save()){
                    
                    $invID = str_pad($insertToOrders->id, 4, '0', STR_PAD_LEFT);
                    DB::table('store_orders')->orderBy('id', 'DESC')
                    ->limit(1)
                    ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));

                }
                //this code is for paid update when balance = 0
                $total = $request->display_balance - $request->input_amount;

                if($total == 0){

                    DB::table('store_orders')
                    ->where('transaction_id', $request->transaction_id)
                    ->limit(1)
                    ->update(['status' => 'PAID']);

                }

                $arr = array('message' => '', 'title' => 'Transaction Complete!');
                return $arr;

            }


         if($transaction->save()){

            /* so clean so good
            DB::table('store_orders')
            ->where('id',$request->id)
            ->update(['balance' => DB::raw('balance -' .$request->input_amount)]); */

        }else{
            return 'err';
        }
    }
}
