<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    protected $primaryKey = 'id';
    protected $fillable=['orders_id','encoder','ecoder_id','transaction_type','product_name','unit','quantity','amount','total','updated_at','created_at'];
}
