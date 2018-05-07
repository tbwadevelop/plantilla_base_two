jQuery( document ).ready( function(){
	jQuery("#edit-uniandes-custom-color-primario").spectrum({
		showInput: true,
		preferredFormat: "hex",
	    color: jQuery( "#edit-uniandes-custom-color-primario" ).val(),
	    change: function( color ){
	    	color_clean = color.toHexString();
	    	color_clean = color_clean.replace( "#", "" );
			console.log( color_clean );
	    	jQuery( "#edit-uniandes-custom-color-primario" ).val( color_clean );
	    }
	});
	jQuery("#edit-uniandes-custom-color-secundario").spectrum({
		showInput: true,
		preferredFormat: "hex",
	    color: jQuery( "#edit-uniandes-custom-color-secundario" ).val(),
	    change: function( color ){
	    	color_clean = color.toHexString();
	    	color_clean = color_clean.replace( "#", "" );
	    	jQuery( "#edit-uniandes-custom-color-secundario" ).val( color_clean );
	    }
	});
} )