
<section class="breadcrumb">
  <article class="container">
    <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
    <?php if( $node->language == es ){ ?>
    <span class="inline odd first"><?php print l( "Eventos", "eventos-destacados" ) ?></span> <span class="delimiter">/</span>
    <?php }else{ ?>
    <span class="inline odd first"><?php print l( "Events", "events" ) ?></span> <span class="delimiter">/</span>
    <?php } ?>
    <span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
    <?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
  </article>
</section>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Event",
    "name": "<?php print $node->title ?>",  
    "startDate": "<?php print $node->field_fecha_evento_calendario['und'][0]['value'] ?>",  
    "endDate": "<?php print $node->field_fecha_evento_calendario['und'][0]['value2'] ?>",  
    "description": "<?php print $node->field_descripcion_eventos['und'][0]['value'] ?>",  
    "image": "<?php print file_create_url($node->field_imagen_eventos['und'][0]['uri']) ?>",  
    "location": {
      "@type": "Place",
      "name": "<?php echo $node->field_lugar_eventos['und'][0]['value'] ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo $node->field_lugar_eventos['und'][0]['value'] ?>"
      }
    },
    "offers": {
      "@type": "Offer",
      "url": "<?php print url( 'node/' . $node->nid, array('absolute' => true)) ?>",
      "price": "0",
      "priceCurrency": "COP",
      "availability": "http://schema.org/InStock",
      "validFrom": "<?php print $node->field_fecha_evento_calendario['und'][0]['value'] ?>"
    },
    "performer": {
      "@type": "PerformingGroup",
      "name": "Universidad de los Andes"
    }
  }
</script>
<div class="container">
<section class="events-detail">
  <h1> <?php print $node->title ?></h1>
  <figure class="banner-events">
    <?php 
    $url_imagen=file_create_url($node->field_imagen_banner_maestra4['und'][0]['uri']);
    $url_icono=file_create_url($node->field_imagen_fondo_cifras['und'][0]['uri']);
    ?>
    <img src="<?php print $url_imagen ?>" title="<?php print $node->field_imagen_banner_maestra4['und'][0]['title']?>" alt="<?php print $node->field_imagen_banner_maestra4['und'][0]['alt']?>">
  </figure>

  <article class="event-content">
    <header>
      <figure class="ico-calendar">
        <img src="<?php print $url_icono ?>" title="<?php print $node->field_imagen_fondo_cifras['und'][0]['title']?>" alt="<?php print $node->field_imagen_fondo_cifras['und'][0]['alt']?>">
      </figure>
      <section class="info-event">
        <p class="event_place"><?php print t('Place: ')?><span class="txt-event_place"><?php print $node->field_lugar_eventos['und'][0]['value']?></span></p>
        <p class="event_date"><?php print t('Date: ')?><span class="txt-event_date"><?php print $node->field_fecha_evento['und'][0]['value']?></span></p>
        <p class="event_time"><?php print t('Time: ')?><span class="txt-event_time"><?php print $node->field_hora_evento['und'][0]['value']?></span></p>
      </section>
      <?php 
      if(!empty($node->field_boton_noticia['und'][0])){
        ?>
        <section class="btn_event">
          <a target="_blank" href="<?php print $node->field_link_noticia['und'][0]['value'] ?>" class="btn-default btn-border-blue btn-event">
            <?php 
            print $node->field_boton_noticia['und'][0]['value'];
            ?>
          </a>
        </section>
        <?php 
      }
      ?>
    </header>
  </article>

  <article class="event-content_detail">
    <p><?php print $node->field_descripcion1_maestra_1['und'][0]['value'] ?></p>
    
    <footer class="event-to-take-into-account">
      <p><?php print $node->field_texto_competo_noticias['und'][0]['value'] ?></p>
    </footer>
  </article>
</section>