<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Location;
use App\ShelfLocation;
use App\Rack;
use App\Lot;
class locationController extends Controller
{
    public function index(){
        $Locations =  Location::all();
        $ShelfLocation =  ShelfLocation::all();
        $Rack =  Rack::all();
        $Lot =  Lot::all();
        return view("inventory.location.index", compact('Locations','ShelfLocation','Rack','Lot'));
    }
    public function newLocation(Request $request){        

            DB::beginTransaction();
            try {        
              
                if(isset($request->Rack)){
                    if(DB::table('rackfview')->where('rack', 'like', '%'.$request->Rack.'%')->count()==0){                
                    $Location =  new  Rack();
                    $Location->rack=$request->Rack;
                    $Location->save();
                    }
                }
                if(isset($request->lot_no)){
                    if(DB::table('lotview')->where('lot_no', 'like', '%'.$request->lot_no.'%')->count()==0){                
                    $Location =  new  Lot();
                    $Location->lot_no=$request->lot_no;   
                    $Location->save();  
                    }
                }
                if(isset($request->Location)){
                    if(DB::table('locationview')->where('location', 'like', '%'.$request->Location.'%')->count()==0){                
                    $Location = new Location();   
                    $Location->location=$request->Location;                  
                    $Location->save();
                    }
                }
                if(isset($request->Shelf)){
                    if(DB::table('shelfview')->where('shelf', 'like', '%'.$request->Shelf.'%')->count()==0){                
                    $Location =  new  ShelfLocation();     
                    $Location->shelf=$request->Shelf;  
                    $Location->save();
                    }
                }

               

    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getline()
                ],500);
            } 
    
        }

        public function newLocation_2(Request $request){        

            DB::beginTransaction();
            try {        
                $response="joe";
                if(isset($request->Rack)){
                    if(DB::table('rackfview')->where('rack', 'like', '%'.$request->Rack.'%')->count()==0){                
                    $Location =  new  Rack();
                    $Location->rack=$request->Rack;
                    $Location->save();
                    $response .= "rock_po-";
                    }
                }
                
                
                
                      
                if(isset($request->lot_no)){
                    if(DB::table('lotview')->where('lot_no',$request->lot_no)->count()==0){                
                    $Location =  new  Lot();
                    $Location->lot_no=$request->lot_no;   
                    $Location->save();
                    $response .= "lot_no-"  ;
                    }
                }
                if(isset($request->Location)){
                    if(DB::table('locationview')->where('location', 'like', '%'.$request->Location.'%')->count()==0){                
                    $Location = new Location();   
                    $Location->location=$request->Location;                  
                    $Location->save();
                    $response .= "location_po-";
                    }
                }
                if(isset($request->Shelf)){
                    if(DB::table('shelfview')->where('shelf', 'like', '%'.$request->Shelf.'%')->count()==0){                
                    $Location =  new  ShelfLocation();     
                    $Location->shelf=$request->Shelf;  
                    $Location->save();
                    $response .= "shelf_po-";
                    }
                }
               

               

    
            DB::commit();
            return $response;
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getline()
                ],500);
            } 
    
        }
        public function getLocation(Request $request){        

            DB::beginTransaction();
            try {
            if($request->state=="rack"){
              return  $Rack =  Rack::find($request->id);
            }
            if($request->state=="Lot"){   
                return   $Lot =  Lot::find($request->id);
            }
            if($request->state=="location"){
                return  $Location =  Location::find($request->id);
            }
            if($request->state=="shelf"){
                return  $ShelfLocation =  ShelfLocation::find($request->id);
            }
    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            } 
    
        }

        public function editLocation(Request $request){  
           
            try {
            DB::beginTransaction();

             
            if(isset($request->Rack_edit)){
                $Location =  Rack::find($request->id_edit);
                $Location->rack=$request->Rack_edit;
                $Location->save();  
            }
            if(isset($request->lot_no_edit)){        
                $Location =  Lot::find($request->id_edit);
                $Location->lot_no=$request->lot_no_edit;   
                $Location->save();  
            }
            if(isset($request->Location_edit)){
                $Location =  Location::find($request->id_edit);
                $Location->location=$request->Location_edit;          
                $Location->save();
            }
            if(isset($request->Shelf_edit)){
                $Location =  ShelfLocation::find($request->id_edit);     
                $Location->shelf=$request->Shelf_edit;  
                $Location->save();
            }

               
                
               
    
            DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                 return response()->json([
                    'message'=>$e->getMessage()
                ],500);
            } 
    
        }
        
}
