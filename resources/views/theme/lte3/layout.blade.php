<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titulo') | {{$empresa['nombre_comercial']}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @yield("metas")

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        @yield("styles")

        <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
        <link rel="shortcut icon" type="image/png" href="/storage/Anagrama.png"/>

    </head>
    <body class="hold-transition sidebar-mini"> <!-- layout-navbar-fixed -->
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Inicio Header -->
            @include("theme/$theme/header")
            <!-- Fin Header -->
            <!-- Inicio Aside -->
            @include("theme/$theme/aside")
            <!-- Fin Aside -->
            <!-- Inicio Contenido -->
            <div class="content-wrapper">
                @yield('contenido')
            </div>
            <!-- Fin Contenido -->
            <!--Inicio Footer -->
            @include("theme/$theme/footer")
            <!-- Fin Footer -->
        </div>
        
        <!-- jQuery -->
        <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="../../dist/js/demo.js"></script>-->

        @yield("scriptsPlugins")
        <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset("assets/js/scripts.js")}}"></script>
        <script src="{{asset("assets/js/funciones.js")}}"></script>
        @yield("scripts")
    </body>
</html>