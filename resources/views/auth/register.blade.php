<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Concursos Docentes UNAJ | Pagina de Registro</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html, body {
            background-image: url('{{ asset('imagenes/fondo_pizarra.jpg')}}');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #063B50;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            /* Preserve aspet ratio */
            min-width: 100%;
            min-height: 100%;
          }
          #box-register{
            border-radius: 10px;
            height: 100%; margin: 0px 0px 0px 0px;  width: 100%; flex-direction: column; display: block;   place-content: center; align-items: center;
          }
</style>
</head>
<body class="">
<div class="register-box">
    <div class="login-logo" style = " margin: -35px 0px 0px 0px;">
        <a href="{{ url('/home') }}"style = "color:#fffdfd"><b>Concurso Docentes UNAJ</b></a>
    </div>

    <div class="register-box-body" id="box-register">
        <h4><p class="login-box-msg">Nuevo usuario</p></h4>

        <form method="post" action="{{ url('/register') }}">

            {!! csrf_field() !!}

            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')">
                <input type="text" required= true class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div id=registerForm class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')">
                <input type="email" required = true class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')">
                <input type="password" id=password required= true class="form-control" name="password" placeholder="Contrase&ntilde;a">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')">
                <input type="password" id=password_conf required= true name="password_confirmation" class="form-control" placeholder="Confirmar Contrase&ntilde;a">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

                 <div class=".col-12 .col-sm-6 .col-lg-8">
                    <div id=registerCheckbox class="checkbox icheck">
                        <label>
                            <input type="checkbox"> <a href="#">Terminos y condiciones</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class=".col-6 .col-sm-4">
                    <button type="submit" disabled=true id="registerButton" class="btn btn-primary btn-block btn-flat">Registro</button>
                </div>
                <!-- /.col -->
        </form>

        <!-- <a href="{{ url('/login') }}" class="text-center">Ya Soy Miembro</a>-->
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

<script src="{{ URL::asset('/js/register.js') }}"></script>

<!-- <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script> -->
</body>
</html>