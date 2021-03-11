
<form action="{{route('busqueda_plantilla')}}" id="form-busqueda" class="form-horizontal" method="POST" autocomplete="off">
    @csrf
<div class="card card-secondary {{!isset($busqueda) ? 'collapsed-card' : ''}}">
        <div class="card-header">
            <h3 class="card-title">Filtros busqueda</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                @include('includes.input.text', ['nombre' => 'dni_bus', 'title' => 'DNI', 'label' => 2,'input' => 2, 'req' => 0, 'data' =>  $busqueda ?? '' ])
                <div class="col-lg-2 text-right">
                    <button type="submit" class="btn btn-success">Buscar </button>
                </div>
            </div>
        </div>
    </div>
</form>