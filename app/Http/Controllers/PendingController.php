<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StorePurchaseOrder;
use App\StoreOrder;
use App\TransactionHistory;
use App\Atc;

class PendingController extends Controller
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
        return view('store.pending');
    }
    
    public function getPendingDocuments(Request $request)
    {   
        $columns = array(
            
            0 => 'id',
            1 => 'transaction_type',
            2 => 'invoice_no',
            3 => 'customer_name',
            4 => 'customer_address',
            5 => 'status',
            6 => 'total_orders',
            7 => 'balance',
            8 => 'encoder',
            9 => 'created_at',
            10 => 'terms',
            11 => 'terms_end',
            12 => 'action'

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
            $items = StoreOrder::select("*")->where('status_document', 'PENDING')
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('total_orders','LIKE',"%".$searchByUser."%")
                   ->orWhere('status','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_address','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();
            $items = DB::table('store_orders')
            ->where('status_documents', 'PENDING')
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
                $nestedData['transaction_type'] = $item->transaction_type .'/'. $item->invoice_type;
                $nestedData['invoice_no'] = $item->invoice_no;
                $nestedData['customer_name'] = $item->customer_name;
                $nestedData['customer_address'] = $item->customer_address;
                $nestedData['status'] = $item->status;
                $nestedData['total_orders'] = $item->total_orders;
                $nestedData['balance'] = $item->balance;
                $nestedData['encoder'] = $item->encoder;
                $nestedData['created_at'] = $item->created_at;
                $nestedData['terms'] = $item->terms .'&nbsp'.'Days';
                $nestedData['terms_end'] = Carbon::now()->diffInDays(Carbon::parse($item->terms_end)).'&nbsp'.'Days';
                $nestedData['action'] = "<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a id='paid' class='dropdown-item update_btn' href='#' data-id='{$item->id}' ><i class='icon-paper-plane text-success pr-2'></i> Update Documents</a>
                            
                        </div>
                    </div>
                </div>
            </div>";;
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

}