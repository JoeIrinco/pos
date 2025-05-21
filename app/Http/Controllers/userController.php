<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use File;

class userController extends Controller
{
    public function profileData(Request $request){
        if($request->id != Auth::id()){
            return redirect('inventory/profile/'.Auth::id());
        }
        $pic="";
          $users = DB::table('users')->where('id',$request->id)->first();
          if(isset($users->profile_path)){
            $pic= $users->profile_path;
          }else{
            $pic= 'profile.png';
          }
          
        return view('inventory.profile.index',compact('users','pic'));
    }

    public function updateProfile(Request $request)
    {
        
        $image_name="";
        if(isset($request->password)){
            if($request->password != $request->cpassword){
                return "password";
            }
        }
       
        $id=Auth::id();       
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
        if($file = $request->hasFile('image')) {
               
         
            $image = $request->file('image');
          
                $oldpath = Auth::user()->profile_path;
                $dir="public/image/profile/".$oldpath ; 
                File::delete($dir);

                $image_name = $image->getClientOriginalName();
                $dir="public/image/profile/".$id;  
                if (!File::exists($dir)) {
                    File::makeDirectory($dir);
                }
              //  $image->move($dir,$image_name);
                if($image->move($dir,$image_name)){
                    $data= Auth::id().'/'. $image_name;
                    DB::table('users')
                  ->where('id',Auth::id())
                  ->update(['profile_path' => $data,'filename' => $image_name]);
    
                  if($request->password !=""){
                    DB::table('users')
                    ->where('id', Auth::id())
                    ->update([        
                        'name' => $request->fname,                    
                        'password' => Hash::make($request->password),                   
                        'position' => $request->position,
                     
                
                ]);
                }else{
                    DB::table('users')
                ->where('id', Auth::id())
                ->update([        
                    'name' => $request->fname,         
                    'position' => $request->position,                               
                ]);
                }            
                    return $id;
               }
  
        }else{  
                            
            $data= Auth::id().'/'. $image_name;            
            if($request->password !=""){
              DB::table('users')
              ->where('id', Auth::id())
              ->update([        
              'name' => $request->fname,                    
              'password' => Hash::make($request->password),                   
              'position' => $request->position,]);
          }else{
              DB::table('users')
          ->where('id', Auth::id())
          ->update([        
              'name' => $request->fname,         
              'position' => $request->position,                               
          ]);
          }            
              return $id;
        }
  }

    public function index() {
         $users = DB::table('user_permissions')               
                ->rightJoin('users', 'users.id', '=', 'user_permissions.user_id')
               // ->leftJoin('users', 'users.id', '=', 'pos_permissions.user_id')
                ->select('users.*','users.id as users_id', 'user_permissions.id as UpId','user_permissions.*')
               /*  ->select('users.id as users_id', 'user_permissions.*', 'users.*') */
                ->get();
                
        return view('inventory.userManagement.index', compact('users'));
    }



    public function userDataFilter(Request $request) {
        
        $users = DB::table('users')
        ->select('users.*','users.id as users_id')        
        ->get();


        $totalData = count($users);
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $columns = array(
            0 => 'name',
            1 => 'email', 
            2 => 'is_admin',        
            3 => 'created_at',        
        );
        $order = $columns[$request->input('order.0.column')];
        $users="";
        if(empty($request->input('search.value')) && $request->data==""){
            $users = DB::table('users')
        ->select('users.*','users.id as users_id')
            ->orderBy($order,$dir)
            ->offset($start)
            ->limit($limit)
	        ->get();
        }else{

            $search = $request->input('search.value');
            if(isset($request->data)){
                $search= $request->data;
            }
            $users = DB::table('users')
            ->select('users.*','users.id as users_id')
            ->where(function($query) use ($search){
            $query->where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%");
             })
             ->orderBy($order,$dir)
             ->offset($start)
             ->limit($limit)
             ->get();
            $product_lists_temp= DB::table('store_product_lists')

            ->where(function($query) use ($search){
                $query->where('product_code','like',"%$search%")
                ->orWhere('productname','like',"%$search%")
                ->orWhere('unit','like',"%$search%")
                ->orWhere('status','like',"%$search%");
                 })
                 ->orderBy($order,$dir)
                 ->offset($start)
                 ->limit($limit)
                 ->get();
            $totalFiltered=count($product_lists_temp);
        }
       $data = array();
        if($users){
            foreach ($users as $user) {
                $nestedData['name'] = $user->name;
                $nestedData['email'] = $user->email;

                if($user->is_admin == 0){
                    $role = "Admin";
                }                   
                else if($user->is_admin == 2){
                    $role = "Inventory";
                }                   
                else if ($user->is_admin == 1){
                    $role = "User/pos";
                }

                $nestedData['role'] =  $role;

                $nestedData['created_at'] =  date('M-d-Y', strtotime($user->created_at));
                $nestedData['updated_at'] =  date('M-d-Y', strtotime($user->updated_at));
                $userRole="";
                if($role == "Inventory"){
                    $userRole= DB::table('user_permissions')->where('user_id',$user->id)->first();
                }else if( $role == "User/pos"){
                    $userRole= DB::table('pos_permissions')->where('user_id',$user->id)->first();
                }
                $button="";
                if ($userRole!="")
               /*  <li class="li-enabled"><a  href='#' data-toggle="modal" data-target="#" data-id="{!!$user->users_id.'%'.$user->is_admin!!}" class="btn-edit-inventory dropdown-item" title="Edit" >Edit Permission</a></li> */
               $button = "<li class='li-enabled'><a  href='#' data-toggle='modal' data-target='#'data-id='$user->users_id%$user->is_admin' class='btn-edit-inventory dropdown-item' title='Edit' >Edit Permission</a></li>";

                else{
                    /* $button = "<li class='li-enabled'><a  href='#' data-toggle='modal' data-target='#'data-id='$user->users_id.".\'%'.\".$user->is_admin' class='btn-new-permission dropdown-item' title='Add' >Add Permission</a></li>" */
                 if($role != "Admin"){
                    $button = "<li class='li-enabled'><a  href='#' data-toggle='modal' data-target='#'data-id='$user->users_id%$user->is_admin' class='btn-new-permission dropdown-item' title='Add' >Add Permission</a></li>";
                 }   
                

                }
                $nestedData['action'] = "<div class='dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                    <span class='caret'></span></button>
                <ul class='dropdown-menu'>
                    <li class='li-enabled'><a  href='#' data-toggle='modal' id='edit_user'  data-id=\"$user->users_id\" class='btn-new-inventory dropdown-item edit_user' title='Edit User' >Edit User</a></li>
                    ".$button."
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

    public function getOneser(Request $request){
      
        return $users = DB::table('users')->where('id',$request->user_id)->first();
        return json_encode($users);
    }

    public function updategetOneser(Request $request){
        if($request->password !=""){
            DB::table('users')
            ->where('id', $request->user_id)
            ->update([        
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin,
                'position' => $request->position,
                'areacode' => $request->areacode,
        
        ]);
        }else{
            DB::table('users')
        ->where('id', $request->user_id)
        ->update([        
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,            
            'is_admin' => $request->is_admin,
            'areacode' => $request->areacode,
    
    ]);
        }
        
        return "true";
    }
}
