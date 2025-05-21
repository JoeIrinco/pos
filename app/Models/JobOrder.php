<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $table = "job_orders";

    protected $fillable = ["carbrand","year/model","platenumber","ownersname","address","email","telnumber","partsused","partsusedprice","oilsused","oilsusedprice","labordescription","nameoftechnician"]; 
}
