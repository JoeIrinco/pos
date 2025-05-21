<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\StoreProductList;
use App\TransactionItem;
use App\Unit;
use App\Branch;
use App\Location;
use App\ShelfLocation;
use App\Rack;
use App\Lot;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {


        DB::beginTransaction();
            try {
                Excel::import(new UsersImport,request()->file('file'));
                $invoices= DB::table("tmm_datas")->where('status',0)->get();

                foreach ($invoices as  $value) {
                   if(!isset($value->product_code)){
                    continue;
                   }
                    if(isset($value->rack)){
                        $rack= DB::table("racks")->where('rack',$value->rack)->count();
                        if($rack==0){
                            $Rack =  new  Rack();
                            $Rack->rack=$value->rack;
                            $Rack->save();
                        }

                    }
                    if(isset($value->lot_no)){
                        $lot_no= DB::table("lots")->where('lot_no',$value->lot_no)->count();
                        if($lot_no==0){
                            $Lot =  new  Lot();
                            $Lot->lot_no=$value->lot_no;
                            $Lot->save();
                        }

                    }
                    if(isset($value->location)){
                        $location= DB::table("locations")->where('location',$value->location)->count();
                        if($location==0){
                            $Location = new Location();
                            $Location->location=$value->location;
                            $Location->save();
                        }
                    }
                    if(isset($value->shelf)){
                        $shelf= DB::table("shelf_locations")->where('shelf',$value->shelf)->count();
                        if($shelf==0){
                            dd($shelf);
                            $ShelfLocation =  new  ShelfLocation();
                            $ShelfLocation->shelf=$value->shelf;
                            $ShelfLocation->save();
                        }

                    }



                     $units= DB::table("units")->where('unit','like','%'.$value->unit.'%')->count();
                     if($units==0){
                         $auth_id =Auth::id();
                         $Unit = new Unit();
                         $Unit->unit=$value->unit;
                         $Unit->user_id=$auth_id;
                         $Unit->save();
                     }
                     $tmpCost = $value->cost * .40;
                     $selling_price = $tmpCost + $value->cost;

                      $store_product_lists= DB::table("store_product_lists")
                     ->where('product_code','like',$value->product_code)
                     ->where('productname',$value->product_name)
                     ->where('product_description',$value->produc_desc)
                     ->where('brand',$value->brand)
                     ->first();

                     if($store_product_lists == null || $store_product_lists==""){
                        $StoreProductList = new StoreProductList();
                        $StoreProductList->branch='VALLERY';
                        $StoreProductList->brand=$value->brand;
                        $StoreProductList->product_code=$value->product_code;
                        $StoreProductList->productname=$value->product_name;
                        $StoreProductList->product_description=$value->produc_desc;
                        $StoreProductList->unit=$value->unit;
                        $StoreProductList->capital=$value->cost;
                        $StoreProductList->stock=$value->qty;
                        $StoreProductList->markup=0;
                        $StoreProductList->selling_price=$selling_price;
                        $StoreProductList->critical_alert=$value->critical;
                        $StoreProductList->location=$value->location;
                        $StoreProductList->exp_date=null;
                        if($value->exp_date=="on"){
                            $StoreProductList->no_expiration = 1;
                        }
                        if($value->lot_no =="on"){
                            $StoreProductList->no_lot_no = 1;
                        }
                        $StoreProductList->save();

                       $product_id = $StoreProductList->id;
                     }else{
                        $product_id = $store_product_lists->id;
                     }


                    $auth_id =Auth::id();
                     $TransactionItem = new TransactionItem();
                     $TransactionItem->user_id= $auth_id;
                     $TransactionItem->invoice_num= "IMPORT";
                     $TransactionItem->po_id= "IMPORT";
                     $TransactionItem->product_id=  $product_id;
                     $TransactionItem->price= $value->cost;
                     $TransactionItem->transaction_type= "IMPORT";
                     $TransactionItem->quantity= $value->qty;
                     $TransactionItem->location_address= $value->location;
                     $TransactionItem->shelf= $value->shelf;
                     $TransactionItem->rock= $value->rack;
                     if(isset($value->lot_no)){
                         $TransactionItem->lot_no= $value->lot_no;
                     }
                     if(isset($value->exp_date)){
                         $TransactionItem->expiration_date= date('Y-m-d', strtotime($value->exp_date ));
                     }
                     $TransactionItem->save();
                }

                DB::table('tmm_datas')
                ->where('status', 0)
                ->update(['status' => 1]);
                //return "inserted";

                DB::table('tmm_datas')
                ->where('product_code',null)
                ->where('product_name',null)
                //->where('produc_desc',null)
                ->delete();

            DB::commit();
            return "success";
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getline()
                ],500);
            }

        return "success";
        return back();
    }
}
