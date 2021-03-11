<div class="form-group row">
    @include('includes.input.text', ['nombre' => 'usuario', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.email', ['nombre' => 'email', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.password', ['nombre' => 'password', 'title' => 'Contraseña', 'label' => 2,'input' => 4, 'req' => 1])
    @include('includes.input.password', ['nombre' => 're_password', 'title' => 'Repita Contraseña', 'label' => 2,'input' => 4, 'req' => 1])
</div>
<div class="form-group row">
    @include('includes.input.select-multiple', ['nombre' => 'rol_id', 'title' => 'Rol', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $rols, 'rel' => 'roles'])
    @include('includes.input.switch', ['nombre' => 'activo', 'label' => 2,'input' => 4])
</div>