<?php

global $language;
$resultados = $view->result;

?>
<section class="events_views internal_events container">
  <header class="title-block-events">
    <h1><?php print t('Important Events') ?></h1>
</header>


<?php
if (!empty($resultados)){

    foreach ($resultados as $resultado_ind){
        $evento = $resultado_ind->_field_data["nid"]["entity"];
        ?>
        <article class="list_featured_events">
            <div class="list-item_featured_events">
                <header class="title-featured_events">
                    <h3><a href=""><?php print $evento->title ?></a></h3>
                </header>

                <figure class="img-featured_events">
                    <img src="<?php print file_create_url($evento->field_imagen_eventos['und'][0]['uri'])?>" alt="<?php print $evento->field_imagen_eventos['und'][0]['alt'] ?>" title="<?php print $evento->field_imagen_eventos['und'][0]['title'] ?>"  >
                </figure>

                <div class="content-eventos">
                    <p class="place_event"><span class="label-place_event">Lugar:</span><?php print $evento->field_lugar_eventos['und'][0]['value'] ?></p>
                    <p class="date_event"><span class="label-date_event">Fecha:</span><?php print $evento->field_fecha_evento['und'][0]['value']?></p>

                    <div class="btn-evento">
                        
                        <a href="<?php print url( 'node/' . $evento->nid, array('absolute' => true)) ?>" class="btn-default btn-border-blue view-featured_events"><?php print t('View more')?></a>
                        
                    </div>
                </div>  
            </div>
        </article>
        <?php 

    }
}   

?>
</section>
