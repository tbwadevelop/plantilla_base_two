<section class="breadcrumb">
  <article class="container">
    <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
    <span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
    <?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
  </article>
</section>
<div class="content-master-5">
	<section class="principal-image container">
		<article class="image-content">
			<figure class="desktop-img">
				<img src="<?php print file_create_url( $node->field_imagen_maestra_1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print isset( $node->field_imagen_maestra_1["und"] ) ? $node->field_imagen_maestra_1["und"][0]["alt"] : $node->title ?>" title="<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>" >
			</figure>

			<figure class="mobile-img">
				<img src="<?php print file_create_url( $node->field_imagen_mobile_bannerh["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_bannerh["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_bannerh["und"][0]["title"] ?>" >
			</figure>
		</article>
	</section> <!-- principal-image -->


	<section class="txt-content container">
		<header class="title_master-5">
			<h1><?php print $node->title ?></h1>
		</header>

		<article class="list-paragraph">
			<div class="item-paragraph">
				<p>  <?php print $node->field_descripcion1_maestra_1["und"][0]["value"] ?> </p>
			</div>

			<div class="item-paragraph">
				<p> <?php print $node->field_descripcion_2_maestra_1["und"][0]["value"] ?> </p>
			</div>
		</article>
	</section> <!-- txt-content -->


	<section class="content-multimedia container">
		<article class="item-multimedia">
			<!-- Aqui puede ir una imagen o un video -->
			<?php 

			if(!empty($node->field_videos_noticias)){


				$cadena = $node->field_videos_noticias[ "und" ][ 0 ][ "value" ];

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

				print $iframe;

			}
			else
			{

				if (!empty($node->field_image)){
					?>
					<img src="<?php print file_create_url( $node->field_image["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_image["und"][0]["alt"] ?>" title="<?php print $node->field_image["und"][0]["title"] ?>" >

					<?php 
				}

			} ?>
			</article>
			</section> <!-- content-multimedia -->

			<section class="list-tabs container">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				<?php foreach( $node->field_titulo_tab[ "und" ] as $key => $title ){ ?>
						<li role="presentation" <?php if( $key == 0 ){ ?> <?php } ?>><a href="#tab_<?php echo $key ?>" aria-controls="" role="tab" data-toggle="tab"><?php echo $title[ "value" ] ?></a></li>
				<?php } ?>
				</ul>

				<!-- Tab panes -->
				<article class="tab-content">
					<?php foreach( $node->field_body_tab[ "und" ] as $key => $body ){ ?>
						<div role="tabpanel" id="tab_<?php echo $key ?>" class="tab-pane <?php if( $key == 0 ){ ?> active<?php } ?>">
							<?php echo $body[ "value" ] ?>
						</div>
					<?php } ?>
				</article>
			</section> <!-- list-tabs -->
		</div>