/* Redes sociales - Interna de noticias*/

var w_screen = jQuery(window).width();
var socialContent;
var offset;
var h_menu;
var stopScroll;
var h_footer;
var h_new;
var h_box;

function redesFixed2(){
	socialContent = jQuery('.social-networks').parent().attr("class");
	offset = jQuery("."+socialContent).offset();
	h_menu = jQuery('.navbar-default').height() + jQuery('#menu-soy').height() + 20;
	stopScroll = offset.top + jQuery(".txt-principal-notice").height() - jQuery(".social-networks").height();
	
	if(jQuery(window).scrollTop() >= offset.top && jQuery(window).scrollTop() <= stopScroll){
		jQuery("."+socialContent).find('.social-networks').css({"position": "fixed","top":"0","left":"48%","margin-top": h_menu+"px"});
	} else{
		jQuery("."+socialContent).find('.social-networks').css({"position": "absolute","top":"inherit","margin-top": 0});
	}
}


function footer() {
	h_footer = jQuery(".item-footer.quick-links .item-footer-x2").height() + 100;
	jQuery(".item-footer").css({"height": h_footer+"px"});
}

function related_news() {
	h_new = jQuery(".list_related-news > .list-item_related-news").height();
	jQuery(".other-news").css({"height": h_new+"px"});
}

var hactualLi=0;
var totalArticle;
var hArticle=0;
function box_list() {
	totalArticle=jQuery(".item-listed-box");
	jQuery.each(totalArticle, function(i, val){
		hArticle = jQuery(val).height() + 100;
		if(hArticle>hactualLi){
			hactualLi=hArticle;
			console.log(hactualLi);
		}
	});
	jQuery(totalArticle).css("height", hactualLi+"px");
}


jQuery(document).ready(function(){

	/* Caja de listado */

	setTimeout(function(){
		box_list();
	},2000);

	/* Noticias relacionadas */
	setTimeout(function(){
		related_news();
	},100);

	/* Tabs - Color de base */

	jQuery(".categorie-tab_home-news .list-principal-tab li.active a").addClass("bg_base border_base");
	jQuery(".subcategorie-tab_home-news .list-subcategorie-tab li.active a").addClass("bg_base border_base");
	jQuery(".filter-buttons ul li.active").addClass("bg_base border_base");
	jQuery(".list-specials ul.quicktabs-tabs li.active").addClass("bg_base border_base");


	/* Tabs - Maestra 5 */

	setTimeout(function(){
		jQuery(".list-tabs .nav-tabs li.slick-current").addClass("bg_base border_base");
	},100);

	jQuery('.list-tabs .nav-tabs li').click(function(){
		jQuery('.list-tabs .nav-tabs li').removeClass('slick-current bg_base border_base');
		jQuery(this).addClass('slick-current bg_base border_base');
	});

	/* Tabs  Más recientes / Más vistas - Especiales */
	jQuery('.list-specials ul.quicktabs-tabs li').click(function(){
		jQuery('.list-specials ul.quicktabs-tabs li').removeClass('active bg_base border_base');
		jQuery(this).addClass('active bg_base border_base');
	});

	/* Home de noticias - Tabs  Más recientes / Más vistas */

	jQuery('.filter-buttons ul li').click(function(){
		jQuery('.filter-buttons ul li').removeClass('active bg_base border_base');
		jQuery(this).addClass('active bg_base border_base');

		if(jQuery(".filter-buttons ul li.active").hasClass('mas-recientes')){
			jQuery('.vista_noticias_mas_recientes').show();
			jQuery('.vista_noticias_mas_vistas').hide();
		} else{
			jQuery('.vista_noticias_mas_recientes').hide();
			jQuery('.vista_noticias_mas_vistas').show();
		}

	});


	/* Checkbox & Radio */

	jQuery(".form-type-radio label").append( jQuery( "<div class='control__indicator'></div>" ) );
	jQuery(".form-type-checkbox label").append( jQuery( "<div class='control__indicator'></div>" ) );


	/* Seleccionar Idioma 

	jQuery('.styled-select').click(function() {
		jQuery('.styled-select ul').toggle();
	});

	jQuery('.styled-select ul li').click(function() {
		location.href=jQuery(this).attr('data-url');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.idioma-select').html(jQuery(this).attr('data-leng'))
	});

	var valor="/"+Drupal.settings.swflang;
	if(valor=='/es') {
		jQuery('.idioma-select').html('Esp');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery('.styled-select ul li:first-child').addClass('active')
	}
	else {
		jQuery('.idioma-select').html('Eng');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery('.styled-select ul li:last-child').addClass('active')
	}
	*/


	/* Menú  - Iconos menú mobile */

	if(jQuery(window).width() <= 991){
		var li = jQuery(".nav.navbar-nav > li");
		jQuery.each(li, function(i, val){
			var thisUl = jQuery(val).find("> ul");
			if(thisUl.length == 0){
				jQuery(val).find("> span").hide();
				jQuery(val).find("> a").css("width", "100%");
			}

		})
	}else{
		setTimeout(function(){
			var this_li = jQuery(".nav.navbar-nav > li");
			jQuery.each(this_li, function(i, val){
				var this_ul = jQuery(val).find("ul > li > ul");			
				if(this_ul.length == 0){
					jQuery(val).find(">ul > li > span").hide();
				}
			})
		},1000);
	}


	/* Menú - Color base */

	if(jQuery(window).width() > 991) {
		jQuery(".navbar-default").addClass("bg_base border_base");
		jQuery("#navbar").addClass("bg_base border_base");
	}

	jQuery(".navbar-header .navbar-toggle").click(function() {
		var parent = jQuery(".navbar-header .navbar-toggle").parent().parent().parent(); 
		if(jQuery(parent).hasClass("open")){
			jQuery(parent).removeClass("open");
		}else{
			jQuery(parent).addClass("open");
		}
	});

	if(jQuery(window).width() > 991) {
		jQuery(function(){
			jQuery('.dropdown').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.dropdown > a').click(function(e){
			});
		});

		jQuery(function(){
			jQuery('.dropdown-submenu').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.dropdown-submenu > a').click(function(e){
			});
		});

		jQuery(function(){
			jQuery('.item-submenu').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.item-submenu > a').click(function(e){
			});
		});
	}

	jQuery('.navbar-nav .icon-mobile').click(function(e){
		if(jQuery(this).parent().find('ul').find('li').length){
			jQuery(this).parent().addClass('open-menu');
		}

		if (!jQuery(this).hasClass('ico-back')) {
			jQuery(this).addClass('ico-back');
		}
		else {
			var flag = 0;

			flag = 1;
			if (flag == 1) {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().removeClass('open-menu');
					jQuery(this).removeClass('ico-back');
					flag = 0;
				}
			}
			else {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().addClass('open-menu');
					jQuery(this).addClass('ico-back');
				}
			}
		}
	});


	jQuery('.multi-level .icon-mobile').click(function(e){
		if(jQuery(this).parent().parent().find('ul').find('li').length){
			jQuery(this).parent().parent().addClass('open-submenu');
		}

		if (!jQuery(this).parent().hasClass('ico-back')) {
			jQuery(this).parent().addClass('ico-back');
		}
		else {
			var flag = 0;

			flag = 1;
			if (flag == 1) {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().removeClass('open-submenu');
					jQuery(this).parent().removeClass('ico-back');
					flag = 0;
				}
			}
			else {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().addClass('open-submenu');
					jQuery(this).addClass('ico-back');
				}
			}
		}
	});


	/* Menú */
	// if(jQuery('.navbar-default').length){
	// 	var stickyOffset = jQuery('.navbar-default').offset().top;

	// 	jQuery(window).scroll(function(){
	// 		var sticky = jQuery('.navbar-default'),
	// 		scroll = jQuery(window).scrollTop();

	// 		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
	// 		else sticky.removeClass('navbar-fixed-top');
	// 	});

	// 	jQuery(window).scroll(function(){
	// 		var sticky = jQuery('.navbar-top'),
	// 		scroll = jQuery(window).scrollTop();

	// 		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
	// 		else sticky.removeClass('navbar-fixed-top');
	// 	});


	// 	jQuery(window).scroll(function(){
	// 		var sticky = jQuery('#menu-soy'),
	// 		scroll = jQuery(window).scrollTop();

	// 		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
	// 		else sticky.removeClass('navbar-fixed-top');
	// 	});

	// 	jQuery(window).scroll(function(){
	// 		var sticky = jQuery('#faculty-menu'),
	// 		scroll = jQuery(window).scrollTop();

	// 		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
	// 		else sticky.removeClass('navbar-fixed-top');
	// 	});		
	// }


	/* Submenú 2 nivel */

	jQuery.each(jQuery(".nav.navbar-nav > li > ul > li > ul"),function(i, val){
		if(jQuery(val).find("li").length == 0){
			jQuery(val).parent().find(".submenu").remove();
		}
	});

	/* Submenu 3 nivel */

	jQuery.each(jQuery(".nav.navbar-nav > li > ul > li > ul > li > ul"),function(i, val){
		if(jQuery(val).find("li").length == 0){
			jQuery(val).parent().find(".submenu_level").remove();
		}
	});


	/* Buscador */

	jQuery('#btn-seeker').click(function(e){
		e.preventDefault();
		jQuery('#btn-seeker').parent().toggleClass('_close');
		jQuery('.container-seeker').toggleClass('open-seeker');
	});



	/* Footer */

	jQuery(".item-footer.quick-links").height();


	/* Banner home*/

	jQuery('#block-views-slider-home').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 6000,
	});

	/* Publicaciones - Home */

	jQuery('.views_publications').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
				dots: true
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			}
		}
		]
	});


	/* Eventos - Home */

	if (jQuery('.views_events article').length > 3) {
		jQuery('.views_events').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					adaptiveHeight: true
				}
			}
			]
		});
	}


	/* Multimedia - Home */

	jQuery('.list-multimedia').slick({
		infinite: false,
		dots: false,
		arrows: true,
		vertical: true,
		slidesToShow: 3,
		speed: 2000,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: false,
				dots: true,
				speed: 300
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: false,
				dots: true,
				speed: 300,
				adaptiveHeight: true
			}
		}
		]
	});

	/* Noticias - Home */

	if (jQuery('.list_featured_news article').length > 3) {
		jQuery('.list_featured_news').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					adaptiveHeight: true
				}
			}
			]
		});
	}




	/* Anuncios - Home */

	jQuery('.views_notice').slick({
		dots: true
	});


	/* Interna de noticias */

	if(jQuery('.slide-for-detail article').length != 1) {
		jQuery('.slide-for-detail').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			arrows: true,
			fade: true,
			asNavFor: '.slide-nav-detail'
		});

		jQuery('.slide-nav-detail').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.slide-for-detail',
			dots: false,
			centerMode: false,
			focusOnSelect: true,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 6,
					infinite: false,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 5,
					infinite: false,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: false,
				}
			}
			]
		});
	}


	/* Listado Maestra 11 */

	jQuery('.view-vista-lista-maestra-11 .view-content').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 550,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			}
		}
		]
	});


	/* Tabs - Maestra 5 */

	jQuery('.list-tabs .tab-content').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.list-tabs .nav-tabs',
		responsive: [
		{
			breakpoint: 550,
			settings: {
				dots: true
			}
		}
		]
	});

	jQuery('.list-tabs .nav-tabs').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.list-tabs .tab-content',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		infinite: false,
		responsive: [
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: false
			}
		},
		{
			breakpoint: 550,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false
			}
		}
		]
	});


	/* Home de noticias */


	if(jQuery(window).width() < 991) {
		if (jQuery('.list-subcategorie-tab li').length > 1) {
			jQuery('.list-subcategorie-tab').slick({
				dots: false
			});
		}


		/* Multimedia Home de noticias*/

		jQuery('.list_multimedia').slick({
			dots: true,
			slidesToShow: 1,
			speed: 300,
			slidesToScroll: 1,
			adaptiveHeight: true
		});
	}


	/* Footer - Altura */

	if(w_screen > 991) {
		footer();
	}


	/* Redes sociales - Internas Noticias */

	if(w_screen > 767 && jQuery('.txt-notice').length !=0){
		redesFixed2();
	}
	jQuery(window).scroll(function(){
		if(w_screen > 767 && jQuery('.txt-notice').length !=0){
			redesFixed2();
		}
	});

});
