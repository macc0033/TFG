<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'nombre', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.text', ['nombre' => 'idioma', 'label' => 2,'input' => 4, 'req' => 0])
</div>
<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'iso2', 'label' => 2,'input' => 2, 'req' => 0])
    @include('includes.input.text', ['nombre' => 'iso3', 'label' => 2,'input' => 2, 'req' => 0])
    @include('includes.input.text', ['nombre' => 'isonum', 'label' => 2,'input' => 2, 'req' => 0])
</div>