<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'code',
        'discount',
        'quantity',
        'valid_from',
        'valid_until',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id', 'id');
    }
} 