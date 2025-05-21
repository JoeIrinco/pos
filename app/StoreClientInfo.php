<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use SebastianBergmann\Environment\Console;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoreClientInfo extends Model
{
    protected $fillable=[
                            'account_name',
                            'account_type',
                            'address',
                            'senior_id',
                            'pwd_id',
                            'status'
                            
                        ];

                 
}
