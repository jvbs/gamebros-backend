@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Usuários</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>
    <form method="GET" action="{{route('usuarios.index')}}">
    <div class='row'>
        <div class="col-lg-6 col-10">
            
            <div class="form-group">
                <label for="InputUsuario"></label>
                <input type="text" name="term" class="form-control" id="term"
                    placeholder="Informe o nome ou CPF do usuario">
            </div>

        </div>

        <div class="col-1" >
            <i class="large material-icons mt-3" style="font-size: 300%; color: #170085; cursor: pointer">search</i>
        </div>


        <div class="col-lg-5 col-12">
            <div class="content-center">
                <a href="{{ route('usuarios.create')}}" type="button" class="col-8 BtnCadastar mt-3">Adicionar Usuário</a>
            </div>
        </div>


    </div>
    </form>

    <table class="table" style="margin-top: 6vh; text-align: center">
        <thead>
            <tr class="label-table-title">
                <th scope="col">#</th></th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                @if ($usuario->role == 'admin')
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->cpf}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                <div class="d-flex justify-content-end">
                        <div type="button" class="col-4 btn-sm BtnEntrar"><a href="{{route('usuarios.edit', $usuario->id)}}">Editar</a></div>
                        <div class="col-1"></div>
                        <div type="button" class="col-4 btn-sm BtnRemover">
                            <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" style="all: unset">Remover</div>
                            </form>
                        </div>
                    </div>
<!--                     <div type="button" class="col-8 btn-sm BtnEntrar"><a href="{{route('usuarios.edit', $usuario->id)}}">Editar</a></div>
 -->                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
