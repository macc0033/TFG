@if (isset($data->only_view))
    @if (isset($data->$nombre))
        <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
        <div class="col-lg-{{$input}} style='border: 1px solid {{$data->$nombre}}'">{{$data->$nombre}}</div>
    @endif
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="input-group colorpicker-element col-lg-{{$input}}" id="c-{{$nombre}}" data-colorpicker-id="{{$nombre}}">
        <input type="text" class="form-control" name="{{$nombre}}" id="{{$nombre}}"  value="{{old($nombre, $data->$nombre ?? '')}}" data-original-title="{{$nombre}}" title="{{$nombre}}">

        <div class="input-group-append">
          <span class="input-group-text" style='width:50px'> </span>
        </div>
    </div>   
@endif
