<div class="custom-control custom-checkbox offset-md-{{$label}} col-lg-{{$input}}" >
    <input class="custom-control-input" type="checkbox" name="{{$nombre}}" id="{{$nombre}}" value="1" 
        {{$errors->any() ? (old($nombre)!== null ? 'checked' : '') 
                         : (isset($data->$nombre) ? 'checked' : '')
        }} {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}} {{isset($data->only_view) ? 'disabled' : ''}}>
    <label for="{{$nombre}}" class="custom-control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
</div>
