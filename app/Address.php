<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'order_id',
    	'street', 
    	'home_number', 
    	'flat_number', 
    	'post_code', 
    	'city',
    	'phone_number' 
    ];
}
