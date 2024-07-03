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
        'payment_id',
        'user_id',
        'discount',
        'total_amount',
        'country',
        'city',
        'first_name',
        'last_name',
        'address',
        'zip_code',
        'phone',
        'email',
        'note', 
    ];

    public function status()
    {
        return $this->belongsTo(StatusOrder::class, 'order_status_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'payment_id');
    }
}
