@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Pedidos</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <form method="GET" action="{{route('pedidos.index')}}">
    <div class='row'>
        <div class="col-lg-6 col-10">
            
            <div class="form-group">
                <label for="InputProduto"></label>
                <input type="text" name="term" class="form-control" id="InputProduto"
                    placeholder="Informe o numero do pedido">
            </div>

        </div>

        <div class="col-1" >
            <i class="large material-icons mt-3" style="font-size: 300%; color: #170085; cursor: pointer">search</i>
        </div>


        <div class="col-lg-5 col-12">

        </div>


    </div>
    </form>

    <table class="table" style="margin-top: 6vh; text-align: center">
        <thead>
            <tr class="label-table-title">
                <th scope="col">N. Pedido</th></th>
                <th scope="col">Data</th>
                <th scope="col">Cliente</th>
                <th scope="col">Valor</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>27/01/2022</td>
                <td>{{$order->user_id}}</td>
                <td>R${{$order->total_price}}</td>
                <td>
                    <a href="{{ route('pedidos.detail', $order->id)}}" type="button" class="col-8 btn-sm BtnEntrar">Detalhes</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection