@extends("theme.$theme.layout")

@section("titulo")
    Calendario {{isset($data) ? $data->personal->nombre." ".$data->personal->apellidos : ''}}
@endsection

@section("metas")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("styles")
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar/main.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-daygrid/main.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-timegrid/main.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-bootstrap/main.min.css")}}">
@endsection

@section("scripts")
    
    <!-- fullCalendar 2.2.5 -->
    <script src="{{asset("assets/$theme/plugins/jquery-ui/jquery-ui.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/moment/moment.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/moment/locale/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar-daygrid/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar-timegrid/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar-timegrid/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar-interaction/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar-bootstrap/main.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/$theme/plugins/fullcalendar/locales/es.js")}}"></script>
    <!-- Page specific script -->
    <script>var idUsuario = {{isset($data) ? $data->id : 0}}</script>
    <script src="{{asset("assets/pages/scripts/calendar/index.js")}}" type="text/javascript"></script>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body p-0">
                    <div id="calendar"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div id="fullCalModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modalTitle" class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span> <span class="sr-only">cerrar</span>
                        </button>
                    </div>
                    <div id="modalBody" class="modal-body"></div>
                    <div class="modal-footer">        
                        <a data-toggle="modal" id="modificarEvento" data-target="#editEvent" class="btn btn-success btn-sm mr-2">Modificar</a>
                        <form action="" id="formEliminar" class="d-inline form-eliminar" method="POST">
                            @csrf @method("delete")
                            <button type="submit" class="btn btn-danger btn-sm mr-2">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="editEvent" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" name="form_edit" id="form_edit" action='' autocomplete="off">
                        @csrf @method("put")
                        <div class="modal-header">
                            <h4 id="modalTitle" class="modal-title">Modificar</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span> <span class="sr-only">cerrar</span>
                            </button>
                        </div>
                        <div id="modalBodyEdit" class="modal-body form-group row">
                            
                            
                            <div class="col-lg-12">
                                <input type="checkbox" id="AllDayMod" class="AllDayMod" name="allDay" value="1">
                                <label for="AllDay-evento" class="control-label">Todo el día </label>
                            </div> 
                            
                            <label for="inicio-evento" class="col-lg-12 control-label reqMod requerido pt-3">Inicio Evento: </label>
                            <div class="col-lg-12">
                                <input type="datetime-local" id="eventIniMod" class="form-control" name="inicio" required value=''>
                            </div>    
                            
                            <label for="fin-evento" class="col-lg-12 control-label reqMod requerido pt-3">Fin Evento: </label>
                            <div class="col-lg-12">
                                <input type="datetime-local" id="eventFinMod" class="form-control" name="fin" required value=''>
                            </div>

                            <label for="inicio-evento" class="col-lg-12 control-label requerido pt-3">Nombre Evento: </label>
                            <div class="col-lg-12">
                                <input type="text" name="nombre" id="titleMod" class="form-control" value='' required>
                            </div>

                            <label for="inicio-evento" class="col-lg-12 control-label requerido pt-3">Persona Evento: </label>
                            <div class="col-lg-12">
                                <select name="usuario_id" id="personalMod" class="form-control" required></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success btn-sm" name="mod_event" value="Modificar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="addEvent" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" name="form_add" id="form_add" action='' autocomplete="off">
                        @csrf @method("post")
                        <div class="modal-header">
                            <h4 id="modalTitle" class="modal-title">Añadir</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span> <span class="sr-only">cerrar</span>
                            </button>
                        </div>
                        <div id="modalBodyAdd" class="modal-body form-group row">
                            
                            <div class="col-lg-12">
                                <input type="checkbox" id="AllDayAdd" class="AllDayAdd" name="allDay" value="1">
                                <label for="AllDay-evento" class="control-label">Todo el día </label>
                            </div> 
                            
                            <label for="inicio-evento" class="col-lg-12 control-label reqAdd requerido pt-3">Inicio Evento: </label>
                            <div class="col-lg-12">
                                    <input type="datetime-local" id="eventIniAdd" class="form-control" name="inicio" required value=''>
                            </div>    
                            
                            <label for="fin-evento" class="col-lg-12 control-label reqAdd requerido pt-3">Fin Evento: </label>
                            <div class="col-lg-12">
                                <input type="datetime-local" id="eventFinAdd" class="form-control" name="fin" required value=''>
                            </div>

                            <label for="inicio-evento" class="col-lg-12 control-label requerido pt-3">Nombre Evento: </label>
                            <div class="col-lg-12">
                                <input type="text" name="nombre" id="titleAdd" class="form-control" value='' required>
                            </div>

                            <label for="inicio-evento" class="col-lg-12 control-label requerido pt-3">Persona Evento: </label>
                            <div class="col-lg-12">
                                <select name="usuario_id" id="personalAdd" class="form-control" required></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success btn-sm" name="add_event" value="Añadir">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection