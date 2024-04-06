<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    use HasFactory;

    protected $table = 'status_orders';
    
    protected $primaryKey = 'id';
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status_id', 'id');
    }
}
