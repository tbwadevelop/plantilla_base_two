<?php
global $language;
global $base_path;
$lang_name = $language->language ;
if($lang_name=="es") {
	$buscar="Buscar...";
}else{
	$buscar="Search...";
}
?>
<section class="container-seeker">
	<form action="<?php echo $base_path ?>search/node/" id="buscadorMobile" method="get" class="container">
		<input id="parametro_mob" autocomplete="off" name="query" placeholder="<?php print $buscar?>" type="text">
		<input type="submit" id="btnBuscadorMobile" value="" />
	</form>
</section>
<script type="text/javascript">
	function htmlEntities(str) {
		return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
	}
	jQuery("#buscadorMobile").bind("submit", function(){
		var valor = htmlEntities(jQuery('#parametro_mob').val());
		jQuery( this ).attr( "action", jQuery( this ).attr( "action") + valor + "?query=" + valor );
	} );
</script>