@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Editar Usuário</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>

    <div class="form-check form-switch mt-4">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked />
        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
    </div>

    <form method="POST" action="{{route('usuarios.update', $usuario->id)}}">
    @csrf
    @method('put')
    <div class="">
        <div class="row">
            <h1 style="font-size: 24px; margin-top: 2vh; margin-bottom: 3vh; color: #170085">Informações pessoais</h1>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">Nome*</label>
                    <input type="text" name="name" class="form-control" id="InputNome" placeholder="" value="{{$usuario->name}}">
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">CPF*</label>
                    <input type="text" name="cpf" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" id="InputCPF" placeholder="" value="{{$usuario->cpf}}">
                </div>
            </div>

        </div>

        <div class="row">
            <h1 style="font-size: 24px; margin-top: 2vh; margin-bottom: 3vh; color: #170085">Informações adicionais</h1>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="user">E-mail*</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="" value="{{$usuario->email}}">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="user">Telefone</label>
                    <input type="text" name="phone" class="form-control" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" id="InputTelefone" placeholder="" value="{{$usuario->phone}}">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
<!--                 <div class="form-group">
                    <label for="user">Cargo</label>
                    <input type="text" class="form-control" id="InputCargo" placeholder="">
                </div> -->
            </div>

            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputSenha">Senha*</label>
                    <input type="password" name="password" class="form-control" id="InputSenha" placeholder="" value="">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputConfirmarSenha">Confirmar Senha*</label>
                    <input type="password" name="password" class="form-control" id="InputConfirmarSenha" placeholder="" value="">
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 col-12"></div>
            <div class="col-lg-3 col-6">
                <div class="boxBtnForm">
                    <a href="{{ route('usuarios.index')}}" type="button" class="col-12 BtnCancelar mt-3">Cancelar</a> 
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="boxBtnForm">
                    <button type="submit" class="col-12 BtnSalvar btnOpacity mt-3">Salvar</div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
