@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Pedido</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <div class='row'>
        <div class="col-lg-6 col-10">
        <h1 style="font-size: 22px; margin-top: 2vh; margin-bottom: 3vh; color: #EC3227">Informações do Pedido</h1>
          
        <table class="table" style="margin-top: 2vh; text-align: left; font-size: 14px;">
        <thead>
            <tr>
                <th scope="col">N. Pedido</th>
                <td>004</td>
            </tr>
            <tr>
                <th scope="col">Data</th> 
                <td>03/04/2021</td>
            </tr>
            <tr>
                <th scope="col">Status</th> 
                <td>Pendente</td>
            </tr>
        </thead>
        
        </table>
        

        </div>

    

        <div class="col-lg-6 col-10">
        <h1 style="font-size: 22px; margin-top: 2vh; margin-bottom: 3vh; color: #EC3227">Informações do Cliente</h1>
        <table class="table" style="margin-top: 2vh; text-align: left;  font-size: 14px;">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <td>Alan Curry</td>
            </tr>
            <tr>
                <th scope="col">Email</th> 
                <td>alan.c@gmail.com</td>
            </tr>
            <tr>
                <th scope="col">CPF</th> 
                <td>594.654.646-75</td>
            </tr>
        </thead>
        
        </table>

        </div>


    </div>

    <h1 style="font-size: 22px; margin-top: 2vh; margin-bottom: 3vh; color: #EC3227">Itens Encomendados</h1>

    <table class="table" style="margin-top: 6vh; text-align: center">
        <thead>
            <tr class="label-table-title">
                <th scope="col">Produto</th></th>
                <th scope="col">SKU</th>
                <th scope="col">QTD</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Pokemon Esmeralda</th>
                <td>546</td>
                <td>1</td>
                <td>445.00</td>
            </tr>
        
        </tbody>
    </table>

    <h1 style="font-size: 22px; font-weight: 600; margin-top: 4vh; margin-bottom: 3vh; color: #D3AF15; text-align: left">Total da Fatura</h1>
  
    <div class="col-lg-6 col-10">
    <table class="table" style="margin-top: 2vh; text-align: left; font-size: 14px;">
        <thead>
            <tr>
                <th scope="col">Subtotal</th></th>
                <td scope="row">445.00</td>
            </tr>
            <tr>
                <th scope="col">Frete</th>
                <td>15.00</td> 
            </tr>
            <tr class="label-table-title">
                <th scope="col">Total Geral</th>
                <td>460.00</td>
            </tr>
         
        </thead>
        
        </table>
        <div>

@endsection
