@if (isset($data->only_view))
    @if (isset($data->$nombre))
        <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
        <div class="col-lg-{{$input}}">
            @foreach($valores as $key => $valor)
                {{isset($rel) ? ($data->$rel->firstWhere('id', $key) ? $valor : '')
                              : ($key==$data->$nombre ? $valor : '')
                }}
            @endforeach
        </div>
    @endif
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        <select name="{{$nombre}}" id="{{$nombre}}" class="form-control {{isset($simple) ? '' : 'select2'}}" {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'disabled' : ''}} {{isset($dis) ? 'disabled' : ''}}>
            
            @if (!isset($valores[0]))
                <option value="">Seleccionar</option>
            @endif
            @foreach($valores as $key => $valor)
                <option value="{{$key}}" 
                    {{(old($nombre) ? ($key==old($nombre) ? 'selected' : '') 
                                    : (isset($data) ? ( isset($rel) ? ($data->$rel->firstWhere('id', $key) ? 'selected' : '')
                                                                    : ($key==$data->$nombre ? 'selected' : ''))
                                                    : ''))
                    }}
                    >
                    {{$valor}}
                </option>
            @endforeach
        </select>
    </div>
@endif