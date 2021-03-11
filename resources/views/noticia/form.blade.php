<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'titulo', 'title' => 'Título', 'label' => 2,'input' => 6, 'req' => 1])
    @if (isset($datos))
        <input type="hidden" name="personal_id" class="form-control" value="{{$datos->personal_id}}" />
        @include('includes.input.calendar', ['nombre' => 'fecha', 'label' => 2,'input' => 2, 'req' => 1, 'data' => $datos])
    @else 
        <input type="hidden" name="personal_id" class="form-control" value="{{$data->personal_id}}" />
        @include('includes.input.calendar', ['nombre' => 'fecha', 'label' => 2,'input' => 2, 'req' => 1])
    @endif
</div>
<div class="form-group row">
    @include('includes.input.wysihtml5', ['nombre' => 'descripcion', 'label' => 2,'input' => 10, 'req' => 1])
</div>