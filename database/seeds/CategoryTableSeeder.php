<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $json=File::get("database/data/products.json");
        $data=json_decode($json);
     
        foreach($data as $obj){

           foreach($obj->category as $cat){
               $id_category=$cat->id;
               $name_category=$cat->name;

               if (DB::table('categories')->where('id_category', $id_category)->doesntExist()) {
                Category::create(array(
                    'id_category'=>$cat->id,
                    'libelle'=>$cat->name
                ));
                
            }               
                
        }
                
        }
    }
}
