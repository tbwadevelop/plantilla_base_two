<?php
global $base_url;
global $language;
$resultados = $view->result;
?>


<?php
if (!empty($resultados)){
  foreach ($resultados as $resultado_ind){
    $item = $resultado_ind->_field_data["nid"]["entity"];
    ?>
    <div class="tag-item">
      <figure class="tag-image">
      <a href="<?php print url( 'node/' . $item->nid, array('absolute' => true)) ?>">
        <img src="<?php print file_create_url($item->field_imagen_miniatura_noticias['und'][0]['uri']) ?>" alt="<?php print $item->field_imagen_miniatura_noticias['und'][0]['alt']?>" title="<?php print $item->field_imagen_miniatura_noticias['und'][0]['title']?>">
        </a>
      </figure> <!-- tag-image -->

      <div class="tag-text">
       <p class='tag-date'><?php print format_date(strtotime($item->field_fecha_creacion_noticias["und"][0]["value"]) ,'custom','j/m/Y'); ?></p>
       <h2 class="tag-title"><a href="<?php print url( 'node/' . $item->nid, array('absolute' => true)) ?>"><?php echo $item->title ?></a></h2>
       <p><?php echo $item->field_descripcion_corta_noticias["und"][0]["value"] ?></p>
     </div> <!-- tag-text -->
     </div>
   <?php }} ?>