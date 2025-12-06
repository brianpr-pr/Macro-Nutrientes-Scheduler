<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'category' => 'Huevos y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Cárnicos y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Pescados, moluscos, reptiles, crustáceos y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Grasas y aceites', 
        ]);
        ProductCategory::create([
            'category' => 'Cereales y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Legumbres, semillas, frutos secos y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Verduras, hortalizas y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Azúcar, chocolate y derivados', 
        ]);
        ProductCategory::create([
            'category' => 'Bebidas (no lácteas)', 
        ]);
        ProductCategory::create([
            'category' => 'Miscelánea', 
        ]);

        ProductCategory::create([
            'category' => 'Productos de uso nutricional específico', 
        ]);
    }
}