<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserPermission;
use App\PosPermission;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserPermissionController extends Controller
{

    
    public function addPosPermissionData() {
        $users = DB::table('user_permissions')
        ->rightJoin('users', 'users.id', '=', 'pos_permissions.user_id')
        ->select('users.id as users_id', 'pos_permissions.*', 'users.*')
        ->get();
    }
    public function getPermissionView() {
        $users = DB::table('user_permissions')
                ->rightJoin('users', 'users.id', '=', 'user_permissions.user_id')
                ->select('users.id as users_id', 'user_permissions.*', 'users.*')
                ->get();

        return view('permission.index', compact('users'));
    }


    public function getOneUserPermission(Request $request){
        DB::beginTransaction();
        try {  
            $users="";  
        $userType=  DB::table('users')->where('id', $request->id)->first();
        if($userType->is_admin==1){
            $user=  DB::table('pos_permissions')->where('user_id', $request->id)->get();
        }else{
            $user=  DB::table('user_permissions')->where('user_id', $request->id)->get();
        } 
        
      return $user;
    //  return json_decode($user);
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function addInventoryPermission(Request $request) {

        $currentuserid = Auth::user()->id;
        DB::beginTransaction();
        try {
            
           $permission = new UserPermission();            
            $permission->user_id = $request->user_id;
            $permission->add_product = isset($request->add_product) ? 1 : 0;
            $permission->edit_product = isset($request->edit_product) ? 1 : 0;
            $permission->view_polist = isset($request->view_polist) ? 1 : 0;
            $permission->receive_polist = isset($request->receive_polist) ? 1 : 0;
            $permission->edit_polist = isset($request->edit_polist) ? 1 : 0;
            $permission->pdf_download_polist = isset($request->pdf_download_polist) ? 1 : 0;
            $permission->add_new_supplier = isset($request->add_new_supplier) ? 1 : 0;
            $permission->edit_supplier = isset($request->edit_supplier) ? 1 : 0;
            $permission->delete_supplier = isset($request->delete_supplier) ? 1 : 0;
            $permission->add_product_form = isset($request->add_product_form) ? 1 : 0;
            $permission->submit_po_form = isset($request->submit_po_form) ? 1 : 0;
            $permission->purchase_order = isset($request->purchase_order) ? 1 : 0;
            $permission->inventory = isset($request->inventory) ? 1 : 0;
            $permission->product_manual_adjust = isset($request->product_manual_adjust) ? 1 : 0;
            $permission->product_management = isset($request->product_management) ? 1 : 0;
            $permission->supplier_management = isset($request->supplier_management) ? 1 : 0;
            $permission->setting = isset($request->setting) ? 1 : 0;
            $permission->purchase_order_list = isset($request->purchase_order_list) ? 1 : 0;
            $permission->purchase_order_form = isset($request->purchase_order_form) ? 1 : 0;
            $permission->purchase_invoice_list = isset($request->purchase_invoice_list) ? 1 : 0;
            $permission->product_inventory = isset($request->product_inventory) ? 1 : 0;
            $permission->near_expiry_product_list = isset($request->near_expiry_product_list) ? 1 : 0;
            $permission->critical_level_product_list = isset($request->critical_level_product_list) ? 1 : 0;
            $permission->product_manual_add_list = isset($request->product_manual_add_list) ? 1 : 0;
            $permission->add_minus_product_qty = isset($request->add_minus_product_qty) ? 1 : 0;
            $permission->import_product_data = isset($request->import_product_data) ? 1 : 0;
            $permission->adjust_product_price_manual = isset($request->adjust_product_price_manual) ? 1 : 0;
            $permission->branches_management = isset($request->branches_management) ? 1 : 0;
            $permission->units_management = isset($request->units_management) ? 1 : 0;
            $permission->location_management = isset($request->location_management) ? 1 : 0;
            $permission->user_management = isset($request->user_management) ? 1 : 0;
            $permission->product_list = isset($request->product_list) ? 1 : 0;
            $permission->supplier_list = isset($request->supplier_list) ? 1 : 0;
            $permission->requestDelete = isset($request->deleteRequest) ? 1 : 0; 
            $permission->requestDelete_nav = isset($request->deleteRequest_nav) ? 1 : 0;    
            $permission->editAddManualDetails = isset($request->add_details) ? 1 : 0;    
            $permission->deleteAddManualDetails = isset($request->add_delete_details) ? 1 : 0;        
            $permission->added_by = $currentuserid;
            $permission->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getline()
            ],500);
        } 

    }

    public function addPosPermission(Request $request) {
       
        $currentuserid = Auth::user()->id;
        DB::beginTransaction();
        try {
            
           $permission = new PosPermission();            
            $permission->user_id = $request->pos_user_id;
            $permission->store = isset($request->Store) ? 1 : 0;
            $permission->dashboard = isset($request->dashboard) ? 1 : 0;
            $permission->pos = isset($request->pos) ? 1 : 0;
            $permission->general_report = isset($request->generate_report) ? 1 : 0;
            $permission->transaction_history = isset($request->transaction_history) ? 1 : 0;
            $permission->ar = isset($request->AR) ? 1 : 0;
            $permission->pending_document = isset($request->pending_Document) ? 1 : 0;
            $permission->added_by = $currentuserid;
            $permission->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getline()
            ],500);
        } 

    }

    

    public function editInventoryPermission(Request $request) {

        $currentuserid = Auth::user()->id;

        DB::beginTransaction();
        try {
            
            $permission =  UserPermission::find($request->permission_id_edit);
            $permission->user_id = $request->user_id_edit;
            $permission->add_product = isset($request->add_product) ? 1 : 0;
            $permission->edit_product = isset($request->edit_product) ? 1 : 0;
            $permission->view_polist = isset($request->view_polist) ? 1 : 0;
            $permission->pdf_download_polist = isset($request->pdf_download_polist) ? 1 : 0;
            $permission->receive_polist = isset($request->receive_polist) ? 1 : 0;
            $permission->edit_polist = isset($request->edit_polist) ? 1 : 0;
            $permission->add_new_supplier = isset($request->add_new_supplier) ? 1 : 0;
            $permission->edit_supplier = isset($request->edit_supplier) ? 1 : 0;
            $permission->delete_supplier = isset($request->delete_supplier) ? 1 : 0;
            $permission->add_product_form = isset($request->add_product_form) ? 1 : 0;
            $permission->submit_po_form = isset($request->submit_po_form) ? 1 : 0;
            $permission->purchase_order = isset($request->edit_purchase_order) ? 1 : 0;
            $permission->inventory = isset($request->edit_inventory) ? 1 : 0;
            $permission->product_manual_adjust = isset($request->edit_product_manual_adjust) ? 1 : 0;
            $permission->product_management = isset($request->edit_product_management) ? 1 : 0;
            $permission->supplier_management = isset($request->edit_supplier_management) ? 1 : 0;
            $permission->setting = isset($request->edit_setting) ? 1 : 0;
            $permission->purchase_order_list = isset($request->edit_purchase_order_list) ? 1 : 0;
            $permission->purchase_order_form = isset($request->edit_purchase_order_form) ? 1 : 0;
            $permission->purchase_invoice_list = isset($request->edit_purchase_invoice_list) ? 1 : 0;
            $permission->product_inventory = isset($request->edit_product_inventory) ? 1 : 0;
            $permission->near_expiry_product_list = isset($request->edit_near_expiry_product_list) ? 1 : 0;
            $permission->critical_level_product_list = isset($request->edit_critical_level_product_list) ? 1 : 0;
            $permission->product_manual_add_list = isset($request->edit_product_manual_add_list) ? 1 : 0;
            $permission->add_minus_product_qty = isset($request->edit_add_minus_product_qty) ? 1 : 0;
            $permission->import_product_data = isset($request->edit_import_product_data) ? 1 : 0;
            $permission->adjust_product_price_manual = isset($request->edit_adjust_product_price_manual) ? 1 : 0;
            $permission->branches_management = isset($request->edit_branches_management) ? 1 : 0;
            $permission->units_management = isset($request->edit_units_management) ? 1 : 0;
            $permission->location_management = isset($request->edit_location_management) ? 1 : 0;
            $permission->user_management = isset($request->edit_user_management) ? 1 : 0;
            $permission->product_list = isset($request->edit_product_list) ? 1 : 0;
            $permission->supplier_list = isset($request->edit_supplier_list) ? 1 : 0;
            $permission->requestDelete = isset($request->edit_deleteRequest) ? 1 : 0;  
            $permission->requestDelete_nav = isset($request->edit_deleteRequest_nav) ? 1 : 0;

            $permission->editAddManualDetails = isset($request->edit_details) ? 1 : 0; 
            $permission->deleteAddManualDetails = isset($request->edit_delete_details) ? 1 : 0; 
            
            
            $permission->added_by = $currentuserid;
            $permission->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getline()
            ],500);
        } 

    }


    public function editPosPermissionData(Request $request) {

        $currentuserid = Auth::user()->id;

        DB::beginTransaction();
        try {
            
            $permission =  PosPermission::find($request->edit_pos_user_id);
           
            $permission->store=isset($request->edit_pos_Store) ? 1 : 0;
            $permission->dashboard=isset($request->edit_pos_dashboard) ? 1 : 0;
            $permission->pos=isset($request->edit_pos_pos) ? 1 : 0;
            $permission->general_report=isset($request->edit_pos_generate_report) ? 1 : 0;
            $permission->transaction_history=isset($request->edit_pos_transaction_history) ? 1 : 0;
            $permission->ar=isset($request->edit_pos_AR) ? 1 : 0;
            $permission->pending_document=isset($request->edit_pos_pending_Document) ? 1 : 0;
            
            $permission->added_by = $currentuserid;
            $permission->save();

        DB::commit();
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getline()
            ],500);
        } 

    }

    

    
}
