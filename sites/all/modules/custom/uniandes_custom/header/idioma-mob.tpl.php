<?php
global $language, $base_url;
$lang_name = $language->language;
$languages = locale_language_list('name');
?>
<div class="styled-select language-mobile">
	<span><?php echo $label;?></span>
	<select id="selector-language">
		<?php foreach($languages as $key_lang => $lang){
				$selected = ($lang_name == $key_lang) ? 'selected="selected"' : ''; ?>
				<option <?php echo $selected; ?>  value="<?php print $base_url.$key_lang ?>"><?php print t($key_lang) ?></option>
		<?php }?>
	</select>
</div>