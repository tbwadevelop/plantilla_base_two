<?php
global $base_url;
global $user;
global $language;


$user_fields = user_load($node->uid);
$descripcion_nodo=trim( drupal_html_to_text( $node->field_texto_competo_noticias["und"][0]["value"] ) );
$descripcion_limpio=str_replace('"', "'", $descripcion_nodo);

?>
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "NewsArticle",
		"author": "Universidad de los Andes",  
		"publisher": {
			"@type": "Organization",
			"name": "Universidad de los Andes",
			"logo": {
				"@type": "ImageObject",
				"url": "https://uniandes.edu.co/sites/default/files/logo-header_0.png"
			}
		},
		"name": "<?php echo $node->title ?>",
		"headline": "<?php echo $node->title ?>",
		<?php if( isset( $node->field_texto_competo_noticias[ "und" ] ) ){ ?>
			"description" : "<?php print $descripcion_limpio;  ?>",
			<?php } ?>

			"datePublished": "<?php print format_date($node->created ,'custom','Y-m-d') ?>"
			<?php if( isset( $node->field_imagenes_noticias[ "und" ] ) ){ ?>
				,"image": "<?php echo file_create_url( $node->field_imagenes_noticias[ "und" ][ 0 ][ "uri" ] ) ?>"
				<?php } ?>
			}
		</script>

		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/all.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<section class="miga-de-pan">
			<?php

			$term_parent = taxonomy_term_load( $node->field_subcategoria_noticias[ "und" ][ 0 ][ "tid" ] );
			$parent = taxonomy_term_load( $term_parent->field_categoria[ "und" ][ 0 ][ "tid" ] );

			?>

			<article class="breadcrumb">
				<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
				<?php if( $node->language == es ){ ?>
				<span class="inline odd first"><?php print l( "Noticias", "noticias" ) ?></span> <span class="delimiter">/</span>
				<?php }else{ ?>
				<span class="inline odd first"><?php print l( "News", "news" ) ?></span> <span class="delimiter">/</span>
				<?php } ?>
				<span class="inline odd first"><a href="<?php echo $base_url."/".$parent->field_path_noticias["und"][0]["value"] ?>"><?php echo $parent->name ?></a></span> <span class="delimiter">/</span>
				<span class="inline odd first"><a href="<?php echo $base_url."/".$term_parent->field_path_noticias["und"][0]["value"] ?>"><?php print $term_parent->name ?></a></span> <span class="delimiter">/</span>
				<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
			</article>
		</section>


		<section class="block-notice-content container">
			<header class="header-notice">
				<h1> <?php print $node->title ?> </h1>
			</header>

			<?php if (!empty($node->field_subcategoria_noticias)){ ?>
			<div class="tag_subcategorie noticia-subcategoria">
				<ul>
					<?php
					foreach ($node->field_subcategoria_noticias["und"] as $subcategoria_ind){
						$sub_cat = $subcategoria_ind["taxonomy_term"];
						$taxonomyTag=taxonomy_term_load($subcategoria_ind["tid"]);
						?>
						<li>
						<a href="<?php print url('taxonomy/term/'.$subcategoria_ind["tid"], array('absolute'=>true)); ?>">
							
							<?php print $sub_cat->name?>
						</a>
						
							

						</li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>

				<?php if (!empty($node->field_mostrar_autor_noticias) && $node->field_mostrar_autor_noticias["und"][0]["value"] == 1 ){ ?>

				<div class="author-news">
					<figure>
						<?php if (!empty($user_fields->picture)){ ?>
						<img src="<?php print file_create_url( $user_fields->picture->uri ) ?>" class='img-responsive'>
						<?php } ?>
					</figure>
					<header>
						<?php if (!empty($user_fields->name)){ ?>
						<p class="name_author"><?php print $user_fields->name?></p>
						<?php } ?>
						<?php if (!empty($user_fields->field_cargo)){ ?>
						<p class="position_author"><?php print $user_fields->field_cargo["und"][0]["value"]?></p>
						<?php } ?>
						<?php if (!empty($user_fields->mail)){ ?>
						<p class="mail_author"><?php print $user_fields->mail?></p>
						<?php } ?>
					</header>
				</div> <!-- author-news -->

				<?php }
				else {
					?>
					<?php if (!empty($node->field_tercero_noticias) && $node->field_tercero_noticias["und"][0]["value"] == 1 ){ ?>
					<div class="author-news">
						<figure>
							<?php if (!empty($node->field_imagen_tercero_noticias)){ ?>
							<img src="<?php print file_create_url( $node->field_imagen_tercero_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_tercero_noticias["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_tercero_noticias["und"][0]["title"] ?>" >
							<?php } ?>
						</figure>
						<header>
							<?php if (!empty($node->field_nombre_tercero_noticias)){ ?>
							<p class="name_author"><?php print $node->field_nombre_tercero_noticias["und"][0]["value"]?></p>
							<?php } ?>
							<?php if (!empty($node->field_cargo_tercero_noticias)){ ?>
							<p class="position_author"><?php print $node->field_cargo_tercero_noticias["und"][0]["value"]?></p>
							<?php } ?>
							<?php if (!empty($node->field_correo_elec_ter_noticias)){ ?>
							<p class="mail_author"><?php print $node->field_correo_elec_ter_noticias["und"][0]["value"]?></p>
							<?php } ?>
						</header>
					</div> <!-- author-news -->
					<?php } }?>




					<div class="slider-internal-detail">
						<section class="slide-for-detail">


							<?php 
							foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

								?>
								<article class="item-slide-for-detail">
									<div class="iframe-content">
										<?php

										$cadena = $video_individual["image_field_caption"]["value"];

										$fuente = 0;

										$iframe = '';

										$identificador = '';

										if (strpos($cadena, 'youtu') !== false) {
											$fuente = 1;
										}
										if (strpos($cadena, 'vimeo') !== false) {
											$fuente = 2;
										}
										if (strpos($cadena, 'ustream') !== false) {
											$fuente = 3;
										}

										if (strpos($cadena, 'facebook') !== false) {
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

											$iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '" allowfullscreen width="100%"></iframe>';
										}
										if ($fuente == 2){

											if (strpos($cadena,'player') !== false){
												$identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
											}
											else{
												$identificador = str_replace("https://vimeo.com/","",$cadena);
											}

											$iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
										}
										if ($fuente == 3){

											if (strpos($cadena,'channel') !== false){
												$identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);
											}
											else if (strpos($cadena,'recorded') !== false){
												$identificador = str_replace("http://www.ustream.tv/embed/recorded/","",$cadena);
											}

											$iframe = '<iframe width="100%" src="https://www.ustream.tv/embed/recorded/'.$identificador.'" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe><a href="https://www.ustream.tv/services" title="Video production powered by Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Video Production</a>';
										}

										if ($fuente == 4){
											$iframe = '<div class="fb-video" data-href="'.$cadena.'"  
											data-allowfullscreen="true" data-width="1024"></div>';
										}



										?>

										<?php

										print $iframe;
										?>
									</div>
								</article>

								<?php }?>



								<?php 
								foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

									?>

									<article class="item-slide-for-detail">
										<figure>


											<img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >
											<figcaption><?php print $imagen_grande["image_field_caption"]["value"]?></figcaption>
										</figure>

									</article>


									<?php 
								}
								?>

							</section>



							<?php 
							$cantidadImagenes=count($node->field_imagenes_noticias["und"]) + count($node->field_videos_noticias_v2["und"]);

							if ($cantidadImagenes>1) {


								?>
								<section class="slide-nav-detail">

									<?php 
									foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

										?>
										<article class="item-slide-nav-detail">
											<figure>


												<img src="<?php print file_create_url( $video_individual["uri"] ) ?>" alt="<?php print $video_individual["alt"] ?>" title="<?php print $video_individual["title"] ?>" >

											</figure>

										</article>
										<?php 
									}
									?>

									<?php 
									foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

										?>

										<article class="item-slide-nav-detail">
											<figure>


												<img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >

											</figure>

										</article>


										<?php 
									}
									?>
								</section>

								<?php 
							}
							?>
						</div> <!-- slider-internal-detail -->

						<div class="txt-notice">
							<section class="tags-notice">
								<ul>
									<?php
									if (!empty($node->field_tag_noticias)){
										foreach ($node->field_tag_noticias["und"] as $tag_individual){
											if (!empty($tag_individual["taxonomy_term"])){
												?>
												<li class="item-tag">
													<a href="<?php print url('taxonomy/term/'.$tag_individual["tid"], array('absolute'=>true)); ?>"> <?php print $tag_individual["taxonomy_term"]->name ?></a>
												</li>
												<?php }}} ?>
											</ul>
										</section> <!-- tags-notice -->

										<section class="date-notice">
											<?php
											$fecha_imp = "";
											if (!empty($node->field_fecha_creacion_noticias)) {
												$fecha_imp = $node->field_fecha_creacion_noticias["und"][0]["value"];
											}
											else{
												$fecha_imp = $node->created;
											}
											?>
											<span class="date-display-single" property="dc:date" datatype="xsd:dateTime" ><?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?></span>
										</section> <!-- date-notice -->


										<ul class="social-networks">
											<li id="btn_share_fb_not" class="facebook"><a href=""></a></li>
											<li id="btn_share_tw_not" class="twitter"><a href=""></a></li>
											<li id="btn_share_lk_not" class="linkedin"><a href=""></a></li>
										</ul>

										<section class="txt-principal-notice">
											<?php if (!empty($node->field_comentario_1_noticias)){ ?>
											<div class='noticia-texto-comentario'><?php print $node->field_comentario_1_noticias["und"][0]["value"]?></div>
											<?php } ?>
											<?php if (!empty($node->field_texto_competo_noticias)){ ?>
											<div class='noticia-texto-largo'><?php print $node->field_texto_competo_noticias["und"][0]["value"]?></div>
											<?php } ?>
											<?php if (!empty($node->field_comentario_2_noticias)){ ?>
											<div class='noticia-texto-comentario'><?php print $node->field_comentario_2_noticias["und"][0]["value"]?></div>
											<?php } ?>
											<?php if (!empty($node->field_texto_noticia_noticias)){ ?>
											<div class='noticia-texto-largo'><?php print $node->field_texto_noticia_noticias["und"][0]["value"]?></div>
											<?php } ?>
											<?php if (!empty($node->field_comentario_3_noticias)){ ?>
											<div class='noticia-texto-comentario'><?php print $node->field_comentario_3_noticias["und"][0]["value"]?></div>
											<?php } ?>
										</section> <!-- txt-principal-notice -->
									</div> <!-- txt-notice -->
								</section>

								<?php
								$cantidad=count ($node->field_subcategoria_noticias[ "und" ]);
								$random= rand(0,($cantidad-1));

								$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
								$view = views_get_view('vista_noticias_interna');
								$view->set_display("block");
								$view->set_arguments($term_id);
								$view->pre_execute();
								$view->execute();

								if ($node->field_activar_not_rel_noticias["und"][0]["value"] == 1 && !empty($view->result)){
									
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
                                            /* echo "<pre>";
                                             print_r($individual);
                                             echo "</pre>";*/
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
                             <?php
                         }
                         ?>

                         <section class="block-views-vista-anuncios internal-news">
                         	<div class="container">
                         		<?php

                         		if ($node->field_activar_anuncios_niciasot["und"][0]["value"] == 1){

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
