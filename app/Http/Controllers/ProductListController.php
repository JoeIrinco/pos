<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;

use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
       // $this->middleware('admin');
    }


    public function critical_level(Request $request){
       
        $criticalLevel=0;

        $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id')
        ->where("transaction_type", "RECEIVE PO")
        ->orwhere("transaction_type", "MANUAL ADD")
        ->orwhere("transaction_items.transaction_type", "IMPORT")
        ->orwhere("transaction_type", "IMPORT")
        ->groupBy('transaction_items.location_address','transaction_items.product_id')
        ->get();
        foreach ($BaseDetails as $BaseDetail) {

            $product_id = $BaseDetail->product_id;
            $deductqty= DB::table("transaction_items")
           ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'))
           ->where('transaction_items.product_id',$product_id)
           ->where(function($query) use ($product_id){
           $query->orwhere("transaction_type", "POS")
           ->orwhere("transaction_type", "DISPOSE")
           ->orwhere("transaction_type", "RETURN_P_PO")   
           ->orwhere("transaction_type", "REPLACEMENT_P_PO");
           })
           ->first();

           if($deductqty->TotalQuantity== null){
             $deductqty->TotalQuantity=0;
           }
              $BaseDetail->TotalQuantity;
            $critical= DB::table("store_product_lists")
           ->where('store_product_lists.critical_alert', '>=', $BaseDetail->TotalQuantity - $deductqty->TotalQuantity)
           ->where('store_product_lists.id',$product_id)
           ->count();
           //dd($BaseDetail->TotalQuantity);
           if($critical > 0){
            $criticalLevel++;
           }else{

            }

        }
        return $criticalLevel;
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
    {   //select('unit','product_name')->where
       /* $product = DB::table('product_lists')
       ->where('item_number',$item_number)
       ->get();
       return response()->json($product); */

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
    

















}
