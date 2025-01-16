<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total',
        'shipping_address',
    ];

    /**
     * Relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Products in the order.
     */
    public function products()
    {
        return $this->belongsToMany(Produse::class, 'order_products', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
