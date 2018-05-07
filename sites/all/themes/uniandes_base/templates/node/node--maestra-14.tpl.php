<?php
/*echo "<pre>";
	print_r($node);
	echo "<pre>";*/
	?>

	<section class="breadcrumb">
		<article class="container">
			<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
			<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
			<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
		</article>
	</section>

	<div class="content-master-14">
		<section class="principal-image container">
			<article class="image-content">
				<figure class="desktop-img">
					<img src="<?php print file_create_url( $node->field_imagen_desk_banner_m14["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_desk_banner_m14["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m14["und"][0]["title"] ?>" >
				</figure>

				<figure class="mobile-img">
					<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m14["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mob_banner_m14["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m14["und"][0]["title"] ?>" >
				</figure>
			</article>
		</section> <!-- principal-image -->

		<section class="txt-content container">
			<header class="title_master-14">
				<h1><?php print $node->title ?></h1>
				<h2><?php if (!empty($node->field_sub_titulo_m14)){ ?></h2>
			</header>

			<article class="list-paragraph">
				<div class="item-paragraph">
					<p><?php print $node->field_sub_titulo_m14["und"][0]["value"] ?></p>
					<?php } ?>
				</div>
			</article>
		</section> <!-- txt-content -->

		<section class="share-social_network container">
			<p><?php print t("Share"); ?></p>
			<ul class="social_network">
				<li class="item-share-social-network">
					<figure>
						<a href=""><img id="btn_share_lk" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png"/></a>
					</figure>
				</li>
				<li class="item-share-social-network">
					<figure>
						<a href=""><img  id="btn_share_fb" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png"/></a>
					</figure>
				</li>
				<li class="item-share-social-network">
					<figure>
						<a href=""><img  id="btn_share_tw" alt="Logo Linkedin" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-linkedin.png"/></a>
					</figure>
				</li>
			</ul>
		</section> <!-- share-social_network -->
	</div> <!-- content-master-14 -->
