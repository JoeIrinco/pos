<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Auth;
use DB;

class brandController extends Controller
{
    public function  brandManagement(){
        return view('inventory.settings.brand.brand');
    }


    public function brandAutoComplete(Request $request){
        if($request->data == "" || !isset($request->data)){
            return "";
        }
          $brand_list= DB::table('store_product_lists')                   
          ->where('brand',$request->data)
          ->get(); 
        
          if(count($brand_list)>0){
            $array =  explode("-",$brand_list[0]->product_code);
            $countData =count($brand_list)+1;
            return $array[0]."-0000". $countData;
          }else{
            $number = rand(10,100);
                 $productCode =  "VE00".$number."-00001";

                 $brand_list= DB::table('store_product_lists')                   
                ->where('product_code', $productCode)
                ->get(); 
                if(count($brand_list)==0){
                    return  $productCode ;
                }
        
        
            

          }
            
    }
    public function brandList(Request $request){
        $brand_list= DB::table('brands')->where('status',0)->get(); 
       $totalData = count($brand_list);       
       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');

           $dir = $request->input('order.0.dir');



       $brand_list="";
       if(empty($request->input('search.value'))){  
           $brand_list= DB::table('brands')
           ->where('status',0)
           ->offset($start)
           ->limit($limit)   	   
           ->get(); 
       }else{
           $search = $request->input('search.value');
           $brand_list= DB::table('brands')
           ->where('status',0)
           ->where(function($query) use ($search){
           $query->where('name','like',"%$search%");
            })->get(); 
           $brand_list_temp= DB::table('brands')
           ->where('status',0)
           ->where(function($query) use ($search){
               $query->where('name','like',"%$search%");
                })->get(); 
           $totalFiltered=count($brand_list_temp);
       }
      $data = array();
       if($brand_list){
           foreach ($brand_list as $brand_lists) { 
            $nestedData['name'] = $brand_lists->name;                
            $nestedData['code'] = $brand_lists->code;                
               $nestedData['created_at'] = $brand_lists->created_at;
               $nestedData['action'] = "<div class='dropdown'>
               <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                   <span class='caret'></span></button>
               <ul class='dropdown-menu'>
                   <li><a href='#' onclick=btn_action($brand_lists->id,'edit') class='dropdown-item' title='Edit Product Details'>Edit</a></li>
                   <li><a href='#' onclick=btn_action($brand_lists->id,'delete') class='dropdown-item' title='Delete Product Details'>Delete</a></li>
                  
               </ul>
               </div>"  ;
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

   public function newbrand(Request $request){
    DB::beginTransaction();
    try {    
        if(DB::table('brands')->where('name',$request->new_brand_add)->count()>0){
            return "duplicated";
        }        
            $auth_id =Auth::id();
            $Brand = new Brand();
            $Brand->code=$request->new_brand_code_add;
            $Brand->name=$request->new_brand_add;
            $Brand->user_id=$auth_id;
            $Brand->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
}

public function getOnebrand(Request $request){
    DB::beginTransaction();
    try {    
  $product=  DB::table('brands')->where('id', $request->id)->get();
  return json_decode($product);
    } catch (Exception $e) {
        DB::rollback();
         return response()->json([
            'message'=>$e->getMessage()
        ],500);
    } 
}


public function editbrand(Request $request){   
    try {
    DB::beginTransaction();
        $StoreProductList =  Brand::find($request->id_edit);
        $StoreProductList->code=$request->brand_code_edit;           
        $StoreProductList->name=$request->brand_edit;           
        $StoreProductList->save();

    DB::commit();
    } catch (Exception $e) {
        DB::rollback();
         return response()->json([
            'message'=>$e->getMessage()
        ],500);
    } 

    

}

public function deletebrand(Request $request){   
    DB::beginTransaction();
    try {    
            
    if(DB::table('brands')->where('id', $request->id)->update(['status' => 1])){
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


}
