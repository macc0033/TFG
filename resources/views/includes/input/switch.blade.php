<label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
<div class="custom-control custom-switch col-lg-{{$input}}" >
    <input class="custom-control-input" type="checkbox" name="{{$nombre}}" id="{{$nombre}}" value="1" 
        {{$errors->any() ? (old($nombre)!== null ? 'checked' : '') 
                         : (isset($data) ? ($data->$nombre==1 ? 'checked' : '') : '')
        }} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}} {{isset($data->only_view) ? 'disabled' : ''}}>
    <label for="{{$nombre}}" class="custom-control-label"></label>
</div>