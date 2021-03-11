<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'cif', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'denominacion', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.text', ['nombre' => 'nombre_comercial', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'telefono', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.email', ['nombre' => 'email', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'direccion', 'label' => 2,'input' => 10, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.select', ['nombre' => 'provincia', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $provincias])
    @include('includes.input.select', ['nombre' => 'localidad', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $localidades])
</div>
<div class="form-group row">
    @include('includes.input.number', ['nombre' => 'codigo_postal', 'min' => 0, 'max' => 99999, 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.select', ['nombre' => 'pais', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $paises])
</div>
<div class="form-group row">
    @include('includes.input.upload', ['nombre' => 'logo', 'label' => 2,'input' => 4, 'req' => 0])
</div>