@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Dashboard</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <div class='row'>
        <a href="{{ route('clientes.index')}}" class="col-lg-3 col-6 content-center" style="color: #E91E63;">
            <div class="Metricas">
                <p><span>40</span><span>Clientes</span></p>
            </div>
        </a>
        <a href="{{ route('pedidos.index')}}" class="col-lg-3 col-6 content-center" style="color: #0CA4D4;">
            <div class="Metricas">
                <p><span>12</span><span>Pedidos</span></p>
            </div>
        </a>
        <a href="{{ route('produtos.index')}}" class="col-lg-3 col-6 content-center" style="color: #149E3B;">
            <div class="Metricas">
                <p><span>34</span><span>Produtos</span></p>
            </div>
        </a>
        <a href="{{ route('categorias.index')}}" class="col-lg-3 col-6 content-center" style="color: #D0AB0A;">
            <div class="Metricas">
                <p><span>4</span><span>Categorias</span></p>
            </div>
        </a>
    </div>
    <div class='row mt-4'>
        <div class="col-lg-3 col-md-3 col-sm-4 col-3 " style="background-color: #50E87B; border-radius: 30px 0 0 30px">
        </div>
        <div class="col-lg-2 col-3" style="background-color: #FCFCFC;">
            <div class="BoxImgVendas">
                <img src="{{ asset('img/445.png') }}" width="100%" height="100%" alt="">
            </div>
        </div>
        <div class="col-lg-7 col-5 content-center" style="background-color: #FCFCFC; border-radius: 0px 30px 30px 0px">
            <div class="row">
                <div class="col-12">
                    <span class="TextVendas">Vendas</span>
                </div>
                <div class="col-12">
                    <span class="TextVendasValorTotal">R$ 12.000,00</span>
                </div>
                <div class="col-12 mt-2">
                    <span class="TextVendas">Valor Médio</span>
                </div>
                <div class="col-12">
                    <span class="TextVendasValorMedio">R$ 1.000,00</span>
                </div>
            </div>
        </div>

    @endsection
