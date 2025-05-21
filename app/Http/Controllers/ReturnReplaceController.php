<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\StorePurchaseOrder;
use App\StoreOrder;
use App\TransactionHistory;
use App\StoreItem;
use App\TransactionItem;
use App\StoreReplacedItem;

class ReturnReplaceController extends Controller
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
        return view('store.ar');
    }

    public function getItemToReturn(Request $request)
    {
        /*return $request->extra_search;*/
        $columns = array(

            0 => 'product_name',
            1 => 'unit',
            2 => 'quantity',
            3 => 'amount',
            4 => 'total',
            5 => 'action'

        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        //$dir = $request->input('order.0.dir');


        $totalitems = StoreItem::get()->count();

        if($request->input('search.value')){

            //query is correct brb later

            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = StoreItem::select("*")->where('transaction_id', $request->extra_search)
                ->where(function($query) use ($searchByUser){
                    $query->where('product_name','LIKE',"%".$searchByUser."%");
                })/*->offset($start)*/
                ->limit($limit)
                ->orderBy($order/*, $dir*/)
                ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();

             $items = StoreItem::where('transaction_id', $request->extra_search)
                /*->offset($start)*/
                ->limit($limit)
                ->orderBy($order/*, $dir*/)
                ->get();
            $totalfilteritems = $totalitems;
        }

        $data = array();
        if($items){
            foreach ($items as $item)
            {
                $nestedData['product_name'] = "$item->product_name";
                $nestedData['unit'] = "$item->unit";
                $nestedData['quantity'] = "$item->quantity";
                $nestedData['amount'] = "$item->amount";
                $nestedData['total'] = "$item->total";
                $nestedData['action'] = "<input value='$item->return_qty' name='$item->id' class='return_input' style='width: 50px; height: 25px; border: none; border-bottom: 2px solid red;' data-id='$item->id' data-product_id='$item->product_id' data-transaction_id='$item->transaction_id'>";
                /*$nestedData['action'] = "<button data-value='$item->original_total' data-id='$item->id' class='ti-close btn btn-sm btn-outline-danger update_btn delete' type='button'></button>";*/
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

    public function index2($transaction_id)
    {
        $store_orders=DB::table('store_orders')->where('transaction_id',$transaction_id)->first();
        $total_sales=DB::table('store_items')->where('transaction_id',$transaction_id)->sum('total');
        $get_credit_debit=DB::table('store_replaced_items')->where('transaction_id',$transaction_id)->sum('total');
        $credit_debit=$total_sales-$get_credit_debit;
        $new_total=$total_sales-$credit_debit;
        /* return */ $store_items=DB::table('store_items')
        ->where('store_items.transaction_id','=',$transaction_id)
        ->get();
        /* $store_orders=DB::table('store_orders')->where('transaction_id',$transaction_id)->first();
        $total_sales=DB::table('store_items')->where('transaction_id',$transaction_id)->sum('total');
        $get_credit_debit=DB::table('store_replaced_items')->where('transaction_id',$transaction_id)->sum('total');
        $credit_debit=$total_sales-$get_credit_debit;
        $new_total=$total_sales-$credit_debit;
        
        $store_items=DB::table('store_items')
        ->where('store_items.transaction_id','=',$transaction_id)
        ->get();

        

        $Data=[];
        $temp2 = [];

        foreach ($store_items as  $store_item) {

             $odersItems=[
                 'id'=>$store_item->id,
                'transaction_id'=>$store_item->transaction_id,
                'unit'=>$store_item->unit,
                'quantity'=>$store_item->quantity,
                'amount'=>$store_item->amount,
                'original_total'=>$store_item->original_total,
                'total'=>$store_item->total,
                'product_name'=>$store_item->product_name,
                'return_replace'=>$store_item->return_replace,
                'return_qty'=>$store_item->return_qty,
                'item_status'=>$store_item->item_status,
                'replaced'=>'[]',
             ];

            $returnItems=DB::table('store_replaced_items')
            ->where('transaction_id','=',$store_item->transaction_id)
            ->where('deleted','=',null)
            ->get();
            if(count($returnItems)>0){

                foreach ($returnItems as $value) {

                    $temp =  [
                       'id1'=>$value->id,
                       'transaction_id1'=>$value->transaction_id,
                       'unit1'=>$value->unit,
                       'quantity1'=>$value->quantity,
                       'amount1'=>$value->amount,
                       'total1'=>$value->total,
                       'product_name1'=>$value->product_name
                   ];

                array_push($temp2,$temp);
                }
                $odersItems['replaced']=$temp2;
            }else{

            }

            array_push($Data,$odersItems);


        }
          $replacements =  $Data;


         foreach ($replacements as $key => $value) {
            if($value['replaced']=="[]"){

            }else{
                foreach ($value['replaced'] as $key ) {
                    $key['product_name1'];
                }
            }
         }
        */
        return view('store.return-replace', compact(/* 'replacements', */'store_orders','store_items','new_total','total_sales','credit_debit'));

    }

    function updateReturn(Request $request)
    {
       return $request; //ops
       DB::table('store_items')
        ->where('id', $request->id)  // find item using orders id
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('return_replace' => 'RETURNED'));

    }

    public function getItemByid($id)
    {
       $client=StoreItem::select('id')->where('id',$id)->get();//->take(100)->get();
       return response()->json($client);
    }
    public function getItemInfoByid(Request $request, $transaction_id)
    {
       /*  return $request->id;*/
       $result=StoreItem::select('id',
           'product_id',
           'transaction_id',
           'unit','quantity',
           'product_name',
           'product_description',
           'brand',
           'rock',
           'shelf',
           'item_status',
           'original_total',
           'amount',
           'expiration_date',
           'lot_no',
           'total')
           /* ->where('transaction_id',$transaction_id) */
           ->where('id',$request->id)
           ->first();
           
       return response()->json($result);
    }

    public function returnProduct($transaction_id)
    {
        $result=StoreItem::select('id',
                                  'transaction_id',
                                  'unit',
                                  'quantity',
                                  'brand',
                                  'product_name',
                                  'product_id',
                                  'product_description',
                                  'item_status',
                                  'total',
                                  'lot_no',
                                  'expiration_date',
                                  'amount')
                                  ->where('id',$transaction_id)
                                  ->first();//->take(100)->get();
        return response()->json($result);
    }

    function deleteReplaceItem(Request $request)
    {
        DB::table('store_replaced_items')
        ->where('id', $request->id)  // find item using orders id
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('deleted' => 1));

    }

    public function checkIfAvailable(Request $request){

        $auth_id = Auth::id();
        $auth_user = Auth::user()->name;

        $verify = DB::table('pos_permissions')
        ->where("user_id",$auth_id)
        ->where("returned",'=',0)->count();

        if($verify >= 1){
                    
        $arr = array('message' => 'no_permission', 'title' => 'you dont have permission to do this action');
        return $arr;

        }

         $store_items = DB::table('store_items')
                             ->where('id',$request->id)
                             ->where('product_id',$request->product_id)
                             ->where('transaction_id',$request->transaction_id)
                             ->sum('quantity');
        /*return $request->product_id;*/
        /*return $request->invoice_no;
        return $request->id;*/
          $return_qty = DB::table('transaction_items')
                             ->where('product_id',$request->product_id)
                             ->where('invoice_num',$request->invoice_no)
                             ->where('item_id',$request->id)
                             ->where('transaction_type','RETURNED')
                             ->sum('quantity');

         $returnable_product = $store_items - $return_qty;

         if ($request->cardN > $returnable_product){

             $arr = array('message' => 'invalid_qty', 'title' => 'Invalid Quantity!');
             return $arr;

         }else{

             DB::table('store_items')
                 ->where('id',$request->id)
                 ->where('product_id',$request->product_id)
                 ->where('transaction_id',$request->transaction_id)
                 ->limit(1)
                 ->update(array('return_qty' => $request->cardN));

         }


        /*$store_orders=DB::table('store_orders')->where('transaction_id',$request->transaction_id)->first();
        $store_items=DB::table('store_items')
            ->where('id',$request->id)
            ->where('transaction_id',$request->transaction_id)->first();

        $available_qty=DB::table('store_items')->where('id',$request->id)->where('transaction_id',$request->transaction_id)->sum('quantity');

        $return_qty=DB::table('transaction_items')
            ->where('item_id',$store_items->id)
            ->where('invoice_num',$store_orders->invoice_no)
            ->where('transaction_type','RETURNED')
            ->where('lot_no',$store_items->lot_no)
            ->where('expiration_date',$store_items->expiration_date)->sum('quantity');

        $sum = $available_qty - $return_qty;

        if($request->return_quantity > $sum){

            $arr = array('message' => 'invalid_qty', 'title' => 'Invalid Quantity!');
            return $arr;

        }

        $auth_id =Auth::id();

        $Item = new TransactionItem();

        $Item->user_id = $auth_id;
        $Item->invoice_num = $store_orders->invoice_no;
        $Item->product_id = $store_items->product_id;
        $Item->item_id = $store_items->id;
        $Item->transaction_type = 'RETURNED';
        $Item->quantity = $request->return_quantity;
        $Item->lot_no = $store_items->lot_no;
        $Item->expiration_date = $store_items->expiration_date;
        $Item->remarks = $request->return_remarks;
        if($Item->save()){

            $return_qty=DB::table('transaction_items')
                ->where('item_id',$store_items->id)
                ->where('invoice_num',$store_orders->invoice_no)
                ->where('transaction_type','RETURNED')
                ->where('lot_no',$store_items->lot_no)
                ->where('expiration_date',$store_items->expiration_date)->sum('quantity');

            DB::table('store_items')
                ->where('id', $request->id)
                ->limit(1)
                ->update(array('return_replace' => 'RETURNED','return_qty' => $return_qty));

            $arr = array('message' => 'Item Saved', 'title' => 'Returned Successful');
            return $arr;

        }else{
            return 'err';
        }*/
    }

}
