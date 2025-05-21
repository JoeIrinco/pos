<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TransactionItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class relocationController extends Controller
{

    public  function saveRelocation(Request $request){
      
        
        DB::beginTransaction();
        try {
            $auth_id =Auth::id();
            if(isset($request->lot_no)){
                $lot_no= $request->lot_no;
            }
            if($request->lot_no == "NULL" || $request->lot_no == NULL){
                $lot_no = NULL;
            }
            $expiration_date = $request->expireData;
            if($request->expireData != "0000-00-00"){
                $expiration_date= date('Y-m-d', strtotime($request->expireData ));
            }
                if(DB::table('transaction_items')->insert([
                    'rock' =>$request->rock_new,
                    'shelf' =>$request->shelfnew,
                    'product_id' => $request->pruduct_id,
                    'location_address' => $request->location_address,
                    'transaction_type' =>"TRANSFERRED",
                    'units' =>$request->unit,
                    'lot_no' => $lot_no,
                    'expiration_date' =>$expiration_date,
                    'user_id' => $auth_id,
                    'quantity' =>$request->qunatity_po,
                ])){
                    $TransactionItem = new TransactionItem();
                    $TransactionItem->user_id= $auth_id;
                    $TransactionItem->units= $request->unit;
                    $TransactionItem->invoice_num= $request->invoice;
                    $TransactionItem->po_id= $request->po_id;
                    $TransactionItem->product_id= $request->pruduct_id;
                    $TransactionItem->price= 0.0;         
                    $TransactionItem->transaction_type= "RELOCATED";
                    $TransactionItem->quantity= $request->qunatity_po;
                    $TransactionItem->location_address=  $request->location_po;
                    $TransactionItem->shelf= $request->shelf_po;
                    $TransactionItem->rock= $request->rock_po;           
                    if(isset($request->lot_no)){
                        if($request->lot_no == "NULL" && $request->lot_no == NULL){
                            $TransactionItem->lot_no= $request->lot_no;
                        }
                       
                    }
                    if($request->expireData != "0000-00-00"){
                        $TransactionItem->expiration_date= date('Y-m-d', strtotime($request->expireData ));
                    }
                    $TransactionItem->save();
            
                
                    DB::commit();
                    return "okay";
                }                   
                
            
           
          } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }
    public function relocationExpiry(Request $request){
       
        $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id','expiration_date')
        ->where("transaction_items.product_id", $request->pruduct_id)
        ->where('transaction_items.lot_no',$request->lot_no)  
        ->where('transaction_items.location_address',$request->location_address)  
        ->where('transaction_items.expiration_date',$request->expiration_date)  
        ->where(function($query) {
            $query->orwhere("transaction_type", "RECEIVE PO")
            ->orwhere("transaction_type", "MANUAL ADD")
            ->orwhere("transaction_type", "RELOCATED")
            ->orwhere("transaction_type", "REPLACE_INVOICE") 
            ->orwhere("transaction_type", "IMPORT");                                                   	                                                      	   
             })        
        ->groupBy('transaction_items.expiration_date')
        ->get();
         $stocks =0;    
        foreach ($BaseDetails as  $value) {
            $deductqty= DB::table("transaction_items")
            ->select(DB::raw('SUM(transaction_items.quantity) as TotalQuantitys'))          
            ->where(function($query) {
            $query->where("transaction_type", "POS")   
            ->orwhere("transaction_type", "DISPOSE") 
            ->orwhere("transaction_type", "MANUAL MINUS")   
            ->orwhere("transaction_type", "TRANSFERRED")   
            ->orwhere("transaction_type", "RETURN_P_PO")   
            ->orwhere("transaction_type", "REPLACEMENT_P_PO");                                                                         	                                                      	   
             })
            ->where('transaction_items.product_id',$value->product_id)
            ->where('transaction_items.lot_no',$value->lot_no)  
            ->where('transaction_items.location_address',$value->location_address)
            ->where('transaction_items.expiration_date',$value->expiration_date)  
            ->first(); 
            $totalDeduction=0;
            if(isset($deductqty->TotalQuantitys)){
             $totalDeduction = $deductqty->TotalQuantitys;
            }
            $stocks  = $stocks+$value->TotalQuantity-$totalDeduction;  
        }
        return $stocks;
    }
    public function index(Request $request){ 
        
        if($request->lot == "NA"){
         $request->lot = 'NULL';
    }
    
    $request->lot = str_replace(" ","e0j",$request->lot);
    if( $request->lot =="NULL"){
         $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->select('quantity as baseQTY',DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id','expiration_date','units')
        ->where("transaction_items.product_id", $request->id)
        ->whereNull('transaction_items.lot_no')  
        ->where('transaction_items.location_address',$request->location_address)  
        ->where('transaction_items.rock',$request->rock)  
        ->where('transaction_items.expiration_date',$request->exp)  
        ->where('transaction_items.shelf',$request->shelf)  
        ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")   
        ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')             
        ->get();
    }else{
        $BaseDetails= DB::table("transaction_items")
        ->join('store_product_lists','store_product_lists.id','=','transaction_items.product_id')
        ->select('quantity as baseQTY',DB::raw('SUM(transaction_items.quantity) as TotalQuantity'),'transaction_items.*','store_product_lists.productname as productname','store_product_lists.product_code as product_code','transaction_items.location_address','transaction_items.id as TI_id', 'store_product_lists.critical_alert as critical_alert','transaction_items.product_id as product_id','expiration_date','units')
        ->where("transaction_items.product_id", $request->id)
        ->where('transaction_items.lot_no',$request->lot)  
        ->where('transaction_items.location_address',$request->location_address)  
        ->where('transaction_items.rock',$request->rock)  
        ->where('transaction_items.expiration_date',$request->exp)  
        ->where('transaction_items.shelf',$request->shelf)  
        ->whereRaw("transaction_type in ('MANUAL ADD','RECEIVE PO','RELOCATED','REPLACE_INVOICE','IMPORT','DELETED')")   
        ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')             
        ->get();
    }
      
    
     $stocks =0;    
    foreach ($BaseDetails as  $value) {

        $deducttionDetails= DB::table("transaction_items") 
        ->selectRaw("sum(`transaction_items`.`quantity`) AS `TotalQuantity_deduct`, product_id")
        ->where('product_id',$value->product_id)
        ->where('location_address',$value->location_address)
        ->where('expiration_date',$value->expiration_date)
        ->where('lot_no',$value->lot_no)
        ->where('rock',$value->rock)
        ->where('shelf',$value->shelf)
        ->whereRaw("transaction_type in ('POS','DISPOSE','MANUAL MINUS','TRANSFERRED','RETURN_P_PO','REPLACEMENT_P_PO')")        
        ->groupBy('location_address','lot_no','product_id','expiration_date','rock','shelf')    
        ->first();


        $totalDeduction=0;
        if(isset($deducttionDetails->TotalQuantity_deduct)){
         $totalDeduction = $deducttionDetails->TotalQuantity_deduct;
        }
        
        $stocks  = $stocks+$value->TotalQuantity-$totalDeduction;  
    }

  
    $now = Carbon::now()->format('d-m-Y');
    $lots = DB::table('lotview')->select('lot_no')->whereraw('lot_no is not null')->groupBy('lot_no')->get();              
    $locations = DB::table('locationview')->select('location')->whereraw('location is not null')->groupBy('location')->get();
    $racks = DB::table('rackfview')->select('rack')->whereraw('rack is not null')->groupBy('rack')->get();
    $shelf_locations = DB::table('shelfview')->select('shelf')->whereraw('shelf is not null')->groupBy('shelf')->get();
    $transaction_items = DB::table("store_product_lists")
    ->where('id',$request->id)
    ->first();
    $transaction_items->product_id  = $request->id;
    $transaction_items->location_address = $value->location_address;
    $transaction_items->lot_no = $request->lot;
    $transaction_items->rock = $request->rock;
    $transaction_items->expiration_date = $request->exp;
    $transaction_items->units = $value->units;
    $transaction_items->shelf = $request->shelf;
    $transaction_id = $transaction_items->id;
    $units = DB::table('units')->get();
    $expry = $request->exp;
    
    return view('inventory.relocation.relocation',compact('stocks','lots','locations','racks','shelf_locations','now','units','transaction_items','BaseDetails','expry'));

    }
}
