@if (isset($data->only_view))
    @if (isset($data->$nombre))
        <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
        <div class="col-lg-{{$input}}">{{$data->$nombre}}</div>
    @endif
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        <input type="number" name="{{$nombre}}" id="{{$nombre}}" class="form-control" value="{{old($nombre, $data->$nombre ?? '')}}" {{isset($step) ? "step='$step'" : "step=1" }} {{isset($min) ? "min=$min" : '' }} {{isset($max) ? "max=$max" : ''}} {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}}/>
    </div>    
@endif
