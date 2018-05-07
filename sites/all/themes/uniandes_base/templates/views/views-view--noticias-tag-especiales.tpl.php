<?php 
$resultados=$view->result;
?>
<section class="internal_list_sepecial">  
    <?php
    if (!empty($resultados)){
        $i = 1;
        foreach ($resultados as $resultado_ind){
            $noticia = $resultado_ind->_field_data["nid"]["entity"];

            if (!empty($noticia->field_url_publicaciones["und"][0])) {
               $url=$noticia->field_url_publicaciones["und"][0]["url"];
               $target="target='_blank'";
           }else{
            $url=url( 'node/' . $noticia->nid, array('absolute' => true));
            $target="";
        }

        if( isset( $_GET[ "op" ] ) && $_GET[ "op" ] == 1 ){

            echo "<pre>";
            print_r( $noticia );
            echo "</pre>";

        }

        ?>

        <article class="internal_item_sepecial">
            <figure class="img-item_special">
                <a <?php print $target; ?> href="<?php  print $url ?>">
                    <img src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"] ?>">
                </a>
            </figure>

            <div class="txt-item_special">
                <p class="date_item_special"><?php echo date( "d/m/Y", $noticia->created ) ?></p>
                <h1 class="title-item_special">
                    <a <?php print $target; ?> href="<?php  print $url ?>"><?php print $noticia->title ?></a>
                </h1>
                <p class="txt_item_special"><?php 

                    $lenght=strlen($noticia->field_descripcion_corta_noticias["und"][0]["value"]);
                    if($lenght>=150){
                        $add="...";
                    }else{
                        $add="";
                    }
                    print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150).$add;

                    ?></p>
                    <a <?php print $target; ?> class="btn-default btn-border-grey view-item_special" href="<?php  print $url ?>" tabindex="-1"><?php echo t( "View more" ) ?></a>
                </div>
            </article>

            <?php
        }
    }
    ?>
</section> <!-- internal_list_sepecial -->
<?php 

print theme('pager');

?>