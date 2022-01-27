<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class PedidosController extends Controller
{
    public function index(Request $request)
    {
        $ordersSearch = Order::where([
            ['id', '!=', 0],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('id', '=', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        $orders = DB::table('orders')->get();

        return view('pedidos.index', compact('orders', 'ordersSearch'));
    }

    public function detail($order)
    {
        $orders = DB::table('orders')
        ->leftJoin('order_products', 'orders.id', '=', 'order_products.order_id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('products', 'order_products.product_id', '=', 'products.id')
        ->select(
            'orders.id as order_id',
            'orders.user_id as user_id',
            'orders.total_price as total_price',
            'users.name as user_name',
            'users.email as user_email',
            'users.cpf as user_cpf',
            'products.name as product_name',
            'products.sku as product_sku',
            'products.price as product_price'
            )
        ->where([
            ['orders.id', $order]
        ])
        ->get();

        return view('pedidos.detail')->with('orders', $orders);
    }
}
