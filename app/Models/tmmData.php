<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tmmData extends Model
{
    use HasFactory;

    protected $table = "tmm_datas";

    protected $fillable = [ 'product_code','brand','product_name','produc_desc','qty','unit','cost','location','rack','shelf','critical','exp_date','lot_no']; 
}
