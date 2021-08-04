<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{

    protected $fillable=['id_product','id_order','quantity'];
    
}
