<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable=['id_category','libelle'];
    public function products(){
      
        return $this->belongsToMany(
            Product::class,
            'product_category',
            'id_category',
            'id_product');
    }

    public function getCategories(){
        
        $categories = DB::table('categories')
        ->join('product_categories','categories.id_category','=','product_categories.id_category')
        ->select('libelle', 'categories.id_category',DB::raw('COUNT(product_categories.id_product) as num_produit'))
        ->groupBy('categories.id_category') 
        ->orderBy(DB::raw('COUNT(product_categories.id_product)'),'desc')
        ->limit(8)
        ->get();
        return $categories;
    }

    public function getCategoriesLabel($id_category){
        
        $categories = DB::table('categories')
        ->join('product_categories','categories.id_category','=','product_categories.id_category')
        ->where('product_categories.id_category','=',$id_category)
        ->select('libelle', 'categories.id_category')
        ->groupBy('categories.id_category') 
        ->orderBy(DB::raw('COUNT(product_categories.id_product)'),'desc')
        ->limit(8)
        ->get();
        return $categories;
    }

   
}
