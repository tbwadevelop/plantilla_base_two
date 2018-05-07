<?php
global $language, $base_path;
$lang_name = $language->language;
?>
<li class="menu-nav-item styled-select">
	<p class="idioma-select"><?php print $lang_name ?></p>
	<ul class="select-language" id="select-idioma">
		<?php
        $languages = locale_language_list('name');
		foreach($languages as $key_lang => $lang)
		{
			$class = ($lang_name === $key_lang) ? 'active' : '';
				?>
				<li data-leng="<?php print $key_lang ?>" data-url="<?php print $base_path.$key_lang ?>" class="<?php print $class ?>"><?php print t($lang) ?></li>
				<?php
		}
		?>
	</ul>
</li>