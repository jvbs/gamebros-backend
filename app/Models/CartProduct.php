<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartProduct extends Model
{
    //use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    protected $table = 'cart_product';

    protected $fillable = ['cart_id', 'product_id', 'amount'];

    // public function product() {
    //     return $this->belongsTo(Product::class);
    // }
}
