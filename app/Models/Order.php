<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'order_status_id',
        'product_id',
        'coupon_id',
        'shipping',
        'quantity',
        'total_amount',
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(StatusOrder::class, 'order_status_id', 'id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    } 

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }
}
