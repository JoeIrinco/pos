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

class ReplacementController extends Controller
{

    public function replacementData(Request $request){
        /* return $request; */
        /* return $request->replacement_slip_no; */
        //Code Joe
        /* $store_replaced_items=DB::table('store_replaced_items')
        ->where('replacement_slip_no',$request->replacement_slip_no)
        ->first();
        $transaction_id =  $store_replaced_items->transaction_id;

        $store_items=DB::table('store_items')
        ->where('transaction_id','=',$transaction_id)
        ->get();

        return $store_returns=DB::table('store_items')
        ->where('transaction_id','=',$transaction_id)
        ->where('product_id','=',$store_replaced_items)
        ->where('return_replace','=','REPLACED')
        ->get(); */
        


        $store_replaced_items=DB::table('store_replaced_items')
        ->where('replacement_slip_no',$request->replacement_slip_no)
        ->first();
        $transaction_id = $store_replaced_items->transaction_id; //return transaction id

        $store_items=DB::table('store_items') //return store items
        ->where('transaction_id','=',$transaction_id)
        ->get();

        //working code
        /* return */ $store_returns=DB::table('store_items') //return store items already replaced
        ->where('transaction_id','=',$transaction_id)
        ->where('replace','=',1)
        ->get();

        /* $store_returns=DB::table('store_items')
        ->where('transaction_id','=',$transaction_id)
        ->where('return_replace','=',null)
        ->get(); */

        /* $trno_store_replaced=DB::table('store_replaced_items')
        ->where('transaction_id','=',$transaction_id)
        ->pluck('replacement_slip_no');
        $data  = collect($trno_store_replaced)->unique(); */

        $Data=[];
        $temp2 = [];

        foreach ($store_returns as  $store_item) {

            $get_store_replaced_items = DB::table('store_replaced_items')
            ->where('transaction_id','=',$transaction_id)
            ->where('item_id','=',$store_item->product_id)
            ->where('replacement_slip_no','=', $request->replacement_slip_no)
            ->where('status','=','RETURNED')
            ->sum('quantity');

            
             $odersItems=[
                'replaced_qty'=>$get_store_replaced_items/* '$store_item->replaced_qty' */,
                'id'=>$store_item->id,
                'transaction_id'=>$store_item->transaction_id,
                'unit'=>$store_item->unit,
                'quantity'=>$store_item->quantity,
                'amount'=>$store_item->amount,
                'original_total'=>$store_item->original_total,
                'total'=>$store_item->total,
                'product_name'=>$store_item->product_name,
                'replace'=>$store_item->replace,
                'return_qty'=>$store_item->return_qty,
                'item_status'=>$store_item->item_status,
                'replaced'=>'[]',
             ];
             /* return $store_item->product_id; */
            /* return */ $returnItems=DB::table('store_replaced_items')
            ->where('transaction_id','=',$transaction_id)
             ->where('replaced_product_id','=',$store_item->product_id)
            /* ->where('item_id','=',$store_item->id) */
            ->where('replacement_slip_no','=',$request->replacement_slip_no)
            ->where('replacement_slip_no','!=',null)
            ->where('deleted','=',null)
            ->get();

            if(count($returnItems)>0){

                $temp2=[];

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
        
            /* return */ $replacements = $Data;
            $dataTable="";

            foreach($replacements as $store_item)
            {

                if($store_item['replace'] == 1){
                    $dataTable.= "<tr>";
                    $dataTable.= "<td>";
                    //show replaced product name
                    $dataTable.='<a class="text-info">'.$store_item['replaced_qty'].' '.$store_item['product_name'].'</a>';
                   
                        
                    if($store_item['replaced']=='[]'){

                    }else{
                        
                        foreach($store_item['replaced'] as $replaced){

                            
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                //show replacement product name
                                
                                $dataTable.='<br><a>'.$replaced['quantity1'].' '.$replaced['unit1'].' '.$replaced['product_name1'].'</a>';
                                
                            }
                            
                        }

                        $dataTable.= "<td>";
                        //unit price of replaced item
                        $dataTable.='<a class="text-info">'.$store_item['amount'].'</a>';
                        foreach($store_item['replaced'] as $replaced){

                                
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                //show replacement product name
                                
                                $dataTable.='<br><a>'.$replaced['amount1'].'</a>';
                                
                            }
                            
                        }

                        $dataTable.= "<td>";
                    
                        $dataTable.='<a class="text-info">'.$store_item['amount'] * $store_item['replaced_qty'].'</a>';
        
                        foreach($store_item['replaced'] as $replaced){
        
                                    
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                //show replacement product name
                                
                                $dataTable.='<br><a>'.$replaced['total1'].'</a>';
                                
                            }
                            
                        }
                        
                    }

                    /* if($store_item['replaced'] == '[]'){

                            break;
                    
                        } */

                        

                        
                        
                    }
                    
/* -------------- *//* $dataTable.= "<td>";
                    //unit price of replaced item
                    $dataTable.='<a class="text-info">'.$store_item['amount'].'</a>';
                    foreach($store_item['replaced'] as $replaced){

                            
                        if($store_item['transaction_id'] == $replaced['transaction_id1']){
                            //show replacement product name
                            
                            $dataTable.='<br><a>'.$replaced['amount1'].'</a>';
                            
                        }
                        
                    } */
/* -------------- */                    
                    /* foreach($store_item['replaced'] as $replaced){

                            
                        if($store_item['transaction_id'] == $replaced['transaction_id1']){
                            //show replacement product name
                            $dataTable.='<a class="text-info">'.$store_item['amoount1'].'</a>';
                            //$dataTable.='<br><a>'.$replaced['quantity1'].' '.$replaced['unit1'].' '.$replaced['product_name1'].'</a>';
                        
                        }
                        
                    } */

                    /* if($store_item['replace'] == 1){
                        //$dataTable.= "<tr>";
                        //$dataTable.= "<td>";
                        //show replaced product name
                        //$dataTable.='<a class="text-info">'.$store_item['replaced_qty'].' '.$store_item['product_name'].'</a>';
                       
                                
                            foreach($store_item['replaced'] as $replaced){
    
                                
                                if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                    //show replacement product name
                                    $dataTable.='<a class="text-info">'.$store_item['total'] / $store_item['quantity'].'</a>';
                                
                                }
                                
                            }
                            
                        } */
                /* if($store_item['item_status'] =='CUSTOM DISCOUNT'){

                        if($store_item['replace'] == 0){
                            $dataTable.='<a class="text-info">'.$store_item['total'] / $store_item['quantity'].'</a>';
                        }
                            
                        if($store_item['replace'] == 1){
                            $dataTable.='<a class="text-info">'.$store_item['total'] / $store_item['quantity'].'</a>';
                        }
                
                    else{
                        if($store_item['replaced']=="[]"){

                        }else{
                            foreach($store_item['replaced'] as $replaced)
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                $dataTable.='<br>'.$replaced['amount1'];
                            }
                            
                        }
                    }
                } */


                /* $dataTable.=" </td> <td>"; */
/* -------------$dataTable.= "<td>";
                
                $dataTable.='<a class="text-info">'.$store_item['amount'] * $store_item['replaced_qty'].'</a>';

                foreach($store_item['replaced'] as $replaced){

                            
                    if($store_item['transaction_id'] == $replaced['transaction_id1']){
                        //show replacement product name
                        
                        $dataTable.='<br><a>'.$replaced['total1'].'</a>';
                        
                    }
                    
----------------} */
                /* if($store_item['item_status'] =='CUSTOM DISCOUNT'){

                    if($store_item['replace'] == 0){
                        $dataTable.='<a class="text-info">'.$store_item['total'] / $store_item['quantity'].'</a>';
                    }
                    if($store_item['replace'] == 1){
                        $dataTable.='<a class="text-info">'.$store_item['total'] / $store_item['quantity'].'</a>';
                    }
                    if($store_item['replace'] == 0){
                      
                    }
                }else{
                    if($store_item['replaced']=="[]"){
                        foreach($store_item['replaced'] as $replaced){
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                $dataTable.='<br>'.$replaced['amount1'];
                            }
                        } 
                    }
                   } */
                   
                    /* if($store_item['return_replace'] == 'REPLACED'){
                        $dataTable.='<a class="text-info">'.$store_item['total'].'</a>';
                    } */



                    /* if($store_item['replace'] == 0){
                        $dataTable.='';
                    }
                    
                    if($store_item['replaced']=="[]"){
                        $dataTable.='';
                    }
                    else{
                        foreach($store_item['replaced'] as $replaced){
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                $dataTable.='<br>'.$replaced['total1'];
                            }
                            $dataTable.='<br>'.$replaced['total1'];
                        
                        }
                    } */



                    /* $dataTable.=" </td>  </tr>"; */
    }
                    
            /* foreach ($replacements as $store_item) {
                $dataTable= " <tr> <td>";
                if($store_item['return_replace'] == 'REPLACED'){
                   $dataTable.=  '<a class="text-info">'.$store_item['replaced_qty'].' '.$store_item['product_name'].'</a>replaced by &nbsp;';
                }
                if($store_item['replaced']!="[]"){
                   foreach ($store_item['replaced'] as $replaced) {
                       if($store_item['transaction_id'] == $replaced['transaction_id1']){
                        $dataTable.= '<br><a>'.$replaced['quantity1'].'  '.$replaced['unit1'].'   '.$replaced['product_name1'].'</a>';
                       }
                   }     
                 }

                 $dataTable.=" </td> <td>";

                 if($store_item['item_status'] =='CUSTOM DISCOUNT'){
                    if($store_item['return_replace'] == ''){
                        $dataTable .=   '<a class="text-info"> '.$store_item['total'] / $store_item['quantity'].' </a>';
                    }
                    if($store_item['return_replace'] == 'REPLACED'){
                        $dataTable .=   '<a class="text-info"> '.$store_item['total'] / $store_item['quantity'].' </a>';
                    }
                    if($store_item['return_replace'] == ''){

                    }
                 }else{
                    if($store_item['replaced']!="[]"){
                        foreach ($store_item['replaced'] as $replaced) {
                            if($store_item['transaction_id'] == $replaced['transaction_id1']){
                                $dataTable.='<br>'. $replaced['amount1'].'';
                            }
                        }     
                      }
                 }

                 $dataTable.=" </td> <td>";
                 if($store_item['return_replace'] == 'REPLACED'){
                    $dataTable.='  <a class="text-info"> '.$store_item['total'].'</a>';
                 }

                 if($store_item['replaced']!="[]"){
                    foreach ($store_item['replaced'] as $replaced) {
                        if($store_item['transaction_id'] == $replaced['transaction_id1']){
                         $dataTable.= '<br>'.$replaced['total1'].'';
                        }
                    }     
                  }
                  $dataTable.=" </td>  </tr>";
            } */

        return $dataTable;


    }


    public function submitReplacement(Request $request){

            $auth_id = Auth::id();
            $auth_user = Auth::user()->name;
            
            $verify = DB::table('pos_permissions')
            ->where("user_id",$auth_id)
            ->where("replacement",'=',0)->count();
            
            if($verify >= 1){
            
            $arr = array('message' => 'err', 'title' => 'you dont have permission to do this action');
            return $arr;
            
            }

            $count = DB::table('store_replaced_items')
            ->where('transaction_id','=',$request->transaction_id)
            ->where('replacement_slip_no','=',null)->count();
            
            if($count <= 0){
                $arr = array('message' => 'err', 'title' => 'No item to be replaced !');
                    return $arr;
            }


            if($request->slip_date == ''){
                $arr = array('message' => 'err', 'title' => 'Date of Replacement is required!');
                    return $arr;
            }
            if($request->slip_no == ''){
                $arr = array('message' => 'err', 'title' => 'Replacement Slip no. is required!');
                return $arr;
            }

             $tItems =  DB::table('store_items')->where('transaction_id', $request->transaction_id)
                          ->where('return_replace',"=","REPLACED")->get();

            /* foreach($tItems as $tItems_data){

                $rItems =  DB::table('store_replaced_items')->where('transaction_id', $request->transaction_id)
                          ->where('replaced_product_id',$tItems_data->product_id)->where('replacement_slip_no',null)
                          ->where('status','=','REPLACEMENT')->count();
                
                if($rItems <= 0){

                    $arr = array('message' => 'err', 'title' => 'Please delete returned items without replacement product!');
                    return $arr;
                    
                }

            } */
        
            /* foreach($tItems as $tItems2){

                $Items =  DB::table('store_replaced_items')->where('transaction_id', $request->transaction_id)
                          ->where('product_list_id',$tItems2->product_id)->where('replacement_slip_no',null)
                          ->where('status','=','RETURNED')->count();
                
                if($Items <= 0){

                    $arr = array('message' => 'err', 'title' => 'Quantity of returned item cannot be null!');
                    return $arr;
                    
                }

            } */

            $order_data=DB::table('store_orders')
            ->where('transaction_id',$request->transaction_id)
            ->first();

            $dt = Carbon::now()->format('Y-m-d');
            $auth_id = Auth::id();
            $auth_user = Auth::user()->name;
            $Order = new StoreOrder();

            //already modify
            $Order->invoice_no = $request->slip_no;
            $Order->date = $request->slip_date;
            $Order->transaction_type = 'REPLACEMENT SLIP';
            $Order->account_name = $order_data->account_name;
            $Order->account_no = $order_data->account_no;
            $Order->customer_address = $order_data->customer_address;
            $Order->customer_name = $order_data->customer_name;
            $Order->encoder = $auth_user;
            $Order->encoder_id = $auth_id;
            $Order->remarks = $request->slip_remarks;
            

            if($Order->save()){

                $now = Carbon::now();
                $invID = str_pad($Order->id, 4, '0', STR_PAD_LEFT);

                DB::table('store_orders')->orderBy('id', 'DESC')
                ->limit(1)
                ->update(array('transaction_id' => $now->year. '-' .$now->month. '-' .$invID ));

                /* $payment = new TransactionHistory();
                $payment->transaction_id = $now->year. '-' .$now->month. '-' . $invID ;
                $payment->invoice_no = $request->invoice_no;
                $payment->customer_name = $request->customer_name;
                $payment->encoder = $auth_user;
                $payment->transaction_type = $request->invoice_type;
                $payment->payment_type = $request->payment;
                $payment->payment_status= $request->payment_status;
                $payment->save(); */

                $contents = DB::table('store_replaced_items')
                ->where('user_id', $auth_id)
                ->where('status','=','REPLACEMENT')
                ->where('transaction_id', '=',$request->transaction_id)
                ->where('replacement_slip_no','=', null)
                ->get();

                
                $returned = DB::table('store_replaced_items')
                ->where('user_id', $auth_id)
                ->where('status','=','RETURNED')
                ->where('transaction_id', '=',$request->transaction_id)
                ->where('replacement_slip_no','=', null)
                ->get();

                /* $trId = DB::table('store_orders')->where('id',$Order->id)->first();

                DB::table('store_items')
                ->where('user_id', $auth_id)
                ->where('transaction_id','=',null)
                ->update(array('transaction_id' => $trId->transaction_id)); */

                foreach ($contents as $content) {

                    $transaction_item = new TransactionItem();
                    $transaction_item->user_id = $content->user_id;
                    $transaction_item->invoice_num = $request->slip_no;
                    $transaction_item->product_id = $content->item_id;
                    $transaction_item->transaction_id = $request->transaction_id;
                    $transaction_item->transaction_type = $content->status;
                    $transaction_item->quantity = $content->quantity;
                    $transaction_item->lot_no = $content->lot_no;
                    $transaction_item->rock = $content->rack;
                    $transaction_item->shelf = $content->shelf;
                    $transaction_item->location_address = 'STORE';
                    $transaction_item->expiration_date = $content->expiration_date;
                    $transaction_item->save();

                }

                foreach ($returned as $return) {

                    $transaction_item = new TransactionItem();
                    $transaction_item->user_id = $return->user_id;
                    $transaction_item->invoice_num = $request->slip_no;
                    $transaction_item->product_id = $return->item_id;
                    $transaction_item->transaction_id = $request->transaction_id;
                    $transaction_item->transaction_type = $return->status;
                    $transaction_item->quantity = $return->quantity;
                    $transaction_item->lot_no = $return->lot_no;
                    $transaction_item->location_address = 'STORE';
                    $transaction_item->rock = $return->rack;
                    $transaction_item->shelf = $return->shelf;
                    $transaction_item->expiration_date = $return->expiration_date;
                    $transaction_item->save();

                }

                DB::table('store_replaced_items')
                ->where('transaction_id','=',$request->transaction_id)
                ->where('replacement_slip_no','=',null)
                ->update(array('replacement_slip_no' => $request->slip_no));

                DB::table('store_items')
                ->where('transaction_id','=',$request->transaction_id)
                ->where('return_replace','=','REPLACED')
                ->update(array('replace' => '1','return_replace'=>null));

                // old code here
            $arr = array('message' => 'Transaction Complete', 'title' => 'Saved!');

            return $arr;
             }else{
                 return 'err';
             }


    }


    public function index($transaction_id)
    {
       
        $order_data=DB::table('store_orders')
        ->where('transaction_id',$transaction_id)
        ->first();
        
        $transaction_id =  $transaction_id;

        //need to chance due to not tally data
        $store_items=DB::table('store_items')
        ->where('transaction_id','=',$transaction_id)
        ->get();

        //$getpurchasenumber=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->first();
        //$gettotalpayment=DB::table('transaction_histories')->where('transaction_id',$transaction_id)->sum('total_payment');

        //wrong query
        /* $store_orders=DB::table('store_orders')->where('transaction_id',$transaction_id)->first();
        return $store_items=DB::table('store_items')
        ->join('store_orders', 'store_orders.transaction_id','store_items.transaction_id')
        ->select('store_items.*','store_orders.*')
        ->where('store_orders.transaction_id','=',$transaction_id)
        ->get(); */



        $store_returns=DB::table('store_items')
        ->where('transaction_id','=',$transaction_id)
        ->where('return_replace','=','REPLACED')
        ->get();

        $trno_store_replaced=DB::table('store_replaced_items')
        ->where('transaction_id','=',$transaction_id)
        ->pluck('replacement_slip_no');
        $data  = collect($trno_store_replaced)->unique();
        
        $Data=[];
        $temp2 = [];

        foreach ($store_returns as  $store_item) {
            
            $get_store_replaced_items = DB::table('store_replaced_items')
            ->where('transaction_id','=',$transaction_id)
            ->where('item_id','=',$store_item->product_id)
            ->where('replacement_slip_no',null)
            ->where('status','=','RETURNED')
            ->sum('quantity');
            
             $odersItems=[
                'replaced_qty'=>$get_store_replaced_items /* $store_item->replaced_qty */,
                'id'=>$store_item->id,
                'transaction_id'=>$store_item->transaction_id,
                'product_id'=>$store_item->product_id,
                'unit'=>$store_item->unit,
                'quantity'=>$store_item->quantity,
                'amount'=>$store_item->amount,
                'original_total'=>$store_item->original_total,
                'total'=>/* $store_item->total */$get_store_replaced_items * $store_item->amount,
                'product_name'=>$store_item->product_name,
                'return_replace'=>$store_item->return_replace,
                'return_qty'=>$store_item->return_qty,
                'item_status'=>$store_item->item_status,
                'replaced'=>'[]',
             ];
             
             /* return $store_item->product_id; */
             /* return $store_item->id;
             return $store_item->product_id; */
             $returnItems=DB::table('store_replaced_items')
            ->where('transaction_id','=',$transaction_id)
            ->where('replaced_product_id','=',$store_item->product_id)
            /* ->where('item_id','=',$store_item->product_id) */
            ->where('replacement_slip_no','=',null)
            ->where('deleted','=',null)
            ->get();
            
            if(count($returnItems)>0){

                $temp2=[];

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

         /* foreach ($replacements as $key => $value) {
            if($value['replaced']=="[]"){

            }else{
                foreach ($value['replaced'] as $key ) {
                    $key['product_name1'];
                }
            }
         } */

        return view('store.replacement', compact('order_data','order_data','transaction_id','data','store_items','store_returns','replacements'));
    }

       


}
    