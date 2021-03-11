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
        <link rel="shortcut icon" type="image/png" href="/storage/Anagrama.png"/>

    </head>
    <body class="hold-transition login-page">
        <video autoplay loop muted class="login-fondo">
            <source src="/storage/fondo.mp4" type="video/mp4">
        </video>
        <div class="login-box">
            <div class="card">
                <div class="login-logo pb-2 pt-4">
                    <a href="/"><img src='/storage/empresa/logo/{{$empresa['logo']}}' width="80%"></a>
                </div>
                <!-- /.login-logo -->
                    
                <div class="card-body login-card-body">
                    <h4 class="login-box-msg">Acceso Intranet</h4>

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
                    
                    @if (session('resetPassword'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="alert-text">
                                Actualizada contraseña.<br>
                                Acceda con sus nuevos datos.
                            </div>
                        </div>
                    @endif

                    <form action="{{route('login_post')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" placeholder="Usuario">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Conectar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
            
                    <p class="mb-1 mt-3"> <a href="{{route('password.request')}}">¿Ha olvidado su password?</a> </p>
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