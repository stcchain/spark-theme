(function ($) {
	"use strict";

var docWidth = document.documentElement.offsetWidth;

[].forEach.call(
  document.querySelectorAll('*'),
  function(el) {
    if (el.offsetWidth > docWidth) {
      console.log(el);
    }
  }
);

	// Initializing WOW JS
	new WOW().init();

	// MailChimp Subscribing
	$('#mc-embedded-subscribe').on('click', function() {
		if( $('#mce-EMAIL').hasClass('mce_inline_error') ) {
			$('.mce_inline_error').parent('.inputWrep').addClass('form-error');			
		} else if( $('#mce-EMAIL').hasClass('valid') ) {
			$('.mce_inline_error').parent('.inputWrep').removeClass('form-error');	
		}
	});

	$('header nav#navbar ul > li.menu-item-has-children > a').on('click', function(e) {
		e.preventDefault();
	});



	// Initializing nice select on shop pages
	$('.spark-shop > form select').niceSelect();
	$('.header_bar_sidebar select').niceSelect();

	// Mega Menu
	$('.mega-menu  ul').removeClass('sub-menu');
	$('.mega-menu > ul').addClass('mega-menu-inner');
	var mmiHeight = $('.mega-menu-inner').height();

	var winWidth = $(window).width();


	$('.spark-btn').on({

		mouseenter: function () {
			// Init variables 
			var $this = $(this);
			var btnHoverBGColor = $this.data('spark-btn-bg-hover-color');
			var btnHoverColor = $this.data('spark-btn-hover-color');

			$this.css("color", btnHoverColor);
			$this.css("background-color", btnHoverBGColor);

		},
		mouseleave: function() {
			// Init variables 

			var $this = $(this);

			var btnBGColor = $this.data('spark-btn-bg-color');
			var btnColor = $this.data('spark-btn-color');
			
			$this.css("color", btnColor);
			$this.css("background-color", btnBGColor);

		}
	});



	var langIcon = $('header .langIcon'),
		lang = $('header .lang');

	langIcon.on('click', function(){
		lang.toggleClass('clicked');
	});
	$('header .lang li').on('click', function(){
		lang.removeClass('clicked');
	});
	$('header .lang').on('mouseleave', function(){
		lang.removeClass('clicked');
	});

	var loginBtn = $('header .clientAreaLi, .clientLogin .closeBtn'),
		clientForm = $('header .clientLogin form');

	loginBtn.on('click', function(){
		clientForm.toggleClass('clicked');
		window.getSelection().removeAllRanges();
	});

	var domainFormH = $('.domainForm').height(),
		domainTxt =  $('.domainTxt'),
		domainTxtH = domainTxt.height(),
		domainTxtP =  (domainFormH - domainTxtH)/2;
		domainTxt.css('padding-top', domainTxtP + 'px');

	$(window).load(function(){
		var ctaImgOne = $('.ctaImgOne'),
			ctaImgOneH = ctaImgOne.height(),
			ctaRight = $('.ctaRight');
		ctaRight.height(ctaImgOneH);

		var ctaImgTwo = $('.ctaImgTwo'),
			ctaImgTwoH = ctaImgTwo.height(),
			ctaLeft = $('.ctaLeft');
			ctaLeft.height(ctaImgTwoH);
	});

	var langOpt = $('.lang li'),
		langTxt = $('.langIcon .langCode');
	langOpt.on('click', function(){
		var langCode = $(this).attr('data-code');
		langTxt.text(langCode);
	});


	var subMenu = $('nav .sub-menu');

	if($(subMenu.length)){
		subMenu.closest('li').addClass('subPar');
	}

	var megaMenu = $('nav .mega-menu');

	if($(megaMenu.length)){
		megaMenu.closest('li').addClass('subPar');
	}

	$('.subPar a').each(function(){
		$(this).on('click', function(){
			$(this).parent('.subPar').toggleClass('active');
		})
	});

	$("a[href='#']").on('click', function($) {
	  $.preventDefault();
	});


	$('.singleDomain a.cartBtn').on('click', function(){
		$(this).parent('.singleDomainRight').parent('li.singleDomain').toggleClass('active');
		$(this).toggleClass('added');
	});
	$('.btnCart.Btn').on('click', function(){
		$(this).toggleClass('added');
	});

	var windowWidth = $(window).width();


	if(windowWidth > 767){
		var cursorWidthxx = "14px";
	}else{
		var cursorWidthxx = "10";
	}
	
	$('.duration span').on('click', function(){
		$(this).siblings('ul').toggleClass('active');
		$(this).siblings('ul').mouseleave(function(){
			$(this).removeClass('active');
		});
	});
	$('ul.cartOpt li').on('click',function(){
		$(this).parent('ul').removeClass('active');
		var cartCode = $(this).attr('data-code');
		var cartPrice = $(this).attr('data-price');
		$(this).parent('ul').siblings('span').text(cartCode);
		$(this).parent('ul').parent('.duration').siblings('.total').text(cartPrice);
	});
	$('span.closeIcon').on('click',function(){
		$(this).parent('.product').parent('li').remove();
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
    });

//	accrodion

	var dd = $('dd');
	dd.filter(':nth-child(n+4)').hide();
	$('dl.accordion').on('click', 'dt', function(){
		$(this)
		.addClass('active')
		.siblings('dt')
		.removeClass('active');

		$(this)
			.next()
			.slideDown(200)
			.siblings('dd')
			.slideUp(300);

	});

		if($.fn.waypoint){
			$('.animated').css('opacity','0');
			$('.animated').waypoint(function () {
				$(this).addClass('fadeInUp');
				$('.animated.fadeInUp').css({
					opacity: 1
				});
			}, {
				offset: '90%'
			});
		}
	$(window).load(function(){
	if($.fn.owlCarousel){
		$('.tstSlider').owlCarousel({
			items: 2,
			loop: true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			nav:true,
			dots: false,
			smartSpeed: 600,
			autoplayTimeout: 7000,
			responsive: {
				0: {
					items:1
				},
				991: {
					items:2
				}
			}
		});
		
		var homeSlider1 = $('.homeSlider1');
		homeSlider1.owlCarousel({
			items: 1,
            autoplay: true,
			loop: true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			nav:true,
			dots: false,
			smartSpeed: 50,
			responsive: {
				0: {
					smartSpeed: 500
				},
				992: {
					smartSpeed: 50
				}
			}
		});
		
		if(windowWidth > 991){
			homeSlider1.on('translate.owl.carousel', function () {
				homeSlider1.find('.owl-item .homeImgTable').removeClass('fadeInLeft animated').fadeOut(0);
				homeSlider1.find('.owl-item .homeContent > *').removeClass('fadeInRight animated').css('opacity', '0');
			});
			homeSlider1.on('translated.owl.carousel', function () {
				homeSlider1.find('.owl-item.active .homeImgTable').addClass('fadeInLeft animated').fadeIn(0);
				homeSlider1.find('.owl-item.active  .homeContent > *').addClass('fadeInRight animated').css('opacity','1');
			});
		}
		
		
		if(windowWidth > 1199){
			var arrowPos = (windowWidth - 1140) / 2;
		}else if(windowWidth > 991 && windowWidth < 1200){
			var arrowPos = (windowWidth - 940) / 2;
		}else if(windowWidth > 767 && windowWidth < 992){
			var arrowPos = (windowWidth - 720) / 2;
		}else{
			$('.homeSlider1 .owl-nav div').remove();
		}
		
		$('.homeSlider1 .owl-nav div.owl-next i').css('right', '-' + arrowPos + 'px');
		$('.homeSlider1 .owl-nav div.owl-prev i').css('left', '-' + arrowPos + 'px');
		
	}



	});
	
	$(document).ready(function(){
		$('.preloader').fadeOut('slow', function(){
			$(this).remove();
		});


		//function for resize spacer
		function init_spark_spacer()
		{
			var css = '';
			$('.spark-spacer').each(function(i,spacer){
				var uid = $(spacer).data('id');
				var body_width = $("body").width();
				var height_on_mob = $(spacer).data('height-mobile');
				var height_on_mob_landscape = $(spacer).data('height-mobile-landscape');
				var height_on_tabs = $(spacer).data('height-tab');
				var height_on_tabs_portrait = $(spacer).data('height-tab-portrait');
				var height = $(spacer).data('height');

				if(height != '')
				{
					css += ' .spacer-'+uid+' { height:'+height+'px } ';
				}
				if(height_on_tabs != '' || height_on_tabs == '0' || height_on_tabs == 0)
				{
					css += ' @media (max-width: 1199px) { .spacer-'+uid+' { height:'+height_on_tabs+'px } } ';
				}
				if(typeof height_on_tabs_portrait != 'undefined' && (height_on_tabs_portrait != '' || height_on_tabs_portrait == '0' || height_on_tabs_portrait == 0))
				{
					css += ' @media (max-width: 991px) { .spacer-'+uid+' { height:'+height_on_tabs_portrait+'px } } ';
				}
				if(typeof height_on_mob_landscape != 'undefined' && (height_on_mob_landscape != '' || height_on_mob_landscape == '0' || height_on_mob_landscape == 0))
				{
					css += ' @media (max-width: 767px) { .spacer-'+uid+' { height:'+height_on_mob_landscape+'px } } ';
				}
				if(height_on_mob != '' || height_on_mob == '0' || height_on_mob == 0)
				{
					css += ' @media (max-width: 479px) { .spacer-'+uid+' { height:'+height_on_mob+'px } } ';
				}
			});
			if(css != '')
			{
				css = '<style>'+css+'</style>';
				$('head').append(css);
			}
		}
		init_spark_spacer();


		$('.spark_tst_slider2').owlCarousel({
			items: 1,
			loop: true,
			nav:false,
			dots: true,
			smartSpeed: 600,
			autoplay: true,
			autoplayTimeout: 3000,
			responsive: {
				0: {
					items:1
				},
				991: {
					items:1
				}
			}
		});


		$('.spark_slider2').owlCarousel({
			items: 1,
			center: false,
			loop: true,
			margin:50,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			smartSpeed: 600,
			autoplay: true,
			autoplayTimeout: 5000,
			responsive: {
				0: {
					items:1
				},
				991: {
					items:1
				}
			}
		});


	});
	
})(jQuery);
