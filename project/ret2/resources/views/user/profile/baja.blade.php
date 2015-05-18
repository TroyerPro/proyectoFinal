@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} @parent @stop

{{-- Content --}}
@section('main')

<div class="container-fluid">
    <div class="row">
      @yield('main')
      @if($subasta)
      <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <strong>Lo sentimos. Actualmente no puedes darte de baja porque tienes las siguientes subastas activas:</strong>
      @else
      <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/perfil') !!}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if(isset($success))
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>¡Se han realizado los cambios!</strong>
              </div>
              @endif
              @if(isset($error))
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <strong>Tienes subastas activas. No puedes darte de baja.</strong>
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
                @for ($i = 0; $i < $currentuser-> ratingcomprador; $i++)
                <img src="{{ URL::asset('img/star.jpg') }}">
                @endfor
              </div>
          </div>
          <div class="form-group">
              <label class="col-md-2 control-label" >R.Vendedor</label>
              <div class="col-md-6">
                @for ($i = 0; $i < $currentuser-> ratingvendedor; $i++)
                <img src="{{ URL::asset('img/star.jpg') }}">
                @endfor
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
                <div class="col-md-12">
                  <a href="{{{ URL::to('user/perfil/baja') }}}" class="btn btn-danger btn-puja iframe" ><span class="glyphicon glyphicon-pencil"></span>Dar de baja</a>
                </div>
              </div>
          </div>
      </form>
      @endif
    </div>
  </div>

@stop
