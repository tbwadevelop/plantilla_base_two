<?php
$logoHTitle = variable_get('uniandes_custom_logo_header_title', 'Logo facultad');
$facultadHeader = file_load(variable_get('uniandes_custom_logo_header'));
$facultadHeaderUrl = ($facultadHeader) ? file_create_url($facultadHeader->uri) : false;
?>
<?php if($facultadHeaderUrl){ ?>
	<section id="faculty-menu" class="navbar-fixed-top">
		<div class="container">
			<figure>
				<img src="<?php print $facultadHeaderUrl ?>" alt="<?php echo $logoHTitle;?>" tittle="<?php echo $logoHTitle;?>">
			</figure>
		</div>
	</section>
<?php } ?>