<div class='float-right'>
    <a href="#" class='busqueda' style='display:none'><i class="fas fa-search-plus"></i></a>
    <a href="#" class='busqueda-close' style='display:block'><i class="fas fa-search-minus"></i></a>
</div>
<div class="clearfix"></div>
<form action="{{route('busqueda_poblacion')}}" id="form-busqueda" class="form-horizontal" method="POST" autocomplete="off"  style="display:block">
    @csrf
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Busqueda por Provincia</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                @if (isset($busqueda))
                    @include('includes.input.select', ['nombre' => 'provincia_bus', 'title' => 'Provincia',  'label' => 2,'input' => 4, 'req' => 0, 'valores' => $provincias, 'data' =>  $busqueda ?? ''])
                @else
                    @include('includes.input.select', ['nombre' => 'provincia_bus', 'title' => 'Provincia',  'label' => 2,'input' => 4, 'req' => 0, 'valores' => $provincias])
                @endif
                <div class="col-lg-2 text-right">
                    <button type="submit" class="btn btn-success">Buscar </button>
                </div>
            </div>
        </div>
    </div>
</form>