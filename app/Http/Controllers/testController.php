<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function reprocessData(){
       return "ok";
    }
    public function reprocessDataView(){
        return view('test.index');
    }
    
}
