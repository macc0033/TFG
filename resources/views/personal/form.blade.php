<div class="card p-3">
    <div class="form-group row">
        @if (isset($data))
            @include('includes.input.text', ['nombre' => 'usuario', 'label' => 2,'input' => 4, 'req' => 1, 'dis' => 1, 'data' => $data->usuario])
            @include('includes.input.email', ['nombre' => 'email', 'label' => 2,'input' => 4, 'req' => 1, 'data' => $data->usuario])
        @else
            @include('includes.input.text', ['nombre' => 'usuario', 'label' => 2,'input' => 4, 'req' => 1])
            @include('includes.input.email', ['nombre' => 'email', 'label' => 2,'input' => 4, 'req' => 1])
        @endif 
        
    </div>
    <div class="form-group row">
        @include('includes.input.password', ['nombre' => 'password', 'title' => 'Contraseña', 'label' => 2,'input' => 4, 'req' => 1])
        @include('includes.input.password', ['nombre' => 're_password', 'title' => 'Repita Contraseña', 'label' => 2,'input' => 4, 'req' => 1])
    </div>
    <div class="form-group row">
        @if (session('permisos')) 
            @if (!in_array('solo-propia-personal', session('permisos'))) 
                @if (isset($data))
                    @include('includes.input.select-multiple', ['nombre' => 'rol_id', 'title' => 'Rol', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $rols, 'rel' => 'roles', 'data' => $data->usuario])
                    @include('includes.input.switch', ['nombre' => 'activo', 'label' => 2,'input' => 4, 'data' => $data->usuario])
                @else
                    @include('includes.input.select-multiple', ['nombre' => 'rol_id', 'title' => 'Rol', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $rols, 'rel' => 'roles'])
                    @include('includes.input.switch', ['nombre' => 'activo', 'label' => 2,'input' => 4])
                @endif
            @endif
        @else
            @if (isset($data))
                @include('includes.input.select-multiple', ['nombre' => 'rol_id', 'title' => 'Rol', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $rols, 'rel' => 'roles', 'data' => $data->usuario])
                @include('includes.input.switch', ['nombre' => 'activo', 'label' => 2,'input' => 4, 'data' => $data->usuario])
            @else
                @include('includes.input.select-multiple', ['nombre' => 'rol_id', 'title' => 'Rol', 'label' => 2,'input' => 4, 'req' => 1, 'valores' => $rols, 'rel' => 'roles'])
                @include('includes.input.switch', ['nombre' => 'activo', 'label' => 2,'input' => 4])
            @endif
        @endif
    </div>
</div>

<div class="card p-3">
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
</div>