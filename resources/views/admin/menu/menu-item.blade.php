@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <i class="fas {{isset($item["icono"]) ? $item["icono"] : ""}}"></i> {{$item["nombre"]}}
        @if (can('eliminar-menus',false))
            <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu float-right tooltipsC pl-2" title="Eliminar este menú"><i class="fas fa-trash text-danger"></i></a>
        @endif
        @if (can('ver-menus',false))
            <a href="{{route("editar_menu", ['id' => $item["id"]])}}"  class="modificar-menu float-right tooltipsC" title="Modificar Menú"><i class="fas fa-edit"></i></a>
        @endif
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <i class="fas {{isset($item["icono"]) ? $item["icono"] : ""}}"></i> {{$item["nombre"]}}
        @if (can('eliminar-menus',false))
            <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu float-right tooltipsC pl-2" title="Eliminar este menú"><i class="fas fa-trash text-danger"></i></a>
        @endif
        @if (can('ver-menus',false))
            <a href="{{route("editar_menu", ['id' => $item["id"]])}}"  class="modificar-menu float-right tooltipsC" title="Modificar Menú"><i class="fas fa-edit"></i></a>
        @endif
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif
