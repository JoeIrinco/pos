<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LineChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $now = Carbon::now();
        $month_number = date('m');
        $current_year = date('Y');
        $number_of_days = $now->daysInMonth;
        $monthName = $now->format('F');
        $labels = [];
        $count = [];
        $countprofit = [];


        for($i=1;$i<=$number_of_days;$i++ ){
        $date =$current_year.'-'.$month_number.'-'.$i;
        /*$count_perday= DB::table('transaction_histories')->where('date',$date)->sum('total_payment');*/

        $today_sell_regTrans = DB::table('store_orders')
            ->where('invoice_type','REGULAR')
            ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
            ->sum('final_total');
        $today_sell_notRegTrans = DB::table('store_orders')
            ->where('invoice_type','!=','REGULAR')
            ->whereDate('date',$date/*Carbon::today()->toDateString()*/)
            ->sum('total_orders');

        $today_sell = $today_sell_regTrans + $today_sell_notRegTrans;

        array_push($labels,$monthName.' '.$i.', '.$current_year);
        array_push($count,/*$count_perday*/$today_sell);
        array_push($countprofit,/*$count_perday*/ $today_sell * 0.40);
        /* array_push($countprofit,$count_perday - 200000); */
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Total Profit',$countprofit/* profit */)
            ->dataset('Total Sales',$count);
    }
}
