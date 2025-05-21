<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $primaryKey = 'item_number';
    protected $fillable=['item_number','product_name','unit'];
}
