<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Branch;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
{
    
    
    public function newbranch(Request $request){
        DB::beginTransaction();
        try {            
                $auth_id =Auth::id();
                $Branch = new Branch();
                $Branch->name=$request->new_branch_add;
                $Branch->user_id=$auth_id;
                $Branch->save();
    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            }
    }

    public function getOnebranch(Request $request){
        DB::beginTransaction();
        try {    
      $product=  DB::table('branches')->where('id', $request->id)->get();
      return json_decode($product);
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        } 
    }

    public function editbranch(Request $request){   
        try {
        DB::beginTransaction();
            $StoreProductList =  Branch::find($request->id_edit);
            $StoreProductList->name=$request->branch_edit;           
            $StoreProductList->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        } 

    }

    public function deletebranch(Request $request){   
        DB::beginTransaction();
        try {    
                
        if(DB::table('branches')->where('id', $request->id)->update(['status' => 1])){
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


    
    public function unitManagement(){        
        return view('inventory.settings.unit.unit');
    }
    
    public function  branchManagement(){
        return view('inventory.settings.branch.branch');
    }



    public function branchList(Request $request){
         $branch_list= DB::table('branches')->where('status',0)->get(); 
        $totalData = count($branch_list);       
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');

            $dir = $request->input('order.0.dir');



        $branch_list="";
        if(empty($request->input('search.value'))){  
            $branch_list= DB::table('branches')
            ->where('status',0)
            ->offset($start)
            ->limit($limit)   	   
	        ->get(); 
        }else{
            $search = $request->input('search.value');
            $branch_list= DB::table('branches')
            ->where('status',0)
            ->where(function($query) use ($search){
            $query->where('name','like',"%$search%");
             })->get(); 
            $branch_list_temp= DB::table('branches')
            ->where('status',0)
            ->where(function($query) use ($search){
                $query->where('name','like',"%$search%");
                 })->get(); 
            $totalFiltered=count($branch_list_temp);
        }
       $data = array();
        if($branch_list){
            foreach ($branch_list as $branch_lists) { 
                $nestedData['name'] = $branch_lists->name;                
                $nestedData['created_at'] = $branch_lists->created_at;
                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                <ul class='dropdown-menu'>
                    <li><a href='#' onclick=btn_action($branch_lists->id,'edit') class='dropdown-item' title='Edit Product Details'>Edit</a></li>
                    <li><a href='#' onclick=btn_action($branch_lists->id,'delete') class='dropdown-item' title='Delete Product Details'>Delete</a></li>
                   
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

/* units */
    public function  unitanagement(){
        return view('inventory.settings.unit.unit');
    }

    public function unitList(Request $request){
       $unit_list= DB::table('units')->where('status',0)->get(); 
       $totalData = count($unit_list);       
       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');

        $dir = $request->input('order.0.dir');



       $unit_list="";
       if(empty($request->input('search.value'))){  
           $unit_list= DB::table('units')
           ->where('status',0)
           ->offset($start)
           ->limit($limit)   	   
           ->get(); 
       }else{
           $search = $request->input('search.value');
            $unit_list= DB::table('units')
           ->where('status',0)
           ->where(function($query) use ($search){
           $query->where('unit','like',"%$search%");
            })->get(); 
           $unit_list_temp= DB::table('units')
           ->where('status',0)
           ->where(function($query) use ($search){
               $query->where('unit','like',"%$search%");
                })->get(); 
           $totalFiltered=count($unit_list_temp);
       }
      $data = array();
       if($unit_list){
           foreach ($unit_list as $unit_lists) { 
               $nestedData['unit'] = $unit_lists->unit;                
               $nestedData['created_at'] = $unit_lists->created_at;
               $nestedData['action'] = "<div class='dropdown'>
               <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                   <span class='caret'></span></button>
               <ul class='dropdown-menu'>
                   <li><a href='#' onclick=btn_action($unit_lists->id,'edit') class='dropdown-item' title='Edit Product Details'>Edit</a></li>
                   <li><a href='#' onclick=btn_action($unit_lists->id,'delete') class='dropdown-item' title='Delete Product Details'>Delete</a></li>
                  
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

           public function getOneunit(Request $request){
            DB::beginTransaction();
            try {    
          $product=  DB::table('units')->where('id', $request->id)->get();
          return json_decode($product);
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            } 
        }

        public function newunit(Request $request){
            DB::beginTransaction();
            try {            
                    $auth_id =Auth::id();
                    $Unit = new Unit();
                    $Unit->unit=$request->new_unit_add;
                    $Unit->user_id=$auth_id;
                    $Unit->save();
        
                DB::commit();
                } catch (Exception $e) {
                    DB::rollback();
                     return response()->json([
                        'message'=>$e->getMessage()
                    ],500);
                }
        }

        public function editunit(Request $request){   
            try {
            DB::beginTransaction();
                $Unit =  Unit::find($request->id_edit);
                $Unit->unit=$request->unit_edit;           
                $Unit->save();
    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            } 
    
        }


        public function deleteunit(Request $request){   
            DB::beginTransaction();
            try {                                   
            if(DB::table('units')->where('id', $request->id)->update(['status' => 1])){
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
