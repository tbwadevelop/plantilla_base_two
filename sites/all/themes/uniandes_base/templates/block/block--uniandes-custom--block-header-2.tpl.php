<?php
//logo responsive - INICIO
$block = module_invoke('uniandes_custom', 'block_view', 'top-logo-resp');
print render($block['content']);
//logo responsive - FIN
?>
<nav class="navbar navbar-default nav-faculty navbar-fixed-top">
	<div class="container">
		<div class="navbar-header bg_base border_base">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php
			//logos - INICIO
			$block = module_invoke('uniandes_custom', 'block_view', 'logos');
			print render($block['content']);
			//logos - FIN
			?>
		</div> <!-- navbar-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<?php
			//buscador-boton - INICIO
			$block = module_invoke('uniandes_custom', 'block_view', 'buscador-boton');
			print render($block['content']);
			//buscador-boton - FIN
			?>
			<ul class="nav navbar-nav">
				<?php
				//menú back - INICIO
				$block = module_invoke('uniandes_custom', 'block_view', 'main-menu');
				print render($block['content']);
				//menú back - FIN
				?>
			</ul>
		</div> <!-- navbar-digital-guidelines -->
	</div> <!-- container -->	
	<?php
	//buscador-form - INICIO
	$block = module_invoke('uniandes_custom', 'block_view', 'buscador-form');
	print render($block['content']);
	//buscador-form - FIN
	?>
	<?php
	//menu-back-mob - INICIO
	$block = module_invoke('uniandes_custom', 'block_view', 'menu-back-mob');
	print render($block['content']);
	//menu-back-mob - FIN
	?>
	<?php 
	//idioma-mob - INICIO
	$block = module_invoke('uniandes_custom', 'block_view', 'idioma-mob');
	print render($block['content']);
	//idioma-mob - FIN
	?>
</nav>