<section class="listed-box">
	<?php
	$resultados = $view->result;
	foreach ($resultados as $resultado){
		$caja = $resultado->_field_data["nid"]["entity"];
		?>
		<article class="item-listed-box type-two" style="background-image: url(<?php print file_create_url( $caja->field_img_background_caja_list2["und"][0]["uri"] ) ?>);">
			<header>
				<h2><a href=""><?php print $caja->title ?></a></h2>
			</header>

			<div class="networks-listed-box">
				<ul>

					<?php if(!empty($caja->field_url_facebook_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_facebook_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-facebook.png" alt="">
						</a>
					</li>
					<?php }?>

					<?php if(!empty($caja->field_url_twitter_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_twitter_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-twitter.png" alt="">
						</a>
					</li>
					<?php }?>

					<?php if(!empty($caja->field_url_linkedin_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_linkedin_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-linkedin.png" alt="">
						</a>
					</li>
					<?php }?>
					<?php if(!empty($caja->field_url_instagram_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_instagram_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-instagram.png" alt="">
						</a>
					</li>
					<?php }?>
					<?php if(!empty($caja->field_url_snapchat_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_snapchat_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-snapchat.png" alt="">
						</a>
					</li>
					<?php }?>
					<?php if(!empty($caja->field_url_vimeo_cala_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_vimeo_cala_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-vimeo.png" alt="">
						</a>
					</li>
					<?php }?>
					<?php if(!empty($caja->field_url_youtube_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_youtube_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-youtube.png" alt="">
						</a>
					</li>
					<?php }?>
					<?php if(!empty($caja->field_url_googleplus_caja_list2['und'][0])){?>
					<li>
						<a href="<?php print $caja->field_url_googleplus_caja_list2['und'][0]['value']?>" target="_blank">
							<img src="/sites/all/themes/uniandes_base/img/footer-google.png" alt="">
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
		</article>

		<?php 
	}
	?>
</section>