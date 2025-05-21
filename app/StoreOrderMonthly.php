<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use SebastianBergmann\Environment\Console;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoreOrderMonthly extends Model
{
    /* protected $fillable=[
                            'invoice_no',
                            'created_at',
                            'customer_name',
                            'customer_address',
                            'transaction_type',
                            'check_no',
                            'check_date',
                            'date',
                            'id_no',
                            'bank_name',
                            'ewt',
                            'vat_exempt',
                            'net_of_vat',
                            'vat',
                            'discount',
                            'total_orders',
                            'final_total'
                        ]; */

    public static function getMonthlyReport(/* Request $request */){

        //return $request;

        $auth_id =Auth::id();
        $dt=DB::table('report_dates')
        ->latest('id', $auth_id)
        ->first();

        $from = $dt->date_from;
        $to = $dt->date_to;
        
        $items=DB::table('store_orders')
        /* ->join('store_orders', 'store_orders.id','store_items.orders_id') */
        ->whereBetween('date', [$from, $to])
        ->select('transaction_type','invoice_no','created_at','customer_name','payment','final_total')
        ->get()->toArray();

        return $items;

    }                
}
