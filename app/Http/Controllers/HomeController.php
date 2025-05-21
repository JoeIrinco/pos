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
class HomeController extends Controller
{

    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* if (Auth::check()) {
            // The user is logged in...
            if(Auth::user()->is_admin == 1){
                return 'dashboard';
            }
            else{
                return 'home';
            }
        } */
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $productlists=ProductList::all();
        return view('home',compact('productlists')); */
        return view('home');
    }

    public function store(Request $request)
    {
        //return  $request;
    
                 //working to orginal code            
         /* if($request->quantity !=""){
            $auth_id =Auth::id();
            $data2=[]; 
            $data=$request->all();
            $lastid=Order::create($data)->id;
                    DB::table('items')
                ->where('user_id', $auth_id)
                ->where('orders_id', null)
                ->update(array('orders_id' => $lastid));
               return redirect()->back()->with('success','data insert successfully');
        }else{
            return  $request;
        } */                                                                             
        
 
}

public function save_items(Request $request){
    $auth_id =Auth::id();
    $Item = new Item();
    
    $Item->product_name =$request->productSelect;
    $Item->quantity=$request->qty;
    $Item->unit=$request->unit;
    $Item->user_id=$auth_id;
    $Item->amount=$request->price;
    if($Item->save()){
       $id=$Item->id;
        return '<tr id="dataTr'.$id.'">
        <td name="quantity[]">'.$request->qty.'</td>
        <td name="unit[]">'.$request->unit.'</td>
        <td name="product_name[]">'.$request->productSelect.'</td>
        <td name="amount[]">'.$request->price.'</td>
        <td ><div class="d-flex">
            <a href="#" id="delete" class="btn btn-danger shadow btn-m sharp" data-id="'.$id.'" value='.$id.'>Delete</a>
        </div></td>
        
    </tr>';
    
    }else{
        return 'err';
    }
}

public function save_orders(Request $request){

    //return $request;
    $auth_id =Auth::id();
    $auth_user =Auth::user()->name;
    $Order = new Order();

    $Order->customer_name= $request->customer_name;
    $Order->customer_address= $request->customer_address;
    $Order->customer_contact_person= $request->customer_contact_person;
    $Order->customer_contact_number= $request->customer_contact_number;
    $Order->remarks= $request->remarks;
    $Order->status='Pending';
    $Order->senderid= $auth_id;
    $Order->sendername= $request->sendername;
    
    /* $Order->save(); */

    /* $data=$request->all();
    $lastid=Order::create($data)->id;
    DB::table('items')
    ->where('user_id', $auth_id)
    ->where('orders_id', null)
    ->update(array('orders_id' => $lastid)); */

    
    if($Order->save()){
    
    //$data=$request->all();
    //$lastid=Order::create($data)->id;
    DB::table('items')
    ->where('user_id', $auth_id)
    ->where('orders_id', null)
    ->update(array('orders_id' => $Order->id/* $lastid */));

    
    $client = ClientList::find($request->clientid);
    $client->clientaddress = $request->customer_address;
    $client->clientcontactperson = $request->customer_contact_person;
    $client->clientcontactnumber = $request->customer_contact_number;
    $client->save();
    return response()->json($client);
     
     }else{
         return 'err';
     }
    
}


    public function dashboard()
    {   
        $auth_id =Auth::id();
        $productlists=ProductList::all();
        $clientlist=ClientList::all();
        $count= DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->count();
        $items=DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->get();
        
        return view('dashboard',compact('productlists','clientlist','items','count'));
    }
    public function userdashboard()
    {
        /* $productlists=ProductList::all();
        return view('user-dashboard',compact('productlists')); */
        $auth_id =Auth::id();
        $productlists=ProductList::all();
        $clientlist=ClientList::all();
        $count= DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->count();
        $items=DB::table('items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)
        ->get();
        
        return view('user-dashboard',compact('productlists','clientlist','items','count'));
    }

    /* public function checkisadmin()
    {   
        if(Auth::user()->is_admin == 1){
            return view('dashboard');
        }
        else{
            return view('home');
        }
        
    } */

    public function findProductList(Request $request){
        $data=ProductList::select('unit','product_name')->where('item_number',$request->item_number)->first();//->take(100)->get();
         return response()->json($data);//then sent this data to ajax success
     }
     public function findClientInfo(Request $request){
        $data=ClientList::select('clientname','clientaddress','clientcontactperson','clientcontactnumber')->where('clientid',$request->clientid)->first();
         return response()->json($data);//then sent this data to ajax success
     } 

    public function myorders(Request $request)
    {   
        $orders=\DB::table('orders')->where('sendername','=',Auth::user()->name)->get();
        return view('myorder',compact('orders'));
    }

    function removedata(Request $request)
    {
        
        $items = Item::find($request->id);
        /* return view('dashboard',compact('items')); */
        if($items->delete())
        {
            /* echo 'Data Deleted'; */
            return $request->id;
        }
    }


/*
   Select 2 client search
   */
  public function selectgetclient(Request $request){

    $search = $request->search;

    if($search == ''){
       $clients = ClientList::orderby('clientid','asc')->select('clientid','clientname')->limit(5)->get();
    }else{
       $clients = ClientList::orderby('clientid','asc')->select('clientid','clientname')->where('clientname', 'like', '%' .$search . '%')->limit(20)->get();
    }

    $response = array();
    foreach($clients as $client){
       $response[] = array(
            "id"=>$client->clientid,
            "text"=>$client->clientname
       );
    }

    echo json_encode($response);
    exit;
 }

/*
   Select 2 for product search
   */
  public function selectgetproduct(Request $request){

    $search = $request->search;

    if($search == ''){
       $employees = ProductList::orderby('item_number','asc')->select('item_number','product_name')->limit(5)->get();
    }else{
       $employees = ProductList::orderby('item_number','asc')->select('item_number','product_name')->where('product_name', 'like', '%' .$search . '%')->limit(20)->get();
    }

    $response = array();
    foreach($employees as $employee){
       $response[] = array(
            "id"=>$employee->item_number,
            "text"=>$employee->product_name
       );
    }

    echo json_encode($response);
    exit;
 }

 public function testing3(Request $request)
 {
     $order=Order::all();
     return view('testing3',compact('order'));
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
}
