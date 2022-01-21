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

    @if($errors->any())
        <span class="text-danger">
            {{ implode('', $errors->all(':message')) }}
        </span>
    @endif

    <form method="POST" action="{{route('clientes.store')}}">
    @csrf
    <div class="">
        <div class="row">
            <h1 style="font-size: 24px; margin-top: 2vh; margin-bottom: 3vh; color: #170085">Informações pessoais</h1>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">Nome*</label>
                    <label for="InputNome"></label>
                    <input type="text" name="name" class="form-control" id="InputNome" placeholder="" required>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">CPF*</label>
                    <label for="InputCPF"></label>
                    <input type="text" name="cpf" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" id="InputCPF" placeholder="" required>
                </div>
            </div>
            <div class="col-md-4 col-6">
<!--                 <div class="form-group">
                    <label for="user">Data Nascimento</label>
                    <label for="InputDataNascimento"></label>
                    <input type="email" maxlength="10" name="date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}
                                    " class="form-control" id="InputDataNascimento" placeholder="">
                </div> -->
            </div>

        </div>

        <div class="row">
            <h1 style="font-size: 24px; margin-top: 3vh; margin-bottom: 3vh; color: #170085">Informações adicionais</h1>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">Email*</label>
                    <label for="InputEmail"></label>
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="" required>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="form-group">
                    <label for="user">Telefone*</label>
                    <label for="InputTelefone"></label>
                    <input type="text" name="phone" class="form-control" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" id="InputTelefone"
                        placeholder="" required>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="row mt-4"></div>
            <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputSenha">Senha*</label>
                    <input type="password" name="password" class="form-control" id="InputSenha" placeholder="" required>
                </div>
            </div>
<!--             <div class="col-md-4 col-6 mt-4">
                <div class="form-group">
                    <label for="InputConfirmarSenha">Confirmar Senha*</label>
                    <input type="password" name="password" class="form-control" id="InputConfirmarSenha" placeholder="" required>
                </div>
            </div> -->
            <div class="col-md-4">

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 col-12"></div>
            <div class="col-lg-3 col-6">
                <div class="boxBtnForm">
                    <a href="{{ route('clientes.index')}}" type="button" class="col-12 BtnCancelar mt-3">Cancelar</a> 
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
