@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Categorias</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <form method="GET" action="{{route('categorias.index')}}">
        <div class='row'>
                <div class="col-lg-6 col-10">
                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="term" class="form-control" id="term" aria-describedby="term"
                            placeholder="Informe o nome da categoria">
                    </div>
                </div>

            <div class="col-1">
                <i class="large material-icons mt-3" style="font-size: 300%; color: #170085; cursor: pointer">search</i>
            </div>


            <div class="col-lg-5 col-12">
                <div class="content-center">
                    <a href="{{ route('categorias.create') }}" type="button" class="col-8 BtnCadastar mt-3">Adicionar
                        Categoria</a>
                </div>
            </div>
        </div>
    </form>


    <table class="table" style="margin-top: 6vh; text-align: center">
        <thead>
            <tr class="label-table-title">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <div class="d-flex justify-content-end">
                        <div type="button" class="col-3 btn-sm BtnEntrar"><a href="{{route('categorias.edit', $category->id)}}">Editar</a></div>
                        <div class="col-1"></div>
                        <div type="button" class="col-3 btn-sm BtnRemover">
                            <form action="{{route('categorias.destroy', $category->id)}}" method="POST">
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