<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders';
    protected $fillable = ['id', 'user_id'];
    // 'price', 'discount', 'stock', 'category_id', 'subCategory', 'description', 'sku'

        // usuário dono do pedido
    public function user(){
        return $this->belongsTo(User::class);
    }

        // productsOrder has many products (Produtos da order)

    public function productsOrder() {
        return $this->hasMany(Product::class);
    }
}