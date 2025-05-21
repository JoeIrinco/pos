<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOrder;

class JobOrderController extends Controller
{
    public function index()
    {
        return $job_orders = JobOrder::oderBy('id','DESC')->get();
        return view('job_orders', compact('job_orders'));
    }
}
