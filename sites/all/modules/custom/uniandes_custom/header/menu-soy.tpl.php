<?php
global $language;
$menu = menu_tree_all_data('menu-menu-top-soy', null, 1);
$menu = i18n_menu_localize_tree($menu, $language->language);
foreach($menu as $item)
{
	$child = $item[ "link" ];
	if (!$child['hidden']) {
    ?>
        <li class="menu-nav-item">
            <?php echo l($child["link_title"], $child["link_path"], ["class" => "dropdown-toggle"]) ?>
        </li>
    <?php
    }
}
?>