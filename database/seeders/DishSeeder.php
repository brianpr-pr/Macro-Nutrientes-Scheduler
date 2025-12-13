<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $numberOfRows = DB::table('products')->count();
        $i = 0 ;
        $productsForDish = [];

        while( $i < 2){
            $product = Product::find(random_int(1,$numberOfRows));
            
            if($product){
                array_push($productsForDish, $product);        
                $i++;
            }

        }

        dump(Auth::id());
        /*
        $dish = Dish::create([
            'user_id' => Auth::id(),
            'amount_products' => 3,
            'total_macronutrients_dish' => 1000,
        ]);*/

        

/*
        foreach($productsForDish as $productOfDish){
            $dish->products()->attach([
                $productOfDish => ['units' => random_int(1,2)]
            ]);
        }
*/

        //Debugging
        //dump($productsForDish);
    }
}
