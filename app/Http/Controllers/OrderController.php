<?php

namespace App\Http\Controllers;
use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;

use Auth;

use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use Rawilk\Printing\Contracts\Driver;
use Rawilk\Printing\Contracts\Printer;

use LaravelDaily\Invoices\Classes\Buyer;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   //old auth
     
        $this->middleware('admin');
    }

    public function index()
    {
        //if(['middleware' => ['admin']]){ 
            $order=Order::all();
            return view('front_page.view',compact('order'));
         //}
         //return view('home');
    }


    public function itemlist(Request $request)
    {
       // $productlists=ProductList::all();
        //foreach ($productlists as $product)getall();
        //return view('.job-orders',compact('productlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function print($id)
    {
       
        //$order=Order::all();
        $items=Item::where('orders_id','=',$id)->get();

        //$pdf = \PDF::loadHTML('qweqweqwe');
        $pdf = \PDF::loadView('templates.default', compact('order'));

        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function items($id)
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

    }


    public function printDirect($id)
    {
       
        $orders=\DB::table('orders')->where('id',$id)->first();
        $getpurchasenumber=\DB::table('items')->where('orders_id',$id)->first();
        $items=\DB::table('items')
        ->join('orders', 'orders.id','items.orders_id')
        ->where('orders.id','=',$id)
        ->get();
        
        $printerId = \Printing::defaultPrinterId();
        $pdf = \PDF::loadView('templates.default', compact('items','orders','getpurchasenumber'));
       
        $printJob = \Printing::newPrintTask()
        ->printer($printerId)
        ->file('.pdf')
        ->send();


        // the id number returned from the print server
       $printJob->id();

    }

    public function printPDF($id)
    {
        
        $orders=\DB::table('orders')->where('id',$id)->first();
        $getpurchasenumber=\DB::table('items')->where('orders_id',$id)->first();
        $items=\DB::table('items')
        ->join('orders', 'orders.id','items.orders_id')
        ->select('items.*','orders.*')
        ->where('orders.id','=',$id)
        ->get();
        $pdf = \PDF::loadView('templates.default', compact('items','orders','getpurchasenumber'));
        
        return $pdf->download($getpurchasenumber->orders_id."-".$orders->customer_name.".pdf");

    }

    public function showInvoice()
    {
       
    }

    public function testing()
    {
        /* $items=\DB::table('items')
        ->join('orders', 'orders.id','items.orders_id')
        ->select('items.*','orders.*')
        ->where('orders.id','=','41')
        ->get();

        return $items; */
        return view('testing'/* ,compact('order') */);
    }
    public function testing2()
    {
        return view('testing2');
    }
    

    public function myorders(Request $request)
    {   
        $orders=\DB::table('orders')->where('sendername','=',Auth::user()->name)->get();
        return view('myorder',compact('orders'));
    }
    

    public function findProductList(Request $request){
       $data=ProductList::select('unit','product_name')->where('item_number',$request->item_number)->first();//->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}
    public function findClientInfo(Request $request){
       $data=ClientList::select('clientname','clientaddress','clientcontactperson','clientcontactperson2','no1','no2','no3','no4')->where('clientid',$request->clientid)->first();
        return response()->json($data);//then sent this data to ajax success
    } 
    
     /*
   AJAX request
   */
  /* public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =ClientList::select("id","clientname")
            		->where('name','LIKE',"%.$search.%")
            		->get();
        }
        return response()->json($data);
    } */

    /* public function AddProduct(Request $request)
    {
        $product=ProductList::all();
        
        return view('add_item.add-item',compact('product'));
    } */
    public function changeStatusToApproved(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'Approved';
        $order->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }
    public function changeStatusToDelivered(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'Delivered';
        $order->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }
    public function changeStatusToCanceled(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'Canceled';
        $order->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }

}
