@extends("theme.$theme.layout")
@section('titulo')
    Noticias
@endsection

@section("styles")
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/ekko-lightbox/ekko-lightbox.css")}}">
@endsection

@section("scripts")
@include('includes.exportar')
<script src="{{asset("assets/pages/scripts/noticia/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/ekko-lightbox/ekko-lightbox.min.js")}}" type="text/javascript"></script>
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    })
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
            <div class="col-12" id="data-noticias">
                @include('includes.mensaje')
                @include('includes.mensaje-error')
                <div class="text-right mb-3">
                    @if (can('añadir-noticias',false))
                        <a href="{{route('crear_noticia')}}" class="btn btn-block btn-success btn-sm d-inline">
                            <i class="fas fa-fw fa-plus-circle"></i> Nueva Noticia
                        </a>
                    @endif
                </div>

                @foreach ($datas as $data) 

                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{$data->titulo}}</h3>
                            <div class="card-tools">
                                <i class='mr-3'>{{$data->autor->full_name}}, {{$data->fecha}}</i>
                                @if (can('modificar-noticias',false))
                                    <a href="{{route('editar_noticia', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                                @if (can('eliminar-noticias',false))
                                    <form action="{{route('eliminar_noticia', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            {!! $data->descripcion !!}
                        </div>
                    </div>
                @endforeach
                        
            </div>
        </div>
    </section>
@endsection
