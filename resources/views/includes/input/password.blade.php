@if (!isset($data->only_view))
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{!isset($data) ? ($req==1 ? 'requerido' : '') : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="col-lg-{{$input}}">
        <input type="password" name="{{$nombre}}" id="{{$nombre}}" class="form-control" {{!isset($data) ? ($req==1 ? 'required' : '') : ''}} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}}/>
    </div>
@endif