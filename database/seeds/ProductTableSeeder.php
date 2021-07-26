<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $json=File::get("database/data/products.json");
        $data=json_decode($json);
     
        foreach($data as $obj){

                Product::create(array(
                    'id_product'=>$obj->ref,
                    'libelle'=>$obj->name,
                    'prix'=>$obj->price,
                    'type'=>$obj->type,
                    'description'=>$obj->description,
                    'shipping'=>$obj->shipping,
                    'marque'=>$obj->manufacturer,
                    'image'=>$obj->image
                ));
                
            } 
                 
                
        }
             
                
        
    }

