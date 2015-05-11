@extends('app')

{{-- Web site Title --}}
@section('title') {{{ trans('site/user.register') }}} :: @parent @stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>{{{ trans('site/user.register') }}}</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Register</div>--}}
                    {{--<div class="panel-body">--}}

                        @include('errors.list')

                        <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/auth/register') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.nif') }}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nif" value="{{ old('nif') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.name') }}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.surname') }}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                                </div>
                            </div>

                            <div class="form-group">

                              <label class="col-md-4 control-label">{{{ trans('site/user.birthdate') }}}</label>

                              <div class="col-md-6">
                                <input type="text" class="col-md-3 " name="dia" placeholder="dd">
                                <input type="text" class="col-md-3" name="mes" placeholder="mm">
                                <input type="text" class="col-md-3 " name="ano" placeholder="aaaa">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.city') }}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.e_mail') }}}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-4 control-label">{{{ trans('site/user.username') }}}</label>

                              <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.password') }}}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.password_confirmation') }}}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{{ trans('site/user.present') }}}</label>

                                <div class="col-md-6">
                                  <textarea type="text" class="form-control" name="present" value="{{ old('present') }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarse
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
