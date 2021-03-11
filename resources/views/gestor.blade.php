@extends("theme.$theme.layout")

@section("titulo")
    Gestor Archivos
@endsection

@section("metas")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("styles")
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

@section("scripts")
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection


@section('contenido')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('titulo')</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('includes.mensaje')
                @include('includes.mensaje-error')
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Gestor de Archivos</h3>
                        <div class="card-tools">
                            @if (can('ver-personal',false) && isset($data->id))
                                <div class="btn-group  mr-4">
                                    <a href="{{route('editar_personal', ['id' => $data->id])}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-fw fa-user"></i> Ficha Personal
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm active">
                                        <i class="fas fa-fw fa-folder"></i> Archivos
                                    </a>
                                </div>
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="height: 500px;">
                            <div id="fm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection