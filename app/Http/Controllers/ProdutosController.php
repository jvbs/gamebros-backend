<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('produtos.index');
    }

    public function create()
    {
        return view('produtos.create');
    }
}
