<section class="breadcrumb">
  <article class="container">
    <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>

    <span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
    <?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
  </article>
</section>
<div class="content-master-1">
	<section class="principal-image container">
		<?php if (!empty($node->field_imagen_maestra_1) && !empty($node->field_imagen_mobile_maestra1)) { ?>

		<article class="image-content">
			<figure class="desktop-img">
				<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_maestra_1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_maestra_1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>" >
			</figure>

			<figure class="mobile-img">
				<img src="<?php print file_create_url( $node->field_imagen_mobile_maestra1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_maestra1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_maestra1["und"][0]["title"] ?>" >
			</figure>
			<figcaption><?php print $node->field_imagen_maestra_1["und"][0]["image_field_caption"]["value"]; ?></figcaption>
			<?php } ?>
		</article>
	</section> <!-- principal-image -->


	<section class="description-content container">
		<h1 id="title"><?php print $node->title ?></h1>

		<div class="paragraph-item">
			<p id="description">  <?php print $node->field_descripcion1_maestra_1["und"][0]["value"] ?> </p>
		</div>
		<div class="paragraph-item">
			<p> <?php print $node->field_descripcion_2_maestra_1["und"][0]["value"] ?> </p>
		</div>
	</section> <!-- description-content -->

<?php
			if ($node->field_activar_anuncios_niciasot["und"][0]["value"] == 0){
				?>
	<section class="block-views-vista-anuncios internal-news">
		<div class="container">
			<?php
				$view = views_get_view('vista_anuncios_home');
				print $view->render('block');			
			?>
		</div>
	</section> <!-- block-views-vista-anuncios-home-block -->
	<?php 
		}


	$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
	$view = views_get_view('vista_noticias_interna');
	$view->set_display("block");
	$view->set_arguments($term_id);
	$view->pre_execute();
	$view->execute();
	$item_multimedia = $view->result;


	?>

	<section class="view-related-news">
		<div class="container">
			<header class="title_related-news">
				<h2><?php echo t( "Related news" ) ?></h2>
			</header>

			<section class="list_related-news">
				<?php
				foreach ($view->result as $item){
					$noticia = $item->_field_data["nid"]["entity"];
					?>
					<?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
						if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
							?>
							<section class='noticia-reciente solo-texto'>
								<?php }
								else { ?>

								<article class='list-item_related-news'>

									<?php }}?>
									<?php if (!empty($noticia->field_imagen_miniatura_noticias)){ ?>
									<figure class="img-related-news">
										<a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>">
											<img src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
										</a>
									</figure>
									<?php } ?>

									<div class="txt-related-news">
										<p class="date_related-news">                     
											<?php
											$fecha_imp = "";
											if (!empty($noticia->field_fecha_creacion_noticias)) {
												$fecha_imp = $noticia->field_fecha_creacion_noticias["und"][0]["value"];
											}
											else{
												$fecha_imp = $noticia->created;
											}

											?>
											<?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?>
										</p>
										<h1 class="title-related-news">
											<a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>"> <?php print $noticia->title ?> </a>
										</h1>

										<p class="txt_related-news"> <?php /*print drupal_substr($noticia->field_sub_titulo_noticias["und"][0]["value"],0,150)*/ ?>
											<?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
												if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
													?>
													<?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
													<?php }
													else { ?>
													<?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
													<?php }}?>
												</p>


												<?php if (!empty($noticia->field_boton_noticia)){ ?>
												<a href= <?php print $noticia->field_boton_noticia["und"][0]["url"] ?> class='btn-default btn-border-grey view-related-news'> <?php print $noticia->field_boton_noticia["und"][0]["title"] ?> </a>
												<?php }
												else {?>
												<a href= "<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" class='btn-default btn-border-grey view_related-news'> <?php print "Ver más" ?> </a>
												<?php } ?>
											</div> <!-- txt-related-news -->
										</article> <!-- list-item_related-news -->
										<?php } ?>

										<article class='list-item_related-news other-news'>
											<h1 class="title-related-news">
												Otras noticias
											</h1>

											<ul>
												<?php

												$my_view_name = 'vista_noticias_interna';
												$my_display_name = 'block_1';

												$my_view = views_get_view($my_view_name);
												if ( is_object($my_view) ) {

													$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
													$view = views_get_view('vista_noticias_interna');
													$view->set_display("block_1");
													$view->set_arguments($term_id);
													$view->pre_execute();
													$view->execute();
													$item_multimedia = $view->result;

													foreach ($item_multimedia as $individual){
														?>

														<li><a href="<?php print url( 'node/' . $individual->nid, array('absolute'=>true)); ?>"><?php print $individual->node_title ?></a></li>
														<?php }} ?>
													</ul>
												</article> <!-- list-item_related-news other-news -->
											</div>
											<?php 
											global $language;
											if ($language->language=="es") {
												$url_idioma="noticias";
											}else{
												$url_idioma="en/news";
											}
											?>
											<div class="btn-block line_base">
												<a href="<?php print base_path().$url_idioma ?>" class="btn-default btn-border-grey btn-featured_news"><?php print t("View all news"); ?></a>
											</div>
										</section> <!-- list_related-news -->
									</section> <!-- view-related-news -->

									<section class="share-social_network container">
										<p><?php print t("Share"); ?></p>
										<ul class="social_network">
											<li class="item-share-social-network">
												<figure>
													<a href="">
														<img id="btn_share_fb" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png" />
													</a>
												</figure>
											</li>
											<li class="item-share-social-network">
												<figure>
													<a href="">
														<img  id="btn_share_tw" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png" />
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
















