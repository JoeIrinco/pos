<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use App\Exports\CashReceiptsJournalExport;
use App\Exports\CashDisbursementJournalExport;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StoreOrder;
use App\ReportDate;
use App\StoreProductList;
use Illuminate\Support\Collection;
use \stdClass;


class ExportExcelController extends Controller
{

    function index(){
        
        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("general_report",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }
        return Excel::download(new ReportExport, 'SalesJournal.xlsx');

    }

    function CashReceiptsJournalExport(){
        
        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("general_report",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

        return Excel::download(new CashReceiptsJournalExport, 'CashReceiptsJournalExport.xlsx');

    }
    function CashDisbursementJournalExport(){

        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("general_report",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

        return Excel::download(new CashDisbursementJournalExport, 'CashDisbursementJournalExport.xlsx');

    }
    function updateDateFrom(Request $request)
    {

        $auth_id =Auth::id();
        $Order = new ReportDate();
        $Order->id= $auth_id;
        $Order->date_from= $request->from;
        $Order->date_to= $request->to;
        $Order->save();

    }

}
