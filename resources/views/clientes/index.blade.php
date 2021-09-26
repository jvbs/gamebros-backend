@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12 content-center mt-3" style="">
            <h1 style="color: #170085">Clientes</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 4vh">
            .
        </div>
    </div>
    <div class='row'>
        <div class="col-lg-6 col-10">
            {{-- <div class="input-field col-12 mt-4">
                <input id="user" type="text" class="validate">
                <label for="user">E-mail*</label>
            </div> --}}
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Informe o nome, email ou CPF do cliente">
            </div>

        </div>

        <div class="col-1" >
            <i class="large material-icons mt-3" style="font-size: 300%; color: #170085; cursor: pointer">search</i>
        </div>


        <div class="col-lg-5 col-12">
            <div class="content-center">
                <a href="{{ route('clientes.create')}}" type="button" class="col-8 BtnCadastar mt-3">Adicionar Cliente</a>
            </div>
        </div>


    </div>

    <table class="table" style="margin-top: 6vh">
        <thead>
            <tr class="label-table-title">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <div type="button" class="col-8 btn-sm BtnEntrar">Editar</div>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                    <div type="button" class="col-8 btn-sm BtnEntrar">Editar</div>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>
                    <div type="button" class="col-8 btn-sm BtnEntrar">Editar</div>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
