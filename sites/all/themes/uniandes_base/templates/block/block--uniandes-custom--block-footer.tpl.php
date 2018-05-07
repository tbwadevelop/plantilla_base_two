<?php
global $language;
global $base_path;
$idioma = $language->language;
?>
<footer>
	<div class="container">
		<article class="item-footer contact-info">
			<div class="logos">
				<figure class="logo-andes">
					<img src="/sites/all/themes/uniandes_base/img/logo-andes.svg" alt="Universidad de los Andes">
				</figure>
				<?php
				$logoFTitle = variable_get('uniandes_custom_logo_footer_title', 'Logo facultad');
				$facultadFooter = file_load(variable_get('uniandes_custom_logo_footer'));
				$facultadFooterUrl = ($facultadFooter) ? file_create_url($facultadFooter->uri) : false;
				?>
				<?php if($facultadFooterUrl){ ?>
					<figure class="logo-facultad">
						<img src="<?php print $facultadFooterUrl ?>" alt="<?php echo $logoFTitle;?>" tittle="<?php echo $logoFTitle;?>">
					</figure>
				<?php } ?>
			</div>
			<div class="item-footer-x2">
				<div class="info-location">
					<?php 
					//Dirección
					$footerAddress = variable_get('uniandes_custom_footer_address');
					$footerAddress = explode('|', $footerAddress);
					foreach($footerAddress as $addressLine){
						echo "<p>{$addressLine}</p>";
					}
					//Código postal
					$postCode = variable_get('uniandes_custom_footer_postcode', '111711');
					$labelPostcode = ($idioma == "es") ? 'Código postal' : 'Postal code';
					echo "<p>{$labelPostcode}: {$postCode}</p>";
					?>
				</div>
				<div class="info-contact">
					<div class="txt-telephone">
						<?php
						//teléfonos
						$phones = variable_get('uniandes_custom_footer_phones', '(571) 332 49 49|(571) 339 49 49');
						$phones = explode('|', $phones);
						foreach($phones as $phone){
							$cleanNumer = $phone;
							echo "<p><a href='tel:+{$cleanNumer}'><span>+</span>{$phone}</a></p>";
						}
						?>
					</div>
				</div>
			</div>
		</article>
		<article class="item-footer quick-links">
			<div class="item-footer-x2">
				<?php 
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
								if(empty($child['options']['attributes']['target'])) {
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
					$english= t('Social Networks', array(), array('langcode' => 'en'));
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
					<?php if(variable_get('uniandes_social_facebook', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_facebook')?>" target="_blank" class="link-social-network">
							<img alt="Facebook" src="/sites/all/themes/uniandes_base/img/footer-facebook.png" title="Facebook">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_twitter', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_twitter')?>" target="_blank"  class="link-social-network">
							<img alt="twitter" src="/sites/all/themes/uniandes_base/img/footer-twitter.png" title="twitter" >
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_youtube', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_youtube')?>" target="_blank"  class="link-social-network">
							<img alt="youtube" src="/sites/all/themes/uniandes_base/img/footer-youtube.png" title="youtube">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_linkedin', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_linkedin')?>" target="_blank"  class="link-social-network">
							<img alt="linkedin" src="/sites/all/themes/uniandes_base/img/footer-linkedin.png" title="linkedin">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_instagram', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_instagram')?>" target="_blank"  class="link-social-network">
							<img alt="instagram" src="/sites/all/themes/uniandes_base/img/footer-instagram.png" title="instagram">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_snapchat', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_snapchat')?>" target="_blank"  class="link-social-network">
							<img alt="snapchat" src="/sites/all/themes/uniandes_base/img/footer-snapchat.png" title="snapchat">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_vimeo', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_vimeo')?>" target="_blank"  class="link-social-network">
							<img alt="vimeo" src="/sites/all/themes/uniandes_base/img/footer-vimeo.png" title="vimeo">
						</a>
					</li>
					<?php } ?>
					<?php if(variable_get('uniandes_social_google', '') !== ''){ ?>
					<li>
						<a class="link-social-network" href="<?php echo variable_get('uniandes_social_google')?>" target="_blank"  class="link-social-network">
							<img alt="google" src="/sites/all/themes/uniandes_base/img/footer-google.png" title="google">
						</a>
					</li>
					<?php } ?>
				</ul>
				<?php 
				$english=t('Social Media Directory', array(), array('langcode' => 'en'));
				$spanish=t('Social Media Directory', array(), array('langcode' => 'es'));
				if ($idioma=="es"){ ?>
					<p class="network-directory-footer">
						<a class="directorio-redes" href="/directorio-redes-sociales">
							<?php 
							if($english==$spanish){
								print "Directorio de redes";
							}else{
								print $spanish;
							}
							?>
						</a>
					</p>
				<?php }else{ ?>
					<p class="network-directory-footer"><a class="directorio-redes" href="/en/social-media-directory/"><?php print $english ?></a></p>
				<?php } ?>
			</div>
		</article>
	</div>
</footer>
<footer class="legal-text">
	<div class="container">
		<?php 
		$extra = variable_get('uniandes_custom_footer_extra', '');
		if($extra !== ''){
			$extra = explode("\n", $extra);
			$extra = array_filter($extra, 'trim');
			echo '<article class="legal-txt">';
			foreach($extra as $ext){
				echo "<p>{$ext}</p>";
			}
			echo '</article>';
		}
		$copy = variable_get("uniandes_custom_footer_copyright", '');
		if($copy !== ''){
		?>
			<article class="copy-right">
				<p><?php echo $copy; ?></p>
			</article>
		<?php }?>
	</div>
</footer>