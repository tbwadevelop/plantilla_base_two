<div class="content-master-9">
    <section class="top-information container">
        <article class="description-content">
            <header class="title_featured_news">
                <h1>Maestra 9</h1>
            </header>

            <div class='txt-content'>
                <?php
                if (!empty($node->field_texto_su_iz_m9)){
                    print $node->field_texto_su_iz_m9["und"][0]["value"];
                }
                ?>
            </div>
        </article>

        <article class="content-multimedia">
            <?php
            if (!empty($node->field_mapa_m9)){
                print $node->field_mapa_m9["und"][0]["value"];
            }
            ?>
        </article>
    </section> <!-- top-information -->


    <section class="bottom-information">
        <div class="container">
            <div class="item-informative">
                <div class="txt-informative">
                    <?php
                    if (!empty($node->field_texto_inf_iz_m9)){
                        print $node->field_texto_inf_iz_m9["und"][0]["value"];
                    }
                    ?>
                </div>
            </div>
            <div class="item-informative">
                <div class='txt-informative'>
                    <?php
                    if (!empty($node->field_texto_inf_cen_m9)){
                        print $node->field_texto_inf_cen_m9["und"][0]["value"];
                    }
                    ?>
                </div>
            </div>
            <div class="item-informative">
                <div class='txt-informative'>
                    <?php
                    if (!empty($node->field_texto_inf_der_m9)){
                        print $node->field_texto_inf_der_m9["und"][0]["value"];
                    }
                    ?>
                </div>
            </div>
        </div>
    </section> <!-- bottom-information -->
</div> <!-- content-master-9  -->
