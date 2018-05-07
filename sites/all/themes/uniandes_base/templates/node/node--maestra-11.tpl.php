<div class="content-master-11">
	<div class="container">
		<section class="principal-image">
			<?php if (!empty($node->field_imagen_desk_banner_m11) && !empty($node->field_imagen_mob_banner_m11)) { ?>

			<article class="image-content">
				<figure class="desktop-img">
					<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_desk_banner_m11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_desk_banner_m11["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m11["und"][0]["title"] ?>" >
				</figure>

				<figure class="mobile-img">
					<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mob_banner_m11["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m11["und"][0]["title"] ?>" >
				</figure>
				<figcaption><p><?php print $node->field_pie_de_multimedia_m11["und"][0]["value"] ?></p></figcaption>
				<?php } ?>
			</article>
		</section> <!-- principal-image -->


		<section class="description-content">
			<header class="title-content">
				<h1><?php print $node->title ?></h1>
			</header>

			<article class="item-paragraph">
				<p><?php print $node->field_texto_principal_1_m11["und"][0]["value"] ?> </p>
			</article>

			<article class="item-paragraph">
				<p> <?php print $node->field_texto_principal_2_m11["und"][0]["value"] ?> </p>
			</article>
		</section> <!-- description-content -->


		<section class="list-master-11">
			<header class="title_list-master-11">
				<h2><?php print $node->field_titulo_bloque_inferior_m11["und"][0]["value"] ?></h2>
			</header>

			<?php
			$array = array($node->field_tipo_m11["und"][0]["tid"]);
			$view = views_get_view('vista_lista_maestra_11');
			$view->set_display("block");
			$view->set_arguments($array);
			$view->pre_execute();
			$view->execute();
			print $view->render();
			?>
		</section> <!-- list-master-11 -->
	</div> <!-- container -->

	<section class="block-views-vista-anuncios internal-news">
		<div class="container">
			<?php
			if ($node->field_activar_anuncios_m11["und"][0]["value"] == 0){
				$view = views_get_view('vista_anuncios_home');
				print $view->render('block');
			}
			?>
		</div>
	</section> <!-- block-views-vista-anuncios-home-block -->

	<section class="share-social_network container">
		<p><?php print t("Share"); ?></p>
		<ul class="social_network">
			<li class="item-share-social-network">
				<figure>
					<a href="">
						<img id="btn_share_tw" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png" />
					</a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href="">
						<img  id="btn_share_fb" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png" />
					</a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href="">
						<img  id="btn_share_lk" alt="Logo Linkedin" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-linkedin.png" />
					</a>
				</figure>
			</li>
		</ul>
	</section> <!-- share-social_network -->	
</div>