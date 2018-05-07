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
        <article class="item-list-master-11">
            <h3><?php 

            $title = $item->title;

            if( strlen($title) > 49 ){
                echo substr($title, 0, 48);
            }else{
                echo $title;
            }

             ?></h3>
            <img src="<?php print file_create_url( $item->field_imagen_principal_im11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $item->field_imagen_principal_im11["und"][0]["alt"] ?>" title="<?php print $item->field_imagen_principal_im11["und"][0]["title"] ?>" >
            <div class="content-list">
                <p><?php print drupal_substr($item->field_texto_principal_im11["und"][0]["value"],0,144)?></p>
                <?php
                $url_boton = "";
                $texto_boton = "Ver más";
                $target = "";
                if (!empty($item->field_boton_im11)){
                    $url_boton = $item->field_boton_im11["und"][0]["url"];
                    $texto_boton = $item->field_boton_im11["und"][0]["title"];


                    if (strpos($url_boton,'https') !== false || strpos($url_boton,'http') !== false){
                        $target = $item->field_boton_im11["und"][0]["attributes"]["target"];
                    }
                    else{
                        $url_boton = $base_url ."/".$language->language . "/" . $url_boton . "/";

                    }
                }
                else{
                    $url_boton = url( 'node/' . $item->nid, array('absolute'=>true));
                }
                ?>
                <a target="<?php print $target?>" class="btn-default btn-border-grey view-list-master-11" href="<?php print $url_boton?>"><?php print t($texto_boton) ?></a>
            </div>
        </article>
        <?php }} ?>