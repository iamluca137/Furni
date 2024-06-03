<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_product_id', 'category_id');
    }

    public function subCategoryStatus()
    {
        return $this->belongsTo(CategoryStatus::class, 'status', 'id');
    }
}
