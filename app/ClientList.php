<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ClientList extends Model
{
    protected $primaryKey = 'clientid';
    protected $fillable=['clientid','clientname','clientaddress','clientcontactnumber','clientcontactperson','areacode'];
}
