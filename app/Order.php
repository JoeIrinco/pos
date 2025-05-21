<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['customer_name','customer_address','customer_contact_person','customer_contact_number','status','remarks','senderid','sendername'];
}
