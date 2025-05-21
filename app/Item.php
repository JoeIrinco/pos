<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //use HasFactory;
    protected $fillable=['orders_id','product_name','quantity','unit','amount'];
}
