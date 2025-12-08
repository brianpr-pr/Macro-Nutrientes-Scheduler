<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    Public function products(){
        return view('products', [
            'products' => Product::where('user_id',  User::first()->id)
            ->orWhereNull('user_id')
            ->get(),
            'product_category' => ProductCategory::all()
        ]);
    }
}
