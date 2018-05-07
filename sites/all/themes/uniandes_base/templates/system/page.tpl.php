<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
global $language ;
global $user;

$instalacionCompleta=variable_get('final-install');

if ($instalacionCompleta==0) {
	if (!isset($_SESSION['install-step']) ) {	
	$_SESSION['install-step']=0;
	}
}



$color_1 = variable_get('uniandes_custom_color_primario', "#fff200");
$color_2 = variable_get('uniandes_custom_color_secundario', "#484851");

$request= $_SERVER['REQUEST_URI'];

$var=strpos($request, ".pdf");

if ($var === false) {
} else {
	$request=str_replace("/es/", "/", $request);
	header("location: ".$request);

}

$lang_name = $language->language ;
drupal_add_js(array('swflang' => $lang_name ), 'setting');


$btn_donar=strpos(drupal_get_path_alias(), "/donar");
$btn_donar_causas=strpos(drupal_get_path_alias(), "/causas/");


if($node->type == "causas" && $node->field_multimedia_noticias['und'][0]['value']==0){
	?>

	<section class="btn-fixed">
		<a class="btn-donar" onclick="boton_apoyar('hacer-la-donacion')" href="#">
			<p class="title desktop">Apoya</p>
			<p class="title mobile">Apoya</p>
			<figure class="campaing">
				<img src="<?php echo $base_path ?>sites/default/files/log-estacausa.png" alt="logo-apoyar-causa">
			</figure>
		</a>
	</section>

	<?php
}

if ($instalacionCompleta==0) {
$instalacion=$_SESSION['install-step'];
}else{
	$instalacion=5;
}


if ($instalacion!=5) {
	?>
	<button type="button" id="modal-install" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>
	<style>
		#myModal{
			    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-60%);
		}
	</style>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-center"><?php print "Universidad de los Andes"?></h1>
      </div>
      <div class="modal-body">
        <h4 id="install-description" class="text-center" style="margin-top: 20px">Importando contenido básico, por favor no cierre esta ventana</h4>
        <img  style="margin-bottom: 30px;" class="center-block" src="/sites/all/themes/uniandes_base/img/load.svg" alt="">
      </div>      
    </div>

  </div>
</div>
	<?php
}


switch ($instalacion) {
	case 0:
	$modules = array('cdi_import');
	$enable_dependencies = TRUE;
	module_enable($modules, $enable_dependencies);
	?>
<script>
	jQuery( document ).ready(function() {
	jQuery('#modal-install').click();
	jQuery('#install-description').html('Importanto la estructura de las taxonomias, por favor no cierre esta ventana');
	jQuery.ajax({
			type: "POST",
			url: Drupal.settings.basePath+'importar/estructura/taxonomias',
           data: {'1':'1'}, // Adjuntar los campos del formulario enviado.
           success: function(data)
           {  
           console.log(data);       
        	window.setTimeout('location.reload()', 5000);
           }
       });
	})
	</script>
	<?php

	break;

	case 1:
	?>
	
	<script>
	jQuery( document ).ready(function() {
	jQuery('#modal-install').click();
		jQuery('#install-description').html('Importanto la estructura de los tipos de contenido, por favor no cierre esta ventana');

	jQuery.ajax({
			type: "POST",
			url: Drupal.settings.basePath+'importar/estructura/contenidos',
           data: {'1':'1'}, // Adjuntar los campos del formulario enviado.
           success: function(data)
           {  
           console.log(data);       
        	window.setTimeout('location.reload()', 5000);
           }
       });
	})
	</script>

	<?php
		
	break;

	case 2:
		
?>
	
	<script>
	jQuery( document ).ready(function() {
	jQuery('#modal-install').click();
		jQuery('#install-description').html('Creando Taxonomias y Contenido Básico, por favor no cierre esta ventana');

	jQuery.ajax({
			type: "POST",
			url: Drupal.settings.basePath+'importar/contenido/completo',
           data: {'1':'1'}, // Adjuntar los campos del formulario enviado.
           success: function(data)
           {      
           console.log(data);   
        	window.setTimeout('location.reload()', 5000);
           }
       });
	})
	</script>

	<?php
	
	break;

	case 3:
	
	?>
	
	<script>
	jQuery( document ).ready(function() {
	jQuery('#modal-install').click();
		jQuery('#install-description').html('Configurando la estructura del home, por favor no cierre esta ventana');
	jQuery.ajax({
			type: "POST",
			url: Drupal.settings.basePath+'configurar/bloques',
           data: {'1':'1'}, // Adjuntar los campos del formulario enviado.
           success: function(data)
           {         
        	window.setTimeout('location.reload()', 5000);
           }
       });
	})
	</script>

	<?php
		
	break;

	case 4:
		
  $_SESSION['install-step']=5;
  variable_set('final-install', 1);
	?>
<script>
	jQuery( document ).ready(function() {		     
	jQuery('.modal').css('transform','translate(-50%,-90%)');
	jQuery('#modal-install').click();
	jQuery('.modal-body').html("<h4 class=text-center>Bienvenido</h4><p class=text-center>El sitio se ha instalado correctamente, por favor de click al siguiente botón y personalice su sitio</p><a class='center-block btn btn-success' href=/admin/config/uniandes_settings>Personalizar</a>");
	})
	</script>

	<?php
	break;
	
	default:
		
		break;
}


$contacto_sf=strpos($_SERVER['REQUEST_URI'], "donaciones/contacto");

if ($contacto_sf !== false) {
	?>

	<script>
		jQuery( document ).ready(function() {
			jQuery("#alert-form").click();
		});
	</script>

	<button type="button" id="alert-form" class="btn btn-primary" data-toggle="modal" data-target=".alert-contact-form" hidden>Enviar</button>


	<div class="modal fade alert-contact-form" tabindex="-1" role="dialog" aria-labelledby="modalAlert">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<h2>Gracias</h2>
					<p>Hemos recibido tus datos. Nos contactaremos contigo pronto.</p>
				</div>
			</div>
		</div>
	</div>

	<?php 
}
?>
		
			<?php print render($page['header']); ?>
			<!-- /#page-header -->
			
			<?php if (!empty($page['sidebar_first'])): ?>
				<aside class="col-sm-3" role="complementary">
					<?php print render($page['sidebar_first']); ?>
				</aside>
			<?php endif; ?>
			
			<?php if (!empty($page['highlighted'])): ?>
				<?php print render($page['highlighted']); ?>
			<?php endif; ?>
			
			<?php
			if (!empty($breadcrumb)){
				$GLOBALS["breadcrumb"] = $breadcrumb;
			}
				//if (!empty($breadcrumb)): print $breadcrumb; endif;
			?>
			<!--<div class="region region-content">-->
			<?php print render($page['content']); ?>
			<!--</div>-->
			
			<?php if (!empty($page['sidebar_second'])): ?>
				<aside class="col-sm-3" role="complementary">
					<?php print render($page['sidebar_second']); ?>
				</aside>
				<!-- /#sidebar-second -->
			<?php endif; ?>
			
			<?php  if (!empty($page['footer'])): ?>
				<?php print render($page['footer']); ?>
			<?php endif; ?>

		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '146668572579647',
					xfbml      : true,
					version    : 'v2.3'
				});
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_LA/all.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>