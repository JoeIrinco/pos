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

class DrController extends Controller
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
        //return view('store.ar');
    }
    public function index2($transaction_id)
    {
        $store_orders=DB::table('store_orders')->where('transaction_type','DELIVERY RECIEPT')->where('transaction_id',$transaction_id)->first();
        if($store_orders != ''){

            $getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->first();
            $gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->sum('total_payment');
            $store_items=DB::table('store_items')
            ->join('store_orders', 'store_orders.transaction_id','store_items.transaction_id')
            ->select('store_items.*','store_orders.*')
            ->where('store_orders.transaction_id','=',$transaction_id)
            ->get();

            return view('store.dr', compact('store_orders','store_items','getpurchasenumber','gettotalpayment'));
        }

        else{
            abort(404);
        }
    }
    public function drPrintPDF($id)
    {

        //$orders=\DB::table('orders')->where('id',$id)->first();
        $store_orders=DB::table('store_orders')->where('transaction_type','DELIVERY RECIEPT')->where('id',$id)->first();

        $getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$id)->first();
        $gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$id)->sum('amount');
        $store_items=DB::table('store_items')
        ->join('store_orders', 'store_orders.id','store_items.orders_id')
        ->select('store_items.*','store_orders.*')
        ->where('store_orders.id','=',$id)
        ->get();
        $pdf = \PDF::loadView('store.dr', compact('store_items','store_orders','getpurchasenumber','gettotalpayment'));

        //return $pdf->download($getpurchasenumber->$id."-".$store_orders->customer_name.".pdf");

    }

}
