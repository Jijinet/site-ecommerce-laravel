<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    protected $fillable=[ 'id_product','id_category'];
}
