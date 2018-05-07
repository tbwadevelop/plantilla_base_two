<?php

global $base_path;

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
?><!DOCTYPE html>
<html<?php print $html_attributes;?><?php print $rdf_namespaces;?>>
<head>
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-<?php echo variable_get('uniandes_custom_gtm', "") ?>');</script>
<!-- End Google Tag Manager --> 
<?php
if(isset($_REQUEST['page'])){
	$request= $_SERVER['REQUEST_URI'];
	$request=explode("?page", $request);

?>
<link rel="prev" href="<?php print $base_root.$request[0]."?page=".($_REQUEST['page']-1);?>" />
<link rel="next" href="<?php print $base_root.$request[0]."?page=".($_REQUEST['page']+1);?>" />
<?php

}
?>
<link rel="profile" href="<?php print $grddl_profile; ?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php print $head; ?>
<title><?php print $head_title; ?></title>
<style>

	<?php 

	$color_1 = variable_get('uniandes_custom_color_primario', "#fff200");
	$color_2 = variable_get('uniandes_custom_color_secundario', "#484851");

	?>

	.bg_base {
		background: #<?php echo $color_1 . " !important" ?>;
	}
	.bg_base_color {
		background-color: #<?php echo $color_1 . " !important" ?>;
	}
	.border_base {
		border-color: #<?php echo $color_1 . " !important" ?>;
	}
	.color-base {
		color: #<?php echo $color_1 . " !important" ?>;
	}
	.color_font {
		color: #<?php echo $color_2 . " !important" ?>;
	}

</style>
<?php print $styles; ?>
<script src="<?php echo $base_path ?>sites/all/themes/uniandes_base/js/jquery-3.2.1.min.js"></script>
<?php print $scripts; ?>

</head>

<?php 

$themes = array( "green", "gray", "blue", "yellow" );

$body_attributes = str_replace('class="', 'class="' . $themes[ variable_get('uniandes_custom_theme_color', 3) ] . ' ', $body_attributes);

?>

<body <?php print $body_attributes; ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo variable_get('uniandes_custom_gtm', "") ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div id="skip-link">
			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		<!-- HTML5 element support for IE6-8 -->
	  <!--[if lt IE 9]>
	  <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
	  <![endif]-->
	</body>
	</html>
