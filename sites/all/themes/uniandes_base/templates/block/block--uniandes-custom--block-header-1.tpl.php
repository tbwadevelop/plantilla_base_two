<?php
global $language;
$lang_name = $language->language ;
?>
<section id="menu-soy" class="navbar-fixed-top">
	<div class="container">
		<?php 
		//menú back - INICIO
		$block = module_invoke('uniandes_custom', 'block_view', 'menu-back');
		print render($block['content']);
		//menú back - FIN
		?>
		<nav class="menu-soy">
			<span class="menu_soy">
				<?php 
				//label SOY - INICIO
				$block = module_invoke('uniandes_custom', 'block_view', 'label-soy');
				print render($block['content']);
				//label SOY - INICIO
				?>
			</span>
			<ul class="menu-nav">
				<?php
				//menú SOY - INICIO
				$block = module_invoke('uniandes_custom', 'block_view', 'menu-soy');
				print render($block['content']);
				//menú SOY - INICIO
				?>
				<?php
				//selector de idioma desk - INICIO
				$block = module_invoke('uniandes_custom', 'block_view', 'idioma-desk');
				print render($block['content']);
				//selector de idioma desk - INICIO
				?>
			</ul>
		</nav>
	</div>
</section>