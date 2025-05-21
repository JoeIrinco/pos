<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StorePurchaseOrder;
use App\JournalEntry;
use App\TransactionHistory;
use App\Atc;

class JournalEntryController extends Controller
{
    public function index()
    {
        $gl_accounts=DB::table('chart_of_accounts')
            ->select('gl_account_code','gl_transaction_level')
            ->where('gl_transaction_level','!=','0')
            ->get();

        return view('store.journal-entry',compact('gl_accounts'));
    }

    public function journalEntry(Request $request){

        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("journal_entry",'=',0)->count();

        if($verify >= 1){
            
            $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
            return $arr;

        }

        if($request->cardDate == null){
            $arr = array('message' => 'err', 'title' => 'Date is required!');
            return $arr;
        }
        if($request->cardNo == null){
            $arr = array('message' => 'err', 'title' => 'Voucher Number is required!');
            return $arr;
        }
        if($request->glAccount == null){
            $arr = array('message' => 'err', 'title' => 'GL Account is required!');
            return $arr;
        }
        if($request->description == null){
            $arr = array('message' => 'err', 'title' => 'Description is required!');
            return $arr;
        }
        if($request->amount == null){
            $arr = array('message' => 'err', 'title' => 'Amount is required!');
            return $arr;
        }
        if($request->modeOfPayment == null){
            $arr = array('message' => 'err', 'title' => 'Mode of payment is required!');
            return $arr;
        }
        if($request->modeOfPayment == 'CHECK'){
            if($request->account_name == null){
                $arr = array('message' => 'err', 'title' => 'Account name is required!');
                return $arr;
            }
            if($request->check_no = null){
                $arr = array('message' => 'err', 'title' => 'Check no. is required!');
                return $arr;
            }
        }
        if($request->modeOfPayment == 'ONLINE PAYMENT'){
            if($request->bankName == null){
                $arr = array('message' => 'err', 'title' => 'Bank name is required!');
                return $arr;
            }
        }

        $charts = DB::table('chart_of_accounts')
        ->where("gl_account_code",$request->glAccount)->first();

        $Journal = new JournalEntry();
        $Journal->user_id = $auth_id;
        $Journal->user_name = $auth_user;
        $Journal->date = $request->cardDate;
        $Journal->voucher_no = $request->cardNo;
        $Journal->ref_no = $request->cardRefNo;
        $Journal->ref_no_date = $request->cardRefNoDate;
        $Journal->vendor = $request->vendor;
        $Journal->gl_account_code = $request->glAccount;
        $Journal->gl_account_description = $charts->gl_transaction_level;
        $Journal->description = $request->description;
        $Journal->amount = $request->amount;
        $Journal->payment_method = $request->modeOfPayment;
        $Journal->bank_name = $request->bankName;
        $Journal->receive_by = $request->receiveBy;
        $Journal->address = $request->address;
        $Journal->remarks = $request->remarks;
        $Journal->account_name = $request->account_name;
        $Journal->check_no = $request->check_no;
        $Journal->payment_ref_no = $request->payment_ref_no;
        $Journal->save();

        $arr = array('message' => '', 'title' => 'Saved!');
        return $arr;

    }
    
}
