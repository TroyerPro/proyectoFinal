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
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/perfil/password') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(isset($success))
                  @if($success)
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>¡Se han realizado los cambios!</strong>
                    </div>
                    @else
                    <div class="alert alert-fail alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>¡MEEEK las passwords deben coincidir!</strong>
                    </div>
                    @endif
                    @endif
                <div class="form-group">
                    <label class="col-md-4 control-label" >Nueva contraseña</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Repita la contraseña</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="pass2">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <a href="{{{ URL::to('user/perfil') }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon"></span>  Volver</a>
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Cambiar contraseña
                        </button>

                    </div>
                </div>
            </form>

            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection
@stop
