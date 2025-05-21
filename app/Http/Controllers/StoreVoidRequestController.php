<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StoreOrder;

class StoreVoidRequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        return view('store.void-request');
    }

        //get datatable items
    public function storeVoidRequest(Request $request)
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
            8 => 'action'

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
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('invoice_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('transaction_type','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_address','LIKE',"%".$searchByUser."%")
                   ->orWhere('payment','LIKE',"%".$searchByUser."%")
                   ->orWhere('reference_no','LIKE',"%".$searchByUser."%")
                   ->orWhere('total_orders','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();
            $items = DB::table('store_orders')/* ->where('user_id', $auth_id)
            ->where('orders_id', null) */
            ->where('status', "VOID PENDING")
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

                $nestedData['id'] = $item->id;
                $nestedData['transaction_type'] = $item->transaction_type;
                $nestedData['invoice_no'] = $item->invoice_no;
                $nestedData['customer_name'] = $item->customer_name;
                $nestedData['customer_address'] = $item->customer_address;
                $nestedData['payment'] = $item->payment;
                $nestedData['reference_no'] = $item->reference_no;
                $nestedData['total_orders'] = $item->total_orders;
                $nestedData['action'] = "<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a id='process' class='dropdown-item' href='#' data-id='{$item->id}' ><i class='icon-paper-plane text-success pr-2'></i> Approved</a>
                            <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Decline</a>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                /* if($item->status=="Pending"){
                    $nestedData['status'] = "<a class='text-warning dropdown-item'><i class='ti-timer text-warning pr-2'></i>$item->status</a>";
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a id='process' class='dropdown-item' href='#' data-id='{$item->id}' ><i class='icon-paper-plane text-success pr-2'></i> Process</a>
                            <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Cancel</a>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                }
                if($item->status=="Completed"){
                    $nestedData['status'] = "<a class='text-success dropdown-item'><i class='ti-check-box text-success pr-2'></i>$item->status</a>";
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='fas fa fa-ban text-danger pr-2'></i> Void</a>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                }
                if($item->status=="Canceled"){
                    $nestedData['status'] = "<a class='text-danger dropdown-item'><i class='icon-close text-danger pr-2'></i>$item->status</a>";
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                }
                if($item->status=="Void"){
                    $nestedData['status'] = "<a class='text-danger dropdown-item'><i class='fas fa fa-ban text-danger pr-2'></i>$item->status</a>";
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                } */
                
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
}