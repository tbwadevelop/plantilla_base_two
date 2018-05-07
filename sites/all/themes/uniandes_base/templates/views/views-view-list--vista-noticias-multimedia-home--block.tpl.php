<div class="container">
<header class="title_featured_multimedia">
	<h2>Multimedia</h2>
</header>

<article class="slide-multimedia">
	<div class="list-multimedia">

		<?php 
		$resultados= $view->result;

		foreach ($resultados as $testimonio ) {
			$entity=$testimonio->_field_data['nid']['entity'];
			$term = taxonomy_term_load($entity->field_tag_noticias["und"][0]["tid"]);
			$imagen=file_create_url($entity->field_imagen_miniatura_noticias['und'][0]['uri']);
			$imagen_alt=$entity->field_imagen_miniatura_noticias['und'][0]['alt'];
			$imagen_title=$entity->field_imagen_miniatura_noticias['und'][0]['title'];
			?>        

			<div class="item-list-multimedia">
				<figure>
					<a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
						<img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
					</a>
					<?php 
					if (!empty($term->name)) {					
					?>
					<figcaption class="tag_news_slide">
						<?php echo l( drupal_substr($term->name,0,50), "taxonomy/term/" . $term->tid ) ?>
					</figcaption>
					<?php 
						}
					?>
				</figure>

				<div class="txt-multimedia">
					<p class="date_news-slide"><?php print date( "d/m/Y", str_replace( "T", " ", strtotime( $entity->field_fecha_creacion_noticias["und"][0]["value"] ) ) )  ?></p>
					<h1><a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
						<?php print $entity->title ?> </a></h1>
					</a> 
				</div>
			</div> <!-- item-list-multimedia -->

			<?php
		}
		?>
	</div>
<?php 
global $language;
$idioma=$language->language;

 $view_all_es=t('View all', array(), array('langcode' => 'es'));
 $view_all_en=t('View all', array(), array('langcode' => 'en'));


 if ($idioma=="es") {

  if($view_all_es==$view_all_en){
        $view_all="Ver todo";
    }else{
        $view_all=$view_all_es;
    }


    }else{        
$view_all=$view_all_en;
        }

?>
	<div class="btn-block">
		<a class="btn-default btn-border-green" href="<?php  print url('multimedia', array('absolute'=>true))?>"><?php echo $view_all; ?></a> 
	</div>
</article>

<?php 


$view2 = views_get_view("vista_noticias_home_multimedia_destacada");
$view2->set_display("block_1");
$view2->execute();
$resultados_destacadas = $view2->result;

$destacado=$view2->result[0];
$destacado_entity=$destacado->_field_data['nid']['entity'];
$term = taxonomy_term_load($destacado_entity->field_tag_noticias["und"][0]["tid"]);
?>

<article class="selected-item">
	<figcaption class="tag_selected-item"><?php echo l( drupal_substr($term->name,0,50), "taxonomy/term/" . $term->tid ) ?></figcaption>

	<?php 
	$video=false;

	if(!empty($destacado_entity->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"])){
		$video=true;

		$cadena = $destacado_entity->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

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

			$iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '?enablejsapi=1&showinfo=0"></iframe>';
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

		print $iframe;

	}   

	if(!$video && !empty($destacado_entity->field_imagenes_noticias['und'][0]['uri'])){
		$imagen=file_create_url($destacado_entity->field_imagenes_noticias['und'][0]['uri']);
		$imagen_alt=$destacado_entity->field_imagenes_noticias['und'][0]['alt'];
		$imagen_title=$destacado_entity->field_imagenes_noticias['und'][0]['title'];
		?>
		<figure>
			<a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>">
				<img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
			</a>
			<?php 
					if (!empty($term->name)) {					
					?>
			<figcaption class="tag_news_slide">
				<?php echo l( drupal_substr($term->name,0,50), "taxonomy/term/" . $term->tid ) ?>
			</figcaption>
			<?php 
				}
			?>
		</figure>

		<?php

	}

	?>


	<section class="txt-selected-item">
		<h1> <a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>"><?php print $destacado_entity->title ?> </a></h1>
		<p>        
			<?php 
			print $destacado_entity->field_descripcion_corta_noticias['und'][0]['value'];
			?>

		</p>
	</section>

	<div class="btn-block">
		<a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>" class="btn-default btn-border-green">Ver más</a>
	</div>
</article>
</div>