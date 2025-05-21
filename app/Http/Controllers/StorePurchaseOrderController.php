<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StorePurchaseOrder;
use App\StorePurchaseItem;

class StorePurchaseOrderController extends Controller
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
        return view('store.purchase-order');
    }
    
    public function store(Request $request)
    {
        $auth_id =Auth::id();
        $validator=DB::table('store_purchase_items')
        ->where('user_id', $auth_id)
        ->where('orders_id', null)->count();
        if($validator>=1){
            $poCount = DB::table('store_purchase_orders')->count(); 
            $now = Carbon::now();
            $poCount = $poCount+1;
            $po_num = "VE-".$now->year."-".$now->month."-00".$poCount;
            //$po_num = "VL-".$now->year."-".$now->month."-00".$poCount;
               $dt = Carbon::now()/* ->format('Y-m-d') */;
              /*  $dt->toDateString(); */
              
               $auth_user =Auth::user()->name;
               $todaysell = DB::table('store_purchase_items')
               ->where('user_id', $auth_id)
               ->where('orders_id', null)->sum('total');
               $Order = new StorePurchaseOrder();
           
               $Order->date= $dt;
               $Order->po_no= $po_num;
               $Order->user_id= $auth_id;
               $Order->encoder= $auth_user;
               $Order->total_price= $todaysell;
               $Order->supplier_id= $request->supplier_id;
               $Order->status = 'Pending';
               if($Order->save()){
   
               DB::table('store_purchase_items')
               ->where('user_id', $auth_id)
               ->where('orders_id', null)
               ->update(array('orders_id' => $Order->id));
               
                }else{
                    return 'err';
                }
        }else{

            return 'noOrder';
        }
    
    }

        //get datatable items
    public function storegetPoItems(Request $request)
    {   
        $columns = array(
            
            /* 0 => 'quantity',
            1 => 'unit',
            2 => 'product_name',
            3 => 'amount',
            4 => 'total',
            5 => 'action' */
            
            0 => 'product_name',
            1 => 'total'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalitems = DB::table('store_purchase_items')->get()->count(); 
         if($request->input('search.value')){

            //query is correct brb later

            /* $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StoreItem::select("*")->where('user_id', $auth_id)
            ->where('orders_id',null)
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('quantity','LIKE',"%".$searchByUser."%")
                   ->orWhere('unit','LIKE',"%".$searchByUser."%")
                   ->orWhere('product_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('amount','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get(); */

                    $searchByUser = $request->input('search.value');
                    $auth_id =Auth::id();
                    $items = StorePurchaseItem::select("*")->where('user_id', $auth_id)
                    ->where('orders_id',null)
                    ->where(function($query) use ($searchByUser){
                    $query->where('product_name','LIKE',"%".$searchByUser."%")
                    ->orWhere('total','LIKE',"%".$searchByUser."%")
                    ->orWhere('quantity','LIKE',"%".$searchByUser."%")
                    ->orWhere('unit','LIKE',"%".$searchByUser."%")
                    ->orWhere('amount','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();
            $items = DB::table('store_purchase_items')->where('user_id', $auth_id)            
            ->join('store_product_lists', 'store_product_lists.id', '=', 'product_id')     
            ->select('*', 'store_purchase_items.id as ItemId')       
            ->where('orders_id', null)
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
                
                $nestedData['product_name'] = "<button id='delete' data-id='{$item->ItemId}' class='icon-close btn btn-sm btn-outline-danger'></button>   $item->quantity @ <strong>$item->product_name $item->product_description $item->unit $item->brand</strong>";
                $nestedData['unitCost'] = number_format($item->amount,2);
                $nestedData['total'] = number_format($item->total,2);                
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

    public function store_purchase_save_items(Request $request){
        /* $auth_id =Auth::id();
        $Item = new StoreItem();
        $Item = DB::table('store_purchase_items');
        
        $Item->product_name =$request->productSelect;
        $Item->quantity=$request->qty;
        $Item->unit=$request->unit;
        $Item->user_id=$auth_id;
        $Item->amount=$request->price;
        $Item->total=$request->qty * $request->price;
        DB::table('store_purchase_items')->insert($Item); */
        $auth_id =Auth::id();
        $auth_name =Auth::user()->name;

        $store_purchase_items_count = DB::table('store_purchase_items')
       ->where('product_id',$request->product_id)
        ->where('user_id',$auth_id)
        ->where('orders_id',null)
        ->count();
        if($store_purchase_items_count>0){
            return "already";
        }

        $productList = DB::table('store_product_lists')->where('id',$request->product_id)->first();
        $post = DB::table('store_purchase_items')->insert([
            'user_id' => $auth_id,
            'encoder' => $auth_name,
            'product_id' => $request->product_id,
            'product_name' => $request->productSelect,
            'product_code' => $productList->product_code,
            'unit' => $request->unit,
            'quantity' => $request->qty,
            'amount' => $request->price,
            'total' => $request->qty * $request->price,
          ]);
        return $post;
    }

    function deletePoStore(Request $request)
    {
        
        /* $items = StoreItem::find($request->id); */
        $items = DB::table('store_purchase_items')->delete($request->id);
        /* return view('dashboard',compact('items')); */
        
            return $items;
        
    }

    public function findProduct(Request $request){
        /* $data=StoreProductList::select('unit','productname','selling_price')->where('id',$request->id)->first(); *///->take(100)->get(); old code
        $data=DB::table('store_product_lists')
        ->select('id','unit','productname','selling_price')
        ->where('id',$request->id)
        ->first();//->take(100)->get();
         return response()->json($data);
     }

     public function findProduct_orderlist(Request $request){
        $auth_id =Auth::id();
        $data=DB::table('store_purchase_items')
       // ->select('product_id','unit','product_name','amount')
        ->where('product_id',$request->id)
        ->where('orders_id','!=',null)
        ->where('user_id',$auth_id)        
        ->orderBy('id', 'desc')
        ->first();
        $data_count=DB::table('store_purchase_items')
      //  ->select('id','unit','product_name','amount')
        ->where('product_id',$request->id)
        ->where('orders_id','!=',null)
        ->where('user_id',$auth_id)        
        ->orderBy('id', 'desc')
        ->count();
        
        $state ="0";
        if($data_count==0){
            $state ="1";
            $data=DB::table('store_product_lists')
            //->select('id','unit','productname','selling_price')
            ->where('id',$request->id)
            ->first();//->take(100)->get();
        }    
         return response()->json(['state' => $state, 'data' => $data]);
         
     }
}