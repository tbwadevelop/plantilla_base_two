<?php
global $language;
$menu = menu_tree_all_data('menu-menu-top-volver', null, 1);
$menu = i18n_menu_localize_tree($menu, $language->language);

if($menu && count($menu))
{
?>
	<div class="btn-back-mobile">
		<?php 
		foreach($menu as $item)
		{
			$child = $item[ "link" ];
            if (!$child['hidden'])
            {
                echo l($child["link_title"], $child["link_path"], ["class" => "dropdown-toggle"]);
            }
        } ?>
	</div>
<?php
}
?>