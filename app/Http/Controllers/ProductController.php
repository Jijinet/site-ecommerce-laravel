<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as Product;
use App\Category as Category;
use Session;

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
        $data['title']='All Products';
        return view('index',$data);
    }

    public function listCategoryProducts($id_category){
        
        $data=[];
        $data['categories']=$this->categories->getCategories();
        $data['products']=$this->products->getCategoryProducts($id_category); 
        $data['libelle']=$this->categories->getCategoriesLabel($id_category);
        $data['title']=$data['libelle']->get(0)->libelle;
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

    public function getOneProduct(Request $request,$id_product){

        $product=$this->products->getProduct($id_product);
        $cart = Session::get('cart');
        $count=0;
        $total=0;

        if(empty($cart[$id_product])){
            
            $cart[$id_product] = array(
                "product" => $product,
                "qty" => 1,
                
            );
            $total=0;
            $count=0;

        } else{
           
           $cart[$id_product]["qty"] += 1;  
           
        }
        
       
        Session::put('cart', $cart);
        $count=Session::get('cart') != null ? count(Session::get('cart')) : 0;
        
        foreach (session()->get('cart') as $p) {
            
            $total+=$p['product']->get(0)->prix*$p['qty'];
        
        }
        

        
        Session::put('count', $count);
        Session::put('total', $total);

     
        return redirect()->back();
        return view('index');

        
    }

    public function removeOneProduct(Request $request, $id_product){

        $product=$this->products->getProduct($id_product);

        $total = Session::get('total');
        $cart = Session::get('cart');

        $total-=$cart[$id_product]['product']->get(0)->prix*$cart[$id_product]['qty'];

        unset($cart[$id_product]);

        Session::put('cart', $cart);
        Session::put('count', count(Session::get('cart')));


        Session::put('total', $total);
        return redirect()->back();

    }

}
