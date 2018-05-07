<section class="internal-banner gracias-donar">
		<article class="internal-txt-description">
			<figure>
				<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
				<img  id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

				<?php } ?>

				<?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
				<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

				<?php } ?>		
				</figure>

				<div class="txt-internal-banner">
					<h1><?php print $node->title ?></h1>
					<p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?>
					</p>

	<div class="btn-block ">
	 <?php if (!empty($node->field_boton_noticia)){ ?>
                <a  <?php if (!empty($node->field_url_boton_banner['und'][0]['attributes']['target']))
                    {
                        print 'target="'.$node->field_url_boton_banner['und'][0]['attributes']['target'].'"';
                        } ?>   class="btn-border-green btn-default "  href="<?php  print $node->field_boton_noticia["und"][0]["url"] ?>"><?php print $node->field_boton_noticia["und"][0]["title"]?></a>
                <?php }
                else {?>
                <a class="btn-border-green btn-default"  href="/donaciones/causas" >Conoce más causas</a>
                <?php } ?>

	</div>
				</div>


			</article>
		</section>


