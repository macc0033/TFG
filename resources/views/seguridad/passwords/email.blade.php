<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Intranet {{$empresa['nombre_comercial']}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
    </head>
    <body class="hold-transition login-page">
        <video autoplay loop muted class="login-fondo">
            <source src="{{asset('/Storage/fondo.mp4')}}" type="video/mp4">
        </video>
        <div class="login-box">
            <div class="card">
                <div class="login-logo pb-2 pt-4">
                    <a href="/"><img src='/storage/empresa/logo/{{$empresa['logo']}}' width="80%"></a>
                </div>
                <!-- /.login-logo -->
                    
                <div class="card-body login-card-body">
                    <h4 class="login-box-msg">Recuperar Contraseña</h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="alert-text">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="POST" autocomplete="off">
                        @csrf
                        <!--<div class="input-group mb-3">
                            <input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" placeholder="Usuario">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>-->
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar email contraseña</button>
                            </div>
                        </div>
                    </form>
            
                    <p class="mb-1 mt-3"> <a href="/">Volver al Login</a> </p>
                    <!--<p class="mb-0"><a href="#" class="text-center">Registrar</a></p>-->
                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    </body>
</html>