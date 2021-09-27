@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Nova Categoria</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>

    <div class="form-check form-switch mt-4">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked />
        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
    </div>

    <div class="row">
        <div class="col-sm-6 col-12">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <label for="nome">Nome*</label>
                        <input type="text" class="form-control" id="InputNome" placeholder="">
                    </div>
                </div>
                
            </div>
        </div>

        <div class="col-sm-6 col-12 content-center">
                <img src="{{ asset('img/ivysaur.png') }}" width="75%" height="auto" alt="">
        </div>

    </div>
    <div class="row mt-4 mb-4">
        <div class="col-lg-6 col-12"></div>
        <div class="col-lg-3 col-6">
            <div class="boxBtnForm">
                <a href="{{ route('categorias.index') }}" type="button" class="col-12 BtnCancelar mt-3">Cancelar</a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="boxBtnForm">
                <div type="submit" class="col-12 BtnSalvar btnOpacity mt-3">Salvar</div>
            </div>
        </div>
    </div>
@endsection
