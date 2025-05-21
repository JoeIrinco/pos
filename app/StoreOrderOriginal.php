<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use SebastianBergmann\Environment\Console;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoreOrder extends Model
{
    protected $fillable=[
                            'invoice_no',
                            'transaction_id',
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
                        ];

    public static function getReport(){

        $auth_id =Auth::id();
        $dt=DB::table('report_dates')->where('id',$auth_id)
            ->latest()
            ->first();

        $from = $dt->date_from;
        $to = $dt->date_to;

        //time will be replace by zero rated
        $items=DB::table('store_orders')
            ->select('date','invoice_no','customer_name',
                     'final_total','vat','net_of_vat','ewt',
                     'vat_exempt','time','discount','invoice_type','customer_address','id_no','remarks')
            ->whereBetween('date', [$from, $to])
            ->get()->toArray();

        return $items;

    }

    public static function getSalesJournal(){

        $auth_id =Auth::id();
        $dt=DB::table('report_dates')->where('id',$auth_id)
            ->latest()
            ->first();

        $from = $dt->date_from;
        $to = $dt->date_to;

        
        $items=DB::table('store_orders')
            ->select('date','invoice_no','customer_name',
                    'total_orders','vat','net_of_vat',/* 'ewt', */
                    'vat_exempt','time','discount',
                    'invoice_type','customer_address','id_no',
                    'remarks')->where(
                        function($query) {
                            return $query
                            ->where('status','!=','DELETED')
                            /* ->where('status','!=','CANCELLED') */
                            ->where('transaction_type','!=','O.R');
                        })
            ->whereBetween('date', [$from, $to])
            ->orderBy('date','ASC')
            ->get()
            ->toArray();

        return $items;

    }
    public static function getCashReceiptsJournal(){

        //legit code
        $auth_id =Auth::id();
        $dt=DB::table('report_dates')->where('id',$auth_id)
            ->latest()
            ->first();

        $from = $dt->date_from;
        $to = $dt->date_to;

        $contents=DB::table('transaction_histories')
        ->select('transaction_id as transaction_id','date as date','or_no as or_no','customer_name as customer_name',
                'invoice_no as invoice_no','total_payment as total_payment','ewt as ewt','other_payment',
                'other_payment_description','payment_type as payment_type','bank as bank',
                'check_number as check_number','check_date as check_date','submitted_2307',
                'invoice_amount as invoice_amount','date_of_invoice as date_of_invoice','remarks as remarks')
                ->where(
                    function($query) {
                        return $query
                        ->where('status','!=','DELETED')
                        ->where('status','!=','CANCELLED')
                        ->where('payment_type','!=','UNPAID');
                    })->whereBetween('date', [$from, $to])
                    ->orderBy('date','ASC')
                    ->get();

        $odata = [];
        $odata_final = [];
    
        foreach ($contents as $content) {
            
                $oinfo = [];
                $getOtherInfos=DB::table('store_orders')
                ->select('ewt as ewt', 'transaction_type as transaction_type')
                ->where('transaction_id',$content->transaction_id)
                ->get()->toArray();
                foreach ($getOtherInfos as $getOtherInfo) {
                    $oinfo['ewt'] = $getOtherInfo->ewt;
                    $oinfo['transaction_type'] = $getOtherInfo->transaction_type;
                }

                $odata['date'] = $content->date;
                $odata['or_no'] = $content->or_no;
                $odata['customer_name'] = $content->customer_name;
                $odata['invoice_no'] = "PAYMENT FOR".' '.$getOtherInfo->transaction_type.' '.$content->invoice_no;
                $odata['total_payment'] = $content->total_payment;
                $odata['ewt'] = $getOtherInfo->ewt /* $oinfo['ewt'] */;
                $odata['date1'] = "";
                $odata['date2'] = "";
                $odata['date3'] = "";
                $odata['date4'] = "";
                if ($content->payment_type == "CASH"){
                    $odata['cash'] = $content->total_payment;
                    $odata['check'] = '';
                    $odata['card'] = '';
                    $odata['gcash'] = '';
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "CHECK"){
                    $odata['cash'] = '';
                    $odata['check'] = $content->total_payment;
                    $odata['card'] = '';
                    $odata['gcash'] = '';
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "CARD"){
                    $odata['cash'] = '';
                    $odata['check'] = '';
                    $odata['card'] = $content->total_payment;
                    $odata['gcash'] = '';
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "GCASH"){
                    $odata['cash'] = '';
                    $odata['check'] = '';
                    $odata['card'] = '';
                    $odata['gcash'] = $content->total_payment;
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "DEPOSIT"){
                    $odata['cash'] = '';
                    $odata['check'] = '';
                    $odata['card'] = '';
                    $odata['gcash'] = '';
                    $odata['deposit'] = $content->total_payment;
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "ONLINE BANK TRANSFER"){
                    $odata['cash'] = '';
                    $odata['check'] = '';
                    $odata['card'] = '';
                    $odata['gcash'] = '';
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = $content->total_payment;
                    $odata['paymaya'] = '';
                }
                if ($content->payment_type == "PAYMAYA"){
                    $odata['cash'] = '';
                    $odata['check'] = '';
                    $odata['card'] = '';
                    $odata['gcash'] = '';
                    $odata['deposit'] = '';
                    $odata['online bank transfer'] = '';
                    $odata['paymaya'] = $content->total_payment;
                }
                $odata['bank'] = $content->bank;
                $odata['check_number'] = $content->check_number;
                $odata['check_date'] = $content->check_date;
                $odata['date5'] = "";
                $odata['date_of_invoice'] = $content->date_of_invoice;
                $odata['invoice_amount'] = $content->invoice_amount;
                $odata['remarks'] = $content->remarks;
                
                array_push($odata_final,$odata);

        }

        return collect($odata_final,$odata);


    }
}
