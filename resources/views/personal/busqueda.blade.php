<div class='float-right'>
    <a href="#" class='busqueda' style='@if (isset($busqueda)) display:none @else display:block @endif'><i class="fas fa-search-plus"></i></a>
    <a href="#" class='busqueda-close' style='@if (isset($busqueda)) display:block @else display:none @endif'><i class="fas fa-search-minus"></i></a>
</div>
<div class="clearfix"></div>
<form action="{{route('busqueda_personal')}}" id="form-busqueda" class="form-horizontal" method="POST" autocomplete="off"  style='@if (isset($busqueda)) display:block @else display:none @endif'>
    @csrf
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Filtros busqueda</h3>
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