<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExportMonthly;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StoreOrder;
use App\ReportDate;

class ExportExcelControllerMonthly extends Controller
{
    //
    function index(){

        return Excel::download(new ReportExportMonthly, 'monthly-report.xlsx');

    }

    function updateDateFrom(Request $request)
    {
        //return $request;
        
        /* $auth_id =Auth::id();
        $items = ReportDate::find($auth_id);
        
        $items->date_from = date($request->from);
        $items->save(); */

        $auth_id =Auth::id();
        $Order = new ReportDate();
        $Order->id= $auth_id;
        $Order->date_from= $request->from;
        $Order->date_to= $request->to;
        $Order->save();
        
    }
}
