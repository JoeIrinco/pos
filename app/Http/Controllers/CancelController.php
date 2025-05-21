<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StoreItem;
use App\Order;
use App\StoreOrder;
use App\TransactionItem;
use App\TransactionHistory;
use App\Item;
use App\ProductList;
use App\StoreProductList;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CancelController extends Controller
{
    
    function cancel(Request $request)
    {   
        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("cancelled",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

        $getAllStoreOrder = StoreOrder::all();
        $postStoreOrder = StoreOrder::where('transaction_id', $request->id)->get();
        
        DB::table('store_orders')
        ->where('transaction_id',$request->id)
        ->update(array('status' => 'CANCELLED'));
        
        //code for reports replection
        foreach($postStoreOrder as $storeDatas){

            $findStoreOrder = StoreOrder::find($storeDatas->id);
            $newPost = $findStoreOrder->replicate();
            $newPost->cancelled_id =  $request->id;
            $newPost->status = 'CANCELLED';
            $newPost->transaction_id = '';
            $newPost->date = $request->cancel_date;
            $newPost->total_orders = $storeDatas->total_orders * -1;
            $newPost->vat = $storeDatas->vat * -1;
            $newPost->net_of_vat = $storeDatas->net_of_vat * -1;
            $newPost->vat_exempt = $storeDatas->vat_exempt * -1;
            $newPost->discount = $storeDatas->discount * -1;
            $newPost->save();

        }

        $contents = StoreItem::where('transaction_id', $request->id)->get();

        $trId = DB::table('store_orders')->where('transaction_id',$request->id)->first();
        

        foreach ($contents as $content) {

            $transaction_item = new TransactionItem();
            $transaction_item->user_id = $content->user_id;
            $transaction_item->invoice_num = $trId->invoice_no;
            $transaction_item->product_id = $content->product_id;
            $transaction_item->cancelled_id = $request->id;
            $transaction_item->transaction_type = 'CANCELLED';
            $transaction_item->quantity = $content->quantity;
            $transaction_item->lot_no = $content->lot_no;
            $transaction_item->shelf = $content->shelf;
            $transaction_item->rock = $content->rock;
            $transaction_item->location_address = 'STORE';
            $transaction_item->expiration_date = $content->expiration_date;
            $transaction_item->save();

        }

        
        $transHistory = TransactionHistory::where('transaction_id', $request->id)->get();
        
        DB::table('transaction_histories')
        ->where('transaction_id',$request->id)
        ->update(array('status' => 'CANCELLED'));
        
        foreach($transHistory as $transHistories){

            $data = TransactionHistory::find($transHistories->id);
            $newPost = $data->replicate();
            $newPost->transaction_id = '';
            $newPost->cancelled_id = $transHistories->transaction_id;
            $newPost->status = 'CANCELLED';
            $newPost->date = $request->cancel_date; //to be edit and fill by user
            $newPost->total_payment = $storeDatas->net_of_vat * -1;
            $newPost->ewt = $storeDatas->vat_exempt * -1;
            $newPost->save();

        }

        
        $arr = array('message' => '', 'title' => 'Data Deleted Successfully');
        return $arr;

    }
}
