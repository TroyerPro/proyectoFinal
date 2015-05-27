@extends('app')
@section('custom')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.transitions.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/style.css') }}">
@endsection
@section('title') Home :: @parent @stop

@section('content')
  <div class="row">
      <h1 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">Revolution Trade</h1>
  					<h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">Subastas activas</h2>
        <!--filter navigation of products-->
  					<ul class="horizontal_list clearfix tt_uppercase isotope_menu f_size_ex_large">
  						<li class="active m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter="*">Todas</button></li>
              @foreach ($categoria as $categoria)
              <li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".{{$categoria->id}}">{{$categoria->nombre}}</button></li>
  						@endforeach
  					</ul>
  					<!--products-->
            <section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
            @foreach ($subasta as $subasta)

  						<!--product item-->
  						<div class="product_item {{$subasta->id_categoria}}">
  							<figure class="r_corners photoframe shadow relative animate_ftb long">
  								<!--product preview-->
  								<a href="{!! URL::to('/search/subasta/view/'.$subasta->id) !!}" class="d_block relative pp_wrap">
  									<!--sale product-->
                    <img class="imangen_subasta_home" src="{{ URL::asset('img/subasta/'.$subasta->imagen) }}">
  								</a>
  								<!--description and price of product-->
  								<figcaption>
  									<h5 class="m_bottom_10"><a href="{!! URL::to('/search/subasta/view/'.$subasta->id) !!}" class="color_dark">{{ str_limit($subasta->nombre,15) }}</a></h5>
  									<div class="clearfix">
  										<p class="scheme_color f_left f_size_large m_bottom_15">Puja: @if($subasta->precio_actual != 0){{$subasta->precio_actual}}@else {{$subasta->precio_inicial}} @endif €</p><br/>
  										<!--rating-->
  									</div>
                    <a class="btn btn-info btn-sm" href="{!! URL::to('/search/subasta/view/'.$subasta->id) !!}">Ir a la subasta</a>

  								</figcaption>
  							</figure>
  						</div>

            @endforeach
          </section>
  					<div class="row">
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block  h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="{{ URL::asset('img/banner_img_3.png') }}" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>Anuncio 1</b><br><span class="color_dark">parner</span>
  									</span>
  								</span>
  							</a>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block  h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="{{ URL::asset('img/banner_img_4.png') }}" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>Anuncio 2</b><br><span class="color_dark">¡Parner!</span>
  									</span>
  								</span>
  							</a>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block  h_md_auto banner_type_2 r_corners orange t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="{{ URL::asset('img/banner_img_5.png') }}" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>¡Anuncio 3!</b><br><span class="color_dark">¡Parner!</span>
  									</span>
  								</span>
  							</a>
  						</div>
  					</div>

  </div>

  <script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>

  <script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>

  <script src="{{asset('assets/site/js/scripts.js')}}"></script>

@endsection


@stop
