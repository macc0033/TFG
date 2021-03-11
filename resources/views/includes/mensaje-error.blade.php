@if (session("mensaje-error"))
    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> {{ session("mensaje-error") }}</h5>
    </div>
@endif