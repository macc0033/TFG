@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fas fa-ban"></i> El formulario contiene errores</h4>
        <ul>
            @if ($errors->get('rol_id.0'))
                <li>Debe seleccionar un Rol valido</li>
            @else
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
        </ul>
    </div>
@endif