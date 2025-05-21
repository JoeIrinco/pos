<?php

namespace App\Http\Composers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use URL;
class UserComposer {

    public function Compose(View $view){

        $currentURL = URL::current();
    
        $disallowed = array("http://", "https://");
        foreach($disallowed as $d) {
           
           if(strpos($currentURL, $d) === 0) {            
            $currentURL= str_replace($d, '', $currentURL);
           }
           
        }
        $user_permissions = "";
    if(isset(Auth::user()->is_admin)){
    $accountType   = Auth::user()->is_admin;
    if( $accountType!= 1 && strpos($currentURL, "inventory")){
        
    $nowtmp = Carbon::now()->format('Y-m-d');
    $now= date('Y-m-d', strtotime("+6 months", strtotime($nowtmp)));
    $expiredCount= DB::table('transaction_items')
    ->join('store_purchase_orders', 'store_purchase_orders.po_no', '=', 'transaction_items.po_id')
    ->join('store_product_lists', 'store_product_lists.id', '=', 'transaction_items.product_id')
    ->select('*','transaction_items.created_at as receive_date','store_purchase_orders.created_at as order_date')
    ->where("transaction_items.transaction_type", "RECEIVE PO")
    ->orwhere("transaction_items.transaction_type", "MANUAL")
     ->orwhere("transaction_items.transaction_type", "IMPORT")
    ->whereDate('transaction_items.expiration_date','<=',$now)
    ->count();

        $criticalLevel=0;
        
       
   
       $poPendingCount =DB::table('store_purchase_orders')->where('Status','Pending')->count();
     
       if(isset(Auth::user()->id)){
           $auth_id = Auth::user()->id;
           $user_permissions = DB::table('user_permissions')->where('user_id', $auth_id)->first();
        }

    $view->with('expiredCount',$expiredCount);
    $view->with('criticalLevel',$criticalLevel);
    $view->with('poPendingCount',$poPendingCount);
  
    }
        if( $accountType== 1){
            if(isset(Auth::user()->id)){
                $auth_id = Auth::user()->id;
                $user_permissions = DB::table('pos_permissions')->where('user_id', $auth_id)->first();
             }
        }
       
        $view->with('user_permissions',$user_permissions);
    }
  
}
}
