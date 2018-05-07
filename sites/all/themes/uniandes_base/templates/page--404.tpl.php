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








<section id="menu-soy">
	<div class="container">
		<div class="btn-back">
			<?php 
			if ($lang_name=="es") {
			$menu = menu_tree_all_data( "menu-menu-top-volver");
			}else{
			$menu = menu_tree_all_data( "menu-top-volver-ingles");

			}
			foreach( $menu as $item ){
				$child = $item[ "link" ];
				echo l( $child[ "link_title" ],$child[ "link_path" ], array( "class" => "dropdown-toggle" ) ) ;
			}
			?>
			<?php 
			$menu = menu_tree_all_data( "menu-menu-top-soy");
			?>
		</div>

		<nav class="menu-soy">
			<span class="menu_soy">
			<?php 
			$i_am_es=t('I am:', array(), array('langcode' => 'es'));
 			$i_am_en=t('I am:', array(), array('langcode' => 'en'));

 			if ($lang_name=="es") {

  if($i_am_es==$i_am_en){
        print "Soy:";
    }else{
        print $i_am_es;
    }
    }else{        
    	Print $i_am_en;
        }
		

			?>
				

			</span>
			<ul class="menu-nav">
				<?php
				foreach( $menu as $item ){
					$child = $item[ "link" ];
					?>

					<li class="item-menu">
						<?php echo l( $child[ "link_title" ],$child[ "link_path" ], array( "class" => "dropdown-toggle" ) ) ?>
					</li>
					<?php
				}
				?>
				<div class="styled-select">
					<p class="idioma-select">Esp</p>
					<ul class="select-language" id="select-idioma">
						<li data-leng="Esp" data-url="/es" class="active">Español</li>
						<li data-leng="Eng" data-url="/en">English</li>
					</ul>
				</div>
			</ul>
		</nav>
	</div>
</section>
		<?php 	
		$facultadHeader=file_load(variable_get('uniandes_custom_logo_header'));
		$logoHTitle = variable_get('uniandes_custom_logo_header_title', 'Logo facultad');
		$facultadHeader=file_create_url($facultadHeader->uri);
		?>
<section id="faculty-menu">
	<div class="container">
		<figure>
			<img src="<?php print $facultadHeader ?>" alt="<?php echo $logoHTitle;?>" tittle="<?php echo $logoHTitle;?>">
		</figure>
	</div>
</section>


<nav class="navbar navbar-default nav-faculty">
	<div class="container">
		<div class="navbar-header bg_base border_base">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="<?php echo $base_path ?>">
				<svg xmlns="http://www.w3.org/2000/svg" id="logo-andes" data-name="logo andes" viewBox="0 0 620 239" style="
				fill: #<?php echo $color_2 ?>;"><defs></defs><title>UniversidadDeLosAndes+Colombia</title><path class="cls-1" d="M145.71,166.15c-32.12,20.84-65.48,19.7-65.48,19.7a49.17,49.17,0,0,1-.55-11.59C80,166.92,84.05,169,87,163.19a48.52,48.52,0,0,0,3.6-8.49c.07-.21-1.93-35.36-2.43-50.28-.27-8-1.79-21.45-3.56-34.49-1-7.73-3.39-13.86-4.48-21.19-1.57-10.6-3.39-22.55-3.39-22.55-1.31,3.37-3.18,16-5.06,30.25-.9,6.83-1.81,14-2.65,20.78-1.78,14.28-6.24,52.5-6.92,54.57-1,3.14-1.12-.83-1.12-.83s2.64-40.08,3.43-57.67c.39-8.59,1-18,2.11-27.1a186.36,186.36,0,0,1,3.2-19.25s4.6-13.87,6.06-14.14,6.76,8.74,8.55,16.76C88.34,47.68,90.72,50,93.81,69c2.94,18.08,5.62,33.21,6,35.68,1.31,9,.66,37-1.6,48.11-.54,3-.7,4.16-2.68,6.17-4.66,4.71-8,10.32-8,14s-.62,3.6.26,5.73c0,0,6.14,9.19,41.42-11.85,0,0,11-5.77,11-18.53v-129s-35-11.83-61.94-11.83-60.7,11.81-60.7,11.81v128.4c0,7.9,1.16,22.73,12.44,27.78,0,0-30.05-10.28-30.05-27.94V8.44S45.88,0,78.33,0s79.15,8.44,79.15,8.44V147.76C157.48,159.76,145.71,166.15,145.71,166.15Z"></path><path class="cls-1" d="M581.69,58.37q-4.8,2.67-12.93,2.68c-5.45,0-9.7-1.65-12.72-5s-4.54-7.92-4.54-13.84S553,31.55,556,28a14.69,14.69,0,0,1,11.7-5.09,19.25,19.25,0,0,1,5.57.71v-15h8.37Zm-8.37-3.53V28.15a13.28,13.28,0,0,0-3.71-.48q-9.78,0-9.77,14.1,0,13.91,9.15,13.91A8.43,8.43,0,0,0,573.32,54.85Z"></path><path class="cls-1" d="M620,41.57l-22.72,3.3q1,10.31,10.12,10.31a20.43,20.43,0,0,0,9.35-2l2,5.29q-4.75,2.61-12.24,2.61-8,0-12.59-5t-4.62-14.31q0-9,4.23-14.07t11.59-5.05q7.44,0,11.29,4.85T620,41.57Zm-7.85-3.29q0-10.52-7.32-10.52a6.7,6.7,0,0,0-5.92,3.1c-1.51,2.24-2.23,5.5-2.13,9.76Z"></path><path class="cls-1" d="M197.89,159.31H184.73V77.93h13.17Z"></path><path class="cls-1" d="M258.62,130.29q0,13.47-5.94,21.45-6.48,8.62-18.23,8.62t-18.23-8.62q-5.94-8-5.94-21.45t5.94-21.57q6.46-8.62,18.23-8.63t18.23,8.63Q258.61,116.7,258.62,130.29Zm-13.06-.11q0-21.78-11.11-21.79t-11.1,21.79q0,21.24,11.1,21.25T245.56,130.19Z"></path><path class="cls-1" d="M303.74,142.58A16.27,16.27,0,0,1,298,155.09q-5.72,5.18-15,5.17-9.93,0-16.07-4.19l3.45-8.41q4.22,3.35,10.9,3.34a9.13,9.13,0,0,0,6.48-2.32,7.7,7.7,0,0,0,2.48-5.88,8.16,8.16,0,0,0-1.94-5.76,17.16,17.16,0,0,0-6.58-3.84q-13.27-5.06-13.26-16.28a15.86,15.86,0,0,1,5.12-12q5.12-4.85,13.31-4.86A26.92,26.92,0,0,1,302,104.2l-3.23,7.66a14.24,14.24,0,0,0-9.27-3.25,8.21,8.21,0,0,0-6.07,2.21,7.41,7.41,0,0,0-2.21,5.45q0,5.71,8.62,9.16Q303.73,131,303.74,142.58Z"></path><path class="cls-1" d="M400.84,159.31H385.47l-6.22-20.74h-26l-6.45,20.74H333.42l26.74-80.67h14.06Zm-23.69-29.42-8.32-28.41a54.07,54.07,0,0,1-2.11-9.74h-.23c-.39,2.11-1.14,5.35-2.24,9.74l-8.67,28.41Z"></path><path class="cls-1" d="M455,159.31H441.79v-41.2q0-9.72-10.44-9.71a24.47,24.47,0,0,0-9.06,1.62v49.29H409.12v-55q9-4.2,22.75-4.21,12.21,0,18,5.39Q455,110,455,117.9Z"></path><path class="cls-1" d="M514.29,156.17q-7.55,4.2-20.28,4.2t-20-7.76q-7.11-7.77-7.11-21.68T474,108.61q6.92-8,18.35-8a30.93,30.93,0,0,1,8.75,1.09V78.19h13.16Zm-13.16-5.5V108.84a20.7,20.7,0,0,0-5.83-.76q-15.33,0-15.32,22.1Q480,152,494.34,152C497.5,152,499.76,151.54,501.13,150.67Z"></path><path class="cls-1" d="M574.19,129.86l-35.6,5.19q1.61,16.17,15.85,16.17A31.55,31.55,0,0,0,569.12,148l3.13,8.28q-7.44,4.11-19.2,4.1-12.51,0-19.74-7.87t-7.23-22.42q0-14.13,6.63-22.06t18.17-7.93q11.67,0,17.7,7.61T574.19,129.86Zm-12.32-5.18q0-16.5-11.43-16.5a10.51,10.51,0,0,0-9.28,4.85q-3.56,5.29-3.34,15.31Z"></path><path class="cls-1" d="M619.43,142.58a16.28,16.28,0,0,1-5.72,12.51q-5.71,5.18-15,5.17-9.92,0-16.07-4.19l3.44-8.41Q590.29,151,597,151a9.07,9.07,0,0,0,6.46-2.32,7.66,7.66,0,0,0,2.49-5.88A8.17,8.17,0,0,0,604,137a17.18,17.18,0,0,0-6.58-3.84q-13.27-5.06-13.27-16.28a15.84,15.84,0,0,1,5.12-12q5.13-4.85,13.32-4.86a26.9,26.9,0,0,1,15.09,4.1l-3.23,7.66a14.23,14.23,0,0,0-9.26-3.25,8.24,8.24,0,0,0-6.08,2.21,7.43,7.43,0,0,0-2.2,5.45q0,5.71,8.62,9.16Q619.42,131,619.43,142.58Z"></path><path class="cls-1" d="M254.17,60.5h-8.38V34.2q0-6.19-6.67-6.2a15.52,15.52,0,0,0-5.78,1V60.5H225V25.4q5.7-2.68,14.51-2.69,7.77,0,11.47,3.44a10.07,10.07,0,0,1,3.23,7.91Z"></path><path class="cls-1" d="M272.24,12.85a3.79,3.79,0,0,1-1.34,2.93,5,5,0,0,1-6.54,0A3.8,3.8,0,0,1,263,12.85a3.89,3.89,0,0,1,1.34-3,4.64,4.64,0,0,1,3.27-1.24,4.75,4.75,0,0,1,3.27,1.2A3.86,3.86,0,0,1,272.24,12.85ZM271.8,60.5h-8.38V23.4h8.38Z"></path><path class="cls-1" d="M310,23.4,298.1,60.5h-8L278,23.4H287l6.54,23.94a23.92,23.92,0,0,1,.9,5.09h.13q.35-2,1-5.09l6.68-23.94Z"></path><path class="cls-1" d="M345.16,41.69,322.45,45q1,10.32,10.11,10.31a20.45,20.45,0,0,0,9.36-2l2,5.28q-4.75,2.62-12.25,2.61-8,0-12.6-5t-4.61-14.3q0-9,4.24-14.07t11.59-5.06q7.43,0,11.29,4.85T345.16,41.69Zm-7.84-3.29q0-10.53-7.31-10.53A6.71,6.71,0,0,0,324.08,31q-2.27,3.38-2.14,9.78Z"></path><path class="cls-1" d="M370.66,22.76,369,28.9a12.21,12.21,0,0,0-3.87-.61,8,8,0,0,0-4,.9V60.5h-8.38V25.38Q358.91,22.42,370.66,22.76Z"></path><path class="cls-1" d="M397.41,49.83a10.41,10.41,0,0,1-3.65,8,13.71,13.71,0,0,1-9.57,3.3q-6.34,0-10.26-2.69l2.2-5.37a10.83,10.83,0,0,0,7,2.15,5.81,5.81,0,0,0,4.13-1.48A5,5,0,0,0,388.81,50a5.27,5.27,0,0,0-1.23-3.68,11,11,0,0,0-4.2-2.44q-8.47-3.24-8.47-10.4a10.13,10.13,0,0,1,3.27-7.64,11.84,11.84,0,0,1,8.49-3.1,17.21,17.21,0,0,1,9.63,2.61l-2.06,4.88a9.11,9.11,0,0,0-5.92-2.07,5.25,5.25,0,0,0-3.88,1.42A4.75,4.75,0,0,0,383,33q0,3.66,5.51,5.85Q397.41,42.46,397.41,49.83Z"></path><path class="cls-1" d="M413.82,12.85a3.82,3.82,0,0,1-1.33,2.93,5,5,0,0,1-6.54,0,3.78,3.78,0,0,1-1.34-2.93,3.87,3.87,0,0,1,1.34-3,4.62,4.62,0,0,1,3.27-1.24,4.75,4.75,0,0,1,3.26,1.2A3.89,3.89,0,0,1,413.82,12.85Zm-.43,47.65H405V23.4h8.37Z"></path><path class="cls-1" d="M451.49,58.48q-4.82,2.69-12.93,2.68t-12.73-5q-4.54-4.95-4.54-13.83t4.54-14.25A14.72,14.72,0,0,1,437.54,23a19.46,19.46,0,0,1,5.57.7v-15h8.37ZM443.12,55V28.27a13.47,13.47,0,0,0-3.72-.48q-9.78,0-9.77,14.11,0,13.9,9.15,13.9A8.55,8.55,0,0,0,443.12,55Z"></path><path class="cls-1" d="M487.21,58.48q-5,2.69-13.42,2.68-15.14,0-15.12-11.28a10.86,10.86,0,0,1,6.12-10.11q4.81-2.61,14.58-3.57v-2q0-6.12-7.36-6.12a21.2,21.2,0,0,0-9.28,2.25l-1.93-4.82a28.63,28.63,0,0,1,12.73-2.82q13.68,0,13.69,12.8Zm-7.84-3V40.19q-6.6.84-9.34,2.55-3.43,2.13-3.43,6.88,0,6.89,7.76,6.88A11.08,11.08,0,0,0,479.37,55.47Z"></path><path class="cls-1" d="M525,58.48q-4.83,2.69-12.94,2.68c-5.46,0-9.7-1.66-12.74-5s-4.53-7.9-4.53-13.83,1.52-10.72,4.54-14.25A14.71,14.71,0,0,1,511,23a19.45,19.45,0,0,1,5.58.7v-15H525ZM516.62,55V28.27a13.4,13.4,0,0,0-3.72-.48q-9.77,0-9.77,14.11,0,13.9,9.15,13.9A8.52,8.52,0,0,0,516.62,55Z"></path><path class="cls-1" d="M184.62,8.84h8.93V48.73q0,6.57,7.09,6.58a16.48,16.48,0,0,0,6.13-1.1V8.84h8.93V58.09q-6.07,2.85-15.43,2.85-8.26,0-12.21-3.65a10.69,10.69,0,0,1-3.44-8.41Z"></path><path class="cls-1" d="M472,224a16.89,16.89,0,0,1-2.58,9.76,11,11,0,0,1-17.5,0,16.84,16.84,0,0,1-2.58-9.76q0-6.07,2.58-9.81,2.94-4.35,8.75-4.35a9.87,9.87,0,0,1,8.75,4.35Q472,217.9,472,224Zm-6.12-.08q0-10.19-5.21-10.19t-5.21,10.19q0,9.94,5.21,9.94t5.21-9.94Z"></path><polygon class="cls-1" points="483.09 237.82 476.86 237.82 476.86 199.53 483.09 199.53 483.09 237.82 483.09 237.82"></polygon><path class="cls-1" d="M446.82,236.35c-1.83,1.42-4.45,2.13-7.89,2.13a12.55,12.55,0,0,1-11.38-6.33q-3.24-5.26-3.24-13.25a24.6,24.6,0,0,1,3.34-13.2A12.56,12.56,0,0,1,439,199.32a13.24,13.24,0,0,1,7.85,2.13l-1.53,4.19a9.55,9.55,0,0,0-5-1.31q-4.91,0-7.14,5.16a23.46,23.46,0,0,0-1.62,9.36,22.28,22.28,0,0,0,1.73,9.21q2.29,5.06,7,5.06a8.75,8.75,0,0,0,4.8-1.32l1.68,4.56Z"></path><path class="cls-1" d="M487.94,223.83q0-6.06,2.59-9.8,2.93-4.36,8.75-4.35T508,214q2.57,3.74,2.57,9.8A16.93,16.93,0,0,1,508,233.6a11,11,0,0,1-17.5,0,16.83,16.83,0,0,1-2.59-9.77Zm6.13-.07q0,9.94,5.21,9.94t5.21-9.94q0-10.2-5.21-10.19t-5.21,10.19Z"></path><polygon class="cls-1" points="476.86 237.69 483.09 237.69 483.09 199.39 476.86 199.39 476.86 237.69 476.86 237.69"></polygon><path class="cls-1" d="M552.29,238h-6.17V218.66q0-4.46-4.6-4.45a6.18,6.18,0,0,0-4.55,1.87v22h-6.17V218.54q0-4.33-5.11-4.33a10.48,10.48,0,0,0-4,.75V238h-6.17v-25.8a23.59,23.59,0,0,1,10.22-2q5.77,0,8.49,3,3.24-3,8.76-3a10.29,10.29,0,0,1,6.7,2.17,7.54,7.54,0,0,1,2.65,6.18V238Z"></path><path class="cls-1" d="M580.24,223.38q0,6.73-3.19,10.57c-2.3,2.8-5.63,4.2-10,4.2q-6,0-9-2V199.41h6.12v11.73a12.7,12.7,0,0,1,5.37-1.12,9.34,9.34,0,0,1,8.19,4.2,15.67,15.67,0,0,1,2.53,9.15Zm-6.13.39q0-10.15-6.27-10.14a7.51,7.51,0,0,0-3.69.81v19.42a7.78,7.78,0,0,0,3.14.56q6.83,0,6.83-10.65Z"></path><path class="cls-1" d="M592.48,202.64a2.75,2.75,0,0,1-1,2.18,3.6,3.6,0,0,1-2.38.86,3.56,3.56,0,0,1-2.38-.86,2.73,2.73,0,0,1-1-2.18,2.79,2.79,0,0,1,1-2.2,3.5,3.5,0,0,1,2.38-.89,3.61,3.61,0,0,1,2.38.86,2.79,2.79,0,0,1,1,2.23Zm-.3,35H586V210.38h6.22v27.27Z"></path><path class="cls-1" d="M619.18,235.86q-3.69,2-9.87,2-11.12,0-11.12-8.3,0-5.3,5.31-7.84,3.29-1.57,9.92-2.23V218q0-4.5-5.41-4.5a15.48,15.48,0,0,0-6.83,1.68l-1.42-3.54a21.08,21.08,0,0,1,9.36-2.07q10.07,0,10.07,9.41v16.89Zm-5.77-2.23V222.41A19.73,19.73,0,0,0,607,224a5.6,5.6,0,0,0-3,5.36q0,5.05,5.74,5.05a8.25,8.25,0,0,0,3.72-.76Z"></path></svg>

				<figure id="faculty-logo" class="border_base">
					<img src="<?php print $facultadHeader ?>" alt="<?php echo $logoHTitle;?>" tittle="<?php echo $logoHTitle;?>">
				</figure>
			</a>
		</div> <!-- navbar-header -->

		<div id="navbar" class="navbar-collapse collapse">

			<div class="btn-seeker-content">
				<input id="btn-seeker" class="item-form-seeker" type="submit">
				<div class="ico-seeker">

					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ico-search" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
						<style type="text/css">
							.st0 {
								fill:none;
								stroke: <?php echo "#".$color_2 ?>;
								stroke-width:1.5806;
								stroke-linecap:round;
								stroke-linejoin:round;
								stroke-miterlimit:10;
							}
						</style>
						<g>
							<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.7315 11.4234)" class="st0" cx="11.4" cy="11.4" rx="10.1" ry="10.1"/>
							<line class="st0" x1="18.7" y1="18.7" x2="28.7" y2="28.7"/>
						</g>
					</svg>

					<!-- Icono close -->

					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ico-close" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
						<style type="text/css">
							.st1{
								fill:none;
								stroke: #<?php echo $color_2 ?>;
								stroke-width:0.8956;
								stroke-miterlimit:10;
							}
						</style>
						<polyline class="st1" points="29,0.9 15,14.9 1,0.9 "/>
						<polyline class="st1" points="1,29.1 15,15.1 29,29.1 "/>
					</svg>

				</div> <!-- ico-seeker -->
			</div> <!-- btn-seeker-content -->

				<ul class="nav navbar-nav">
				<?php
				if ($lang_name=="es") {
				$menu = menu_tree_all_data( "main-menu");
				}else{
				$menu = menu_tree_all_data( "menu-menu-ingles");
				}
				foreach( $menu as $item ){
					if ($item['link']['hidden']==0) {									
					$child = $item[ "link" ];
					?>

					<li class="nav-item dropdown">
						<?php 
						if ($child[ "href" ]=="<front>") {
							$child[ "href" ]=$base_path;
							?>

						<a href="<?php print $child[ "href" ] ?>" class="dropdown-toggle color_font"><?php print $child[ "link_title" ] ?></a>
							<?php
						}elseif ($child[ "href" ]=="<nolink>") {
							?>

						<span  class="dropdown-toggle color_font"><?php print $child[ "link_title" ] ?></span>
							<?php
						}else{							
								$pos = strpos($child[ "href" ], "node");

						if ($pos !== false) {
						    $child[ "href" ]=drupal_get_path_alias($child[ "href" ], $language->language);
						}

							?>

						<a href="<?php print $child[ "href" ] ?>" class="dropdown-toggle color_font"><?php print $child[ "link_title" ] ?></a>
							<?php
						}
						?>						
						
						<span class="icon-mobile"></span>

						<?php if( $item[ "below" ] ){ ?>

						<ul class="dropdown-menu multi-level">
							<?php foreach( $item[ "below" ] as $child ){
								$child1 = $child;
								$child = $child[ "link" ];								
								if ($child['hidden']==0) {									
								
								?>
								<li class="dropdown-submenu">
									<span class="icon-mobile"></span>

									<?php
									if (empty($child['options']['attributes']['target'])) {
										$child['options']['attributes']['target']="_self";
									}
									echo l( $child[ "link_title" ], $child[ "href" ], array('attributes' => array('target' => $child['options']['attributes']['target'])) ) ?>

									<ul class="dropdown-menu submenu">
										<?php

										foreach( $child1[ "below" ] as $child ){
											$child1 = $child;
											$child = $child[ "link" ];
											if ($child['hidden']==0) {									
											?>	
											<li class="item-submenu">
												<span class="icon-mobile"></span>
												<?php
												if (empty($child['options']['attributes']['target'])) {
													$child['options']['attributes']['target']="_self";
												}
												echo l( $child[ "link_title" ], $child[ "href" ], array('attributes' => array('target' => $child['options']['attributes']['target'])) ) ?>



												<ul class="dropdown-menu submenu_level">
													<?php

													foreach( $child1[ "below" ] as $child ){
														$child1 = $child[ "bellow" ];
														$child = $child[ "link" ];

														?>
														<li>
															<?php
															if (empty($child['options']['attributes']['target'])) {
																$child['options']['attributes']['target']="_self";
															}
															echo l( $child[ "link_title" ], $child[ "href" ], array('attributes' => array('target' => $child['options']['attributes']['target'])) ) ?>

														</li>

														<?php } ?>
													</ul>


												</li>

												<?php } } ?>
											</ul>




										</li>
										<?php } }?>
									</ul>
									<?php } ?>
								</li>
								<?php
							}
						}
							?>
						</ul>
					</div> <!-- navbar-digital-guidelines -->
				</div> <!-- container -->
				<?php 
				if ($lang_name=="es") {
					$menu = menu_tree_all_data( "menu-menu-top-volver");					
					$buscar="Buscar...";
				}else{
					$menu = menu_tree_all_data( "menu-top-volver-ingles");					

					$buscar="Search...";
				}
				?>

				<section class="container-seeker">
					<form action="search/node/" id="buscadorMobile" method="get" class="container">
						<input id="parametro_mob" autocomplete="off" name="query" placeholder="Buscar..." type="text">
						<input type="submit" id="btnBuscadorMobile" value="">
					</form>
				</section>

				<script type="text/javascript">

					function htmlEntities(str) {
						return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
					}

					jQuery( document ).ready( function(){

						jQuery("#buscador").bind("submit", function(){
							var valor = htmlEntities(jQuery('#parametro_404').val());
							jQuery( this ).attr( "action", Drupal.settings.basePath+"search/node/" + valor + "?query=" + valor );
						} );

					} )	

				</script>

			</nav>

			<!-- /#page-header -->



			<?php if (!empty($page['highlighted'])): ?>

				<?php print render($page['highlighted']); ?>

			<?php endif; ?>
			<?php
			if (!empty($breadcrumb)){
				$GLOBALS["breadcrumb"] = $breadcrumb;
			}
				//if (!empty($breadcrumb)): print $breadcrumb; endif;
			?>

			<section class="page-404 bg_base_color">
				<div class="container">

					<div class="bg-404">
						<img src="<?= base_path().drupal_get_path('theme', 'uniandes_base') ?>/img/img-404.png">
					</div>

					<div class="text-404">
						<p class="subtitle-text">ooops!</p>
						<p>El contenido que esta buscando no puede ser encontrado.
						</p>
					</div>
					<form id="buscador" method="get" action="node/search">
						<div class="search-content">
							<div class="form-item-search">
								<input id="parametro_404" name="query" class="form-control form-text" type="text">
							</div>

							<div class="form-submit-button">
								<button type="submit" class="btn btn-info form-submit" id="btnBuscador404">Buscar</button>
							</div>
						</div>
					</form>
				</div>
			</section>

			<?php
			
			$cantidad=count ($node->field_subcategoria_noticias[ "und" ]);
			$random= rand(0,($cantidad-1));

			$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
			$view = views_get_view('vista_noticias_interna');
			$view->set_display("block");
			$view->set_arguments($term_id);
			$view->pre_execute();
			$view->execute();

			if ($node->field_activar_not_rel_noticias["und"][0]["value"] == 0 && !empty($view->result)){
				?>


				<section class="view-related-news container">
					<header class="title_related-news">
						<h2><?php echo t( "Related news" ) ?></h2>
					</header>

					<section class="list_related-news">
						<?php
						foreach ($view->result as $item){
							$noticia = $item->_field_data["nid"]["entity"];
							?>
							<?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
								if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
									?>
									<section class='noticia-reciente solo-texto'>
										<?php }
										else { ?>

										<article class='list-item_related-news'>
											<?php }}?>
											<?php if (!empty($noticia->field_imagen_miniatura_noticias)){ ?>
											<figure class="img-related-news">
												<a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>">
													<img src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
												</a>
											</figure>
											<?php } ?>

											<div class="txt-related-news">
												<p class="date_related-news">                     
													<?php
													$fecha_imp = "";
													if (!empty($noticia->field_fecha_creacion_noticias)) {
														$fecha_imp = $noticia->field_fecha_creacion_noticias["und"][0]["value"];
													}
													else{
														$fecha_imp = $noticia->created;
													}

													?>
													<?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?>
												</p>
												<h1 class="title-related-news">
													<a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>"> <?php print $noticia->title ?> </a>
												</h1>

												<p class="txt_related-news"> <?php /*print drupal_substr($noticia->field_sub_titulo_noticias["und"][0]["value"],0,150)*/ ?>
													<?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
														if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
															?>
															<?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
															<?php }
															else { ?>
															<?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
															<?php }}?>
														</p>


														<?php if (!empty($noticia->field_boton_noticia)){ ?>
														<a href= <?php print $noticia->field_boton_noticia["und"][0]["url"] ?> class='btn-default btn-border-grey view-related-news'> <?php print $noticia->field_boton_noticia["und"][0]["title"] ?> </a>
														<?php }
														else {?>
														<a href= "<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" class='btn-default btn-border-grey view-related-news'> <?php print "Ver más" ?> </a>
														<?php } ?>
													</div> <!-- txt-related-news -->
												</article> <!-- list-item_related-news -->
												<?php } ?>

												<article class='list-item_related-news other-news'>
													<h1 class="title-related-news">
														Otras noticias
													</h1>

													<ul>
														<?php

														$my_view_name = 'vista_noticias_interna';
														$my_display_name = 'block_1';

														$my_view = views_get_view($my_view_name);
														if ( is_object($my_view) ) {

															$term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
															$view = views_get_view('vista_noticias_interna');
															$view->set_display("block_1");
															$view->set_arguments($term_id);
															$view->pre_execute();
															$view->execute();
															$item_multimedia = $view->result;

															foreach ($item_multimedia as $individual){
                                            /* echo "<pre>";
                                             print_r($individual);
                                             echo "</pre>";*/
                                             ?>

                                             <li><a href="<?php print url( 'node/' . $individual->nid, array('absolute'=>true)); ?>"><?php print $individual->node_title ?></a></li>
                                             <?php }} ?>
                                         </ul>
                                     </article> <!-- list-item_related-news other-news -->
									<?php 
									if ($lang_name=="es") {
										$url_idioma=base_path()."noticias";
									}else{
										$url_idioma=base_path()."news";
									}


									?>

                                     <div class="btn-block line_base">
                                     	<a href="<?php print $url_idioma ?>" class="btn-default btn-border-grey btn-featured_news"><?php print t("View all news"); ?></a>
                                     </div>

                                 </section> <!-- list_related-news -->
                             </section> <!-- view-related-news -->
                             <?php
                         }
                         ?>

                         <section class="block-views-vista-anuncios internal-news">
                         	<div class="container">
                         		<?php

                         		if ($node->field_activar_anuncios_niciasot["und"][0]["value"] == 1){

                         			$view = views_get_view('vista_anuncios_home');
                         			print $view->render('block');
                         		}
                         		?>

                         	</div>
                         </section> <!-- block-views-vista-anuncios-home-block -->



                         <?php if (!empty($page['sidebar_second'])): ?>
                         	<aside class="col-sm-3" role="complementary">
                         		<?php print render($page['sidebar_second']); ?>
                         	</aside>
                         	<!-- /#sidebar-second -->
                         <?php endif; ?>



                         <?php 


                         if (!empty($page['footer'])): ?>

                         <?php print render($page['footer']); ?>
                     <?php endif; ?>

                     <script type="text/javascript">
                     	window.fbAsyncInit = function() {
                     		FB.init({
                     			appId      : '1168998773196224',
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