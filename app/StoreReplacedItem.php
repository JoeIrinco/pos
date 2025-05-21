<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class StoreReplacedItem extends Model
{
    protected $primaryKey = 'id';
    protected $fillable=['updated_at','created_at'];
}
