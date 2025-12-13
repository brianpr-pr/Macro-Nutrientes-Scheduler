<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDefault;
use StaticKidz\BedcaAPI\BedcaClient;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach(ProductDefault::all()  as $productDefault){
           Product::create(
                [
                    'name' => $productDefault->name,
                    'product_creation_id' => null,
                    'product_default_id' => $productDefault->id,
                ]
            );  
        }
    }
}