<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use StaticKidz\BedcaAPI\BedcaClient;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new BedcaClient();
        $categories = [];
        
        foreach($client->getFoodGroups()->food as $foodGroup){
            array_push($categories, $foodGroup->fg_eng_name );
        }

        foreach($categories as $category){
            ProductCategory::create([
                'category' => $category
            ]);    
        }
    }
}