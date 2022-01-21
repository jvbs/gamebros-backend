@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Produtos</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <form method="GET" action="{{route('produtos.index')}}">
    <div class='row'>
        <div class="col-lg-6 col-10">
            
            <div class="form-group">
                <label for="InputProduto"></label>
                <input type="text" name="term" class="form-control" id="InputProduto"
                    placeholder="Informe o nome ou SKU do produto">
            </div>

        </div>

        <div class="col-1" >
            <i class="large material-icons mt-3" style="font-size: 300%; color: #170085; cursor: pointer">search</i>
        </div>


        <div class="col-lg-5 col-12">
            <div class="content-center">
                <a href="{{ route('produtos.create')}}" type="button" class="col-8 BtnCadastar mt-3">Adicionar Produto</a>
            </div>
        </div> 
    </div>
    </form>
    
    <table class="table" style="margin-top: 6vh; text-align: center">
        <thead>
            <tr class="label-table-title">
                <th scope="col">SKU</th></th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Sub-Categoria</th>
                <th scope="col">Preco</th>
                <th scope="col">Qtde</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $produto)
            <tr>
                <th scope="row">{{$produto->sku}}</th>
                <td>{{$produto->name}}</td>
                <td>{{$produto->category->name}}</td>
                <td>{{$produto->subCategory}}</td>    
                <td>{{$produto->price}}</td>
                <td>{{$produto->stock}}</td>
                <td>
                    <div class="d-flex justify-content-end">
                    <div type="button" class="col-4 btn-sm BtnEntrar"><a href="{{route('produtos.edit', $produto->id)}}">Editar</a></div>
                    <div class="col-1"></div>
                    <div type="button" class="col-4 btn-sm BtnRemover">
                        <form action="{{route('produtos.destroy', $produto->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" style="all: unset">Remover</div>
                        </form>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
