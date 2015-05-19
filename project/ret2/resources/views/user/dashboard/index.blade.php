@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}
@section('main')

    <div class="page-header">
        <h3>
            {{$title}}
        </h3>
    </div>
    @if($finalizadas>0)
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Alerta!</strong> <a href="{{URL::to('user/subasta/finalizadas')}}" class="alert-link">Tienes subastas finalizadas , quieres hacer una prorroga?.</a>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-shopping-cart fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$subasta}}</div>
                            <div>Activas</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/subastas')}}">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-shopping-cart fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$finalizadas}}</div>
                            <div>Finalizadas</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/subasta/finalizadas')}}">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$puja}}</div>
                            <div>Pujas</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/pujas')}}">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments-o fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$chats}}</div>
                            <div>Chats</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/chat')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      </div>
@endsection
