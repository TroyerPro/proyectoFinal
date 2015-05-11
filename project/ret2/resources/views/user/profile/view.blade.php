@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} :: @parent @stop

{{-- Content --}}
@section('main')
<div class="row">
    <div class="page-header">
        <h2>Perfil</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Subasta</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            @yield('main')
            <div class="col-md-3">
              <img class="profile_img col-md-12" src="{{ URL::asset('img/profile/'.$currentuser->imagen) }}">
              <div class="col-md-6 col-md-offset-1">
                <a href="{{{ URL::to('user/perfil/imagen') }}}" class="btn btn-success btn-sm iframe button-center btn-mrg-top" ><span class="glyphicon glyphicon-pencil"></span> Cambiar imagen</a>
              </div>
              <div class="col-md-6 col-md-offset-1">
              </div>
            </div>
            <div class="col-md-9">
              <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/perfil') !!}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @if(isset($success))
                      <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <strong>¡Se han realizado los cambios!</strong>
                      </div>
                      @endif
                  <div class="form-group">
                      <label class="col-md-2 control-label" >Nombre</label>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="nombre" placeholder="{{ $currentuser-> name }}" value="{{ $currentuser-> name }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >Apellidos</label>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="apellidos" placeholder="{{ $currentuser-> surname }}" value="{{ $currentuser-> surname }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >NIF</label>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="nif" placeholder="{{ $currentuser-> nif }}" value="{{ $currentuser-> nif }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >eMail</label>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="email" placeholder="{{ $currentuser-> email }}" value="{{ $currentuser-> email }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >R. Comprador</label>
                      <div class="col-md-6">
                          {{ $currentuser-> ratingcomprador }}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >R.Vendedor</label>
                      <div class="col-md-6">
                          {{ $currentuser-> ratingvendedor }}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label" >Creado en:</label>
                      <div class="col-md-6">
                        {{ $currentuser-> created_at }}
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-1">
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary">
                              Realizar cambios
                          </button>
                        </div>
                        <div class="col-md-4">
                          <a href="{{{ URL::to('user/perfil/password') }}}" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span>  Cambiar contraseña</a>
                        </div>
                      </div>
                  </div>
              </form>
            </div>
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection
@stop
