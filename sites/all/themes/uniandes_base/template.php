<?php

function uniandes_base_js_alter( &$js )
{
    $jqKey = "my-new-jquery"; // a key for new jquery file entry
    $js[$jqKey] = $js['misc/jquery.js']; // copy the default jquery settings, so you don't have to re-type them.
    $js[$jqKey]['data'] = "sites/all/themes/uniandes_base/js/jquery-3.2.1.min.js"; // the path for new jquery file.
    $js[$jqKey]['version'] = '2.1.0'; // your jquery version.

    unset($js['misc/jquery.js']); // delete drupal's default jquery file.
}

function uniandes_base_preprocess_page(&$vars){
	if(arg(0) == "taxonomy" && arg(1) == "term"){
		$vars['page']['content']['system_main']['nodes'] = null;
		if(isset($vars['page']['content']['system_main']['no_conte‌​nt'])){
			unset($vars['page']['content']['system_main']['no_conte‌​nt']);			
		}
		if(isset($vars['page']['content']['system_main']['pager'])){
			unset($vars['page']['content']['system_main']['pager']);
		}
		
	}

 // HACK: Use custom 403 and 404 pages

  if (in_array('403 Forbidden', drupal_get_http_header()) !== FALSE) {
      $vars['theme_hook_suggestions'][] = "page__403";
  }
  if (in_array('404 Not Found', drupal_get_http_header()) !== FALSE) {
      $vars['theme_hook_suggestions'][] = "page__404";
  }

}