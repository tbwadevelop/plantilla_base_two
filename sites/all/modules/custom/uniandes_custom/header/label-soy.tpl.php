<?php
global $language;
$lang_name = $language->language ;
$i_am_es = t('I am:', array(), array('langcode' => 'es'));
$i_am_en = t('I am:', array(), array('langcode' => 'en'));
if($lang_name=="es"){
	if($i_am_es==$i_am_en){
		print "Soy:";
	}else{
		print $i_am_es;
	}
}else{
	print $i_am_en;
}
?>