<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\product_category;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->delete();
        $json=File::get("database/data/products.json");
        $data=json_decode($json);
     
        foreach($data as $obj){

           foreach($obj->category as $cat){
          
                product_category::create(array(
                    'id_product'=>$obj->ref,
                    'id_category'=>$cat->id
                    
                ));
                
            } 
                 
                
        }
       
        }
    }

