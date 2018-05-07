<?php
global $language;
$resultados = $view->result;
?>

<section id="block-views-vista-eventos-home-block" class="block-views-vista-eventos-home">
	<div class="container">
		<header class="title_featured_events">
			<h2><?php 

				global $language;
				$english=t('Featured Events', array(), array('langcode' => 'en'));
				$spanish= t('Featured Events', array(), array('langcode' => 'es'));
				$view_all_es=t('View all events', array(), array('langcode' => 'es'));
				$view_all_en=t('View all events', array(), array('langcode' => 'en'));
				$view_more_es=t('View More', array(), array('langcode' => 'es'));
				$view_more_en=t('View More', array(), array('langcode' => 'en'));
				$idioma=$language->language;

				if ($idioma=="es") {
					if($english==$spanish){
						print "Eventos Destacados";
					}else{
						print $spanish;
					}
				}else{
					print $english;
				}
				?></h2>
			</header>
			<?php
			if($view_all_es==$view_all_en){
				$view_all="Ver todos los eventos";
			}else{
				$view_all=$view_all_es;
			}
			if($view_more_es==$view_more_en){
				$view_more="Ver más";
			}else{
				$view_more=$view_more_es;
			}
			?>
			<section class="views_events featured_events">
				<?php
				if (!empty($resultados)){

					foreach ($resultados as $resultado_ind){

						$evento = $resultado_ind->_field_data["nid"]["entity"];

						?>
						<article class="list_featured_events">
							<div class="list-item_featured_events">
								<header class="title-featured_events">
									<h3>
									<?php 
									if(!empty($evento->field_boton_evento['und'])){
										?>
										<a href="<?php print $evento->field_link_evento['und'][0]['value'] ?>" target="<?php print $evento->field_boton_evento['und'][0]['attributes']['target'] ?>" ><?php print $evento->title ?></a>
										<?php
									}else{
										?>
										<a href="<?php print url( 'node/' . $evento->nid, array('absolute' => true)) ?>" ><?php print $evento->title ?></a>
										<?php
									}
									?>										

									</h3>
								</header>

								<figure class="img-featured_events">
									<img src="<?php print file_create_url($evento->field_imagen_eventos['und'][0]['uri'])?>" alt="<?php print $evento->field_imagen_eventos['und'][0]['alt'] ?>" title="<?php print $evento->field_imagen_eventos['und'][0]['title'] ?>"  >
								</figure>

								<div class="txt-featured_events">
									<p class="place_event"><span class="label-place_event"><?php print t('Place:')?></span><?php print $evento->field_lugar_eventos['und'][0]['value'] ?></p>
									<p class="date_event"><span class="label-date_event"><?php print t('Date:')?></span><?php print $evento->field_fecha_evento['und'][0]['value']?></p>

									<?php 
									if(!empty($evento->field_boton_evento['und'])){
										?>
										<a href="<?php print $evento->field_link_evento['und'][0]['value'] ?>" target="<?php print $evento->field_boton_evento['und'][0]['attributes']['target'] ?>" class="btn-default btn-border-blue view- featured_events"><?php print $evento->field_boton_evento['und'][0]['value'] ?></a>
										<?php
									}else{
										?>
										<a href="<?php print url( 'node/' . $evento->nid, array('absolute' => true)) ?>" class="btn-default btn-border-grey view-featured_events"><?php print $view_more?></a>
										<?php
									}
									?>

								</div>  
							</div>
						</article>
						<?php 

					}
				}	

				?>

				<?php

				if ($language->language=="es") {
					$eventos_url="/eventos";
				}else{
					$eventos_url="/en/events";
				}

				?>
			</section>
		</div>

		<div class="btn-block line_base">
			<a href="<?php print $eventos_url ?>" class="btn-default btn-border-grey btn-featured_events"><?php print $view_all; ?></a>
		</div>
	</section>