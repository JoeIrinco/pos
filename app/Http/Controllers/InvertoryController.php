<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\StoreProductList;
use PDF;
use Carbon\Carbon;
use APpp\UserPermission;
use Illuminate\Support\Facades\Auth;

class InvertoryController extends Controller
{
    public function index()
    {
        return view('inventory.dashboard.index');
    }

    public function productInventorycard(Request $request){

        DB::table('store_product_lists')->where('id',$request->id1)->update([
            'is_print'=>1,
        ]);
        DB::table('store_product_lists')->where('id',$request->id2)->update([
            'is_print'=>1,
        ]);
        DB::table('store_product_lists')->where('id',$request->id3)->update([
            'is_print'=>1,
        ]);
        DB::table('store_product_lists')->where('id',$request->id4)->update([
            'is_print'=>1,
        ]);


        $id1 = DB::table('store_product_lists')->where('id',$request->id1)->first();
        $id2 = DB::table('store_product_lists')->where('id',$request->id2)->first();
        $id3 = DB::table('store_product_lists')->where('id',$request->id3)->first();
        $id4 = DB::table('store_product_lists')->where('id',$request->id4)->first();

       
        
        $pdf = PDF::loadview('pdf.inventoryCard',compact('id1','id2','id3','id4'));
        return $pdf->stream('product-Inventory-Card.pdf');

        
    }
    public function GetProductDetailsPDF(Request $request){
        $now = Carbon::now()->format('d-m-Y');
        $store_product_lists=[];

        if($request->id == "all"){
            $store_product_lists = DB::table('store_product_lists')->get();

        }else{
            $store_product_lists = DB::table('store_product_lists')->where('status',$request->id)->get();

        }
        $store_product_lists_count = DB::table('store_product_lists')->count();
        $pdf = PDF::loadview('pdf.ProductList',compact('store_product_lists','now','store_product_lists_count'));
        return $pdf->stream('product-list.pdf');
        //return view('pdf.ProductList',compact('store_product_lists','now','store_product_lists_count'));
     }

     public function GetProductDetailsPDF_2(Request $request){

        $pdf = PDF::loadview('pdf.inventoryCard');
        return $pdf->stream('product-list.pdf');
        //return view('pdf.ProductList',compact('store_product_lists','now','store_product_lists_count'));
     }


    public function productManagement()
    {

        $currentuserid = Auth::user()->id;
        $stoper=0;
        $permission = DB::table('user_permissions')->where('user_id', $currentuserid)->first();
        $units= DB::table('units')->get();
        $branches= DB::table('branches')->get();

        return view('inventory.productMangement.index',compact('branches','units','permission','stoper'));
    }
    public function productList(Request $request)
    {

        $currentuserid = Auth::user()->id;
        $permission = DB::table('user_permissions')->where('user_id', $currentuserid)->first();
        if(isset($permission->edit_product)){
            $edit_product = $permission->edit_product;
        }

        $product_lists= DB::table('store_product_lists')->get();
        $totalData = count($product_lists);
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $columns = array(
            0 => 'id',
            1 => 'product_code',
            2 => 'brand',
            3 => 'productname',
            4 => 'product_description',
            5 => 'unit',
            6 => 'location',
            7 => 'critical_alert',
            8 => 'status',
            9 => 'created_at',

        );
        $order = $columns[$request->input('order.0.column')];
        $product_lists="";
        if(empty($request->input('search.value')) && empty($request->data)){
            $product_lists= DB::table('store_product_lists')
            //->where('is_print',0)
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)
	        ->get();
        }else{

            $search = $request->input('search.value');
            if(isset($request->data)){
                $search= $request->data;
            }
            $product_lists= DB::table('store_product_lists')
            //->where('is_print',0)
            ->where(function($query) use ($search){
            $query->where('product_code','like',"%$search%")
            ->orWhere('productname','like',"$search%")
            ->orWhere('product_description','like',"$search%")
            ->orWhere('brand','like',"$search%")
            ->orWhere('unit','like',"$search%")
            ->orWhere('status','like',"$search%");
            
             })
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)
             ->get();
            $product_lists_temp= DB::table('store_product_lists')

            ->where(function($query) use ($search){
                $query->where('product_code','like',"%$search%")
                ->orWhere('productname','like',"$search%")
                ->orWhere('product_description','like',"$search%")
                ->orWhere('brand','like',"$search%")
                ->orWhere('unit','like',"$search%")
                ->orWhere('status','like',"$search%");
                 })
                 ->orderBy($order,$dir)
                 ->offset($start)
                 ->limit($limit)
                 ->get();
            $totalFiltered=count($product_lists_temp);
        }
       $data = array();
        if($product_lists){
            foreach ($product_lists as $product_list) {
                $nestedData['id'] = '<center> <input type="checkbox" class="productSelect" data-id="'.$product_list->id.'"> </center>';
                $nestedData['product_code'] = $product_list->product_code;
                $nestedData['brand'] = $product_list->brand;
                $nestedData['productname'] = $product_list->productname;
                $nestedData['product_description'] = $product_list->product_description;
                $nestedData['unit'] =  $product_list->unit;
                $nestedData['location'] = $product_list->location;
                $nestedData['critical_alert'] = $product_list->critical_alert;
                $nestedData['Status'] = $product_list->status;
                $nestedData['created_at'] =  date('M-d-Y', strtotime($product_list->created_at));



                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                <ul class='dropdown-menu'>
                    <li><a href='#' onclick=btn_action($product_list->id,'view') class='dropdown-item' title='View Product Details'>View </a></li>
                    <li><a href='#' onclick=btn_action($product_list->id,'edit') class='dropdown-item' id='edit_product' title='Edit Product Details'>Edit </a></li>
                </ul>
                </div>";
                $data[] = $nestedData;
            }
        }
       $json_data = array(
        "draw"            => intval($request->input('draw')),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
        );

        echo json_encode($json_data);
    }
    public function editproduct(Request $request){

      

        try {
        DB::beginTransaction();
            $StoreProductList =  StoreProductList::find($request->id_edit);
            $oldProductCode = $StoreProductList->product_code;
            if($request->product_code_edit != $StoreProductList->product_code){
                if(DB::table('store_product_lists')->where('product_code',$request->product_code_edit)->count() >0){
                    return "sku";
                }
            }


            $StoreProductList->branch=$request->branch_edit;
            $StoreProductList->brand=$request->brand_edit;
            $StoreProductList->product_code=$request->product_code_edit;
            $StoreProductList->productname=$request->productname_edit;
            $StoreProductList->product_description=$request->product_description_edit;
            $StoreProductList->unit=$request->unit_edit;
            $StoreProductList->critical_alert=$request->critical_alert_edit;
            $StoreProductList->status=$request->status;

           /*  if($request->no_expiration_edit=="on"){
                $StoreProductList->no_expiration = 1;
            }else{
                $StoreProductList->no_expiration = 0;
            }
            if($request->no_lot_no_edit =="on"){
                $StoreProductList->no_lot_no = 1;
            }else{
                $StoreProductList->no_lot_no = 0;
            } */


            $no_expiration=0;
            $no_lot_no=0;
            if($request->no_expiration_edit=="on"){
                $no_expiration=1;
               
            }
            if($request->no_lot_no_edit =="on"){
                $no_lot_no=1;
               
            }
            $StoreProductList->no_expiration =  $no_expiration;
            $StoreProductList->no_lot_no =  $no_lot_no;

            $StoreProductList->save();


            /*DB::table('vlmedical.store_product_lists')
            ->where('product_code',$oldProductCode)
            ->update([                
                'branch'=>"VL MEDICAL",
                'brand'=>$request->brand_edit,
                'product_code'=>$request->product_code_edit,
                'productname'=>$request->productname_edit,
                'product_description'=>$request->product_description_edit,
                'unit'=>$request->unit_add,
                'capital'=>0,
                'stock'=>0,
                'markup'=>0,
                'selling_price'=>0,
                'critical_alert'=>$request->critical_alert_edit,
                'exp_date'=>null,
                'no_expiration'=>$no_expiration,
                'no_lot_no'=>$no_lot_no,
                'status'=>$request->status,
            ]);*/


        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }

    public function newproduct(Request $request){

        
        if(DB::table('store_product_lists')->where('product_code',$request->product_code_add)->count() >0){
            return "sku";
        }
        
        if(DB::table('store_product_lists')->where('productname',$request->productname_add)->where('product_description',$request->product_description_add)->where('brand',$request->brand_add)->count() >0 ){
            return "duplicate";
        }

        DB::beginTransaction();
        try {
            $no_expiration=0;
            $no_lot_no=0;
            $StoreProductList = new StoreProductList();
            $StoreProductList->branch="VALLERY";
            //$StoreProductList->branch="VL MEDICAL";
            $StoreProductList->brand=$request->brand_add;
            $StoreProductList->product_code=$request->product_code_add;
            $StoreProductList->productname=$request->productname_add;
            $StoreProductList->product_description=$request->product_description_add;
            $StoreProductList->unit=$request->unit_add;
            $StoreProductList->capital=0;
            $StoreProductList->stock=0;
            $StoreProductList->markup=0;
            $StoreProductList->selling_price=0;
            $StoreProductList->critical_alert=$request->critical_alert_add;
            //$StoreProductList->location=$request->location_add;
            $StoreProductList->exp_date=null;
            if($request->no_expiration_add=="on"){
                $no_expiration=1;
               
            }
            if($request->no_lot_no_add =="on"){
                $no_lot_no=1;
               
            }
            $StoreProductList->no_expiration =  $no_expiration;
            $StoreProductList->no_lot_no =  $no_lot_no;
            $StoreProductList->save();
          

            /*DB::table('vlmedical.store_product_lists')->insert([
                'id' =>  $StoreProductList,
                'branch'=>"VL MEDICAL",
                'brand'=>$request->brand_add,
                'product_code'=>$request->product_code_add,
                'productname'=>$request->productname_add,
                'product_description'=>$request->product_description_add,
                'unit'=>$request->unit_add,
                'capital'=>0,
                'stock'=>0,
                'markup'=>0,
                'selling_price'=>0,
                'critical_alert'=>$request->critical_alert_add,
                'exp_date'=>null,
                'no_expiration'=>$no_expiration,
                'no_t_no'=>$no_lot_no,
            ]);*/

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }
    public function deleteProduct(Request $request){
        DB::beginTransaction();
        try {
        if(DB::table('store_product_lists')->where('id', $request->id)->update(['status' => 1])){
            DB::commit();
            return "deleted";
        }


        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }

    public function getOneProduct(Request $request){
        DB::beginTransaction();
        try {
      $product=  DB::table('store_product_lists')->where('id', $request->id)->get();
      $transaction_items_lot=DB::table('transaction_items')->where('product_id', $request->id)->groupBy('location_address')->get();
      $stoper=0;
      foreach ($transaction_items_lot as  $value) {
          if($value->lot_no !=""){
            $stoper++;
          }
      }

        $lots = DB::table('lotview')->select('lot_no')->whereraw('lot_no is not null')->groupBy('lot_no')->get();
        $units = DB::table('units')->get();        
        $locations = DB::table('locationview')->select('location')->whereraw('location is not null')->groupBy('location')->get();
        $racks = DB::table('rackfview')->select('rack')->whereraw('rack is not null')->groupBy('rack')->get();
        $shelf_locations = DB::table('shelfview')->select('shelf')->whereraw('shelf is not null')->groupBy('shelf')->get();

      return compact('product','transaction_items_lot','stoper','lots','units','locations','racks','shelf_locations');
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }


    public function getOneProduct2(Request $request){
        DB::beginTransaction();
        try {
   //   $product=  DB::table('store_product_lists')->where('id', $request->id)->get();
      $transaction_items_lot=DB::table('transaction_items')->where('product_id', $request->id)->where('lot_no', $request->lot)->groupBy('lot_no')->get();
      return compact('transaction_items_lot');
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }

    }

}
