<section class="internal_specials">
    <article class="slider_specials">
        <div class="internal_slider-image">
            <figure class="img-desktop">
                <?php if (!empty($node->field_imagen_especial)){ ?>
                <img src="<?php print file_create_url( $node->field_imagen_especial["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_especial["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_especial["und"][0]["title"] ?>" >
                <?php } ?>
            </figure>

            <figure class="img-mobile">
                <?php if (!empty($node->field_imagen_mobile_especiales)){ ?>
                <img src="<?php print file_create_url( $node->field_imagen_mobile_especiales["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_especiales["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_especiales["und"][0]["title"] ?>" >
                <?php } ?>
            </figure>
        </div>

        <div class="content_slider container">
            <div class="txt_banner">
                <div class="internal_social-network">
                    <ul>
                        <li><a href=""><img id="btn_share_fb_not" src="/sites/all/themes/uniandes_base/img/facebook_int.jpg"></a></li>
                        <li><a href=""><img id="btn_share_tw" src="/sites/all/themes/uniandes_base/img/twitter_int.jpg"></a></li>
                        <li><a href=""><img id="btn_share_lk" src="/sites/all/themes/uniandes_base/img/linkedin_int.jpg"></a></li>
                    </ul>
                </div> <!-- internal_social-network -->

                <?php if (!empty($node->field_titulo_sup_peq_especiales)){
                    $titulo_sup = $node->field_titulo_sup_peq_especiales["und"][0]["value"];
                    ?>
                    <p class="texto1"><?php print $titulo_sup ?></p>
                    <?php 
                } 
                ?>
                <h1><?php print $node->title ?></h1>
                <?php if (!empty($node->field_titulo_inf_peq_especiales)){
                   
                    $titulo_inf = $node->field_titulo_inf_peq_especiales["und"][0]["value"];
                    ?>
                    <p class="texto2"><?php print $titulo_inf ?></p>
                    <?php } ?>
                    <?php if (!empty($node->field_subtitulo_especial)) {

                        $cadena = drupal_substr($node->field_subtitulo_especial["und"][0]["value"],0,200);
                        ?>
                        <p class="descripcion-corta"><?php print $cadena ?></p>
                        <?php 
                    } 
                    ?>
                </div> <!-- txt_banner -->

                <div class="scroll-item">
                    <p>Scroll</p>
                    <img src="/sites/all/themes/uniandes_base/img/scroll-icon.png" class='scroll-icon'>
                </div>
            </div> <!-- content-slider -->
        </article> <!-- slider_specials -->
        <section class="breadcrumb">
          <article class="container">
            <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>

            <span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
            <?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
        </article>
    </section>

    <?php
    if (!empty($GLOBALS["breadcrumb"])){
        $breadcrumb = $GLOBALS["breadcrumb"];
        print $breadcrumb;
    }
    ?>

    <article class="specials_content-description container">          
        <div class="txt-column">
            <?php if (!empty($node->field_texto_izquierda_especial)){ ?>
            <p> <?php print $node->field_texto_izquierda_especial["und"][0]["value"] ?> </p>
            <?php }?>
        </div>

        <div class="txt-column">
            <?php if (!empty($node->field_texto_derecha_especial)){ ?>
            <p>  <?php print $node->field_texto_derecha_especial["und"][0]["value"] ?> </p>
            <?php }?>
        </div>

        <ul class='tags_list-specials'>
            <?php
            if (!empty($node->field_tag_especial)){
                $array_tags = $node->field_tag_especial["und"];
                $tags_finales = array();
                if (count($array_tags)<3){
                    foreach ($array_tags as $tag_ind){
                        array_push($tags_finales,$tag_ind);
                    }
                }
                else{
                    for ($i = 0; $i<3;$i++){
                        array_push($tags_finales,$array_tags[$i]);
                    }
                }

                foreach ($tags_finales as $tag_ind_fin){
                    $tag = $tag_ind_fin["taxonomy_term"];
                    ?>
                    <li><?php print $tag->name ?></li>
                    <?php } } ?>
                </ul> <!-- tags_list-specials -->
            </article> <!-- specials_content-description -->


            <?php

            $titles = $node->field_titulos_meta_tags["und"][0]["value"];
            $titles = explode( ",", $titles );



            if (!empty($tags_finales)){

              $i=0;
              foreach ($tags_finales as $tag_ind_fin){
                $tag = $tag_ind_fin["taxonomy_term"];
                ?>
                <section class="internal_list-specials container">
                    <div class="tabs-especiales">
                       <p><?php print $titles[$i]; $i++; ?></p>
                   </div>
                   <div class="list_specials">
                    <?php

                    $numero = 0;
                    if (count($tags_finales) == 1){
                        $numero = 12;
                    }
                    if (count($tags_finales) == 2){
                        $numero = 4;
                    }
                    if (count($tags_finales) == 3){
                        $numero = 4;
                    }

                    $array_tag_1 = array($tag->tid);
                    $view_tag_1 = views_get_view('noticias_tag_especiales');
                    $view_tag_1->set_display("block");
                    $view_tag_1->set_arguments($array_tag_1);
                    $view_tag_1->set_items_per_page($numero);
                    $view_tag_1->pre_execute();
                    $view_tag_1->execute();

                    print $view_tag_1->render();
                    ?>

                </div>
            </section>
            <?php 
        } 
    }
    ?>
</section>
