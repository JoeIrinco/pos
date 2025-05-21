<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class StorePurchaseItem extends Model
{
    protected $primaryKey = 'id';
    protected $fillable=['orders_id','user_id','encoder','product_name','product_code','unit','quantity','amount','total','updated_at','created_at'];
}
