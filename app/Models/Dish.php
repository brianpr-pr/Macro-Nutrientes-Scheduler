<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    /** @use HasFactory<\Database\Factories\DishFactory> */
    use HasFactory;

     /**
     * The products that belongs to the dish.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /*
    protected $fillable = [
        
    ];
    */
}
