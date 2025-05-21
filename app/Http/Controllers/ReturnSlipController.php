<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnSlipController extends Controller
{

    public function index($transaction_id)
    {
        $store_orders=DB::table('store_orders')->where('transaction_type','RETURN SLIP')->where('transaction_id',$transaction_id)->first();
        if($store_orders != ''){

            /*$getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->first();
            $gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->sum('total_payment');*/
            $store_items=DB::table('store_items')
            ->join('store_orders', 'store_orders.transaction_id','store_items.transaction_id')
            ->select('store_items.*','store_orders.*')
            ->where('store_orders.transaction_type','RETURN SLIP')
            ->where('store_orders.transaction_id','=',$transaction_id)
            ->get();

            return view('store.rs', compact('store_orders','store_items'));
        }

        else{
            abort(404);
        }

    }

}
