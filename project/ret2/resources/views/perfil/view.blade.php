@extends('app')
@section('custom')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.transitions.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/style.css') }}">
@endsection
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        <div class="page_content_offset">
        				<div class="container">
        					<div class="d_table full_width d_xs_block m_bottom_25">
        						<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_15">
        							<h1 class="tt_uppercase color_dark">{{$user->name}} {{$user->surname}}</h1>
        						</div>
        						<div class="d_table_cell v_align_m t_align_r d_xs_block">

        						</div>
        					</div>
        					<div class="row clearfix">
        						<section class="col-lg-7 col-md-7 col-sm-7">
        							<div class=" r_corners wrapper m_bottom_30">
                        <img class="imagen_profilev2" src="{{ URL::asset('img/profile/'.$user->imagen) }}">
        							</div>
        						</section>
        						<aside class="col-lg-5 col-md-5 col-sm-5 m_xs_bottom_30">
        							<h5 class="fw_medium m_bottom_10">Presentación</h5>
        							<p class="m_bottom_15">@if($user->descripcion){{ $user->descripcion }} @else Este usuario no tiene ninguna descripción. @endif</p>
        							<table class="about_project full_width m_bottom_10">
        								<tr>
        									<td>Ciudad:</td>
        									<td>@if($user->ciudad){{ $user->ciudad}} @else No se ha especificado una ciudad. @endif</td>
        								</tr>
        								<tr>
        									<td>E-mail:</td>
        									<td>@if($user->email){{ $user->email}} @else No se ha especificado un eMail. @endif</td>
        								</tr>
                        <tr>
                          <td>Miembro desde:</td>
                          <td>{{ $user->created_at->format('d-m-Y')}}</td>
                        </tr>
        								<tr>
        									<td>R. Vendedor:</td>
        									<td>
                            @if($user->ratingvendedor==0)
                            Este usuario no tienen ningúna valoración.
                            @else
                              @for ($i = 0; $i < $user->ratingvendedor; $i++)
                                <img src="{{ URL::asset('img/star.jpg') }}">
                              @endfor
                            @endif
                          </td>
        								</tr>
        								<tr>
        									<td>R. Comprador:</td>
        									<td>
                            @if($user->ratingcomprador==0)
                            Este usuario no tienen ningúna valoración.
                            @else
                              @for ($i = 0; $i < $user->ratingcomprador; $i++)
                                <img src="{{ URL::asset('img/star.jpg') }}">
                              @endfor
                            @endif
                          </td>
        								</tr>
        							</table>
        							<p class="d_inline_middle m_md_bottom_5">Compartir:</p>
        							<div class="d_inline_middle m_left_5 m_md_left_0 addthis_widget_container">
        								<!-- AddThis Button BEGIN -->
        								<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
        								<a class="addthis_button_preferred_1"></a>
        								<a class="addthis_button_preferred_2"></a>
        								<a class="addthis_button_preferred_3"></a>
        								<a class="addthis_button_preferred_4"></a>
        								<a class="addthis_button_compact"></a>
        								<a class="addthis_counter addthis_bubble_style"></a>
        								</div>
        								<!-- AddThis Button END -->
        							</div>
        							<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
        						</aside>
        					</div>
        					<h2 class="tt_uppercase color_dark m_bottom_20">Subastas destacadas</h2>
        					<div class="row clearfix">
                    @if(count($subastas)>0)
                    @foreach($subastas as $subastas)
                    <div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c">
                      <figure class="d_xs_inline_b d_mxs_block">
                        <figcaption class="t_xs_align_l">
                          <h4 class="m_bottom_3"><a href="{!! URL::to('/search/subasta/view/'.$subastas->id) !!}" class="color_dark"><b>{{$subastas->nombre}}</b></a></h4>
                          <a href="{!! URL::to('/search/subasta/view/'.$subastas->id) !!}" class="color_dark"><img src="{{ URL::asset('img/subasta/'.$subastas->imagen) }}" alt="" class="subasta-perfil"></a>
                          @if($subastas->precio_actual<=0)
                          <p class="m_bottom_3"><a href="{!! URL::to('/search/subasta/view/'.$subastas->id) !!}" class="color_dark"><b>{{$subastas->precio_inicial}}€</b></a></p>
                          @else
                          <p class="m_bottom_3"><a href="{!! URL::to('/search/subasta/view/'.$subastas->id) !!}" class="color_dark"><b>{{$subastas->precio_actual}}€</b></a></p>
                          @endif

                      </figcaption>
                      </figure>
                    </div>
                    @endforeach
                    @else
                      <div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c">
                        <figure class="d_xs_inline_b d_mxs_block">
                          <h3>Este usuario no tiene subastas activas.</h3>
                        </figure>
                      </div>
                    @endif
        					</div>
                  <h2 class="tt_uppercase color_dark m_bottom_20" style="margin-top:2%;">Evaluaciones</h2>
                  <div class="row clearfix">
                    @if(count($evaluaciones)>0)
                      @foreach($evaluaciones as $evaluaciones)
                      <div class="col-lg-6 col-md-6 col-sm-6 t_xs_align_c">
                        <figure class="d_xs_inline_b d_mxs_block">
                          <figcaption class="t_xs_align_l">
                            <h4 class="m_bottom_3"><a href="{!! URL::to('/search/user/view/'.$evaluaciones->id_user_evaluador) !!}" class="color_dark"><b>{{$evaluaciones->name}}</b></a></h4>
                            <b>Rating:</b>
                            @for ($i = 0; $i < $evaluaciones->id_rating; $i++)
                              <img src="{{ URL::asset('img/star.jpg') }}">
                            @endfor
                            <br>
                            <b>Comentario:</b>
                            {{ $evaluaciones->comentario }}
                          </figcaption>
                        </figure>
                      </div>
                      @endforeach
                    @else
                    <div class="col-lg-6 col-md-6 col-sm-6 t_xs_align_c">
                      <figure class="d_xs_inline_b d_mxs_block">
                        <h3>Este usuario no tiene evaluaciones.</h3>
                      </figure>
                    </div>
                    @endif
                  </div>
        				</div>
        			</div>
    </div>
  </div>
  <script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>

  <script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>

  <script src="{{asset('assets/site/js/scripts.js')}}"></script>
    @endsection
