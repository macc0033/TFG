<nav class="main-header navbar navbar-expand {{$navbar}}">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/inicio" class="nav-link">Inicio</a>
    </li>
    @if (can('navbar-contacto',false))
      <li class="nav-item d-none d-sm-inline-block">
        <a href="mailto:macc0033@red.ujaen.es" class="nav-link">Contacto</a>
      </li>
    @endif
    <!--@if (can('ver-agenda-personal',false))
      <li class="nav-item d-none d-sm-inline-block">
      <a href="/agenda/{{session()->get('usuario_id')}}" class="nav-link">Agenda</a>
      </li>
    @endif-->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @if (can('navbar-mensajes',false) && isset($mensajes))
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset("assets/$theme/dist/img/user1-128x128.jpg")}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Miguel Ángel Carpio Colomo
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Hola...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Hace 4 Horas</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Todos los Mensajes</a>
        </div>
      </li>
    @endif

      
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{session()->get('imagen_usuario')!==null ? asset('/storage/personal/foto/'.session()->get('imagen_usuario')) : asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">Hola, {{session()->get('nombre_usuario') ?? 'Invitado'}}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="{{session()->get('imagen_usuario')!==null ? asset('/storage/personal/foto/'.session()->get('imagen_usuario')) : asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">

          <p>
            {{session()->get('nombre_usuario') ?? 'Invitado'}} {{session()->get('apellidos_usuario') ?? ''}}<br><i>{{session()->get('rol_nombre') ?? ''}}</i>
          </p>
        </li>
        <!-- Menu Body -->
        <!--<li class="user-body">
          <div class="row">
            <div class="col-4 text-center">
              <a href="#">Followers</a>
            </div>
            <div class="col-4 text-center">
              <a href="#">Sales</a>
            </div>
            <div class="col-4 text-center">
              <a href="#">Friends</a>
            </div>
          </div>
        </li>-->
        <!-- Menu Footer-->
        <li class="user-footer">
          @if (session()->get('personal_id_usuario')!==null)
          <a href="{{route('editar_personal', ['id'=> session()->get('personal_id_usuario') ?? ''])}}" class="btn btn-default btn-flat"><i class="fas fa-user"></i> Perfil</a>
          @endif
          <a href="{{route('logout')}}" class="btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt"></i> Salir</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>