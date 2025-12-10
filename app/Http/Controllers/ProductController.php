<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use StaticKidz\BedcaAPI\BedcaClient;

class ProductController extends Controller
{
    public function products(Request $request): View
    {
    $result = '';
    
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'calories' => 'required|numeric|min:1',
                'total_fat' => 'required|numeric|min:0',
                'saturated_fat' => 'required|numeric|min:0',
                'trans_fat' => 'required|numeric|min:0',
                'cholesterol_fat' => 'required|numeric|min:0',
                'polyunsaturated_fat' => 'required|numeric|min:0',
                'monounsaturated_fat' => 'required|numeric|min:0',
                'carbohydrates' => 'required|numeric|min:0',
                'fiber' => 'required|numeric|min:0',
                'proteins' => 'required|numeric|min:0',
                'unit_measurement' => 'required|string|max:255',
                'product_category_id' => 'required|numeric|min:1',
            ]);
            $validatedData['user_id'] = Auth::id();

            $result = 'Product created succesfully';
            Product::create($validatedData);
        }


        /*
        $client = new BedcaClient();
        $food = $client->getFood(1);

        echo var_dump( $food );
        */
        /*
        foreach($client->getFoodGroups()->food as $foodGroup){
            //Category Id that we can use when inserting row
            //echo var_dump($foodGroup->fg_id);
            foreach( $client->getFoodsInGroup($foodGroup->fg_id) as $food){
                foreach($food as $foodItem){
                    foreach($client->getFood($foodItem->f_id) as $foodData){
                        echo var_dump( '$foodData' );
                    }
                }
            }
        }*/

        //foreach($client->getFoodsInGroup(1) as $food){echo(var_dump($food));}

        return view('products', [
            'products' => Product::where('user_id',  Auth::id() )
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => '$client'
        ]);
    }
}