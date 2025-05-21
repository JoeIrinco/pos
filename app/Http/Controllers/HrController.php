<?php

namespace App\Http\Controllers;
use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;
use App\Empgovcon;
use App\EmployeeList;

use Auth;


use Illuminate\Http\Request;

class HrController extends Controller
{
    public function __construct()
    {   
        $this->middleware('admin');
    }

    public function hrdashboard()
    {
        /* $productlists=ProductList::all();
        return view('user-dashboard',compact('productlists')); */
        $auth_id =Auth::id();
        $items=EmployeeList::all();
        /* $clientlist=ClientList::all(); */
        /* $count= DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->count(); */
        /* $items=DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->get(); */
        
        return view('hr', compact('items'));
    }


    public function employee($id)
    {
        
        $employeelists=\DB::table('employee_lists')->where('id',$id)->first();
        $getcontribution=\DB::table('empgovcon')->where('id',$id)->first();
        $items=\DB::table('employee_lists')
        ->join('empgovcon', 'empgovcon.id','employee_lists.id')
        ->select('empgovcon.*','employee_lists.*')
        ->where('empgovcon.id','=',$id)
        ->get();
        $pdf = \PDF::loadView('templates.hrtemplate', compact('items','employeelists','getcontribution'));
        return $pdf->stream();

    }

// for ref. only--------
    /* public function items($id)
    {
        
        $orders=\DB::table('orders')->where('id',$id)->first();
        $getpurchasenumber=\DB::table('items')->where('orders_id',$id)->first();
        $items=\DB::table('items')
        ->join('orders', 'orders.id','items.orders_id')
        ->select('items.*','orders.*')
        ->where('orders.id','=',$id)
        ->get();
        $pdf = \PDF::loadView('templates.default', compact('items','orders','getpurchasenumber'));
        return $pdf->stream();

    } */



}
