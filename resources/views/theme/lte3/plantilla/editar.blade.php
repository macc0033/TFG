@extends("theme.$theme.layout")
@section('titulo')
    Plantilla
@endsection

@section("styles")
    <!-- DATEPICKER-->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-datepicker/css/datepicker.css")}}"/>
    <!-- SELECT2-->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <!-- LIGTHBOX-->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/ekko-lightbox/ekko-lightbox.css")}}">
    <!-- WYSIHTML5-->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/summernote/summernote-bs4.css")}}">
    <!-- COLORPICKER-->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}">
@endsection

@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/plantilla/crear.js")}}" type="text/javascript"></script>
    <!-- DATEPICKER-->
    <script src="{{asset("assets/$theme/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
    <script>
        $("#id_input").datepicker();
    </script>
    <!-- SELECT2-->
    <script src="{{asset("assets/$theme/plugins/select2/js/select2.full.min.js")}}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>
    <!-- LIGTHBOX-->
    <script src="{{asset("assets/$theme/plugins/ekko-lightbox/ekko-lightbox.min.js")}}" type="text/javascript"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>
    <!-- WYSIHTML5-->
    <script src="{{asset("assets/$theme/plugins/summernote/summernote-bs4.min.js")}}" type="text/javascript"></script>
    <script>
        $('#id_input').summernote();
    </script>
    <!-- COLORPICKER -->
    <script src="{{asset("assets/$theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>
    <script>
        $('#c-id_input').colorpicker();
        $('#c-id_input .fa-square').css('color', '{{$data->color}}');
        $('#c-id_input .input-group-text').css('background', '{{$data->color}}');
        $('#id_input').css('border', '1px solid ' + '{{$data->color}}');

        $('#c-id_input').on('colorpickerChange', function(event) {
            $('#c-id_input .fa-square').css('color', event.color.toString());
            $('#c-id_input .input-group-text').css('background', event.color.toString());
            $('#id_input').css('border', '1px solid ' + event.color.toString());
        });
    </script>
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
                @include('includes.form-error')
                @include('includes.mensaje')
                <form action="{{route('actualizar_plantilla', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf @method("put")
                    
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Editar Plantilla | <i>{{$data->nombre." ".$data->apellidos}}</i></h3>
                            <div class="card-tools">
                                <a href="{{route('plantilla')}}" class="btn btn-block btn-info btn-sm d-inline mr-4">
                                    <i class="fas fa-fw fa-reply-all"></i> Volver al listado
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-bod p-3">
                            @include('plantilla.form')
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    @if (can('modificar-plantilla',false))
                                        @include('includes.boton-form-editar')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection