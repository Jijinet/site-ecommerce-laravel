<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    protected $fillable=[ 'id_product','libelle','prix','type','description'
                        ,'shipping','marque','image',];
                        
    public function orders(){
        return $this->belongsToMany(
            Order::class,
            'order_details',
            'id_product',
            'id_order');
    
    }
    public function categories(){
        return $this->belongsToMany(
            Category::class,
            'product_category',
            'id_product',
            'id_category');
    }

    public function getProducts(){

        $products=DB::table('products')
        ->paginate(12);
        return $products;

    }

    public function getCategoryProducts($id_category){
        
        $products = DB::table('products')
        ->join('product_categories','product_categories.id_product','=','products.id_product')
        ->where('product_categories.id_category','=',$id_category)
        ->paginate(12);
        return $products;
    }

    public function getProductsAsc(){

        $products=DB::table('products')
        ->orderBy('prix','asc')
        ->paginate(12);
        return $products;

    }

    public function getProductsDesc(){

        $products=DB::table('products')
        ->orderBy('prix','desc')
        ->skip(45)
        ->paginate(12);
        return $products;

    }

    public function getSearchedProducts($libelle){

        $products=DB::table('products')
        ->where('libelle','like',"%$libelle%")
        ->paginate(12);
        return $products;

    }

    public function getProduct($id_product){
        $product = DB::table('products')
        ->where('products.id_product','=',$id_product)
        ->get();
        return $product;
    }

}
