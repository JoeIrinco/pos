<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ReportDate extends Model
{
    protected $primaryKey = 'id';
    protected $fillable=['user','date_from','date_to','created_at','updated_at'];
}
