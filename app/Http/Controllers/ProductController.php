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


        //Create object for Connection
        $client = new BedcaClient();

        //Initialize empty array to storage id of product categories
        $foodGroups = [];
        foreach($client->getFoodGroups()->food as $food ){
            //We add the groups id to the array foodGroups
            array_push($foodGroups,$food->fg_id);
        }

        //To show id of groups
        //echo var_dump($foodGroups);

        //To retrive a instance of a product
        //echo var_dump($client->getFoodsInGroup($foodGroups[0])->food[0] );
        
        //Storage of id from a product
        $idRandomProduct = $client->getFoodsInGroup($foodGroups[0])->food[0]->f_id;
        //echo $idRandomProduct;

        //Get english name from a product
        //echo var_dump($client->getFood($idRandomProduct)->food->f_eng_name );
        

        //Untested
        
        foreach($foodGroups as $foodGroup){
            //dump en vez de var_dump
            dump($client->getFoodsInGroup($foodGroup)->food );
            /*
            foreach( $client->getFoodsInGroup($foodGroup)->food as $food){
                echo var_dump($food->f_id);
            }
            */
        }
        

        return view('products', [
            'products' => Product::where('user_id',  Auth::id() )
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => '$client'
        ]);
    }
}