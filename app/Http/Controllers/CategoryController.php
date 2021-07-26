<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;

class CategoryController extends Controller
{
    public function __construct(Category $categories){
        $this->categories=$categories;
    }

    public function listProductsCategory(){
        $data=[];
        $data['categories']=$this->categories->getCategories();
    }
}
