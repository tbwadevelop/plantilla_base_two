jQuery( document ).ready( function(){

	jQuery( "#btn_share_fb" ).click(function(e) {
			//alert( "Facebook." );
			e.preventDefault();
			var img = jQuery('#img_desktop').attr('src');
			//alert(img);
			FB.ui(
				{
					method: 'feed',
					name: jQuery( "#title" ).text(),
					link: document.URL,
					picture: img,
					caption: jQuery( "#caption" ).text(),
					description: jQuery( "#description" ).text(),
					message: ""
				});

		});
		jQuery( "#btn_share_tw" ).click(function(e) {
			//alert( "twitter." );
			e.preventDefault();
			window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
			//alert(url)
		});
		jQuery( "#btn_share_lk" ).click(function(e) {
			//alert( "linkedin." );
			e.preventDefault();
			window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
		});

		jQuery( "#btn_share_fb_not" ).click(function(e) {
			//alert( "Facebook." );
			e.preventDefault();
			FB.ui(
				{
					method: 'feed',
					name: jQuery( "#title" ).text(),
					link: document.URL,
					picture: jQuery( "#img_desktop" ).attr( "src" ),
					caption: jQuery( "#caption" ).text(),
					description: jQuery( "#description" ).text(),
					message: ""
				});

		});
		jQuery( "#btn_share_tw_not" ).click(function(e) {
			//alert( "twitter." );
			e.preventDefault();
			window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
			//alert(url)
		});
		jQuery( "#btn_share_lk_not" ).click(function(e) {
			//alert( "linkedin." );
			e.preventDefault();
			window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
		});

} )