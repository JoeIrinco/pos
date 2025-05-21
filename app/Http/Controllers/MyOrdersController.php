<?php

namespace App\Http\Controllers;


use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

//use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
        $this->middleware('auth');
    }
    public function getmyorders(Request $request)
    {   
        $columns = array(
            
            0 => 'id',
            1 => 'customer_name',
            2 => 'customer_address',
            3 => 'customer_contact_person',
            4 => 'customer_contact_number',
            5 => 'created_at',
            6 => 'status',
            7 => 'action'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalitems = Order::get()->count(); 
       
         if($request->input('search.value')){
            $auth_id =Auth::id();
            $searchByUser = $request->input('search.value');

            $items = Order::select("*")->where('senderid', $auth_id)
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_address','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_contact_person','LIKE',"%".$searchByUser."%")
                   ->orWhere('customer_contact_number','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{
            $auth_id =Auth::id();

            /* $items = Item::where('user_id', $auth_id)
            ->where('orders_id', null)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get(); */



            $items = Order::where('senderid', $auth_id)
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
                $nestedData['customer_name'] = $item->customer_name;
                $nestedData['customer_address'] = $item->customer_address;
                $nestedData['customer_contact_person'] = $item->customer_contact_person;
                $nestedData['customer_contact_number'] = $item->customer_contact_number;
                $nestedData['created_at'] = $item->created_at->toDateTimeString();;
                if($item->status=="Approved"){
                    $nestedData['status'] = "<a class='text-info dropdown-item'><i class='icon-like text-info pr-2'></i> $item->status</a>";
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='delivered dropdown-item' data-id='{$item->id}' href='#'><i class='ti-shopping-cart text-success pr-2'></i> Delivered</a>
                            <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Canceled</a>
                            <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                            <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                        </div>
                    </div>
                </div>
            </div>";;
                }
                
                if($item->status=="Delivered"){
                    $nestedData['status'] = "<a class='text-success dropdown-item'><i class='ti-shopping-cart text-success pr-2'></i>$item->status</a>";
                    
                }

                if($item->status=="Canceled"){
                    $nestedData['status'] = "<a class='text-danger dropdown-item'><i class='icon-close text-danger pr-2'></i>$item->status</a>";
                   
                }

                if($item->status=="Pending"){
                    $nestedData['status'] = "<a class='text-warning dropdown-item'><i class='ti-timer text-warning pr-2'></i>$item->status</a>";
                    
                }
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

