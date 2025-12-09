<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(Request $request){
        $result = '';

        if($request->isMethod('post')){
            if( $request->input('calories') === null){
                $result .= "Amount of calories can't be empty ";
            }

            
            if( $request->input('total_fat') === null){
                $result .= "Amount of total fat can't be empty";
            }

            if( $request->input('satured_fat') === null){
                $result .= "Amount of satured fat can't be empty";
            }

            if( $request->input('trans_fat') === null){
                $result .= "Amount of trans fat can't be empty";
            }

            if( $request->input('cholesterol_fat') === null){
                $result .= "Amount of cholesterol fat can't be empty";
            }

            if( $request->input('polyunsaturated_fat') === null){
                $result .= "Amount of polyunsaturated fat can't be empty";
            }

            if( $request->input('monounsaturated_fat') === null){
                $result .= "Amount of monounsaturated fat can't be empty";
            }

            if( $request->input('carbohydrates') === null){
                $result .= "Amount of carbohydrates can't be empty";
            }

           if( $request->input('fiber') === null){
                $result .= "Amount of fiber can't be empty";
            }

            if( $request->input('carbohydrates') === null){
                $result .= "Amount of carbohydrates can't be empty";
            }

            if( $request->input('proteins') === null){
                $result .= "Amount of proteins can't be empty";
            }

            if( $request->input('unit_measurement') === null){
                $result .= "Unit of measurement can't be empty";
            }

            if( $request->input('product_category') === null){
                $result .= "Amount of proteins can't be empty";
            }

            if($result === ''){
                $result = 'Product has been created succesfully';
            }            
        }

        return view('products', [
            'products' => Product::where('user_id',  User::first()->id)
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all(),
            'message' => $result
        ]);
    }
}