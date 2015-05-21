@extends('app')
@section('custom')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.transitions.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/style.css') }}">
@endsection
@section('title') Home :: @parent @stop


@section('scripts')
  <script src="{{asset('js/jquery.tinycarousel.min.js')}}"></script>
  @parent
  <script>
  $(document).ready(function()
  {
      $('#slider1').tinycarousel(
        {
          interval: true,
          intervalTime: 2000,
      });

      $("#slider5").tinycarousel({
        axis   : "y",
        interval: true,
        intervalTime: 4000,
    });
  });

  </script>
  @endsection

  @section('content')
  <div class="row">
    <div class="boxed_layout relative w_xs_auto">
  			<!--content-->
  			<div class="page_content_offset">
  				<div class="container">
  					<h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>
  					<!--filter navigation of products-->
  					<ul class="horizontal_list clearfix tt_uppercase isotope_menu f_size_ex_large">
  						<li class="active m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter="*">All</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".featured">Featured</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".new">New</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".specials">Specials</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".hit">Hit</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".random">Random</button></li>
  						<li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".rated">Rated</button></li>
  					</ul>
  					<!--products-->
  					<section class="products_container clearfix m_bottom_25 m_sm_bottom_15">

  						<!--product item-->
  						<div class="product_item rated">
  							<figure class="r_corners photoframe shadow relative animate_ftb long">
  								<!--product preview-->
  								<a href="#" class="d_block relative pp_wrap">
  									<!--sale product-->
  									<span class="hot_stripe type_2"><img src="images/sale_product_type_2.png" alt=""></span>
  									<img src="images/product_img_8.jpg" class="tr_all_hover" alt="">
  									<span data-popup="#quick_view_product" class="box_s_none button_type_5 color_light r_corners tr_all_hover d_xs_none">Quick View</span>
  								</a>
  								<!--description and price of product-->
  								<figcaption>
  									<h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
  									<div class="clearfix">
  										<p class="scheme_color f_left f_size_large m_bottom_15"><s>$79.00</s> $36.00</p>
  										<!--rating-->
  										<ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
  											<li class="active">
  												<i class="fa fa-star-o empty tr_all_hover"></i>
  												<i class="fa fa-star active tr_all_hover"></i>
  											</li>
  											<li class="active">
  												<i class="fa fa-star-o empty tr_all_hover"></i>
  												<i class="fa fa-star active tr_all_hover"></i>
  											</li>
  											<li class="active">
  												<i class="fa fa-star-o empty tr_all_hover"></i>
  												<i class="fa fa-star active tr_all_hover"></i>
  											</li>
  											<li class="active">
  												<i class="fa fa-star-o empty tr_all_hover"></i>
  												<i class="fa fa-star active tr_all_hover"></i>
  											</li>
  											<li>
  												<i class="fa fa-star-o empty tr_all_hover"></i>
  												<i class="fa fa-star active tr_all_hover"></i>
  											</li>
  										</ul>
  									</div>
  									<button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
  								</figcaption>
  							</figure>
  						</div>
  					</section>

  					<div class="row clearfix">
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_3.png" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
  									</span>
  								</span>
  							</a>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_4.png" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>Free Shipping</b><br><span class="color_dark">On All Items</span>
  									</span>
  								</span>
  							</a>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-4">
  							<a href="#" class="d_block animate_ftb h_md_auto banner_type_2 r_corners orange t_align_c tt_uppercase vc_child n_sm_vc_child">
  								<span class="d_inline_middle">
  									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_5.png" alt="">
  									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
  										<b>Great Daily Deals</b><br><span class="color_dark">Shop Now!</span>
  									</span>
  								</span>
  							</a>
  						</div>
  					</div>
  				</div>
  			</div>

  		<!--custom popup-->
  		<div class="popup_wrap d_none" id="quick_view_product">
  			<section class="popup r_corners shadow">
  				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
  				<div class="clearfix">
  					<div class="custom_scrollbar">
  						<!--left popup column-->
  						<div class="f_left half_column">
  							<div class="relative d_inline_b m_bottom_10 qv_preview">
  								<span class="hot_stripe"><img src="images/sale_product.png" alt=""></span>
  								<img src="images/quick_view_img_1.jpg" class="tr_all_hover" alt="">
  							</div>
  							<!--carousel-->
  							<div class="relative qv_carousel_wrap m_bottom_20">
  								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_prev">
  									<i class="fa fa-angle-left "></i>
  								</button>
  								<ul class="qv_carousel d_inline_middle">
  									<li data-src="images/quick_view_img_1.jpg"><img src="images/quick_view_img_4.jpg" alt=""></li>
  									<li data-src="images/quick_view_img_2.jpg"><img src="images/quick_view_img_5.jpg" alt=""></li>
  									<li data-src="images/quick_view_img_3.jpg"><img src="images/quick_view_img_6.jpg" alt=""></li>
  									<li data-src="images/quick_view_img_1.jpg"><img src="images/quick_view_img_4.jpg" alt=""></li>
  									<li data-src="images/quick_view_img_2.jpg"><img src="images/quick_view_img_5.jpg" alt=""></li>
  									<li data-src="images/quick_view_img_3.jpg"><img src="images/quick_view_img_6.jpg" alt=""></li>
  								</ul>
  								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_next">
  									<i class="fa fa-angle-right "></i>
  								</button>
  							</div>
  							<div class="d_inline_middle">Share this:</div>
  							<div class="d_inline_middle m_left_5">
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
  						</div>
  						<!--right popup column-->
  						<div class="f_right half_column">
  							<!--description-->
  							<h2 class="m_bottom_10"><a href="#" class="color_dark fw_medium">Eget elementum vel</a></h2>
  							<div class="m_bottom_10">
  								<!--rating-->
  								<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
  									<li class="active">
  										<i class="fa fa-star-o empty tr_all_hover"></i>
  										<i class="fa fa-star active tr_all_hover"></i>
  									</li>
  									<li class="active">
  										<i class="fa fa-star-o empty tr_all_hover"></i>
  										<i class="fa fa-star active tr_all_hover"></i>
  									</li>
  									<li class="active">
  										<i class="fa fa-star-o empty tr_all_hover"></i>
  										<i class="fa fa-star active tr_all_hover"></i>
  									</li>
  									<li class="active">
  										<i class="fa fa-star-o empty tr_all_hover"></i>
  										<i class="fa fa-star active tr_all_hover"></i>
  									</li>
  									<li>
  										<i class="fa fa-star-o empty tr_all_hover"></i>
  										<i class="fa fa-star active tr_all_hover"></i>
  									</li>
  								</ul>
  								<a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
  							</div>
  							<hr class="m_bottom_10 divider_type_3">
  							<table class="description_table m_bottom_10">
  								<tr>
  									<td>Manufacturer:</td>
  									<td><a href="#" class="color_dark">Chanel</a></td>
  								</tr>
  								<tr>
  									<td>Availability:</td>
  									<td><span class="color_green">in stock</span> 20 item(s)</td>
  								</tr>
  								<tr>
  									<td>Product Code:</td>
  									<td>PS06</td>
  								</tr>
  							</table>
  							<h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>
  							<table class="description_table m_bottom_5">
  								<tr>
  									<td>Product Length:</td>
  									<td><span class="color_dark">10.0000M</span></td>
  								</tr>
  								<tr>
  									<td>Product Weight:</td>
  									<td>10.0000KG</td>
  								</tr>
  							</table>
  							<hr class="divider_type_3 m_bottom_10">
  							<p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </p>
  							<hr class="divider_type_3 m_bottom_15">
  							<div class="m_bottom_15">
  								<s class="v_align_b f_size_ex_large">$152.00</s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">$102.00</span>
  							</div>
  							<table class="description_table type_2 m_bottom_15">
  								<tr>
  									<td class="v_align_m">Size:</td>
  									<td class="v_align_m">
  										<div class="custom_select f_size_medium relative d_inline_middle">
  											<div class="select_title r_corners relative color_dark">s</div>
  											<ul class="select_list d_none"></ul>
  											<select name="product_name">
  												<option value="s">s</option>
  												<option value="m">m</option>
  												<option value="l">l</option>
  											</select>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="v_align_m">Quantity:</td>
  									<td class="v_align_m">
  										<div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
  											<button class="bg_tr d_block f_left" data-direction="down">-</button>
  											<input type="text" name="" readonly value="1" class="f_left">
  											<button class="bg_tr d_block f_left" data-direction="up">+</button>
  										</div>
  									</td>
  								</tr>
  							</table>
  							<div class="clearfix m_bottom_15">
  								<button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover f_left f_size_large">Add to Cart</button>
  								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-heart-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span></button>
  								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-files-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span></button>
  								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section>
  		</div>
  </div>

  <script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>
  <script src="{{asset('assets/site/js/retina.js')}}"></script>
  <script src="{{asset('assets/site/js/camera.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>
  <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.tweet.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.custom-scrollbar.js')}}"></script>
  <script src="{{asset('assets/site/js/scripts.js')}}"></script>

@endsection


@stop
