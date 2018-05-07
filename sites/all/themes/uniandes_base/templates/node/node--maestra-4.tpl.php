<div class="content-master-4">
	<section class="banner-interno">
		<article class="image-banner">
			<figure class="desktop-img">
				<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
				<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

				<?php } ?>
			</figure>

			<figure class="mobile-img">
				<?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
				<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

				<?php } ?>
			</figure>
		</article>

		<article class="text-banner">
			<h1> <?php print $node->title ?> </h1>
			<?php if (!empty($node->field_sub_titulo_maestra3)){ ?>
			<p> <?php print $node->field_sub_titulo_maestra3["und"][0]["value"] ?> </p>
			<?php } ?>
		</article>
	</section> <!-- banner-interno -->

	<section class="breadcrumb">
		<article class="container">
			<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
			<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
			<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
		</article>
	</section>


	<section class="box-list container">
	

	<p> <?php print $node->field_texto_corto_maestra4["und"][0]["value"] ?> </p>

	<?php

	$term=taxonomy_term_load($node->field_tipo_listado_m4["und"][0]["tid"]);
	if (strtolower($term->name)=="redes sociales") {
		$view = views_get_view('vista_directorio_redes_sociales_');
		$view->set_display("block");
        $view->pre_execute();
        $view->execute();
        print $view->render();
	}else{
		$array = array($node->field_tipo_listado_m4["und"][0]["tid"]);
		$view = views_get_view('vista_lista_departamentos');
		$view->set_display("block");
		$view->set_arguments($array);
		$view->pre_execute();
		$view->execute();
		print $view->render();
		
	}
						


		

	if( !$programa ){


	}else{

		if ( (!empty($node->field_tipo_listado_m4) && $node->field_tipo_listado_m4["und"][0]["tid"] == 181) || (!empty($node->field_tipo_listado_m4) && $node->field_tipo_listado_m4["und"][0]["tid"] == 182)) {
						print render($block['content']);
			?>

			<div class="view-header">
				<ul class="quicktabs-tabs quicktabs-type">
					<li class="active">
						<a id="quicktabs-tab-tab_type" class="type_one"></a>
					</li>
					<li>
						<a id="quicktabs-tab-tab_type" class="type_two"></a>
					</li>
				</ul>    
			</div>
			<?php 
			$view = views_get_view('vista_directorio_redes_sociales_');
			$view->set_display("block");
			$view->pre_execute();
			$view->execute();
			print $view->render();

		}
		else if ( $node->field_tipo_listado_m4["und"][0]["tid"] == 168){

			$block = module_invoke('quicktabs', 'block_view', 'tab_de_tipos_programas');
			print render($block['content']);

		}
		else{

			$array = array($node->field_tipo_listado_m4["und"][0]["tid"]);
			$view = views_get_view('vista_lista_departamentos');
			$view->set_display("block_1");
			$view->set_arguments($array);
			$view->pre_execute();
			$view->execute();
			print $view->render();

		}
	}
	?>
</section> <!-- box-list -->

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
</div>
