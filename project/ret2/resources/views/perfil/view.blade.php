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
        							<h2 class="tt_uppercase color_dark">{{$user->name}}</h2>
        						</div>
        						<div class="d_table_cell v_align_m t_align_r d_xs_block">

        						</div>
        					</div>
        					<div class="row clearfix">
        						<section class="col-lg-7 col-md-7 col-sm-7">
        							<div class=" r_corners shadow wrapper m_bottom_30">
                        <img class="imagen_profilev2" src="{{ URL::asset('img/profile/'.$user->imagen) }}">
        							</div>
        						</section>
        						<aside class="col-lg-5 col-md-5 col-sm-5 m_xs_bottom_30">
        							<h5 class="fw_medium m_bottom_10">About Project</h5>
        							<p class="m_bottom_15">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </p>
        							<table class="about_project full_width m_bottom_10">
        								<tr>
        									<td>Date:</td>
        									<td>June 25, 2014</td>
        								</tr>
        								<tr>
        									<td>Client:</td>
        									<td>Lorem ipsum </td>
        								</tr>
        								<tr>
        									<td>Services:</td>
        									<td>Website development</td>
        								</tr>
        								<tr>
        									<td>Skills:</td>
        									<td>Photoshop, HTML, CSS, JS, PHP</td>
        								</tr>
        								<tr>
        									<td>Category:</td>
        									<td><a href="#" class="color_dark">Webdesign</a>, <a href="#" class="color_dark">Projects</a></td>
        								</tr>
        								<tr>
        									<td>Tags:</td>
        									<td><a href="#" class="color_dark">auctor</a>, <a href="#" class="color_dark">wisi</a>, <a href="#" class="color_dark">et urna</a></td>
        								</tr>
        							</table>
        							<a href="#" class="color_dark fw_medium d_inline_b m_bottom_25"><i class="fa fa-external-link d_inline_middle m_right_10"></i>Launch Project</a><br>
        							<p class="d_inline_middle m_md_bottom_5">Share this:</p>
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
        					<h2 class="tt_uppercase color_dark m_bottom_20">Related Projects</h2>
        					<div class="row clearfix">
        						<div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c">
        							<figure class="d_xs_inline_b d_mxs_block">
        								<div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
        									<img src="images/portfolio_img_07.jpg" alt="" class="tr_all_long_hover">
        									<div class="open_buttons clearfix">
        										<div class="f_left f_size_large tr_all_hover"><a href="images/img_01.jpg" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="portfolio" data-title="title 1"><i class="fa fa-camera"></i></a></div>
        										<div class="f_left m_left_10 f_size_large tr_all_hover"><a href="portfolio_single_1.html" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
        									</div>
        								</div>
        								<figcaption class="t_xs_align_l">
        									<h4 class="m_bottom_3"><a href="#" class="color_dark"><b>Image title 1</b></a></h4>
        									<a href="#" class="color_dark">Portraits</a>
        								</figcaption>
        							</figure>
        						</div>
        						<div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c">
        							<figure class="d_xs_inline_b d_mxs_block">
        								<div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
        									<img src="images/portfolio_img_08.jpg" alt="" class="tr_all_long_hover">
        									<div class="open_buttons clearfix">
        										<div class="f_left f_size_large tr_all_hover"><a href="http://www.youtube.com/watch?v=SZEflIVnhH8" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="portfolio" data-title="title 2"><i class="fa fa-video-camera"></i></a></div>
        										<div class="f_left m_left_10 f_size_large tr_all_hover"><a href="portfolio_single_1.html" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
        									</div>
        								</div>
        								<figcaption class="t_xs_align_l">
        									<h4 class="m_bottom_3"><a href="#" class="color_dark"><b>Image title 2</b></a></h4>
        									<a href="#" class="color_dark">Fashion</a>
        								</figcaption>
        							</figure>
        						</div>
        						<div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c">
        							<figure class="d_xs_inline_b d_mxs_block">
        								<div class="photoframe with_buttons relative shadow r_corners wrapper m_bottom_15">
        									<img src="images/portfolio_img_09.jpg" alt="" class="tr_all_long_hover">
        									<div class="open_buttons clearfix">
        										<div class="f_left f_size_large tr_all_hover"><a href="images/img_03.jpg" role="button" class="color_light button_type_13 r_corners box_s_none d_block jackbox" data-group="portfolio" data-title="title 3"><i class="fa fa-camera"></i></a></div>
        										<div class="f_left m_left_10 f_size_large tr_all_hover"><a href="portfolio_single_1.html" role="button" class="color_light button_type_13 r_corners box_s_none d_block"><i class="fa fa-link"></i></a></div>
        									</div>
        								</div>
        								<figcaption class="t_xs_align_l">
        									<h4 class="m_bottom_3"><a href="#" class="color_dark"><b>Image title 3</b></a></h4>
        									<a href="#" class="color_dark">People</a>
        								</figcaption>
        							</figure>
        						</div>
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
