<?php

$resultados = $view->result;
foreach ($resultados as $resultado){
	$caja = $resultado->_field_data["nid"]["entity"];
	$url=$caja->field_url_caja_list1["und"][0];
	$target=$caja->field_url_caja_list1["und"][0]["attributes"]["target"];
	$link=$caja->field_url_caja_list1["und"][0]["url"];
	$title_url=$caja->field_url_caja_list1["und"][0]["title"];
	

	?>
	<article class="item-listed-box" style="background-image: url(<?php print file_create_url( $caja->field_img_background_caja_list1["und"][0]["uri"] ) ?>);">
		<div class="link-listed-box" href="<?php print $link ?>">
			<header>
				<h2><a href=""><?php print $caja->title ?></a></h2>
			</header>

			<div class="description-listed-box">
				<p class="short-description"><?php print $caja->field_descrip_corta_caja_list1["und"][0]["value"]?></p>
				<p class="large-description"><?php print $caja->field_descrip_larga_caja_list1["und"][0]["value"]?></p>
			</div>
		</div>
		
		<a target="<?php print $target ?>" class="btn-default btn-border-grey btn-listed-box" href="<?php print $link ?>"><?php print $title_url ?></a>
	</article>
	<?php 
}
?>

