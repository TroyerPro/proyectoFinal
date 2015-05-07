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

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-bullhorn fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$subasta}}</div>
                            <div>Subastas</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/subastas')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("admin/admin.view_detail") }}</span>
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
                            <i class="glyphicon glyphicon-bullhorn fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$puja}}</div>
                            <div>Puja</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('user/pujas')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      </div>
@endsection
