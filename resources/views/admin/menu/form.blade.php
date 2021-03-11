<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'nombre', 'label' => 2,'input' => 9, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'url', 'label' => 2,'input' => 9, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'icono', 'label' => 2,'input' => 9, 'req' => 1])
    <div class="col-lg-1">
        <span id="mostrar-icono" class="fas fa-fw {{old('icono', $data->icono ?? '')}}"></span>
    </div>
</div>
