@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
<div class="page-header col-xs-12">
    <h2>Buscador de Usuarios</h2>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-12">
      @yield('main')
        <div  class="col-xs-3" id="buscador">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </div>
      <div class="col-xs-9">
            @foreach ($user as $user)
            <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
                <div class="col-xs-5">
                  <a href="user/view/{{ $user->id }}">imagen del user</a>
                </div>
                <div class="col-xs-3">
                  <h4>{{ $user->name }}</h4>
                </div>
                <div class="col-xs-4">
                  <h4>{{ $user->email }}</h4>
                </div>

            </div>
            @endforeach
      </div>
    </div>
  </div>
</div>


@endsection
