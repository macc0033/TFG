@extends("theme.$theme.layout")
@section("titulo")
Menú - Rol
@endsection

@section("styles")
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
@endsection

@section("scripts")
<!-- DataTables -->
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>
<!-- DataTables Buttons -->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script>
    $(function () {
        $('#tabla-data').DataTable({
            dom: 'lBfrtip',
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            "scrollY": "400px",
            "scrollX": false,
            //"scrollCollapse": true,
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            buttons: [
                {
                    extend: "colvis",
                    titleAttr: 'Mostras/Ocultar Columnas',
                    text: 'Columnas',
                }
            ],
        });
        setTimeout(function(){ 
            $('#tabla-data_wrapper').addClass('row'); 
            $('.dt-buttons').addClass('col-md-6'); 
            $('#tabla-data_filter').addClass('col-md-6');
        }, 100);
    });
</script>
<script src="{{asset("assets/pages/scripts/admin/menu-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('titulo')</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('includes.mensaje')
                @include('includes.mensaje-error')
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Listado</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        @csrf
                        <table id="tabla-data" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Menú</th>
                                    @foreach ($rols as $id => $nombre)
                                    <th class="text-center">{{$nombre}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $key => $menu)
                                @if ($menu["menu_id"] != 0)
                                    @break
                                @endif
                                    <tr>
                                        <td><i class="fas fa-arrows-alt"></i> {{$menu["nombre"]}}</td>
                                        @foreach($rols as $id => $nombre)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_rol"
                                                name="menu_rol[]"
                                                data-menuid={{$menu[ "id"]}}
                                                {{(!can('asignar-menus',false)) ? 'disabled' : ''}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRols[$menu["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @foreach($menu["submenu"] as $key => $hijo)
                                        <tr>
                                            <td class="pl-20"><i class="fas fa-arrow-right"></i> {{ $hijo["nombre"] }}</td>
                                            @foreach($rols as $id => $nombre)
                                                <td class="text-center">
                                                    <input
                                                    type="checkbox"
                                                    class="menu_rol"
                                                    name="menu_rol[]"
                                                    data-menuid={{$hijo[ "id"]}}
                                                    {{(!can('asignar-menus',false)) ? 'disabled' : ''}}
                                                    value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo["id"]], "id"))? "checked" : ""}}>
                                                </td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hijo["submenu"] as $key => $hijo2)
                                            <tr>
                                                <td class="pl-30"><i class="fas fa-arrow-right"></i> {{$hijo2["nombre"]}}</td>
                                                @foreach($rols as $id => $nombre)
                                                    <td class="text-center">
                                                        <input
                                                        type="checkbox"
                                                        class="menu_rol"
                                                        name="menu_rol[]"
                                                        data-menuid={{$hijo2[ "id"]}}
                                                        {{(!can('asignar-menus',false)) ? 'disabled' : ''}}
                                                        value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo2["id"]], "id"))? "checked" : ""}}>
                                                    </td>
                                                @endforeach
                                            </tr>
                                            @foreach ($hijo2["submenu"] as $key => $hijo3)
                                                <tr>
                                                    <td class="pl-40"><i class="fas fa-arrow-right"></i> {{$hijo3["nombre"]}}</td>
                                                    @foreach($rols as $id => $nombre)
                                                    <td class="text-center">
                                                        <input
                                                        type="checkbox"
                                                        class="menu_rol"
                                                        name="menu_rol[]"
                                                        data-menuid={{$hijo3[ "id"]}}
                                                        {{(!can('asignar-menus',false)) ? 'disabled' : ''}}
                                                        value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo3["id"]], "id"))? "checked" : ""}}>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
