<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Item;
use App\ProductList;
use App\StoreProductList;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AddStoreProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['admin', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.add-store-product');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PnameChecker = StoreProductList::where('productname',$request->productname)->count(); 
       

        if($PnameChecker>0){
            return "error";
        }
        
        
        $Product = new StoreProductList();
       
        $Product->branch =$request->branch;
        $Product->productname=$request->productname;
        $Product->unit =$request->unit;
        $Product->quantity=$request->quantity;
        $Product->stockalert =$request->stockalert;

        $Product->lotno=$request->lotno;
        $Product->expiration =$request->expiration;
        $Product->capital=$request->capital;
        $Product->sellingprice =$request->sellingprice;

        if($Product->save()){
            $data=StoreProductList::get()->last();
           
            return '<tr>
            <td >'.$data->id.'</td>
            <td >'.$data->branch.'</td>
            <td >'.$data->productname.'</td>
            <td >'.$data->unit.'</td>
            <td >'.$data->quantity.'</td>
            <td >'.$data->stockalert.'</td>
            <td >'.$data->lotno.'</td>
            <td>'.$data->expiration.'</td>
            <td >'.$data->capital.'</td>
            <td >'.$data->sellingprice.'</td>
            <td ><div class="d-flex">
                <button id="update" data-id="'.$data->id.'" class="btn btn-xs btn-info" type="button">Update</button>
            </div></td>
        </tr>';
        
        }else{
            return 'err';
        }
    }

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

    public function showtable(Request $request)
    {
       

        $columns = array(
            0 => 'id',
            1 => 'branch',
            2 => 'productname',
            3 => 'unit',
            4 => 'quantity',
            5 => 'stockalert',
            6 => 'lotno',
            7 => 'expiration',
            8 => 'capital',
            9 => 'sellingprice',
            10 => 'action'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalclients = StoreProductList::get()->count();
        

         if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $clients = StoreProductList::where('id','LIKE',"%".$searchByUser."%")
            ->orWhere('id','LIKE',"%".$searchByUser."%")
            ->orWhere('branch','LIKE',"%".$searchByUser."%")
            ->orWhere('productname','LIKE',"%".$searchByUser."%")
            ->orWhere('unit','LIKE',"%".$searchByUser."%")
            ->orWhere('quantity','LIKE',"%".$searchByUser."%")
            ->orWhere('stockalert','LIKE',"%".$searchByUser."%")
            ->orWhere('lotno','LIKE',"%".$searchByUser."%")
            ->orWhere('expiration','LIKE',"%".$searchByUser."%")
            ->orWhere('capital','LIKE',"%".$searchByUser."%")
            ->orWhere('sellingprice','LIKE',"%".$searchByUser."%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

            $totalfilterclients = $totalclients;

        }else{
            $clients = StoreProductList::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        
            $totalfilterclients = $totalclients;
        } 

         $data = array();
        if($clients){
            foreach ($clients as $client)
            {

                $nestedData['id'] = $client->id;
                $nestedData['branch'] = $client->branch;
                $nestedData['productname'] = $client->productname;
                $nestedData['unit'] = $client->unit;
                $nestedData['quantity'] = $client->quantity;
                $nestedData['stockalert'] = $client->stockalert;
                $nestedData['lotno'] = $client->lotno;
                $nestedData['expiration'] = $client->expiration;
                $nestedData['capital'] = $client->capital;
                $nestedData['sellingprice'] = $client->sellingprice;
                $nestedData['action'] = "<button id='update' data-id='$client->id' class='btn btn-xs btn-info update_btn' type='button'>Update</button>";
                $data[] = $nestedData;
    
            }
        } 
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalclients,
            'recordsFiltered'=> $totalfilterclients,
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

}
