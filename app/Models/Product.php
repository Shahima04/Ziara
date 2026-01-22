<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * represents the 'products' table in the database
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'gender',
        'description',
        'category',
        'brand',
        'tag',
        'discount_price',
        'discount_percent',
        'stock',
        'image',
    ];
    
    /**
     * Each product is associated with one category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A product can appear in multiple orders
     */

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * A product can exist in multiple user carts
     */
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
}
