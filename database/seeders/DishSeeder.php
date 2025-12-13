<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        for($numberDishes = 0; $numberDishes < 6; $numberDishes++){
            $numberOfRows = DB::table('products')->count();
            $i = 0 ;
            $productsForDish = [];

            while( $i < 4){
                $product = Product::find(random_int(1,$numberOfRows));
                
                if($product){
                    array_push($productsForDish, $product);        
                    $i++;
                }

            }
            
            $dish = Dish::create([
                'user_id' => random_int(1,1),
                'amount_products' => 3,
                'total_macronutrients_dish' => 1000,
            ]);

            foreach($productsForDish as $productOfDish){
                $dish->products()->attach(
                    $productOfDish->id, ['units' => random_int(1,2)]
                );
            }
        }
    }
}