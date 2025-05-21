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

class PendingDocumentsController extends Controller
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
        return view('store.pending-documents');
    }

    public function findAtc(Request $request){
        $data=Atc::select('atc')->where('id',$request->id)->first();//->take(100)->get();
         return response()->json($data);
     }



        //get datatable items
    public function getPendingDocuments(Request $request)
    {
        $columns = array(

            0 => 'id',
            1 => 'transaction_type',
            2 => 'invoice_no',
            3 => 'customer_name',
            4 => 'customer_address',
            5 => 'action'

        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $totalitems = DB::table('store_orders')->get()->count();
         if($request->input('search.value')){

            $searchByUser = $request->input('search.value');
            $items = StoreOrder::select("*")->where('status_documents', 'PENDING')
            ->where(function($query) use ($searchByUser){
                   $query->where('transaction_id','LIKE',"%".$searchByUser."%")
                   ->orWhere('invoice_type','LIKE',"%".$searchByUser."%")
                   ->orWhere('transaction_type','LIKE',"%".$searchByUser."%")
                   ->orWhere('invoice_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $items = DB::table('store_orders')
            ->where('status_documents', 'PENDING')
            ->where(function($query){
                $query->where('invoice_type','GOVERNMENT')
                ->orWhere('invoice_type','PRIVATE');
                 })->offset($start)
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
                $nestedData['action'] = "<button data-id='{$item->transaction_id}' class='update_btn fa fa-edit btn btn-xs btn-info' type='button'>&nbsp Update</button>";;
                /* <button id='update' data-id='{$item->transaction_id}' class='btn btn-sx btn-info' type='button'></button>
                <a id='paid' class='dropdown-item update_btn' href='#' data-id='{$item->transaction_id}' ><i class='fas fa fa-edit text-success pr-2'></i> Update Payment</a> */
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


    /* public function getTransationByid($transactionid)
    {

       $client=StoreOrder::select('id','transaction_id','customer_name','transaction_type','invoice_no','invoice_type','balance','final_total')->where('transaction_id',$transactionid)->get();//->take(100)->get();
       $payment = TransactionHistory::where('transaction_id',$transactionid)->sum('total_payment');

       return response()->json(['client'=>$client,'payment'=>$payment]);
    } */

    public function updateDocuments(Request $request)
    {
        /* return $request; */
        if($request->display_invoice_type == "GOVERNMENT"){
            if($request->atcSelect1 != "" && $request->atcSelect2 != "" && $request->tin != ""){

                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1  ,'atc2' => $request->atcSelect2, 'status_documents' => 'COMPLETE']);
                $arr = array('message' => '', 'title' => 'Update Complete!');
                return $arr;
            }else{
                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1  ,'atc2' => $request->atcSelect2, 'status_documents' => 'PENDING']);
                $arr = array('message' => '', 'title' => 'Update Complete!');
                return $arr;
            }

        }

        if($request->display_invoice_type == "PRIVATE"){

            if($request->atcSelect1 != "" && $request->tin != ""){

                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1, 'status_documents' => 'COMPLETE']);
                $arr = array('message' => '', 'title' => 'Update Complete!');
                return $arr;
            }else{
                DB::table('store_orders')
                ->where('transaction_id', $request->transaction_id)
                ->limit(1)
                ->update(['tin' => $request->tin, 'atc1' => $request->atcSelect1, 'status_documents' => 'PENDING']);
                $arr = array('message' => '', 'title' => 'Update Complete!');
                return $arr;
            }
        }

        else{
            return 'err';
        }

    }

}
