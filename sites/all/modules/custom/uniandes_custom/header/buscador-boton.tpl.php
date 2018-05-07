<?php
global $language;
$lang_name = $language->language ;
$color_2 = variable_get('uniandes_custom_color_secundario', "#484851");
?>
<div class="btn-seeker-content">
	<input id="btn-seeker" class="item-form-seeker" type="submit">
	<div class="ico-seeker">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ico-search" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
			<style type="text/css">
				.st0 {
					fill:none;
					stroke: <?php echo "#".$color_2 ?>;
					stroke-width:1.5806;
					stroke-linecap:round;
					stroke-linejoin:round;
					stroke-miterlimit:10;
				}
			</style>
			<g>
				<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.7315 11.4234)" class="st0" cx="11.4" cy="11.4" rx="10.1" ry="10.1"/>
				<line class="st0" x1="18.7" y1="18.7" x2="28.7" y2="28.7"/>
			</g>
		</svg>
		<!-- Icono close -->
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ico-close" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
			<style type="text/css">
				.st1{
					fill:none;
					stroke: #<?php echo $color_2 ?>;
					stroke-width:0.8956;
					stroke-miterlimit:10;
				}
			</style>
			<polyline class="st1" points="29,0.9 15,14.9 1,0.9 "/>
			<polyline class="st1" points="1,29.1 15,15.1 29,29.1 "/>
		</svg>
	</div> <!-- ico-seeker -->
</div> <!-- btn-seeker-content -->