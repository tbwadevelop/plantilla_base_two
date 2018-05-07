<?php
global $language;
global $base_url;

$idioma=$language->language;
?>

<script type="text/javascript">
  jQuery(document).ready(function(){
    var uri=window.location.pathname.substr(1);

    if(uri=="es/noticias" || uri=="es/noticias/"){
      uri="es/noticias/";
    }

    if(uri=="en/news" || uri=="en/news/"){
      uri="en/news/";
    }

    var i=0;
    var tipo='&t=r';
    jQuery('.pagination li').each(function(){
      if(jQuery(this).hasClass('prev')){
        jQuery(this).find('a').attr('href', '/'+uri+'?page=0'+tipo);
      }
      if(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next') || jQuery(this).hasClass('pager-first') || jQuery(this).hasClass('pager-last') ) {

      }else{
        if(i==0){
         jQuery(this).find('a').attr('href', '/'+uri);

       }else{
        var obje=jQuery(this).find('a');
        var num=obje.text();
        jQuery(this).find('a').attr('href', '/'+uri+'?page='+(num-1)+tipo);
      }
      i++;

    }

    if(jQuery(this).hasClass('pager-last') ) {
      tipo='&t=v';
      i=0;
    }
  });
  })
</script>


<div class="content-master-news">
  <header class="title_list_news container">
   <h1><?php print t( "News" )?></h1>
 </header>

 <?php 

 $vista_categorias = views_get_view('home_noticias_categorias');
 $vista_categorias->set_display("block");
 $vista_categorias->pre_execute();
 $vista_categorias->execute();
 $result_categorias=$vista_categorias->result;

 $request= $_SERVER['REQUEST_URI'];
 if (isset($_GET['t'])) {
  $tipo_vista=$_GET['t'];
}else{
  $tipo_vista="r";
}
$new_request="https://".$_SERVER['HTTP_HOST'].$request;


$request=str_replace("/es/", "/", $request);
$request=str_replace("/en/", "/", $request);

$request=str_replace("/en/", "/", $request);


$request=explode("?",$request);
$request=$request[0];

if ($idioma=="es") {
  $noticias="/noticias";
}else{
  $noticias="/news";
}


$explorar=true;
if($new_request==($base_url.$noticias) || $new_request==(($base_url.$noticias)."/")){
 $explorar=false;
}

if(!$explorar){
  
 $i=0;
 foreach ($result_categorias as $item_categoria) {
  if($i==0){
   $ruta=$item_categoria->field_field_path_noticias[0]['raw']['value'];
   $padre=$item_categoria->field_field_path_noticias[0]['raw']['value'];
   $i++;
 }   
}
}else{

 $exp1=explode($noticias, $request);
 $exp_page=explode("?", $exp1[1]);

 if(count($exp_page)==2){
  $exp1[1]=$exp_page[0];
}


$exp2=explode("/",$exp1[1]);

if ($idioma=="es") {
  $ruta="noticias/".$exp2[1];
}else{
  $ruta="news/".$exp2[1];
}


if(!empty($exp2[2])){
  $ruta.="/".$exp2[2];
}


if ($idioma=="es") {
  $padre="noticias/".$exp2[1];
}else{
  $padre="news/".$exp2[1];
}


for ($i=0; $i <= count($exp2) ; $i++) { 
  if ($exp2[$i]==""){
   unset($exp2[$i]);
 }
}
array_values($exp2);

if(count($exp2)==2){
  $term_search=$exp2[1];
}else{
  $term_search=$exp2[0];
}
}

if ($idioma=="en"){
  $ruta=$ruta;
  if($request!=$noticias && $request!=($noticias."/")){
    $padre=$padre;

  }
}


$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
->fieldCondition('field_path_noticias', 'value',$ruta , '=');
$result = $query->execute();

foreach ($result['taxonomy_term'] as $key) {
  $childer_term=$key->tid;
}


$padre_query = new EntityFieldQuery();
$padre_query->entityCondition('entity_type', 'taxonomy_term')
->fieldCondition('field_path_noticias', 'value',$padre , '=');
$result_padre = $padre_query->execute();


foreach ($result_padre['taxonomy_term'] as $key) {
  $padre_term=$key->tid;
}

$info_taxonomy= taxonomy_term_load($childer_term);
$info_taxonomy_padre= taxonomy_term_load($padre_term);

$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
->fieldCondition('field_categoria', 'tid',$padre_term , '=')
->propertyOrderBy('name', 'ASC')
->propertyCondition('language', $language->language, '=');;
$hijos = $query->execute();



?>


<section class="categorie-tab_home-news container">
  <ul class="list-principal-tab">
   <?php 
   foreach ($result_categorias as $item_categoria) {
    ?>
    <li class="<?php 
    if ($item_categoria->taxonomy_term_data_name==$info_taxonomy_padre->name) {
     print "active";
   }
   ?>">
   <a class="active ajax-processed quicktabs-loaded jquery-once-3-processed" href="<?php print $base_url."/".$item_categoria->_field_data['tid']['entity']->field_path_noticias['und'][0]['value']?>"><?php print $item_categoria->taxonomy_term_data_name ?></a>
 </li>

 <?php
}
?>
</ul>
</section> <!-- tab_home-news -->


<section class="subcategorie-tab_home-news container">
  <ul class="list-subcategorie-tab">
   <?php 
   $subcategoria=false;
   $i=0;
   $existe=false;
   foreach ($hijos['taxonomy_term'] as $hijo) {
    $taxonomy= taxonomy_term_load($hijo->tid);
    if ($taxonomy->name==$info_taxonomy->name) {
     $existe=true;
   }

 }

 foreach ($hijos['taxonomy_term'] as $hijo) {
  if($i==0){
   $primer_hijo=$hijo->tid;
 }
 $taxonomy= taxonomy_term_load($hijo->tid);

 ?>
 <li class="<?php 
 if($existe){
   if ($taxonomy->name==$info_taxonomy->name) {
     $subcategoria=true;
     print "active";
   }
 }else{
   if($i==0){
    print "active";
  }

}
?>">
<a class="active ajax-processed quicktabs-loaded jquery-once-3-processed" href="<?php print $base_url."/".$taxonomy->field_path_noticias['und'][0]['value']?>"><?php print $taxonomy->name ?></a>
</li>
<?php
$i++;
}?>

</ul>
</section> <!-- subcategorie-tab_home-news -->


<!-- Multimedia  -->

<?php
if($subcategoria){
 $tid_actual=$childer_term;
}else{
  $tid_actual=$primer_hijo;
}

$array_no_destacadas = array($tid_actual);
$view_no_destacadas = views_get_view('vista_noticias_home_noticias');
$view_no_destacadas->set_display("block");
$view_no_destacadas->set_arguments($array_no_destacadas);
$view_no_destacadas->pre_execute();
$view_no_destacadas->execute();
$resultados_no_destacadas = $view_no_destacadas->result;


$array_destacadas = array($tid_actual);
$view_destacadas = views_get_view('vista_noticias_home_noticias');
$view_destacadas->set_display("block_1");
$view_destacadas->set_arguments($array_destacadas);
$view_destacadas->pre_execute();
$view_destacadas->execute();
$resultados_destacadas = $view_destacadas->result;
?>

<?php
        //Validamos si existe estacados     
if (empty($resultados_destacadas)){
 $array_destacadas = array($tid_actual);
 $view_destacadas_temp = views_get_view('vista_noticias_home_noticias');
 $view_destacadas_temp->set_display("block_2");
 $view_destacadas_temp->set_arguments($array_destacadas);
 $view_destacadas_temp->pre_execute();
 $view_destacadas_temp->execute();
 $resultados_destacadas = $view_destacadas_temp->result;
          //$resultados_destacadas=$resultados_no_destacadas;
}
?>

<?php if (!empty($resultados_destacadas)){
  $noticia_destacada = $resultados_destacadas[0]->_field_data["nid"]["entity"];
  ?>

  <section class="multimedia-news container">
    <section class="slide-multimedia">
      <article class="list_multimedia">
        <?php
        if (!empty($resultados_no_destacadas)){
          foreach ($resultados_no_destacadas as $item_individual){
            $noticia_no_destacada = $item_individual->_field_data["nid"]["entity"];
            ?>
            <div class="item-list-multimedia">
              <figure>
                <?php if (!empty($noticia_no_destacada->field_imagen_miniatura_noticias)) { ?>
                <a href="<?php print drupal_get_path_alias( 'node/' . $noticia_no_destacada->nid)?>">
                  <img src="<?php print file_create_url( $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
                </a>
                <?php } ?>
              </figure>

              <div class="txt-multimedia">
               <?php if (!empty($noticia_no_destacada->field_fecha_creacion_noticias)){ ?>
               <p class="date_news-slide"><?php echo date( "d/m/Y", $noticia_no_destacada->created ) ?></p>
               <?php } ?>
               <h1><a href="<?php print url( 'node/' . $noticia_no_destacada->nid, array('absolute' => true)) ?>"> <?php print $noticia_no_destacada->title?> </a></h1>

               <?php if (!empty($noticia_no_destacada->field_descripcion_corta_noticias)){ ?>
               <p class='text-descripcion'>
                <?php 
                if(strlen($noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"])>150){
                  print drupal_substr($noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150)."...";
                }  else{
                  print $noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"];
                }
                ?>
              </p>
              <?php } ?>
            </div>
          </div> <!-- item-list-multimedia -->
          <?php }} ?>
        </article> <!-- list-multimedia -->
      </section> <!-- slide-multimedia -->

      <section class="selected-item">
        <figure>
          <?php
          if (!empty($noticia_destacada->field_imagenes_noticias)){
            ?>
            <a href="<?php print drupal_get_path_alias( 'node/' . $noticia_destacada->nid)?>">
              <img src="<?php print file_create_url( $noticia_destacada->field_imagenes_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["title"] ?>" >
              <?php }
              else {
                if ($noticia_destacada->field_videos_noticias_v2) {

                  $cadena = $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

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
              }
              ?>
            </a>
          </figure>
          <?php if (!empty($noticia_destacada->title)){ ?>
          <div class="txt-selected-item">
            <h1>
              <a href="<?php print url( 'node/' . $noticia_destacada->nid, array('absolute' => true)) ?>">
                <?php print $noticia_destacada->title ?>
              </a>
            </h1>
            <?php if (!empty($noticia_destacada->field_fecha_creacion_noticias)){ ?>

            <p class='date-item'><?php echo date( "d/m/Y", $noticia_destacada->created ) ?></p>
            <?php } ?>
            <p><?php 
              if(strlen($noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"])>150){
                print drupal_substr($noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150)."...";
              }  else{
                print $noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"];
              }
              ?></p>
              <?php } ?>

              <div class="btn-block">
                <?php if (!empty($noticia_destacada->field_boton_noticia)){ ?>
                <a href="<?php print $noticia_destacada->field_boton_noticia["und"][0]["url"]?>" class='btn-default btn-border-green'><?php print $noticia_destacada->field_boton_noticia["und"][0]["title"]?></a>
                <?php }
                else {
                  $url_boton = url( 'node/' . $noticia_destacada->nid, array('absolute' => true));
                  ?>
                  <a href="<?php print $url_boton ?>" class='btn-default btn-border-green'>Ver más</a>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </section> <!-- selected-item -->
          </section> <!-- multimedia-news -->


          <section class="list-tabs-news">
            <div class="container">

              <div class="filter-buttons container">
                <ul>
                  <li class="mas-recientes <?php if ($tipo_vista=='r'){print 'active';}?>"><?php print t("More Recent")?></li>
                  <li class="mas-vistas <?php if ($tipo_vista=='v'){print 'active';}?>"><?php print t("More Views")?></li>
                </ul>
              </div>

              <section class="view-related-news container vista_noticias_mas_recientes" <?php if($tipo_vista=='r'){ print "style='display:block;'";}else{print "style='display:none;'"; } ?> >
                <section class="list_related-news">
                  <?php
                  $array_mas_recientes = array($tid_actual);
                  $view_mas_recientes = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                  $view_mas_recientes->set_display("block");
                  $view_mas_recientes->set_arguments($array_mas_recientes);
                  if($tipo_vista!='r'){
                    $view_mas_recientes->set_current_page(0);
                  }
                  $view_mas_recientes->pre_execute();
                  $view_mas_recientes->execute();
                  $result_recientes=$view_mas_recientes->result;


                  $i=0;
                  foreach ($result_recientes as $item) {

                    ?>
                    <?php 
                    $url_noticia=url( 'node/' . $item->nid, array('absolute'=>true));
                    $imagen_miniatura=file_create_url($item->_field_data['nid']['entity']->field_imagen_miniatura_noticias['und'][0]['uri']);
                    ?> 
                    <article class="list-item_related-news">
                      <figure class="img-related-news">
                        <a href="<?php print $url_noticia; ?>">
                          <img src="<?php print $imagen_miniatura ?>" class="img-responsive" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
                        </a>
                      </figure>

                      <div class="txt-related-news">
                        <p class="date_related-news">
                          <?php 
                          $date = new DateTime($item->_field_data['nid']['entity']->field_fecha_creacion_noticias['und'][0]['value']);
                          print $date->format('d/m/Y');
                          ?>
                        </p>
                        <h1 class="title-related-news">
                         <a href="<?php print $url_noticia; ?>"><?php print $item->_field_data['nid']['entity']->title?></a>
                       </h1>

                       <p class="txt_related-news">
                        <?php

                        if(strlen($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'])>150){
                          print drupal_substr($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'],0,150)."...";
                        }  else{
                          print $item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'];
                        }

                        ?> 

                      </p>
                      <?php 
                      if(isset($item->_field_data['nid']['entity']->field_boton_noticia['und'])){
                        ?>

                        <a class="btn-default btn-border-grey view-related-news" href="<?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['url']?>">
                          <?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['title']?></a>
                          <?php 
                        }else{?>
                        <a class="btn-default btn-border-grey view-related-news" href="<?php print $url_noticia; ?>">
                          <?php print t("View more"); ?></a>
                          <?php 
                        }
                        ?>
                      </div> <!-- txt-related-news -->
                    </article>

                    <?php
                    $i++;
                  }
                  print theme('pager'); 
                  ?>
                </section>

              </section>


              <section class="view-related-news container vista_noticias_mas_vistas" <?php if($tipo_vista=='v'){ print "style='display:block;'";}else{print "style='display:none;'"; } ?> >
                <section class="list_related-news">

                  <?php

                  $array_mas_vistas = array($tid_actual);
                  $view_mas_vistas = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                  $view_mas_vistas->set_display("block_1");
                  $view_mas_vistas->set_arguments($array_mas_vistas);
                  if($tipo_vista!='v'){
                    $view_mas_vistas->set_current_page(0);
                  }
                  $view_mas_vistas->pre_execute();
                  $view_mas_vistas->execute();
                  $result_vistas=$view_mas_vistas->result;


                  $i=0;
                  foreach ($result_vistas as $item) {

                    ?>
                    <?php 
                    $url_noticia=url( 'node/' . $item->nid, array('absolute'=>true));

                    $imagen_miniatura=file_create_url($item->_field_data['nid']['entity']->field_imagen_miniatura_noticias['und'][0]['uri']);
                    ?> 
                    <article class="list-item_related-news">
                      <figure class="img-related-news">
                        <a href="<?php print $url_noticia; ?>">
                          <img src="<?php print $imagen_miniatura ?>" class="img-responsive" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
                        </a>
                      </figure>

                      <div class="txt-related-news">
                        <p class="date_related-news">
                          <?php 
                          $date = new DateTime($item->_field_data['nid']['entity']->field_fecha_creacion_noticias['und'][0]['value']);
                          print $date->format('d/m/Y');
                          ?>
                        </p>
                        <h1 class="title-related-news">
                         <a href="<?php print $url_noticia; ?>"><?php print $item->_field_data['nid']['entity']->title?></a>
                       </h1>

                       <p class="txt_related-news">
                        <?php

                        if(strlen($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'])>150){
                          print drupal_substr($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'],0,150)."...";
                        }  else{
                          print $item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'];
                        }

                        ?> 

                      </p>
                      <?php 
                      if(isset($item->_field_data['nid']['entity']->field_boton_noticia['und'])){
                        ?>

                        <a class="btn-default btn-border-grey view-related-news" href="<?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['url']?>">
                          <?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['title']?></a>
                          <?php 
                        }else{?>
                        <a class="btn-default btn-border-grey view-related-news" href="<?php print $url_noticia; ?>">
                          <?php print t("View more"); ?></a>
                          <?php 
                        }
                        ?>
                      </div> <!-- txt-related-news -->
                    </article>
                    <?php
                    $i++;
                  }
                  print theme('pager'); 
                  ?>

                </section>
              </section>
            </div>
          </section> <!-- list-tabs-news -->

          <section class="block-views-vista-anuncios internal-news">
            <div class="container">
              <?php
              if ($node->field_activar_anuncios_niciasot["und"][0]["value"] == 0){
                $view = views_get_view('vista_anuncios_home');
                print $view->render('block');
              }
              ?>
            </div>
          </section> <!-- block-views-vista-anuncios-home-block -->

          <section class="share-social_network container">
            <p><?php print t("Share"); ?></p>
            <ul class="social_network">
              <li class="item-share-social-network">
                <figure>
                  <a href="">
                    <img id="btn_share_lk" alt="Logo Facebook" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-facebook.png" />
                  </a>
                </figure>
              </li>
              <li class="item-share-social-network">
                <figure>
                  <a href="">
                    <img  id="btn_share_fb" alt="Logo Twitter" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-twitter.png" />
                  </a>
                </figure>
              </li>
              <li class="item-share-social-network">
                <figure>
                  <a href="">
                    <img  id="btn_share_tw" alt="Logo Linkedin" src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/footer-linkedin.png" />
                  </a>
                </figure>
              </li>
            </ul>
          </section> <!-- share-social_network -->
        </div> <!-- content-home-news -->
