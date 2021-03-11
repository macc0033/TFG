<aside class="main-sidebar {{$aside}} elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('inicio')}}" class="brand-link {{$brand}}">
      <img src='/storage/empresa/logo/{{$empresa['logo']}}'>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">        
          @foreach ($menusComposer as $key => $item)
              @if ($item["menu_id"] != 0)
                  @break
              @endif
              @include("theme.$theme.menu-item", ["item" => $item])
          @endforeach
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>