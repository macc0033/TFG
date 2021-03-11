@if (isset($data->only_view))
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        @foreach($valores as $key => $valor) 
            {!!isset($rel) ? ($data->$rel->firstWhere('id', $key) ? $valor."<br>" : '') 
                        : (in_array($key, $data->$nombre) ? $valor."<br>" : '')
            !!}
        @endforeach
    </div>
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        <select name="{{$nombre}}[]" id="{{$nombre}}" multiple class="form-control select2" {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'disabled' : ''}} {{isset($dis) ? 'disabled' : ''}}>
            <option value="">Seleccionar</option>
            @foreach($valores as $key => $valor)
                <option value="{{$key}}" 
                    {{(is_array(old($nombre)) ? (in_array($key, old($nombre)) ? 'selected' : '') 
                                            : (isset($data) ? ( isset($rel) ? ($data->$rel->firstWhere('id', $key) ? 'selected' : '')
                                                                            : (in_array($key, $data->$nombre) ? 'selected' : ''))
                                                            : ''))
                    }}
                    >
                    {{$valor}}
                </option>
            @endforeach
        </select>
    </div>
@endif