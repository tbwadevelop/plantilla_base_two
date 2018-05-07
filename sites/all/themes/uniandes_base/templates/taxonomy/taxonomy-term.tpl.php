<div class="content-master-8">
    <section class="tags_detail">
        <div class="container">
            <header class="title-tag">
                <p class='tag-result'>Contenidos con el tag:</p>
                <h1 class='tag-name'><?php print $term->name ?></h1>
            </header>

            <article  class="tags-list">
                <?php
                $array = array( $term->tid );
                $view = views_get_view('vista_lista_maestra_8');
                $view->set_display("block_1");
                $view->set_arguments($array);
                $view->pre_execute();
                $view->execute();
                print $view->render();
                ?>
            </article>
        </div>
    </section>

    <section class="block-views-vista-anuncios internal-news">
        <div class="container">
            <?php
            $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
            print render($block['content']);
            ?>
        </div>
    </section>
</div> <!-- content-master-8 -->
