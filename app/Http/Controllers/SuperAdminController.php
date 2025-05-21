<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$date = date('Y/m/d');*/

        $date = Carbon::now();

        $today_transaction = DB::table('store_orders')
                    ->where('status','!=','DELETED')
                    ->whereDate('date',$date)
                    ->count();

        //senior not added only get the paid amount not the total sales to be check
        $today_sell_regTrans = DB::table('store_orders')
                    ->where('invoice_type','REGULAR')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('final_total');
        $today_sell_notRegTrans = DB::table('store_orders')
            ->where('invoice_type','!=','REGULAR')
            ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
            ->sum('total_orders');

        $today_sell = $today_sell_regTrans + $today_sell_notRegTrans;

        $today_cash = DB::table('transaction_histories')
                    ->where('payment_type', 'CASH')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_card_debit = DB::table('transaction_histories')
                    ->where('payment_type', 'CARD')
                    ->where('payment_status', 'DEBIT')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_card_credit = DB::table('transaction_histories')
                    ->where('payment_type', 'CARD')
                    ->where('payment_status', 'CREDIT')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_check = DB::table('transaction_histories')
                    ->where('payment_type', 'CHECK')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_gcash = DB::table('transaction_histories')
                    ->where('payment_type', 'GCASH')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_paymaya = DB::table('transaction_histories')
                    ->where('payment_type', 'PAYMAYA')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

        $today_unpaid = DB::table('store_orders')
                    ->where('payment', 'UNPAID')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('final_total');

        $today_online = DB::table('transaction_histories')
                    ->where('payment_type', 'DEPOSIT')
                    ->orWhere('payment_type', 'ONLINE BANK TRANSFER')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->sum('total_payment');

         $items = DB::table('store_orders')
                    ->where('status', 'UNPAID')
                    ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
                    ->get();

        $nestedData = [];

            foreach ($items as $item)
            {

                $balance = DB::table('transaction_histories')
                    ->where('transaction_id', $item->transaction_id)
                    ->sum('total_payment');
                $nestedData[] = $item->final_total - $balance;

            }

            array_push( $nestedData);
            $collection=(array_sum($nestedData));


        return view('superadmin.super-admin-dashboard',compact('today_sell',
            'today_transaction',
            'today_cash',
            'today_card_debit',
            'today_card_credit',
            'today_check',
            'today_unpaid',
            'today_gcash',
            'today_paymaya',
            'today_online',
            'collection'));
    }


    public function salesStat(Request $request)
    {
        /* $month_number = date('m');
        $current_year = date('Y');
        $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month_number , $current_year);
        $result = array();

        for($i=1;$i<=$number_of_days;$i++ ){
        $date =$current_year.'-'.$month_number.'-'.$i;
        $count_perday= DB::table('store_orders')->where('date',$date)->sum('total');
        $result[]= array('Day '.$i);
        $result2[]= array($count_perday);

        }

        return response()->json(compact('result','result2')); */
    }
    function updateDashboard(Request $request)
    {
        //return $request;

        //$date = date('Y/m/d'); //replace by $request->date

        $date = date($request->dt);

        //count of daily transaction
        $todaytransaction = DB::table('store_orders')
        ->whereDate('date',$date)
        ->where('status','!=','DELETED')
        ->count();
        
        //count total sales per day
        $today_sell_regTrans = DB::table('store_orders')
            ->where('invoice_type','REGULAR')
            ->whereDate('date',$date)
            ->sum('final_total');
        $today_sell_notRegTrans = DB::table('store_orders')
            ->where('invoice_type','!=','REGULAR')
            ->whereDate('date',$date)
            ->sum('total_orders');
        $todaysell = $today_sell_regTrans + $today_sell_notRegTrans;

        //total cash per day
        $todaycash = DB::table('transaction_histories')
            ->where('payment_type', 'CASH')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of daily card/debit
        $todaycarddebit = DB::table('transaction_histories')
            ->where('payment_type', 'CARD')
            ->where('payment_status', 'DEBIT')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of daily card/debit
        $todaycardcredit = DB::table('transaction_histories')
            ->where('payment_type', 'CARD')
            ->where('payment_status', 'CREDIT')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of daily check
        $todaycheck = DB::table('transaction_histories')
            ->where('payment_type', 'CHECK')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of daily gcash
        $gcash = DB::table('transaction_histories')
            ->where('payment_type', 'GCASH')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of daily paymaya
        $paymaya = DB::table('transaction_histories')
            ->where('payment_type', 'PAYMAYA')
            ->whereDate('date',$date)
            ->sum('total_payment');

        //total of online transfer
        $onlinetransfer = DB::table('transaction_histories')
            ->where('payment_type', 'DEPOSIT')
            ->orWhere('payment_type', 'ONLINE BANK TRANSFER')
            ->whereDate('date',$date)
            ->sum('total_payment');


        $items = DB::table('store_orders')
            ->where('status', 'UNPAID')
            ->whereDate('date',$date)
            ->get();

        $nestedData = [];

        foreach ($items as $item)
        {
            $balance = DB::table('transaction_histories')
                ->where('transaction_id', $item->transaction_id)
                ->sum('total_payment');
            $nestedData[] = $item->final_total - $balance;

        }

        array_push( $nestedData);
        $collection=(array_sum($nestedData));


//        $unpaid = DB::table('store_orders')
//            ->where('payment', 'UNPAID')
//            ->where('date',$date)
//            ->sum('final_total');

        return response()->json(['today_transaction'=> $todaytransaction,
                                 'today_sell'=> $todaysell,
                                 'today_cash'=> $todaycash,
                                 'today_card_debit'=> $todaycarddebit,
                                 'today_card_credit'=> $todaycardcredit,
                                 'today_check'=> $todaycheck,
                                 'today_gcash'=>$gcash,
                                 'today_paymaya'=>$paymaya,
                                 'today_onlinetransfer'=>$onlinetransfer,
                                 '$collection'=>$collection
                                ],200);

        /*$date = date('Y/m/d');

        $items = DB::table('store_orders')
            ->where('status', 'UNPAID')
            ->where('created_at','>=',Carbon::today()->toDateString())
            ->get();

        $myArr = [];

        foreach ($items as $item)
        {
            $balance = DB::table('transaction_histories')
                ->where('transaction_id', $item->transaction_id)
                ->sum('total_payment');
            $nestedData[] = $item->final_total - $balance;

        }

        array_push( $nestedData);
        $collection=(array_sum($nestedData));*/
    }


}
