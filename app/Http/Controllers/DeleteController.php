<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Item;
use App\ProductList;
use App\StoreProductList;
use App\StoreItem;
use App\TransactionItem;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    
    function delete(Request $request)
    {
        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("void",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

        DB::table('store_items')
        ->where('transaction_id', $request->id)
        ->update(array('status' => 'DELETED'));

        DB::table('store_orders')
        ->where('transaction_id', $request->id)   // find item using orders id
        ->orWhere('cancelled_id',$request->id)
        ->update(array('status' => 'DELETED'));

        DB::table('transaction_histories')
        ->where('transaction_id', $request->id)  // find item using orders id
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('status' => 'DELETED'));

        
        
        if($request->status != 'CANCELLED'){

            $contents = StoreItem::where('transaction_id', $request->id)->get();

            $trId = DB::table('store_orders')->where('transaction_id',$request->id)->first();

            foreach ($contents as $content) {

                $transaction_item = new TransactionItem();
                $transaction_item->user_id = $content->user_id;
                $transaction_item->invoice_num = $trId->invoice_no;
                $transaction_item->product_id = $content->product_id;
                $transaction_item->cancelled_id = $request->id;
                $transaction_item->transaction_type = 'DELETED';
                $transaction_item->quantity = $content->quantity;
                $transaction_item->lot_no = $content->lot_no;
                $transaction_item->shelf = $content->shelf;
                $transaction_item->rock = $content->rock;
                $transaction_item->location_address = 'STORE';
                $transaction_item->expiration_date = $content->expiration_date;
                $transaction_item->save();
    
            }
        }
        

        DB::table('transaction_items')
        ->where('transaction_id', $request->id)
        ->update(array('status' => 1));

        $arr = array('message' => 'success', 'title' => 'Data Deleted Successfully');
        return $arr;
    }

    function del_replacement(Request $request)
    {
        //return $request->id;
         $item_info = DB::table('store_items')->where('id', $request->id)->first();
        /* return $item_info->transaction_id; */

        $item_del = DB::table('store_replaced_items')
        ->where('replacement_slip_no',null)
        ->where('transaction_id', $item_info->transaction_id)
        ->count();

            if($item_del == 0){
                    
                $item_update = DB::table('store_items')
                ->where('id', $request->id)
                ->update(array('return_replace' => null));
                
            }else{

                $item_del = DB::table('store_replaced_items')
                ->where('replacement_slip_no',null)
                ->where('transaction_id', $item_info->transaction_id)
                ->where('replaced_product_id',$request->id)
                ->delete();

                $item_update = DB::table('store_items')
                ->where('id', $request->id)
                ->update(array('return_replace' => null));
                
                $arr = array('message' => '', 'title' => 'Data Deleted Successfully');
                return $arr;
            }


        /* DB::table('store_replaced_items')->where('id', $request->id)->delete(); */
    }
    function del_sub_replacement(Request $request)
    {
        $del = DB::table('store_replaced_items')
        ->where('id', $request->id)->delete();

        if($del = 1){
            $arr = array('message' => '', 'title' => 'Data Deleted Successfully');
            return $arr;
        }else{
            $arr = array('message' => '', 'title' => 'error');
            return $arr;
        }
        
    }
}
