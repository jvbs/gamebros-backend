<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'price', 'discount', 'stock', 'category_id', 'subCategory', 'description', 'sku'];
}