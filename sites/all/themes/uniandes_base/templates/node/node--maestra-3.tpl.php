
<section class="banner-interno">
	<article class="image-banner">
		<figure class="desktop-img">
			<?php if (!empty($node->field_imagen_maestra3)){ ?>
			<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_maestra3["und"][0]["uri"] ) ?>" alt="<?php print $node->field_imagen_maestra3["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_maestra3["und"][0]["title"] ?>" >
			<?php } ?>
		</figure>

		<figure class="mobile-img">
			<?php if (!empty($node->field_img_ban_mob_maestra3)){ ?>
			<img src="<?php print file_create_url( $node->field_img_ban_mob_maestra3["und"][0]["uri"] ) ?>" alt="<?php print $node->field_img_ban_mob_maestra3["und"][0]["alt"] ?>" title="<?php print $node->field_img_ban_mob_maestra3["und"][0]["title"] ?>" >
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

<section class="content-master-3 container">
	<article class="list-paragraph">
		<div class="item-paragraph">
			<?php if (!empty($node->field_texto1_maestra3)){ ?>
			<p> <?php print $node->field_texto1_maestra3["und"][0]["value"] ?> </p>
			<?php } ?>
		</div>

		<div class="item-paragraph">
			<?php if (!empty($node->field_texto2_maestra3)){ ?>
			<p> <?php print $node->field_texto2_maestra3["und"][0]["value"] ?> </p>
			<?php } ?>
		</div>
	</article>

	<article class="content-accordion">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			<?php 
			$i=0;
			$view = views_get_view('vista_faq');
  	  		$view->set_display('block'); 
  	  		$view->set_arguments(array($node->field_tipo_maestra_3['und'][0]['tid'])); 
  	  		$view->execute();
  	  		foreach ($view->result as $item) {
  	  		?>
  	  		  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $i;?>" aria-expanded="false" aria-controls="collapseTwo"><?php print $item->node_title ?>
        </a>
      </h4>
    </div>
    <div id="collapse<?php print $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
                <?php print $item->_field_data['nid']['entity']->field_respuesta_faq['und'][0]['value'] ?>
      </div>
    </div>
  

  	  		 <?php
  	  		$i++;
  	  		}
  	  		?>
  	  	</div>
	</article>
</section> <!-- content-master-3 -->



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
