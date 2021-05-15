@if (isset($data->only_view))
    @if (isset($data->$nombre))
        <label for="{{$nombre}}" class="col-lg-{{$label}} control-label">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
        @if (isset($data) && $data->$nombre!='' && strpos(mime_content_type("storage/".$data->$nombre), 'image')!==false)
            <div class="col-lg-1">
                <a href="{{asset('/storage/'.$data->$nombre)}}" data-toggle="lightbox" data-title="">
                    <img src="{{asset('/storage/'.$data->$nombre)}}" class="{{isset($imgFormat) ? $imgFormat : ''}} elevation-2" height="40">
                </a>
            </div>
        @elseif (isset($data) && $data->$nombre!='')
            <div class="col-lg-1">
                <a href='{{asset('/storage/'.$data->$nombre)}}' target="_blank"><i class="far fa-2x fa-file-pdf"></i></a>
            </div>
        @endif
    @endif
@else
    <label for="{{$nombre}}" class="col-lg-{{$label}} control-label {{$req==1 ? 'requerido' : ''}}">{{$title ?? ucfirst(str_replace('_',' ',$nombre))}}</label>
    <div class="input-group col-lg-{{$input-1}}">
        <div class="custom-file">
             <!-- accept="image/*" -->
             <input type="file" name="{{$nombre}}" id="{{$nombre}}"  class="custom-file-input" {{$req==1 ? 'required' : ''}} {{isset($data->readonly) ? 'disabled' : ''}} {{isset($dis) ? 'disabled' : ''}}>
            <label class="custom-file-label" for="{{$nombre}}Inputfile">Examinar</label>
        </div>
        <!--<div class="input-group-append">
            <span class="input-group-text" id="">Upload</span>
        </div>-->
    </div>

    @if (isset($data) && $data->$nombre!='' && strpos(mime_content_type("storage/".$data->$nombre), 'image')!==false)
        <div class="col-lg-1">
            <a href="{{asset('/storage/'.$data->$nombre)}}" data-toggle="lightbox" data-title="">
                <img src="{{asset('/storage/'.$data->$nombre)}}" class="{{isset($imgFormat) ? $imgFormat : ''}} elevation-2" height="40">
            </a>
        </div>
    @elseif (isset($data) && $data->$nombre!='')
        <div class="col-lg-1">
            <a href='{{asset('/storage/'.$data->$nombre)}}' target="_blank"><i class="far fa-2x fa-file-pdf"></i></a>
        </div>
    @endif
@endif