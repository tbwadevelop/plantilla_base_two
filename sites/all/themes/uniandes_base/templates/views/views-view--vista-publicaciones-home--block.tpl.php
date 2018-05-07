<?php
global $language;
$tid=variable_get('taxonomy');
$term = taxonomy_term_load($tid);

if($language->language=="en"){
	$term = i18n_taxonomy_term_get_translation($term, "en");
}else{
	$term = i18n_taxonomy_term_get_translation($term, "es");	
}

$view2 = views_get_view('categorias_publicaciones');
$view2->set_arguments(array($term->tid));
$view2->set_display("block");
$view2->pre_execute();
$view2->execute();
$resultados = $view2->result;

$idioma=$language->language;

 $title_es=t('Publications', array(), array('langcode' => 'es'));
 $title_en=t('Publications', array(), array('langcode' => 'en'));

 $view_all_es=t('View all publications', array(), array('langcode' => 'es'));
 $view_all_en=t('View all publications', array(), array('langcode' => 'en'));


 if ($idioma=="es") {

  if($title_es==$title_en){
        $title="Publicaciones";
    }else{
        $title=$title_es;
    }

 if($view_all_es==$view_all_en){
        $view_all="Ver todas las publicaciones";
    }else{
        $view_all=$view_all_es;
    }


    }else{        

	$title=$title_en;
	$view_all=$view_all_en;

        }

?>

<section id="block-views-vista-publicaciones-home-block" class="block-views-vista-publicaciones-home-block">
	<div class="container">
		<header class="title_featured_publications">
			<h2><?php echo $title; ?></h2>
		</header>

		<section class="views_publications featured_publications">
			<?php
			if (!empty($resultados)){

				foreach ($resultados as $resultado_ind){
					$noticia = $resultado_ind->_field_data["nid"]["entity"];
					?>
					<article class="list_featured_publications">
						<section class="list-item_featured_publications">
							<?php 
							if(isset($noticia->field_url_publicaciones["und"][0]["url"])){
								$url=$noticia->field_url_publicaciones["und"][0]["url"];
							}else{
								$url=url( 'node/' . $noticia->nid, array('absolute' => true));
							}
							?>
							<a target="_blank" href="<?php print $url;?>">
								<figure class="img-featured_publications">
									<img typeof="foaf:Image" class="img-responsive" src="<?php print file_create_url( $noticia->field_imagen_publicaciones["und"][0]["uri"] ) ?>" width="396" height="704"  alt="<?php print $noticia->field_imagen_publicaciones["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_publicaciones["und"][0]["title"] ?>"  >
								</figure>
							</a>
							<article class="txt-featured_publications">
								<h1 class="title-featured_publications"> 
									<?php 
									if(isset($noticia->field_url_publicaciones["und"][0]["url"])){
										?>
										<a target="_blank" href="<?php print ($noticia->field_url_publicaciones["und"][0]["url"]);?>">
											<?php print ($noticia->title);?>
										</a>
										<?php 
									}else{?>

									<a href="<?php print url( 'node/' . $noticia->nid, array('absolute' => true)); ?>">
										<?php print ($noticia->title);?></a>
										<?php 
									}
									?>
								</h1>
								<p class="txt_featured_publications"><?php print ($noticia->field_sub_titulo_publicaciones["und"][0]["value"]);?></p>
							</article>  
						</section>
					</article>
					<?php 

				}
			}
			global $language;
			if ($language->language=="es"){
				$url_idioma="/publicaciones";
			}else{
				$url_idioma="/en/publications";
			}
			?>

		</section>
	</div>
	
	<div class="btn-block line-grey">
		<a href="<?php print $url_idioma ?>" class="btn-default btn-border-grey btn-featured_publications"><?php print $view_all;?></a>
	</div>
</section>



