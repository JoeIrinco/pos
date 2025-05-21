<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\StoreProductList;
use App\ProductList;
use App\ClientList;

use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ViewProductListController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
        //$this->middleware('admin');
    }

    public function index()
    {
        return view('store.product-lists');
    }

    public function showAddItem()
    {
        //$product=ProductList::all();
        return view('add_item.add-item'/* ,compact('product') */);
    }
    public function showAddClient()
    {
        //$order=Order::all();
        return view('add_client.add-client'/* ,compact('order') */);
    }

    public function getRecords(Request $request)
    {
        $columns = array(
            0 => 'item_number',
            1 => 'product_name',
            2 => 'unit',
            3 => 'action'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $totalproduct = ProductList::get()->count();
       
        if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $products = ProductList::where('item_number','LIKE',"%".$searchByUser."%")
            ->orWhere('product_name','LIKE',"%".$searchByUser."%")
            ->orWhere('unit','LIKE',"%".$searchByUser."%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

            $totalfilterproducts = $totalproduct;

        }else{
            $products = ProductList::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        
            $totalfilterproducts = $totalproduct;
        }

        $data = array();
        if($products){
            foreach ($products as $product)
            {
        
                $nestedData['item_number'] = $product->item_number;
                $nestedData['product_name'] = $product->product_name;
                $nestedData['unit'] = $product->unit;
                $nestedData['action'] = "<button id='update' data-id='$product->item_number' class='btn btn-xs btn-info update_btn' type='button'>Update</button>";
                $data[] = $nestedData;
    
            }
        }
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalproduct,
            'recordsFiltered'=> $totalfilterproducts,
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

    public function save_product(Request $request){
        $auth_id =Auth::id();
        $Product = new ProductList();
        
        $Product->product_name =$request->product_name;//<a href="#" id="delete" class="btn btn-danger shadow btn-m sharp" data-id="'.$id.'" value='.$id.'>Edit</a>
        $Product->unit=$request->unit;
        if($Product->save()){
            $data=ProductList::get()->last();
            //$id=$Product->item_number; //id="dataTr'.$item_number.'"
            return '<tr>
            <td name="item_number[]">'.$data->item_number.'</td>
            <td name="product_name[]">'.$request->product_name.'</td>
            <td name="unit[]">'.$request->unit.'</td>
            <td ><div class="d-flex">
                <button id="dataTr'.$data->item_number.'" class="btn btn-xs btn-info" type="button">Edit</button>
            </div></td>
        </tr>';
        
        }else{
            return 'err';
        }
    }

    public function getProductByid($item_number)
    {   
       $product=ProductList::select('item_number','product_name','unit')->where('item_number',$item_number)->get();//->take(100)->get();
       return response()->json($product);
    }

    public function updateProduct(Request $request)
    {   
        //return $request;
       $product = ProductList::find($request->item_number);
       $product->product_name = $request['product_name'];
       $product->unit = $request['unit'];
       $product->save();
       return response()->json($product);
     
    }
    


    public function getProductLists(Request $request)
    {   
        $columns = array(
            
            0 => 'id',
            1 => 'product_code',
            2 => 'productname',
            3 => 'unit',
            4 => 'stock',
            5 => 'selling_price',
            6 => 'location',
            7 => 'exp_date',
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalitems = DB::table('store_product_lists')->get()->count();
         if($request->input('search.value')){

            

            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StoreProductList::select("*")->where/* ('user_id', $auth_id)
            ->where('orders_id',null)
            ->where */(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('product_code','LIKE',"%".$searchByUser."%")
                   ->orWhere('productname','LIKE',"%".$searchByUser."%")
                   ->orWhere('unit','LIKE',"%".$searchByUser."%")
                   ->orWhere('stock','LIKE',"%".$searchByUser."%")
                   ->orWhere('selling_price','LIKE',"%".$searchByUser."%")
                   ->orWhere('location','LIKE',"%".$searchByUser."%")
                   ->orWhere('exp_date','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();
            $items = DB::table('store_product_lists')/* ->where('user_id', $auth_id)
            ->where('orders_id', null) */
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
                $nestedData['product_code'] = $item->product_code;
                $nestedData['productname'] = $item->productname;
                $nestedData['unit'] = $item->unit;
                $nestedData['stock'] = $item->stock;
                $nestedData['selling_price'] = $format = number_format($item->selling_price);
                $nestedData['location'] = $item->location;
                $nestedData['exp_date'] = $item->exp_date;
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
