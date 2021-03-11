<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'nombre', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.text', ['nombre' => 'apellidos', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'dni', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.upload', ['nombre' => 'subir_dni', 'label' => 2,'input' => 4, 'req' => 0])
</div>
<div class="form-group row">
    @include('includes.input.upload', ['nombre' => 'foto', 'label' => 2,'input' => 4, 'req' => 0, 'imgFormat' => 'img-circle'])
</div>
<div class="form-group row">
    @include('includes.input.select', ['nombre' => 'sexo', 'label' => 2,'input' => 4, 'req' => 0, 'valores' => ['hombre' => 'Hombre','mujer' => 'Mujer']])
    @include('includes.input.calendar', ['nombre' => 'fecha_nacimiento', 'label' => 2,'input' => 4, 'req' => 0])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'telefono', 'label' => 2,'input' => 4, 'req' => 0])
    @include('includes.input.email', ['nombre' => 'email_empresa', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'direccion', 'label' => 2,'input' => 10, 'req' => 0])
</div>
<div class="form-group row">
    @include('includes.input.select', ['nombre' => 'provincia', 'label' => 2,'input' => 4, 'req' => 0, 'valores' => $provincias])
    @include('includes.input.select', ['nombre' => 'localidad', 'label' => 2,'input' => 4, 'req' => 0, 'valores' => $localidades])
</div>
<div class="form-group row">
    @include('includes.input.number', ['nombre' => 'codigo_postal', 'min' => 0, 'max' => 99999, 'label' => 2,'input' => 4, 'req' => 0])
    @include('includes.input.select', ['nombre' => 'pais', 'label' => 2,'input' => 4, 'req' => 0, 'valores' => $paises])
</div>