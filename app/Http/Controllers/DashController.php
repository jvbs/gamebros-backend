<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function show()
    {
        $ordersCount = DB::table('orders')->count();
        $categoriesCount = DB::table('categories')->count();
        $productsCount = DB::table('products')->count();
        $clientsCount = DB::table('users')->where('role', 'client')->count();
        $sellsCount = DB::table('orders')->sum('total_price');
        
        return view('dash', compact('ordersCount', 'categoriesCount', 'productsCount', 'clientsCount', 'sellsCount'));
    }
}
