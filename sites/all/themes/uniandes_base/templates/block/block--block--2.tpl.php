<footer>
  <div class="container">
    <article class="item-footer contact-info">

      <div class="logos">
        <figure class="logo-andes">
          <img src="/sites/all/themes/uniandes_base/img/logo-andes.svg" alt="Universidad de los Andes - Logo">
        </figure>

        <figure class="logo-facultad">
          <img src="/sites/all/themes/uniandes_base/img/logo-facul-white.png" alt="logo_facultad" tittle="Logo_facultad">
        </figure>
      </div>

      <div class="item-footer-x2">
        <div class="info-location">
          <p>Cra 1 Nº 18A - 12</p>                     
          <p>Bogotá - Colombia</p>

          <p><?php
           global $language;
           $english=t('Postal code', array(), array('langcode' => 'en'));
           $spanish= t('Postal code', array(), array('langcode' => 'es'));
           $idioma=$language->language;

           if ($idioma=="es") {
            if($english==$spanish){
              print "Código postal";
            }else{
              print $spanish;
            }
          }else{
            print $english;
          }
          
          ?>: 111711</p>
        </div>

        <div class="info-contact">
          <div class="txt-telephone">
            <p><a href="tel:+5713394949"><span>+</span>(571) 332 49 49</a></p>
            <p><a href="tel:+5713394949"><span>+</span>(571) 339 49 49</a></p>            
          </div>
        </div>
      </div>
    </article>

    <article class="item-footer quick-links">
      <div class="item-footer-x2">

        <?php 
        global $language;

        $idioma=$language->language;

        if ($idioma=="es") {
          $menu = menu_tree_all_data( "menu-menu-footer-principal");
        }else{
          $menu = menu_tree_all_data( "menu-menu-footer-principal-ingle");
        }
        foreach( $menu as $item ){ 
          $child = $item[ "link" ];     
          ?>

          <div class="item-normatividad">
            <h1><?php print $child[ "link_title" ] ?></h1>
            <ul class="list-footer">
              <?php foreach( $item[ "below" ] as $child ){ 
                $child = $child[ "link" ];
                if (empty($child['options']['attributes']['target'])) {
                  $child['options']['attributes']['target']="_self";
                }
                if ($child['href']=="<front>") {
                  $child['href']="/".$idioma;
                }
                ?>

                <li class="link-item-footer">
                <a target="<?php print $child['options']['attributes']['target'] ?>" class="link-item-footer" href="<?php print $child[ "href" ] ?>"><?php print $child[ "link_title" ] ?></a>
            
            </li>

                  <?php } ?>  
                </ul>
              </div>
              <?php 
            }
            ?>
            
          </div>
        </article>

        <article class="item-footer s_networks">
          <div class="footer-social-network">
            <h1><?php 

             $english=t('Social Networks', array(), array('langcode' => 'en'));
             $spanish= t('Social Networks', array(), array('langcode' => 'es'));

             if ($idioma=="es") {
              if($english==$spanish){
                print "Redes sociales";
              }else{
                print $spanish;
              }
            }else{
              print $english;
            }


            ?>
            




          </h1>
          <ul>
            <li>
              <a class="link-social-network" href="https://www.facebook.com/pages/Universidad-de-los-Andes/312867483159" target="_blank" class="link-social-network">
                <img alt="Facebook" src="/sites/all/themes/uniandes_base/img/footer-facebook.png" title="Facebook">
              </a>
            </li>
            <li>
              <a class="link-social-network" href="https://twitter.com/Uniandes" target="_blank"  class="link-social-network">
                <img alt="twitter" src="/sites/all/themes/uniandes_base/img/footer-twitter.png" title="twitter" >
              </a>
            </li>
            <li><a class="link-social-network" href="https://www.youtube.com/user/uniandes" target="_blank"  class="link-social-network">
              <img alt="youtube" src="/sites/all/themes/uniandes_base/img/footer-youtube.png" title="youtube">
            </a>
          </li>
          <li>
            <a class="link-social-network" href="https://www.linkedin.com/company/universidad-de-los-andes" target="_blank"  class="link-social-network">
              <img alt="linkedin" src="/sites/all/themes/uniandes_base/img/footer-linkedin.png" title="linkedin">
            </a>
          </li>
          <li>
            <a class="link-social-network" href="http://instagram.com/uniandes" target="_blank"  class="link-social-network">
              <img alt="instagram" src="/sites/all/themes/uniandes_base/img/footer-instagram.png" title="instagram">
            </a>
          </li>
          <li>
            <a class="link-social-network" href="https://www.snapchat.com/add/uniandescol" target="_blank"  class="link-social-network">
              <img alt="snapchat" src="/sites/all/themes/uniandes_base/img/footer-snapchat.png" title="snapchat">
            </a>
          </li>
          <li>
            <a class="link-social-network" href="https://vimeo.com/uniandes" target="_blank"  class="link-social-network">
              <img alt="vimeo" src="/sites/all/themes/uniandes_base/img/footer-vimeo.png" title="vimeo">
            </a>
          </li>
          <li>
            <a class="link-social-network" href="https://plus.google.com/+uniandes/posts" target="_blank"  class="link-social-network">
              <img alt="google" src="/sites/all/themes/uniandes_base/img/footer-google.png" title="google">
            </a>
          </li>
        </ul>
        <?php 
        $english=t('Social Media Directory', array(), array('langcode' => 'en'));
        $spanish= t('Social Media Directory', array(), array('langcode' => 'es'));

        

        if ($idioma=="es") {
          ?>
          <p class="network-directory-footer"><a class="directorio-redes" href="/es/directorio-redes-sociales">

            <?php 
            if($english==$spanish){
              print "Directorio de redes";
            }else{
              print $spanish;
            }
            
            ?>
          </a></p>
          <?php 
        }else{
          ?>
          <p class="network-directory-footer"><a class="directorio-redes" href="/en/social-media-directory/"><?php print $english ?></a></p>          
          <?php 
        }
        ?>
      </div>
    </article>
  </footer>


  <footer class="legal-text">
    <div class="container">
      <article class="legal-txt">
        <p>Universidad de los Andes | Vigilada Mineducación</p>
        <p>Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964.</p>
        <p>Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 Minjusticia.</p>
      </article>
      <article class="copy-right">
        <p>© - Derechos Reservados Universidad de los Andes</p>
      </article>
    </div>
  </footer>