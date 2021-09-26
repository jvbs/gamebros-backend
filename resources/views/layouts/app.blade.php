<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                        <img class="userFoto" src="{{ asset('img/avatar2.png') }}" alt="userPhoto" />
                    </div>

                    <div class="BoxTextCollaborator">
                        <div class="BoxTextCollaboratorName">
                            <p>Olá</p>
                        </div>

                        <div class="BoxTextCollaboratorInformation">
                            <p>Pedro Henrique</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-4 content-center">
                <button type="button" class="btn btn-lg BtnLogout">Sair</button>
            </div>
        </div>

        <div class="row content">
            <div class='row'>
                <div class="col-md-3 col-12 content-center" style="background-color: white">
                    <div class="vertical-menu">
                        <a href="{{ route('dash.index') }}" class="{{ Request::is('dash') ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('clientes.index')}}" class="{{ Request::is('customer/*') ? 'active' : '' }}">Clientes</a>
                        <a href="#">Pedidos</a>
                        <a href="#">Produtos</a>
                        <a href="#">Categorias</a>
                        <a href="#">Usuários</a>
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
