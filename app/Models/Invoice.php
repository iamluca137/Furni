<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id',
        'address',
        'city',
        'country',
        'email',
        'order_id',
        'sub_total',
        'discount',
        'total',
        'date', 
    ]; 

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    } 
}
