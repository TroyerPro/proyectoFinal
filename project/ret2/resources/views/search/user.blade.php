@extends('app')
@section('title') Contact :: @parent @stop
@section('content')

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){

        $("#quitar").click(function(){
          window.location.assign("{{ URL::to('search/user') }}")
          });

          $( "#buscar" ).click(function() {
            var nombre=$(".nombre").val();
            $.ajax({
              type: "POST",
              url: "{{ URL::to('search/user') }}",
              data:{
                "nombre":nombre,
              },
              }).done(function() {
                $("#ResultItems").html();
            });
          });

          var nombre=new Array();
          var cont=0;
          @foreach ($user as $user)
            nombre[cont]='{{$user->name}}';
            cont+=1;
          @endforeach
          $(function() {
              $("input").autocomplete({
                source:[nombre]
              });
          });

  });
    </script>

@endsection

<div class="page-header col-xs-12">
    <h2>Buscador de Usuarios</h2>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-12">
      @yield('main')
        <div  class="col-xs-3" id="buscador">
          <div class="input-group">
            <ul class="nav nav-pills nav-stacked" id="menu">
              <li>
                <form method="post">
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                  <li>
                    <a>
                      <span class="hidden-sm text" id="nombre">Nombre</span>
                    </a>
                  </li>
                  <input type="text" class="form-group nombre" name="nombre"></input><br>
                  <br>
                <button type="submit" id="buscar" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-ok-circle"></span>
                      Buscar
                  </button>
                  <button type="reset" id="quitar" class="btn btn-sm btn-danger">
                    <span class="glyphicon glyphicon-remove-circle"></span>
                     Quitar filtros
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      <div class="col-xs-9">
        @if (count($user2) === 0)
          <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
            <h4>No hay usuarios con ese nombre</h4>
          </div>
        @else
          @foreach ($user2 as $user2)
          <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
              <div class="col-xs-5">
                <a href="user/view/{{ $user->id }}">imagen del user</a>
              </div>
              <div class="col-xs-3">
                <h4>{{ $user2->name }}</h4>
              </div>
              <div class="col-xs-4">
                <h4>{{ $user2->email }}</h4>
              </div>

          </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>


@endsection
