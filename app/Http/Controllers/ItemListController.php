<?php

namespace App\Http\Controllers;


use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

//use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ItemListController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
        $this->middleware('auth');
    }
    public function getItems(Request $request)
    {   
        $columns = array(
            
            0 => 'quantity',
            1 => 'unit',
            2 => 'product_name',
            3 => 'expiration_date',
            4 => 'lot_no',
            5 => 'amount',
            6 => 'action'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalitems = Item::get()->count(); 
       
         if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $auth_id =Auth::id();
            $items = Item::select("*")->where('user_id', $auth_id)
            ->where('orders_id',null)
            ->where(function($query) use ($searchByUser){
                   $query->where('id','LIKE',"%".$searchByUser."%")
                   ->orWhere('quantity','LIKE',"%".$searchByUser."%")
                   ->orWhere('unit','LIKE',"%".$searchByUser."%")
                   ->orWhere('product_name','LIKE',"%".$searchByUser."%")
                   ->orWhere('amount','LIKE',"%".$searchByUser."%");
                    })->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

            $totalfilteritems = $totalitems;

        }else{

            $auth_id =Auth::id();

            $items = Item::where('user_id', $auth_id)
            ->where('orders_id', null)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            $totalfilteritems = $totalitems; 
        } 

         $data = array();
        if($items){
            foreach ($items as $item)
            {
                $nestedData['quantity'] = $item->quantity;
                $nestedData['unit'] = $item->unit;
                $nestedData['product_name'] = $item->product_name;
                $nestedData['amount'] = $item->amount;
                $nestedData['action'] = "<button id='delete' data-id='$item->id' class='btn btn-xs btn-danger update_btn' type='button'>Remove</button>";
                $data[] = $nestedData;
    
            }
        } 
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalitems,
            'recordsFiltered'=> $totalfilteritems, 
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

    /* public function save_clients(Request $request){
        
        $Client = new ClientList();
       
        $Client->clientname =$request->clientname;//<a href="#" id="delete" class="btn btn-danger shadow btn-m sharp" data-id="'.$id.'" value='.$id.'>Edit</a>
        $Client->clientaddress=$request->clientaddress;
        $Client->clientcontactnumber =$request->clientcontactnumber;//<a href="#" id="delete" class="btn btn-danger shadow btn-m sharp" data-id="'.$id.'" value='.$id.'>Edit</a>
        $Client->clientcontactperson=$request->clientcontactperson;
        $Client->areacode =$request->areacode;
        if($Client->save()){
            $data=ClientList::get()->last();
            //$id=$Product->item_number; //id="dataTr'.$item_number.'"
            return '<tr>
            <td name="item_number[]">'.$data->clientid.'</td>
            <td name="item_number[]">'.$data->clientname.'</td>
            <td name="product_name[]">'.$data->clientaddress.'</td>
            <td name="unit[]">'.$data->clientcontactnumber.'</td>
            <td name="item_number[]">'.$data->clientcontactperson.'</td>
            <td name="product_name[]">'.$data->areacode.'</td>
            <td ><div class="d-flex">
                <button id="update" data-id="'.$data->clientid.'" class="btn btn-xs btn-info" type="button">Update</button>
            </div></td>
        </tr>';
        
        }else{
            return 'err';
        }
    } */

    /* public function getClientByid($clientid)
    {   
       $client=ClientList::select('clientid','clientname','clientaddress','clientcontactnumber','clientcontactperson','areacode')->where('clientid',$clientid)->get();//->take(100)->get();
       return response()->json($client);
    }

    public function updateClient(Request $request)
    {   
       
        //return $request;
       $clients = ClientList::find($request->clientid);//
       $clients->clientname = $request['clientname'];
       $clients->clientaddress = $request['clientaddress'];
       $clients->clientcontactperson = $request['clientcontactperson'];
       $clients->clientcontactnumber = $request['clientcontactnumber'];
       $clients->areacode = $request['areacode'];
       $clients->save();
       return response()->json($clients);
     
    } */

}
