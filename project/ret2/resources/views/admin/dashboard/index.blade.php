@extends('admin.layouts.default')

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
                            <i class="glyphicon fa fa-columns fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$newscategory}}</div>
                            <div>{{ trans("Categorias") }}!</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/newscategory')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("Detalles") }}</span>
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
                            <i class="glyphicon glyphicon-euro fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$subasta}}</div>
                            <div>{{ trans("Subastas") }}!</div>
                        </div>
                    </div>
                </div>

                <a href="{{URL::to('admin/news')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("Detalles") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
