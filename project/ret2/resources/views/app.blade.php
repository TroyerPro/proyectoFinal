<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@section('RET') RET @show</title>
    @section('RET')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="RET"/>
    @show @section('RET')
        <meta name="description"
              content="RET"/>
    @show

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/tinycarousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.autocomplete.css') }}" rel="stylesheet">
    {{--<link href="{{elixir('css/all.css')}}" rel="stylesheet">--}}
    {{-- TODO: Incorporate into elixer workflow. --}}
    <link rel="stylesheet"
          href="{{asset('assets/site/css/half-slider.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/site/css/justifiedGallery.min.css')}}"/>
    <link rel="stylesheet"
          href="{{asset('assets/site/css/lightbox.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap-theme.min.css')}}">

    @yield('styles')
    @yield('custom')
    <!-- Fonts -->

    <!--
    DESCARGAR:
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

    <link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>
<body>
@include('partials.nav')

@include('flash::message')
<div class="container">
@yield('content')
</div>


<script src="{{ asset('/js/all.js') }}"></script>
<script src="{{ asset('/js/jquery.autocomplete.js') }}"></script>
<script src="{{ asset('/js/canvasjs.min.js') }}"></script>
{{--<script src="{{ elixir('js/all.js') }}"></script>--}}

<script src="{{asset('assets/site/js/jquery.justifiedGallery.min.js')}}"></script>
<script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>




<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-danger').delay(3000).slideUp(300);
</script>
@yield('scripts')

</body>
</html>
