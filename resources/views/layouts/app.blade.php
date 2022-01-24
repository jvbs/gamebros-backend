<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameBros</title>

    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>
    <div class="box">
        <div class="row header">
            <div class="col-md-3 col-12 content-center">
                <img src="{{ asset('img/logo_1.png') }}" width="250" height="108" class="" alt="">
    </div>
    <div class="  col-md-3 col-12" style="background-color: white">
            </div>
            <div class="col-md-3 col-8" style="background-color: white">
                <div class="bloco">

                    <div class="userPhotoWrapper">
                        <img class="userFoto" src="{{ asset('img/avatar_mario.png') }}" alt="userPhoto" />
                    </div>

                    <div class="BoxTextCollaborator">
                        <div class="BoxTextCollaboratorName">
                            <p>Olá</p>
                        </div>

                        <div class="BoxTextCollaboratorInformation">
                            @if(auth()->user())
                                <p>{{auth()->user()->name}}</p>
                            @else
                                <p>Guest</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-4 content-center">
                <a href="{{ route('signOut') }}" type="button" class="btn btn-lg BtnLogout">Sair</a>
            </div>
        </div>

        <div class="row content">
            <div class='row'>
                <div class="col-md-3 col-12 content-center" style="background-color: white">
                    <div class="vertical-menu">
                        <a href="{{ route('dash.index') }}" class="{{ Request::is('dash') ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('clientes.index')}}" class="{{ Request::is('customer/*') ? 'active' : '' }}">Clientes</a>
                        <a href="{{ route('pedidos.index')}}" class="{{ Request::is('order/*') ? 'active' : '' }}">Pedidos</a>
                        <a href="{{ route('produtos.index')}}" class="{{ Request::is('product/*') ? 'active' : '' }}">Produtos</a>
                        <a href="{{ route('categorias.index')}}" class="{{ Request::is('categories/*') ? 'active' : '' }}">Categorias</a>
                        <a href="{{ route('usuarios.index')}}" class="{{ Request::is('user/*') ? 'active' : '' }}">Usuários</a>
                    </div>
                </div>

                <div class="col-md-9 col-12" style="background-color: white">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- <div class="row footer">
    <p><b>footer</b></p>
  </div> -->
    </div>

</body>

</html>
