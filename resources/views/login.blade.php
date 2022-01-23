<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<body>


    <div class="row">
        <div class="col-md-5 col-12">
            <div class="form-login">
                <h1 style="font-size:32px">Acesse sua conta</h1>
                <p style="font-size: 14px; color: gray; margin-top:4vh; margin-bottom:4vh">
                    Se você já possui cadastro, utilize seu e-mail e senha para entrar
                </p>
                @if($errors->any())
                    <span class="text-danger">
                    {{ implode('', $errors->all(':message')) }}
                    </span>
                @endif
                <form method="POST" action="{{ route('loginCustom') }}">
                @csrf
                <div class="input-field col-12 mt-4">
                    <input name="email" id="user" type="email" class="validate" required>
                    <label for="user">E-mail*</label>
                </div>
                <div class="input-field col-12 mt-4">
                    <input name="password" id="password" type="password" class="validate" required>
                    <label for="password">Senha*</label>
                </div>
                <div class="content-center ">
                    <button type="submit" class="col-8 btn-lg BtnEntrar mt-4">Entrar</a>
                </div>
                <p style="font-size: 12px; color: gray; margin-top:4vh; margin-bottom:4vh">
                    Os campos identificados com asteriscos (*) são de preenchimento
                    obrigatório.
                </p>

                <p style="font-size: 14px; color: gray; margin-top:3vh;">
                    Você não possui cadastro?
                    <span style="color: rgb(100, 100, 100);"">
             Entre em contato com administrador
              </span>

          </p>
            </div>
            </form>
        </div>
        <div class="  col-md-7 col-12">
                        <div class="imgWrapper">
                            <img src="{{ asset('img/login_view_dashboard.svg') }}" class="homeSystem"
                                alt="Home System" />
                            <img src="{{ asset('img/base_system.svg') }}" alt="Base System" class="baseHomeSystem" />
                        </div>
            </div>
        </div>
        <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>
