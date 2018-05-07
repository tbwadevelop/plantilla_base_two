<?php
global $language;
$tid=variable_get('taxonomy');
$term = taxonomy_term_load($tid);

if($language->language=="en"){
	$term = i18n_taxonomy_term_get_translation($term, "en");
}else{
	$term = i18n_taxonomy_term_get_translation($term, "es");	
}

$view = views_get_view('categorias_publicaciones');
$view->set_arguments(array($term->tid));
$view->set_display("block");
$view->pre_execute();
$view->execute();

global $base_root;
$path = current_path();
$path_alias = drupal_lookup_path('alias',$path);
$path= $base_root.'/'.$path_alias;
?>
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "ItemList",
		"url": "<?php print $path; ?>",
		"numberOfItems": "<?php print count($view->result) ?>",
		"itemListElement": [

		<?php 
		$i=1;
		foreach ($view->result as $item ) {
			print "{";
			?>

			"@type": "Book",
			"image": "<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_publicaciones['und'][0]['uri']) ?>",
			<?php 
			if(isset($item->_field_data['nid']['entity']->field_isbn['und'][0]['value'])){
				?>
				"isbn": "<?php  print $item->_field_data['nid']['entity']->field_isbn['und'][0]['value'] ?>",

				<?php 
			}
			?>
			"url": "<?php print $item->_field_data['nid']['entity']->field_url_publicaciones['und'][0]['url']?>",
			"name": "<?php print $item->_field_data['nid']['entity']->title?>",
			"position": <?php print $i; ?>
			<?php

			if ($item === end($view->result)) {
				print "}";
			}else{
				print "},";
			}
			$i++;
		}

		?>


		]
	}
</script>

<section class="breadcrumb">
	<article class="container">
		<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
		<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
		<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
	</article>
</section>

<div class="content-master-publication">
	<header class="title_master-publication container">
		<h1><?php print $node->title ?></h1>
		<h2><?php print $term->field_titulo_cifras['und'][0]['value'] ?></h2>
	</header>
	<?php
	print $view->render();
	print theme('pager'); 
	?>
	
	<?php if(isset($term->field_imagen_fondo_cifras, $term->field_imagen_banner_mob_maestra4) && false){ ?>
	<section class="related-publication">
		<figure class="bg-related-publication">
			<img class="img-desktop" src="<?php print file_create_url($term->field_imagen_fondo_cifras['und'][0]['uri']) ?>" alt="<?php print $term->field_imagen_fondo_cifras['und'][0]['alt']?>" title="<?php print $term->field_imagen_fondo_cifras['und'][0]['title']?>">
			<img class="img-mobile" src="<?php print file_create_url($term->field_imagen_banner_mob_maestra4['und'][0]['uri']) ?>" alt="<?php print $term->field_imagen_banner_mob_maestra4['und'][0]['alt']?>" title="<?php print $term->field_imagen_banner_mob_maestra4['und'][0]['title']?>">
		</figure>
		<article class="detail-related-publication">
			<h1><?php print $term->field_titulo_publicitario['und'][0]['value']?></h1>
			<section class="content_related-publication">
				<p><?php print $term->field_descripcion_publicitario['und'][0]['value']?></p>
				<a href="<?php  print $term->field_boton_anuncio['und'][0]['url'] ?>" target="_blank" class="btn-default btn-black btn-view-more-publication">
					<?php  print $term->field_boton_anuncio['und'][0]['title']   ?>
				</a>
			</section>
		</article>
	</section>
	<?php } ?>
	
	<?php if(isset($node->field_activar_anuncios_niciasot) && $node->field_activar_anuncios_niciasot["und"][0]["value"] == 0){ ?>
		<section class="block-views-vista-anuncios internal-news">
			<div class="container">
				<?php
					$view = views_get_view('vista_anuncios_home');
					print $view->render('block');
				?>
			</div>
		</section> 
	<?php } ?>
	<!-- block-views-vista-anuncios-home-block -->


	<section class="share-social_network container">
		<p><?php print t("Share"); ?></p>
		<ul class="social_network">
			<li class="item-share-social-network">
				<figure>
					<a href=""><img id="btn_share_fb" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png"/></a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href=""><img  id="btn_share_tw" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png"/></a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href=""><img  id="btn_share_lk" alt="Logo Linkedin" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-linkedin.png"/></a>
				</figure>
			</li>
		</ul>
	</section> <!-- share-social_network -->
</div>