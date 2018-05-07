
<section class="internal-banner">
	<article>
		<figure>
			<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
			<img  id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

			<?php } ?>

			<?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
			<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

			<?php } ?>		</figure>

			<div class="txt-internal-banner">
				<h1><?php print $node->title ?></h1>
				<p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?>
				</p>
			</div>
		</article>
	</section>

	<div class="miga-de-pan">
		<h2 class="element-invisible">Usted está aquí</h2>
		<div class="breadcrumb container contextual-links-region">
			<span class="inline odd first">
				<a href="/donaciones/">Home</a>
			</span> 
			<span class="delimiter">/</span> 
			<span class="inline even last"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a></span>



		</div>		

	</div>


	<section class="block-cypher" id="cifras">
		
		<article class="internal-cypher">
			<h1 class="container">Cifras</h1>

			<div class="introduction">
				<div class="container">
					<h2><?php print variable_get("texto_interna_titulo")?></h2>
					<p><?php print variable_get("texto_interna_subtitulo")?></p>
				</div>
			</div>


			<div class="list-cypher">
				<div class="container">
					<p><?php print variable_get("texto_cifras")?></p>

					<div class="item-list-cypher">
						<p class="txt-list-cypher">
							<span class="txt-number"><?php print variable_get("numero_donaciones")?></span>
						</p>
						<p class="title-list-cypher"><?php print variable_get("nombre_donaciones")?></p>
					</div>

					<div class="item-list-cypher">
						<p class="txt-list-cypher">
							<span class="txt-number"><?php print variable_get("numero_beneficiados")?></span>
						</p>
						<p class="title-list-cypher"><?php print variable_get("nombre_beneficiados")?></p>
					</div>

					<div class="item-list-cypher">
						<p class="txt-list-cypher">
							<span class="txt-number"><?php print variable_get("numero_metas")?></span>
						</p>
						<p class="title-list-cypher"><?php print variable_get("nombre_metas")?></p>
					</div>
				</div>
			</div> <!-- list-cypher -->
		</article>

		<article class="descriptive-article container">
			<?php 
			
			for ($i=0; $i < count($node->field_titulo_metas['und']); $i++) { 
				?>
				<div class="item-descriptive-article">
					<figure>
						<img src="<?php print file_create_url($node->field_imagen_metas['und'][$i]['uri']) ?>" alt="<?php print $node->field_imagen_metas['und'][$i]['alt'] ?>" title="<?php print $node->field_imagen_metas['und'][$i]['title'] ?>">
					</figure>

					<div class="txt-descriptive-article">
						<h2><?php print $node->field_titulo_metas['und'][$i]['value'] ?></h2>

						<p><?php print $node->field_descripcion_metas['und'][$i]['value']?> </p>
					</div>
				</div> <!-- item-descriptive-article -->
				<?php
			}
			?>
		</article>
	</section>




	<?php 
	$view = views_get_view('vista_testimonios_integrados');
	$view->set_display("block");
	$view->pre_execute();
	$view->execute();
	print $view->render();
	?>


	<?php 
	$view = views_get_view('vista_beneficiados_impacto');
	$view->set_display("block_1");
	$view->pre_execute();
	$view->execute();

	?>

	<section class="descriptive-benefited-people" id="beneficiarios">
		<div class="container">
			<h2>Beneficiarios</h2>

			<article class="txt-description-bp">
				<p><?php print $view->result[0]->_field_data['nid']['entity']->field_texto_panel1_maestra2['und'][0]['value']  ?></p>
				<?php if (!empty($view->result[0]->_field_data['nid']['entity']->field_texto_panel_2_maestra2['und'][0]['value'])){?>
				<p><?php print $view->result[0]->_field_data['nid']['entity']->field_texto_panel_2_maestra2['und'][0]['value']  ?></p>

				<?php }?>

			</article>
		</div>
	</section>

	<?php 

	$view = views_get_view('vista_beneficiados_impacto');
	$view->set_display("block");
	$view->pre_execute();
	$view->execute();
	print $view->render();

	?>

	<section class="reports" id="informes">
		<div class="container">
			<article class="txt-reports">
				<h1><?php print $node->field_titulo_campana['und'][0]['value']?></h1>
				<p><?php print $node->field_texto_competo_noticias['und'][0]['value']?></p>
			</article>
			<article class="slide-reports">

				<?php 

					//foreach( $node->field_informes_anuales[ "und" ] as $file ){
				for( $i=0 ; $i <= count( $node->field_informes_anuales[ "und" ] ) ; $i++ ){

					$file = $node->field_informes_anuales[ "und" ][ $i ];
					$file = $file[ "entity" ];

					?>
					<div class="item-slide-report slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 529px;">
						<?php

						if( isset( $node->field_informes_anuales[ "und" ][ $i ] ) ){

							?>

							
							<a target="_blank" class="annual-reports" href="<?php echo file_create_url( $file->field_documento_anual["und"][0]["uri"] ) ?>" tabindex="0"><?php echo $file->title ?></a>
							
							<?php 

						}

						$i++;

						if( isset( $node->field_informes_anuales[ "und" ][ $i ] ) ){

							$file = $node->field_informes_anuales[ "und" ][ $i ];
							$file = $file[ "entity" ];

							?>
							
							<a target="_blank" class="annual-reports" href="<?php echo file_create_url( $file->field_documento_anual["und"][0]["uri"] ) ?>" tabindex="0"><?php echo $file->title ?></a>
							
							<?php
						}

						?>	
					</div>
					<?php

				}

				?>
			</article>
		</div>
	</section>


	
	<div class="container-fluid compartir-redes">
		<div class="container">
			<div class="linea-100"></div>
			<p>Compartir</p>
			<ul>
				<li class="internal-sharing"><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
				<li class="internal-sharing"><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
				<li class="internal-sharing"><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
			</ul>
		</div>
	</div>





