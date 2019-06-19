<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Concursos Docentes UNAJ</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1" name="viewport">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
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
          #box-login{
            border-radius: 10px;
            height: 100%; margin: 0px 0px 0px 0px;  width: 100%; flex-direction: column; display: block;   place-content: center; align-items: center;
          }
</style>
</head>
<body>
    <div class="login-box" >
        <div class="login-logo" style = " margin: 0px 0px 0px 0px;">
            <a href="{{ url('/home') }}" style = "color:#fffdfd"><b>Concurso Docentes UNAJ</b></a>
        </div>
    
        <!-- /.login-logo -->
        <div class="login-box-body" id="box-login" >
            <p class="login-box-msg" >Login</p>
    
            <form method="post" action="{{ url('/login') }}">
                {!! csrf_field() !!}
    
                <div class=".col-12 .col-sm-6 .col-lg-12 form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')" >
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
    
                <div class=".col-12 .col-sm-6 .col-lg-12 form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}" OnHover="play(this,'hoveraudio')">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
    
                </div>
                
                    <div class=".col-12 .col-sm-6 .col-lg-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Recordarme
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                	<div class=".col-6 .col-sm-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
            </form>
            <br>
    			<div class="row " style=" height: 100%; margin: 0px; min-height: 100%; min-width: 100%; width: 100%; flex-direction: column; box-sizing: border-box; display: flex; max-width: 100%;place-content: center; align-items: center;" >
            		<div class=".col-12 .col-sm-6 .col-lg-12">
                	    <a href="{{ url('/password/reset') }}">&iquest;Has olvidado tu Contrase&ntilde;a?</a><br>
                    </div>
                    <div class=".col-12 .col-sm-6 .col-lg-12">
                	    <a href="{{ url('/register') }}" class="text-center"><b>Registrarse</b></a>
                    </div>
                </div>
                
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
</body>
</html>