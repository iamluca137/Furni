<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
