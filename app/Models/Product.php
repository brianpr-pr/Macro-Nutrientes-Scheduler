<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'product_creation_id',
        'product_default_id',
        'calories',
    ];

    /**
     * The dishes that belongs to the product.
     */
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot('units')->withTimestamps();
    }

    /**
     * Get wich category this product belongs to.
     */
    public function product_defaults(): BelongsTo
    {
        return $this->belongsTo(ProductDefault::class);
    }

    /**
     * Get wich category this product belongs to.
     */
    public function product_creations(): BelongsTo
    {
        return $this->belongsTo(ProductCreation::class);
    }


    /**
     * Show all products.
     */
    function getProducts()
    {
        return Product::all();
    }
}