<label for="{{$nombre}}" class="col-lg-{{$label}} mr-4 control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
@foreach ($options as $item)
<div class="custom-control custom-radio col-lg-{{$input}}" >
        <input class="custom-control-input" type="radio" name="{{$nombre}}" id="{{$item}}" value="{{$item}}" 
            {{old($nombre, $data->$nombre ?? '')==$item ? 'checked' : ''}}
            {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'readonly' : ''}} {{isset($dis) ? 'disabled' : ''}} {{isset($data->only_view) ? 'disabled' : ''}}>
        <label for="{{$item}}" class="custom-control-label ">{{ucfirst(str_replace('_',' ',$item))}}</label>
    </div>
@endforeach