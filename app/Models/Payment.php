<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'payment_id',
        'amount',
        'payer_name',
        'payer_email',
        'payment_status',
        'payment_method', 
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'payment_id', 'payment_id');
    }
}
