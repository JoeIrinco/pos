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
        //Excel::import(new UsersImport,request()->file('file'));
        $invoices= DB::table("tmm_datas")->where('status',0)->get();
       foreach ($invoices as $key => $value) {
            $StoreProductList = new StoreProductList();

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
            //$StoreProductList->branch=$value->brad;
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
       return "inserted";
        return back();
    }
}
