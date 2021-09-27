@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Novo Cliente</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>

    <div class="form-check form-switch mt-4">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked />
        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
    </div>

    <div class="">
        <div class="row">
            <h1 style="font-size: 24px; margin-top: 2vh; margin-bottom: 3vh; color: #170085">Informações pessoais</h1>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">Nome*</label>
                    <input type="text" class="form-control" id="InputNome" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">CPF*</label>
    
                    <input type="text" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" id="InputCPF" placeholder="">
                </div>
            </div>

        </div>

        <div class="row">
            <h1 style="font-size: 24px; margin-top: 2vh; margin-bottom: 3vh; color: #170085">Informações adicionais</h1>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="user">E-mail*</label>
                    <input type="email" class="form-control" id="InputEmail" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="user">Telefone</label>
                    <input type="text" class="form-control" id="InputTelefone" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="user">Cargo</label>
                    <input type="text" class="form-control" id="InputCargo" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputSenha">Senha*</label>
                    <input type="password" class="form-control" id="InputSenha" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputConfirmarSenha">Confirmar Senha*</label>
                    <input type="password" class="form-control" id="InputConfirmarSenha" placeholder="">
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
                    <div type="submit" class="col-12 BtnSalvar btnOpacity mt-3">Salvar</div>
                </div>
            </div>
        </div>
    </div>
@endsection
