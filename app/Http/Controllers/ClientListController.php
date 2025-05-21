<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\ProductList;
use App\ClientList;

use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientListController extends Controller
{
    //

    public function __construct()
    {   //old auth
     
        $this->middleware('admin');
    }
    public function getClients(Request $request)
    {
        $columns = array(
            0 => 'clientid',
            1 => 'clientname',
            2 => 'clientaddress',
            3 => 'clientcontactperson',
            4 => 'clientcontactnumber',
            5 => 'areacode',
            6 => 'action'
        );
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        
        $totalclients = ClientList::get()->count();
       
         if($request->input('search.value')){
            $searchByUser = $request->input('search.value');
            $clients = ClientList::where('clientid','LIKE',"%".$searchByUser."%")
            ->orWhere('clientname','LIKE',"%".$searchByUser."%")
            ->orWhere('clientaddress','LIKE',"%".$searchByUser."%")
            ->orWhere('clientcontactperson','LIKE',"%".$searchByUser."%")
            ->orWhere('clientcontactnumber','LIKE',"%".$searchByUser."%")
            ->orWhere('areacode','LIKE',"%".$searchByUser."%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

            $totalfilterclients = $totalclients;

        }else{
            $clients = ClientList::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        
            $totalfilterclients = $totalclients;
        } 

         $data = array();
        if($clients){
            foreach ($clients as $client)
            {
                $nestedData['clientid'] = $client->clientid;
                $nestedData['clientname'] = $client->clientname;
                $nestedData['clientaddress'] = $client->clientaddress;
                $nestedData['clientcontactperson'] = $client->clientcontactperson;
                $nestedData['clientcontactnumber'] = $client->clientcontactnumber;
                $nestedData['areacode'] = $client->areacode;
                $nestedData['action'] = "<button id='update' data-id='$client->clientid' class='btn btn-xs btn-info update_btn' type='button'>Update</button>";
                $data[] = $nestedData;
    
            }
        } 
        $ResponseArray = array(
            'draw'=> $request->input('draw'),
            'recordsTotal'=> $totalclients,
            'recordsFiltered'=> $totalfilterclients,
            'data'=> $data,
        );
        return response()->json($ResponseArray, 200);
    }

    public function save_clients(Request $request){
        
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
    }

    public function getClientByid($clientid)
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
     
    }

}
