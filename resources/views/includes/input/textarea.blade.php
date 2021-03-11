@if (isset($data->only_view))
    @if (isset($data->$nombre))
        <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
        <div class="col-lg-{{$input}}">{{$data->$nombre}}</div>
    @endif
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        <textarea class="form-control" rows="3" name="{{$nombre}}" id="{{$nombre}}" {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}}>{{old($nombre, $data->$nombre ?? '')}}</textarea>
    </div>    
@endif
