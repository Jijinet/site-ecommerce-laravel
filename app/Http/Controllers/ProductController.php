<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as Product;
use App\Category as Category;

class ProductController extends Controller
{
    
    public function __construct(Product $products,Category $categories){
        $this->products=$products;
        $this->categories=$categories;
    }
    

    public function listProducts(){
        $data=[];
        $data['products']=$this->products->getProducts();
        $data['categories']=$this->categories->getCategories();
        return view('index',$data);
    }

    public function listCategoryProducts($id_category){
        $data=[];
        $data['categories']=$this->categories->getCategories();
        $data['products']=$this->products->getCategoryProducts($id_category);
        return view('index',$data);
    }

    public function listProductsAsc(){
        $data=[];
        $data['products']=$this->products->getProductsAsc();
        $data['categories']=$this->categories->getCategories();
        return view('index',$data);
    }

    public function listProductsDesc(){
        $data=[];
        $data['products']=$this->products->getProductsDesc();
        $data['categories']=$this->categories->getCategories();
        return view('index',$data);
    }
    
    public function listSearchedProducts(Request $request){
        $data=[];
        $libelle=$request->input('query');
        $data['products']=$this->products->getSearchedProducts($libelle);
        $data['categories']=$this->categories->getCategories();
        return view('index',$data);
    }

}
