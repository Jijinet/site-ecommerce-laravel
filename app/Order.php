<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Order extends Model
{

    protected $fillable=['id_client','montant'];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function products(){
        return $this->belongsToMany(
            Product::class,
            'order_details',
            'id_order',
            'id_product');
    
    }

    public function getOrder($id_client){

        $order=DB::table('orders')
        ->where('orders.id_client','=',$id_client)
        ->orderBy('id','desc')
        ->get();
        return $order;
    }

    
}
