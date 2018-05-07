<?php
global $language;

?>

<div class="content-master-7">
	<section class="banner-interno">
		<article class="image-banner">
			<figure class="desktop-img">
				<?php if (!empty($node->field_imagen_desk_banner_m7)){ ?>
				<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_desk_banner_m7["und"][0]["uri"] ) ?>" alt="<?php print $node->field_imagen_desk_banner_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m7["und"][0]["title"] ?>" >
				<?php } ?>
			</figure>

			<figure class="mobile-img">
				<?php if (!empty($node->field_imagen_mob_banner_m7)){ ?>
				<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m7["und"][0]["uri"] ) ?>" alt="<?php print $node->field_imagen_mob_banner_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m7["und"][0]["title"] ?>" >
				<?php } ?>
			</figure>
		</article>

		<article class="text-banner">
			<h1 id="title"> <?php print $node->title ?> </h1>
			<?php if (!empty($node->field_sub_titulo_m7)){ ?>
			<div class="linea-division"></div>
			<p id="description"> <?php print $node->field_sub_titulo_m7["und"][0]["value"] ?> </p>
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
	<section class="description-content container">
		<article class="mutimedia-content item-x2">
			<figure>
				<?php if (!empty($node->field_imagen_principal_m7)){ ?>
				<img src="<?php print file_create_url( $node->field_imagen_principal_m7["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_principal_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_principal_m7["und"][0]["title"] ?>" >
				<?php }
				else {
					if (!empty($node->field_video_principal_m7)){

						$cadena = $node->field_video_principal_m7["und"][0]["value"];

						$fuente = 0;

						$iframe = '';

						$identificador = '';

						if (strpos($cadena, 'youtu') !== false) {
							$fuente = 1;
						}
						else if (strpos($cadena, 'vimeo') !== false) {
							$fuente = 2;
						}
						else if (strpos($cadena, 'ustream') !== false) {
							$fuente = 3;
						} 
						else if( strstr( $cadena, "maps" ) ){
							print $cadena;
						}
						else {
							$fuente = 4;
						}


						if ($fuente == 1){

							if (strpos($cadena,'youtu.be') !== false){
								$identificador = str_replace("https://youtu.be/","",$cadena);
							}
							if (strpos($cadena,'watch') !== false){
								$identificador = str_replace("https://www.youtube.com/watch?v=","",$cadena);
							}
							if (strpos($cadena,'embed') !== false){
								$identificador = str_replace("https://www.youtube.com/embed/","",$cadena);
							}

							$iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '"></iframe>';
						}
						if ($fuente == 2){

							if (strpos($cadena,'player') !== false){
								$identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
							}
							else{
								$identificador = str_replace("https://vimeo.com/","",$cadena);
							}

							$iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						}
						if ($fuente == 3){

							$identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);

							$iframe = '<iframe width="480" height="270" src="http://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
						}
						if ($fuente == 4){
							$iframe = $cadena;
						}

						print $iframe;
					}
				}
				?>
				<figcaption>
					<?php
					if (!empty($node->field_texto_pie_mult_m7)){
						print $node->field_texto_pie_mult_m7["und"][0]["value"];
					}
					?>
				</figcaption>
			</figure>
		</article>



		<article class="txt-content item-x2">
			<?php if (!empty($node->field_texto_principal_m7)){ ?>
			<p> <?php print $node->field_texto_principal_m7["und"][0]["value"]  ?> </p>
			<?php } ?>
		</article>
	</section> <!-- description-content -->


	<section class="top-tags">
		<div class="container">
			<?php
			$iconos=array();
			$botones = array();
			if (!empty($node->field_enlaces_internos_m7)){
				foreach ($node->field_enlaces_internos_m7["und"] as $item){
					if (count($botones) <= 14){
						array_push($iconos,1);
						array_push($botones,$item);
					}
				}
			}
			if (!empty($node->field_enlaces_externos_m7)){
				foreach ($node->field_enlaces_externos_m7["und"] as $item){
					if (count($botones) <= 14){
						array_push($iconos,2);
						array_push($botones,$item);
					}
				}
			}
			if (!empty($node->field_enlaces_descarga_m7)){
				foreach ($node->field_enlaces_descarga_m7["und"] as $item){
					if (count($botones) <= 14){
						array_push($iconos,3);
						array_push($botones,$item);
					}
				}
			}
			?>
			<?php if (!empty($botones)) { ?>
			<ul class='list-top-tag'>
				<?php
				for ($i = 0; $i < count($botones); $i++){
					$enlace = $botones[$i];
					$numero = $iconos[$i];

					if ($numero == 1){
						?>
						<li class="item-top-tag"><span><img src=""></span><a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href=" <?php print $enlace["url"] ?> "> <?php print $enlace["title"] ?> </a></li>
						<?php }
						if ($numero == 2){
							?>
							<li class="item-top-tag link-externo">
								<figure><img src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/icon-flecha.png"></figure>
								<a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href=" <?php print $enlace["url"] ?> "> <?php print $enlace["title"] ?> </a></li>
								<?php }
								if ($numero == 3) {
									if($language->language=="en"){
										$url_limpia=str_replace("/en/", "",$enlace['url']);
									} else{
										$url_limpia=str_replace("/es/", "",$enlace['url']);
									}
									?>
									<li class="item-top-tag link-descarga">
										<figure><img src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/icon-descargar.png"></figure>
										<a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href=" <?php print $enlace["url"] ?> "> <?php print $enlace["title"] ?> </a></li>
										<?php }?>
										<?php }?>

									</ul>
									<?php } ?>
								</div>
							</section>  <!-- top-tags -->

							<?php if (!empty($node->field_activar_noticias_m7) && $node->field_activar_noticias_m7["und"][0]["value"] == 1) { ?>

							<?php 
							

							$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
							$view = views_get_view('vista_noticias_interna');
							$view->set_display("block");
							$view->set_arguments($term_id);
							$view->pre_execute();
							$view->execute();
							$item_multimedia = $view->result;


							?>

							<section class="view-related-news container">
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
															<a href= "<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" class='btn-default btn-border-grey view-related-news'> <?php print "Ver más" ?> </a>
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


															<div class="btn-block line_base">
																<a href="<?php print $url_idioma ?>" class="btn-default btn-border-grey btn-featured_news"><?php print t("View all news"); ?></a>
															</div>

														</section> <!-- list_related-news -->
													</section> <!-- view-related-news -->

							<?php } ?>

							<section class="share-social_network container">
								<p><?php print t("Share"); ?></p>
								<ul class="social_network">
									<li class="item-share-social-network">
										<figure>
											<a href="">
												<img id="btn_share_lk" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png" />
											</a>
										</figure>
									</li>
									<li class="item-share-social-network">
										<figure>
											<a href="">
												<img  id="btn_share_fb" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png" />
											</a>
										</figure>
									</li>
									<li class="item-share-social-network">
										<figure>
											<a href="">
												<img  id="btn_share_tw" alt="Logo Linkedin" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-linkedin.png" />
											</a>
										</figure>
									</li>
								</ul>
							</section> <!-- share-social_network -->
						</div>
















