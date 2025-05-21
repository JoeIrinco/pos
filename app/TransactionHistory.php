<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use SebastianBergmann\Environment\Console;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionHistory extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    /* protected $fillable=[
                            'invoice_no',
                            'created_at',
                            'customer_name',
                            'customer_address',
                            'transaction_type',
                            'check_no',
                            'check_date',
                            'date',
                            'id_no',
                            'bank_name',
                            'ewt',
                            'vat_exempt',
                            'net_of_vat',
                            'vat',
                            'discount',
                            'total_orders',
                            'final_total'
                        ]; */

}
