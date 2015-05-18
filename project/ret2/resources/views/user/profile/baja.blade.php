@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} @parent @stop

{{-- Content --}}
@section('main')

<div class="container-fluid">
    <div class="row">
      @yield('main')
      asd
    </div>
  </div>

@stop
