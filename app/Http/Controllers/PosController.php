<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{

    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['admin', 'store']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_id =Auth::id();
        $sell = DB::table('store_items')->where('user_id',$auth_id)->where('orders_id',null)->sum('total');

        $count= DB::table('store_items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->count();
        return view('store.pos',compact('sell','count'));

    }

    public function store(Request $request)
    {
                      
    }

}
