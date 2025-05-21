<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPermission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class membrRegistration extends Controller
{
    public function registration_member(Request $request){
     //  dd($request->all());
        DB::beginTransaction();
        try {

            $userData = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin,
                'position' => $request->position,
               // 'areacode' => $request->areacode,
            ]);
            if($request->is_admin == 1){
                $permission = new UserPermission();            
                $permission->user_id =  $userData->id;
                $permission->add_product = 1;
                $permission->edit_product = 1;
                $permission->view_polist = 1;
                $permission->receive_polist = 1;
                $permission->edit_polist = 1;
                $permission->pdf_download_polist = 1;
                $permission->add_new_supplier = 1;
                $permission->edit_supplier = 1;
                $permission->delete_supplier = 1;
                $permission->add_product_form = 1;
                $permission->submit_po_form = 1;
                 $permission->purchase_order = 1;
                 $permission->inventory = 1;
                 $permission->product_manual_adjust = 1;
                 $permission->product_management = 1;
                 $permission->supplier_management = 1;
                 $permission->setting = 1;
                 $permission->requestDelete = 1;
                 $permission->requestDelete_nav = 1;                 
                $permission->added_by = "register";
                $permission->save();
            }

            if($request->is_admin == 2){
                $permission = new UserPermission();            
                $permission->user_id =  $userData->id;
                $permission->add_product = 1;
                $permission->edit_product = 1;
                $permission->view_polist = 1;
                $permission->receive_polist = 1;
                $permission->edit_polist = 1;
                $permission->pdf_download_polist = 1;
                $permission->add_new_supplier = 1;
                $permission->edit_supplier = 1;
                $permission->delete_supplier = 1;
                $permission->add_product_form = 1;
                $permission->submit_po_form = 1;
                 $permission->purchase_order = 1;
                 $permission->inventory = 1;
                 $permission->product_manual_adjust = 0;
                 $permission->product_management = 1;
                 $permission->supplier_management = 1;
                 $permission->setting = 0;
                $permission->added_by = "register";
                $permission->save();
            }
            
           
        DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
             return response()->json([
                'message'=>$e->getline()
            ],500);
        }

    }
}
