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

class POController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
        $this->middleware('admin');
    }
    public function getPO(Request $request)
    {   
        $columns = array(
            
            0 => 'id',
            1 => 'customer_name',
            2 => 'customer_address',
            3 => 'customer_contact_person',
            4 => 'customer_contact_number',
            5 => 'sendername',
            6 => 'created_at',
            7 => 'status',
            8 => 'action'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalitems = Order::get()->count(); 
       
         if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $items = Order::where('id','LIKE',"%".$searchByUser."%")
            ->orWhere('customer_name','LIKE',"%".$searchByUser."%")
            ->orWhere('customer_address','LIKE',"%".$searchByUser."%")
            ->orWhere('customer_contact_person','LIKE',"%".$searchByUser."%")
            ->orWhere('customer_contact_number','LIKE',"%".$searchByUser."%")
            ->orWhere('sendername','LIKE',"%".$searchByUser."%")
            ->orWhere('created_at','LIKE',"%".$searchByUser."%")
            ->orWhere('status','LIKE',"%".$searchByUser."%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

            $totalfilteritems = $totalitems;

        }else{

            $items = Order::offset($start)
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
                $nestedData['customer_contact_person'] = $item->customer_contact_person;/* <a class='badge light badge-success'>$item->status</a> */
                $nestedData['customer_contact_number'] = $item->customer_contact_number;/* <a class='approved dropdown-item'> <i class='icon-like text-info pr-2'></i> $item->status</a> */
                $nestedData['sendername'] = $item->sendername;
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
                    $nestedData['action'] ="<div class='col'>
                <div class='btn-group task-list-action'>
                    <div class='dropdown '>
                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='icon-options'></i>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Canceled</a>
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

                if($item->status=="Pending"){
                    $nestedData['status'] = "<a class='text-warning dropdown-item'><i class='ti-timer text-warning pr-2'></i>$item->status</a>";
                    $nestedData['action'] ="<div class='col'>
        <div class='btn-group task-list-action'>
            <div class='dropdown '>
                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='icon-options'></i>
                </a>
                <div class='dropdown-menu dropdown-menu-right'>
                    <a class='approved dropdown-item' data-id='{$item->id}' href='#'> <i class='icon-like text-info pr-2'></i> Approve</a>
                    <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Canceled</a>
                    <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                    <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                </div>
            </div>
        </div>
    </div>";;
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


}
