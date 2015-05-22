// on document ready
(function($){
	"use strict";

	var globalDfd = $.Deferred();
	$(window).bind('load',function(){
		// after loading all the scripts
		globalDfd.resolve();
	});

	$(function(){

	$.fx.speeds._default = 500;

	// open dropdown


	// waypoints helper functions

	$.fn.waypointInit = function(classN,offset,delay,inv){
		return $(this).waypoint(function(direction){
			var current = $(this);
			if(direction === 'down'){
				if(delay){
					setTimeout(function(){
						current.addClass(classN);
					},delay);
				}
				else{
					current.addClass(classN);
				}
			}else{
            	if(inv == true){
                    current.removeClass(classN);
             	}
            }
		},{ offset : offset })
	};

	// synchronise

	$.fn.waypointSynchronise = function(config){
		var element = $(this);
		function addClassToElem(el,eq){
			el.eq(eq).addClass(config.classN);
		}
		element.closest(config.container).waypoint(function(direction){
		 	element.each(function(i){
				if(direction === 'down'){

		 			if(config.globalDelay != undefined){
		 				setTimeout(function(){
		 					setTimeout(function(){
		 						addClassToElem(element,i);
		 					},i * config.delay);
		 				},config.globalDelay);
		 			}else{
		 				setTimeout(function(){
		 					addClassToElem(element,i)
		 				},i * config.delay);
		 			}

				}else{

					if(config.inv){
						setTimeout(function(){
							element.eq(i).removeClass(config.classN);
						},i * config.delay);
					}

				}
			});
		},{ offset : config.offset });
		return element;
	};

	// animation main page

	(function(){
		globalDfd.done(function(){
		$('.products_container:not(.a_type_2) .photoframe.animate_ftb').waypointSynchronise({
			container : '.products_container',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.products_container.a_type_2 .photoframe.animate_ftb').waypointSynchronise({
			container : '.products_container',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.wfilter_carousel .photoframe.animate_ftb').waypointSynchronise({
			container : '.wfilter_carousel',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.bestsellers_carousel .photoframe.animate_ftb').waypointSynchronise({
			container : '.bestsellers_carousel',
			delay : 200,
			offset : 700,
			globalDelay : 400,
			classN : "animate_vertical_finished"
		});
		$('.banner_type_2[class*="animate_ft"]').waypointSynchronise({
			container : '.row',
			delay : 200,
			offset : 800,
			classN : "animate_vertical_finished"
		});
		$('.animate_half_tc').waypointSynchronise({
			container : '.row',
			delay : 0,
			offset : 830,
			classN : "animate_horizontal_finished"
		});


		$('.blog_animate.animate_ftr').waypointInit('animate_horizontal_finished','800px');
		$('.ti_animate.animate_ftr').waypointInit('animate_horizontal_finished','800px',1000);
		$('.testiomials_carousel .animate_ftr:first').waypointInit('animate_horizontal_finished','851px',1200);
		$('.testiomials_carousel .animate_ftr:nth-child(2)').waypointInit('animate_horizontal_finished','973px',1400);
		$('.testiomials_carousel .animate_ftr:nth-child(3)').waypointInit('animate_horizontal_finished','987px',1600);
		$('.heading1.animate_ftr').waypointInit('animate_horizontal_finished','1000px');
		$('.isotope_menu > li.animate_ftr').waypointSynchronise({
			container : '.isotope_menu',
			delay : 200,
			offset : 1000,
			classN : "animate_horizontal_finished"
		});
		$('.flexslider.animate_ftr').waypointInit('animate_horizontal_finished','1000px');
		setTimeout(function(){
			$('.s_banners .d_block.animate_ftr').waypointSynchronise({
				container : '.s_banners',
				delay : 300,
				offset : 830,
				classN : "animate_horizontal_finished"
			});
		},200);
		$('.heading5').waypointInit('animate_horizontal_finished','800px');
		$('.banner.animate_ftr').waypointSynchronise({
			container : '.row',
			delay : 200,
			offset : 1000,
			globalDelay : 800,
			classN : "animate_horizontal_finished"
		});
		$('.nc_carousel .photoframe.animate_ftb').waypointSynchronise({
			container : '.nc_carousel',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.info_blocks_container .animate_ftr').waypointSynchronise({
			container : '.info_blocks_container',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.our_recent_work_carousel .animate_ftb').waypointSynchronise({
			container : '.our_recent_work_carousel',
			delay : 200,
			offset : 700,
			classN : "animate_vertical_finished"
		});
		$('.p_tables .animate_fade').waypointSynchronise({
			container : '.p_tables',
			delay : 200,
			offset : 700,
			classN : "animate_fade_finished"
		});
		$('.animate_corporate_container .animate_fade').waypointSynchronise({
			container : '.animate_corporate_container',
			delay : 200,
			offset : 700,
			classN : "animate_fade_finished"
		});

		// sticky menu



		});
	})();

	// jackbox

	(function(){

		if($(".jackbox[data-group]").length){
			jQuery(".jackbox[data-group]").jackBox("init",{
				    showInfoByDefault: false,
				    preloadGraphics: true,
				    fullscreenScalesContent: true,
				    autoPlayVideo: true,
				    flashVideoFirst: false,
				    defaultVideoWidth: 960,
				    defaultVideoHeight: 540,
				    baseName: ".jackbox",
				    className: ".jackbox",
				    useThumbs: true,
				    thumbsStartHidden: false,
				    thumbnailWidth: 75,
				    thumbnailHeight: 50,
				    useThumbTooltips: true,
				    showPageScrollbar: false,
				    useKeyboardControls: true
			});
		}

	})();

	// remove products from shopping cart


	// shopping cart hover


	// searchform


	// ie9 placeholder



	// revolution slider

	if($('.r_slider').length){
	    var api = $('.r_slider').revolution({
	         delay:5000,
	         startwidth:1140,
	         startheight:500,
	         autoHeight:"off",
	         fullScreenAlignForce:"off",

	         onHoverStop:"on",

	         thumbWidth:100,
	         thumbHeight:50,
	         thumbAmount:3,

	         hideThumbsOnMobile:"off",
	         hideBulletsOnMobile:"off",
	         hideArrowsOnMobile:"off",
	         hideThumbsUnderResoluition:0,

	 		 hideTimerBar:"on",
	         hideThumbs:0,

	         navigationType:"bullet",
	         navigationArrows:"solo",
	         navigationStyle:"round",

	         navigationHAlign:"center",
	         navigationVAlign:"bottom",
	         navigationHOffset:0,
	         navigationVOffset:15,

	         soloArrowLeftHalign:"left",
	         soloArrowLeftValign:"center",
	         soloArrowLeftHOffset:40,
	         soloArrowLeftVOffset:0,

	         soloArrowRightHalign:"right",
	         soloArrowRightValign:"center",
	         soloArrowRightHOffset:40,
	         soloArrowRightVOffset:0,


	         touchenabled:"on",

	         stopAtSlide:-1,
	         stopAfterLoops:-1,
	         hideCaptionAtLimit:0,
	         hideAllCaptionAtLilmit:0,
	         hideSliderAtLimit:0,

	         dottedOverlay:"none",

	         fullWidth:"off",
	         forceFullWidth:"off",
	         fullScreen:"off",
	         fullScreenOffsetContainer:"#topheader-to-offset",

	         shadow:0

	    });
		api.bind("revolution.slide.onloaded",function (e,data) {
		    var container = $('.revolution_slider');
		    container.find('.tp-leftarrow').append('<i class="fa fa-angle-left"></i>');
		    container.find('.tp-rightarrow').append('<i class="fa fa-angle-right"></i>');
		    // $('.tp-leftarrow,.tp-rightarrow').fadeIn(1500);

		    // create custom thumbs

		   	(function(){
		   		var image = $('.r_slider [data-custom-thumb]'),
		   			len = image.length,
		   			bullet = $('.tp-bullets .bullet');
		   		for(var i = 0; i < len; i++){
		   			bullet.eq(i).append('<div class="custom_thumb tr_all_hover"><img src="' + image.eq(i).data('custom-thumb') + '" alt=""></div>');
		   		}
		   	})();

			$('.tp-bullets .bullet').each(function(){
				var curr = $(this);
				curr.on("mouseenter mouseleave",function(){
					curr.children('.custom_thumb').toggleClass('active')
				});
			});
		});

	}

	// carousel with filter

	(function(){

		var cwf = $('.wfilter_carousel'),
			prev = $('.wfilter_prev'),
			next = $('.wfilter_next'),
			filter = $('[data-carousel-filter]'),
			elements = [],
			item = cwf.find('.photoframe'),
			len = item.length;

		if(cwf.length){

			var cf = cwf.owlCarousel({
				itemsCustom : [[1199,4],[992,4],[768,3],[590,2],[300,1]],
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
			});

		 	prev.on('click',function(){
		 		cf.trigger('owl.prev');
		 	});
		 	next.on('click',function(){
		 		cf.trigger('owl.next');
		 	});

		 	for(var i = 0; i < len; i++){
		 		elements.push(item.eq(i)[0].outerHTML);
		 	}


		 	filter.on('click','li',function(){
		 		var	self = $(this),
		 			activeElem = self.children('[data-filter]').data('filter');
		 		cwf.addClass('changed').find('.owl-wrapper').animate({
		 			opacity : 0
		 		},function(){
		 			var s = $(this);
		 			cwf.children().remove();
		 			if(activeElem == "*"){
		 				$.each(elements,function(i,v){
		 					cwf.append(v);
			 			});
		 			}else{
			 			$.each(elements,function(i,v){
			 				if(v.indexOf(activeElem) !== -1){
			 					cwf.append(v);
			 				}
			 			});
		 			}
		 			cwf.data('owlCarousel').destroy();
		 			cwf.owlCarousel({
		 				itemsCustom : [[1199,4],[992,4],[768,3],[590,2],[300,1]],
				 		autoPlay : false,
				 		slideSpeed : 1000,
				 		autoHeight : true,
				 		afterInit: function(){
				 			cwf.addClass('no_children_animate');
				 		}
		 			});
		 			$(window).trigger('resize');
		 		});
		 		self.closest('li').addClass('active').siblings().removeClass('active');
		 	});
		}

	})();

	// bestsellers carousel

	(function(){

		var bsc = $('.bestsellers_carousel');
		if(bsc.length){
			var bs = bsc.owlCarousel({
		 		itemsCustom : [[1199,4],[992,4],[768,3],[590,2],[300,1]],
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

		 	$('.bestsellers_prev').on('click',function(){
		 		bs.trigger('owl.prev');
		 	});

		 	$('.bestsellers_next').on('click',function(){
		 		bs.trigger('owl.next');
		 	});
		}

	})();

	// our_recent_work_carousel

	(function(){
		var orw = $('.our_recent_work_carousel');
		if(orw.length){
			var orwc = orw.owlCarousel({
		 		itemsCustom : [[1199,3],[992,3],[768,3],[421,2],[10,1]],
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

		 	$('.orw_prev').on('click',function(){
		 		orwc.trigger('owl.prev');
		 	});

		 	$('.orw_next').on('click',function(){
		 		orwc.trigger('owl.next');
		 	});
		}
	})();

	// new collections carousel

	(function(){

		var ncc = $('.nc_carousel');
		if(ncc.length){
			var nc = ncc.owlCarousel({
		 		itemsCustom : [[1199,3],[992,3],[768,3],[575,2],[300,1]],
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

		 	$('.nc_prev').on('click',function(){
		 		nc.trigger('owl.prev');
		 	});

		 	$('.nc_next').on('click',function(){
		 		nc.trigger('owl.next');
		 	});
		}

	})();

	// camera slideshow


	// rating

	$('body').on('click','.rating_list li',function(){
		$(this).siblings().removeClass('active');
		$(this).addClass('active').prevAll().addClass('active');
	});

	// product brands carousel

	(function(){
		if($('.product_brands').length){
		 	var pb = $(".product_brands").owlCarousel({
		 		itemsCustom : $('.product_brands').hasClass('with_sidebar') ? [[1199,4],[992,4],[768,3],[480,3],[300,2]] : [[1199,6],[992,5],[768,4],[480,3],[300,2]],
		 		autoPlay : true,
		 		stopOnHover : true,
		 		slideSpeed : 600,
		 		addClassActive : true
		 	});

		 	$('.pb_prev').on('click',function(){
		 		pb.trigger('owl.prev');
		 	});

		 	$('.pb_next').on('click',function(){
		 		pb.trigger('owl.next');
		 	});
		}
	})();

	// blog carousel



	// testimonials

	(function(){
		if($('.testiomials_carousel').length){
			var tc = $('.testiomials_carousel').owlCarousel({
		 		singleItem : true,
		 		autoPlay : false,
		 		stopOnHover : true,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

			$('.ti_prev').on('click',function(){
				tc.trigger('owl.prev');
			});

			$('.ti_next').on('click',function(){
				tc.trigger('owl.next');
			});
		}

	})();
	(function(){
		if($('.testiomials_carousel_2').length){
			var tc = $('.testiomials_carousel_2').owlCarousel({
		 		singleItem : true,
		 		autoPlay : false,
		 		stopOnHover : true,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

			$('.ti_2_prev').on('click',function(){
				tc.trigger('owl.prev');
			});

			$('.ti_2_next').on('click',function(){
				tc.trigger('owl.next');
			});
		}

	})();


	// responsive menu

	window.rmenu = function(){

		var menuWrap = $('[role="navigation"]'),
			menu = $('.main_menu'),
			button = $('#menu_button');

		function orientationChange(){
			if($(window).width() < 767){
					button.off('click').on('click',function(){
						menuWrap.stop().slideToggle();
						$(this).toggleClass('active');
					});
				menu.children('li').children('a').off('click').on('click',function(e){
					var self = $(this);
					self
						.closest('li')
						.toggleClass('current_click')
						.find('.sub_menu_wrap')
						.stop()
						.slideToggle()
						.end()
						.closest('li')
						.siblings('li')
						.removeClass('current_click')
						.children('a').removeClass('prevented').parent()
						.find('.sub_menu_wrap')
						.stop()
						.slideUp();
					if(!(self.hasClass('prevented'))){
						e.preventDefault();
						self.addClass('prevented');
					}else{
						self.removeClass('prevented');
					}
				});
			}else if($(window).width() > 767){
				menuWrap.removeAttr('style').find('.sub_menu_wrap').removeAttr('style');
				menu.children('li').children('a').off('click');
			}
		}
		orientationChange();

		$(window).on('resize',orientationChange);

	};
	rmenu();

	// custom select


	// widgets



	// twitter

	// quick view carousel

	(function(){
		var qvc = $('.qv_carousel'),
			qvcsingle = $('.qv_carousel_single');
		if(qvc.length){
			var qv = qvc.owlCarousel({
				items: 3,
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

			$('.qv_btn_prev').on('click',function(){
				qv.trigger('owl.prev');
			});

			$('.qv_btn_next').on('click',function(){
				qv.trigger('owl.next');
			});
		}
		if(qvcsingle.length){
			var qvcs = qvcsingle.owlCarousel({
				itemsCustom : [[1199,3],[992,3],[768,3],[480,3],[300,3]],
		 		autoPlay : false,
		 		slideSpeed : 1000,
		 		autoHeight : true
		 	});

			$('.qv_btn_single_prev').on('click',function(){
				qvcs.trigger('owl.prev');
			});

			$('.qv_btn_single_next').on('click',function(){
				qvcs.trigger('owl.next');
			});
		}

	})();

	// quantity

	(function(){

		$('.quantity').on('click','button',function(){
			var data = $(this).data('direction'),
				i = $(this).parent().children('input[type="text"]'),
				val = i.val();
			if(data == "up"){
				val++;
				i.val(val);
			}else if(data == "down"){
				if(val == 1) return;
				val--;
				i.val(val);
			}
		});

	})();

	// popup


	// tabs



	// accordion & toggle

	(function(){

		var aItem = $('.accordion:not(.toggle) .accordion_item'),
			link = aItem.find('.a_title'),
			aToggleItem = $('.accordion.toggle .accordion_item'),
			tLink = aToggleItem.find('.a_title');

		aItem.add(aToggleItem).children('.a_title').not('.active').next().hide();


		link.on('click',function(){

			 $(this).removeClass('bg_light_color_1 color_dark')
				.addClass('active color_light')
				.next().stop().slideDown()
				.parent().siblings()
				.children('.a_title')
				.removeClass('active color_light')
				.addClass('bg_light_color_1 color_dark')
				.next().stop().slideUp();

		});

		tLink.on('click',function(){
			$(this).toggleClass('active color_light bg_light_color_1 color_dark')
					.next().stop().slideToggle();

		})

	})();

	// related projects



	// block select


	// special carousel

	(function(){

		var sc = $('.specials_carousel');
		if(sc.length){
			var spc = sc.owlCarousel({
				// singleItem : true,
				itemsCustom : [[1199,1],[992,1],[768,1],[480,2],[300,1]],
		 		autoPlay : false,
		 		slideSpeed : 500,
		 		autoHeight : true,
		 		transitionStyle : "backSlide"
		 	});

			$('.sc_prev').on('click',function(){
				spc.trigger('owl.prev');
			});

			$('.sc_next').on('click',function(){
				spc.trigger('owl.next');
			});
		}

	})();

		function ellipsis(){
			var el = $('.ellipsis').hide();
				el.each(function(){
					var self = $(this);
					self.css({
						'width': self.parent().outerWidth(),
						'white-space' : 'nowrap'
					});
					self.show();
				});
			}
		ellipsis();
		$(window).on('resize',ellipsis);

		// contact form


	});



	$(window).load(function(){

		function randomSort(selector,items){

			var sel = selector,
				it = items,
				random = [],
				len = it.length;
			it.removeClass('random');
			if(selector === ".random"){
		  		for(var i = 0; i < len; i++){
		  			random.push(+(Math.random() * len).toFixed());
		  		}
		  		$.each(random,function(i,v){
		  			items.eq(Math.floor(Math.random() * v - 1)).addClass('random');
		  		});
		  	}

		}

		// isotope

		(function(){
			if($('.products_container').length){

				var container = $('.products_container');

				container.isotope({
				 	itemSelector : '.product_item',
					layoutMode : 'fitRows'
				});

				// filter items when filter link is clicked

				$('.isotope_menu').on('click','button',function(){
					var self = $(this),
					selector = self.attr('data-filter');
					randomSort.call(self,self.data('filter'),container.find('.product_item'));
				  	self.closest('li').addClass('active').siblings().removeClass('active');
				  	container.isotope({ filter: selector });
				});
			}

			// portfolio

			if($('.portfolio_isotope_container').length){

				var container = $('.portfolio_isotope_container');

				container.isotope({
					itemSelector : '.portfolio_item',
					layoutMode : 'fitRows'
				});

				$('#filter_portfolio').on('click','li',function(){
					var self = $(this),
					selector = self.data('filter');
				  	container.isotope({ filter: selector });
				});

			}

			if($('.portfolio_masonry_container').length){

				var container1 = $('.portfolio_masonry_container');

				container1.isotope({
					itemSelector : '.portfolio_item',
					layoutMode : 'masonry',
					masonry: {
					  columnWidth: 10,
					  gutter:0
					}
				});

				$('#filter_portfolio').on('click','li',function(){
					var self = $(this),
					selector = self.data('filter');
				  	container1.isotope({ filter: selector });
				});

			}

		})();

		// flexslider


		// simple slideshow

		(function(){

			var flx = $('.simple_slide_show');

			function showTitle(){
				var f = $(this),
					c = f.data('flexslider').currentSlide;

					f.find('.slides')
					.children('li')
					.eq(c+1)
					.children('.simple_s_caption')
					.addClass('active')
					.parent()
					.siblings()
					.children('.simple_s_caption')
					.removeClass('active');
			}
			if(flx.length){
				flx.each(function(){
					var curr = $(this);
					curr.flexslider({
						animation : "slide",
						animationSpeed : 1000,
						prevText: "<i class='fa fa-angle-left'></i>",
						nextText: "<i class='fa fa-angle-right'></i>",
						slideshow:true,
						controlNav:false,
						start:function(){
							showTitle.call(curr);
						},
						after:function(){
							showTitle.call(curr);
						}
					});
				});
			}

		})();

	});

})(jQuery);
