<section class="donors" id="donante-detalle">
  <article class="intro-donors">
    <div class="container">
      <div class="list-donors">

        <?php 
        foreach ($view->result as $testimonio) {            
         $entity=$testimonio->_field_data['nid']['entity'];
         $imagen=file_create_url($entity->field_imagen_miniatura_noticias['und'][0]['uri']);
         $imagen_alt=$entity->field_imagen_miniatura_noticias['und'][0]['alt'];
         $imagen_title=$entity->field_imagen_miniatura_noticias['und'][0]['title'];
         ?>
         <div class="item-donors">

          <figure>
          <a href="<?php print url( 'node/' . $entity->nid, array('absolute'=>true)); ?>" >
            <img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
            </a>
          </figure>

          <div class="txt-donors">
            <h2>Donantes</h2>
            <p class="name-donor">
            <a class="link-donantes" href="<?php print url( 'node/' . $entity->nid, array('absolute'=>true)); ?>" ><?php print $entity->title ?></a></p>
            
            <p><?php print $entity->field_descripcion_corta_noticias['und'][0]['value']   ?></p>
          </div>
        </div> <!-- item-donors -->
        <?php 
      }
      ?>

    </div>
  </div>

  <div class="btn-block">
    <a href="/donaciones/donantes" class="btn-default btn-black btn-view-donantes">Ver más</a>
  </div> <!-- block-btn -->
</article>
</section>