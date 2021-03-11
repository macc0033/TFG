<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'municipio', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.select', ['nombre' => 'provincia', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $provincias])
</div>