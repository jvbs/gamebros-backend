<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'order_products';
    protected $fillable = ['id', 'order_id', 'product_id', 'price'];

    public function product() {

        return $this->belongsTo(Product::class);

    }

    public function order() {

        return $this->hasOne(Product::class);

    }
}
