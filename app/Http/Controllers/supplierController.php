<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Supplier;
use App\UserPermission;

class supplierController extends Controller
{
    public function index(){
        $auth_id =Auth::id();
        $permission = UserPermission::where('user_id', $auth_id)->first();
        return view('inventory.supplierMangement.index', compact('permission'));
    }

    public function index_data(Request $request){

        $auth_id =Auth::id();
        $permission = UserPermission::where('user_id', $auth_id)->first();
       
        $supplier_list= DB::table('suppliers')->get(); 
       $totalData = count($supplier_list);       
       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');

        $dir = $request->input('order.0.dir');
        $columns = array(          
            0 => 'name',
            1 => 'contact_person',
            2 => 'address',
            3 => 'email',
            4 => 'mobile_no',
            5 => 'landline',
            6 => 'tin',
            7 => 'payment_term',
            8 => 'status',
            9 => 'created_at',
    
        );

        $order = $columns[$request->input('order.0.column')];
       $supplier_list="";
       if(empty($request->input('search.value'))){  
           $supplier_list= DB::table('suppliers')           
           ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)   	   
           ->get(); 
       }else{
            $search = $request->input('search.value');
            $supplier_list= DB::table('suppliers')
           ->orWhere('status',$search)
           ->orWhere(function($query) use ($search){
           $query->where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%")
            ->orWhere('contact_person','like',"%$search%")
            ->orWhere('mobile_no','like',"%$search%")
            ->orWhere('landline','like',"%$search%")
            ->orWhere('tin','like',"%$search%")
            ->orWhere('payment_term','like',"%$search%")
            ->orWhere('created_at','like',"%$search%");
            })
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)  
            ->get(); 
           $supplier_list_temp= DB::table('suppliers')           
           ->orWhere('status',$search)
           ->orWhere(function($query) use ($search){
               $query->where('name','like',"%$search%")
                ->orWhere('email','like',"%$search%")
                ->orWhere('contact_person','like',"%$search%")
                ->orWhere('mobile_no','like',"%$search%")
                ->orWhere('landline','like',"%$search%")
                ->orWhere('tin','like',"%$search%")
                ->orWhere('payment_term','like',"%$search%")
                ->orWhere('created_at','like',"%$search%");
                })
                ->orderBy($order,$dir)
                ->offset($start)
                ->limit($limit)  
                ->get(); 
           $totalFiltered=count($supplier_list_temp);
       }
      $data = array();
       if($supplier_list){
           foreach ($supplier_list as $supplier_list) { 
               $nestedData['name'] = $supplier_list->name;  
               $nestedData['contact_person'] = $supplier_list->contact_person;  
               $nestedData['address'] = $supplier_list->address;  
               $nestedData['email'] = $supplier_list->email;  
               $nestedData['mobile_no'] = $supplier_list->mobile_no;                
               $nestedData['landline'] = $supplier_list->landline;
               $nestedData['tin'] = $supplier_list->tin;
               $nestedData['payment_term'] = $supplier_list->payment_term;
               $nestedData['status'] = $supplier_list->status;
               $nestedData['created_at'] =  date('M-d-Y', strtotime($supplier_list->created_at));;
               $nestedData['action'] = "<div class='dropdown'>
               <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                   <span class='caret'></span></button>
                <ul class='dropdown-menu'>";
                if($permission->edit_supplier == 1){
                    $nestedData['action'] .="<li><a href='#' onclick=btn_action($supplier_list->id,'edit') class='dropdown-item' title='Edit Supplier Details'>Edit</a></li>";
                } else {
                    $nestedData['action'] .="<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='Edit Supplier Details'>Edit</a></li>";
                }
                if($permission->delete_supplier == 1){
                    $nestedData['action'] .="<li><a href='#' onclick=btn_action($supplier_list->id,'delete') class='dropdown-item' title='Delete Supplier Details'>Delete</a></li>";
                }else{
                    $nestedData['action'] .="<li><a href='#' onclick='return false' class='dropdown-item btn-disable' title='Delete Supplier Details'>Delete</a></li>";
                }


                
                
               
               $nestedData['action'] .= "</ul></div>";
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


    public function newsupplier(Request $request){
      
        DB::beginTransaction();
        try {
            $Supplier = new Supplier();
            $Supplier->name= $request->name_add;
            $Supplier->email=$request->supplier_email_add;
            $Supplier->address=$request->address_add;
            $Supplier->contact_person=$request->contact_person_add;
            $Supplier->mobile_no=$request->mobile_no_add;            
            $Supplier->landline=$request->landline_add;
            $Supplier->tin= $request->tin_add;
            $Supplier->payment_term=$request->payment_term_add;
            $Supplier->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        } 
    }


    public function getOneSupplier(Request $request){
        DB::beginTransaction();
        try {    
      $suppliers=  DB::table('suppliers')->where('id', $request->id)->get();
      return json_decode($suppliers);
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function editSupplier(Request $request){
        DB::beginTransaction(); 
        try {            
                $Supplier =  Supplier::find($request->id_edit);
                $Supplier->name=$request->name_edit;
                $Supplier->email=$request->supplier_email_edit;
                $Supplier->contact_person=$request->contact_person_edit;
                $Supplier->address=$request->address_edit;
                $Supplier->mobile_no=$request->mobile_no_edit;
                $Supplier->landline=$request->landline_edit;            
                $Supplier->tin=$request->tin_edit;
                $Supplier->payment_term=$request->payment_term_edit;
                $Supplier->status = $request->status_edit;
                $Supplier->save();
    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            }
    }
    
}
