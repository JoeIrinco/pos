<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StoreOrder;
use App\TransactionItem;
use App\TransactionHistory;

class StoreTransactionHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

    }

    public function index()
    {
        return view('store.transaction-history');
    }

        //get datatable items
    public function storeGetTransactionHistory(Request $request)
    {
        $columns = array(

            0 => 'id',
            1 => 'transaction_type',
            2 => 'invoice_no',
            3 => 'customer_name',
            4 => 'customer_address',
            5 => 'payment',
            6 => 'reference_no',
            7 => 'total_orders',
            8 => 'encoder',
            9 => 'created_at',
            10 => 'status',
            11 => 'action'

        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $totalitems = DB::table('store_orders')->get()->count();
         if($request->input('search.value')){

            //query is correct brb later

            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StoreOrder::select("*")/* ->where('user_id', $auth_id)
            ->where('orders_id',null) */
            ->where('transaction_id','!=', '')
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('invoice_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('transaction_type','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_address','LIKE',"%".$searchByUser."%")
                   ->orWhere('payment','LIKE',"%".$searchByUser."%")
                   ->orWhere('reference_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('total_orders','LIKE',"%".$searchByUser."%")
                   ->orWhere('status','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();
            $items = DB::table('store_orders')/* ->where('user_id', $auth_id)
            ->where('orders_id', null) */
            ->where('transaction_id','!=', '')->orderBy('invoice_no', 'DESC')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

            $totalfilteritems = $totalitems;
        }

         $data = array();
        if($items){
            foreach ($items as $item)
            {

                $nestedData['id'] = $item->transaction_id;
                $nestedData['transaction_type'] = $item->transaction_type.'/'.$item->invoice_type;
                $nestedData['invoice_no'] = $item->invoice_no;
                $nestedData['customer_name'] = $item->customer_name;
                $nestedData['customer_address'] = $item->customer_address;
                $nestedData['payment'] = $item->payment;
                $nestedData['reference_no'] = $item->reference_no;
                $nestedData['total_orders'] = $item->total_orders;
                $nestedData['encoder'] = $item->encoder;
                $nestedData['created_at'] = $item->date;
                $nestedData['status'] = $item->status;
                $nestedData['action'] = "<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='return-replace/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Return</a>
                        <a class='dropdown-item' href='replacement/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Replace</a>
                        <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                        <a class='dropdown-item cancel' data-id='{$item->transaction_id}'><i class='fa fa-cancel text-danger pr-2'></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>";
                if($item->transaction_type=="RETURN SLIP"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item' href='return-slip/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i>View</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                if($item->transaction_type=="SALES INVOICE"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item' href='return-replace/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Return</a>
                                    <a class='dropdown-item' href='replacement/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Replace</a>
                                    <a class='dropdown-item cancel' data-id='{$item->transaction_id}'><i class='icon-close text-danger pr-2'></i> Cancel</a>
                                    <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                                    <a class='dropdown-item' href='sales-invoice/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }if($item->transaction_type=="ORDER FORM"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item' href='return-replace/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Return</a>
                                <a class='dropdown-item' href='replacement/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Replace</a>
                                    <a class='dropdown-item cancel' data-id='{$item->transaction_id}'><i class='icon-close text-danger pr-2'></i> Cancel</a>
                                    <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                                    <a class='dropdown-item' href='order-form/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                                    </div>
                            </div>
                        </div>
                    </div>";
                }if($item->transaction_type=="DELIVERY RECIEPT"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item' href='return-replace/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Return</a>
                                <a class='dropdown-item' href='replacement/{$item->transaction_id}'><i class='fa fa-refresh text-success pr-2'></i> Replace</a>
                                    <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                                    <a class='dropdown-item' href='delivery-reciept/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                if($item->status=="DELETED"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                
                            </div>
                        </div>
                    </div>";
                }
                if($item->status=="CANCELLED"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                                    <a class='dropdown-item' href='delivery-reciept/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>";

                }
                if($item->transaction_type=="REPLACEMENT SLIP"){

                    $nestedData['action'] ="<div class='col'>
                        <div class='btn-group task-list-action'>
                            <div class='dropdown '>
                                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='icon-options'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item delete' data-status='{$item->status}' data-id='{$item->transaction_id}'><i class='fa fa-ban text-danger pr-2'></i> Void</a>
                                    <a class='dropdown-item' href='delivery-reciept/{$item->transaction_id}'><i class='icon-eye text-info pr-2'></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>";

                }
                $data[] = $nestedData;

            }
        }
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalitems,
            'recordsFiltered'=> $totalfilteritems,
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

    function processPoStore(Request $request)
    {
        $stat = DB::table('store_purchase_orders')
        ->where('id', $request->id)->first();
        $contents = DB::table('store_purchase_items')
            ->where('orders_id', $stat->id)->get();

            if($stat->status == 'Pending'){

                DB::table('store_purchase_orders')
                ->where('id',$stat->id)
                ->update(array('status'=>'On Process'));

                    $odata = array();

                        foreach ($contents as $content) {

                                $odata['productname'] = $content->product_name;
                                $odata['quantity'] = $content->quantity;
                                $odata['selling_price'] = $content->amount;

                                $current = DB::table('store_product_lists')
                                ->where('productname', $content->product_name)->first();

                                DB::table('store_product_lists')
                                ->where('productname',$content->product_name)
                                ->update(array('stock' => $current->stock + $content->quantity,
                                               'capital' =>(($current->capital * $current->stock + $content->amount * $content->quantity) / ($current->stock + $content->quantity) ) ));

                        }
                DB::table('store_purchase_orders')
                ->where('id',$stat->id)
                ->update(array('status'=>'Completed'));
            }
            else if($stat->status == 'On Process'){
                $arr = array('message' => 'Transaction is on process', 'title' => 'Information!');
                return $arr;
            }else{

                    return 'err';
            }


        /* return $request->id; */
    }

    function processVoid(Request $request)
    {
        /* return $request; */

        //to follow only supervisor can void
        
        $check_status = DB::table('store_orders')
                    ->where('transaction_id', $request->id)
                    ->where('status', '=' ,'VOID')->count();

        $contents = DB::table('store_items')
                    ->where('transaction_id', $request->id)->get();

                foreach ($contents as $content) {

                    $transaction_item = new TransactionItem();
                    $transaction_item->user_id = $content->user_id;
                    $transaction_item->invoice_num = $request->invoice_no;
                    $transaction_item->product_id = $content->product_id;
                    $transaction_item->transaction_type = 'VOID';
                    $transaction_item->quantity = $content->quantity;
                    $transaction_item->lot_no = $content->lot_no;
                    $transaction_item->expiration_date = $content->expiration_date;
                    $transaction_item->save();

                }

        $stat = DB::table('store_orders')
            ->where('transaction_id', $request->id)
            ->update(['status' => "VOID"]);

        return $update_history = DB::table('transaction_histories')
            ->where('transaction_id', $request->id)
            ->update(array('status' => "VOID"));

        return response()->json($stat);

    }

}
