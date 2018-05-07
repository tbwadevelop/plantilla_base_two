<?php
global $language;
$lang_name = $language->language ;
if($lang_name=="es") {
	$menu = menu_tree_all_data("main-menu");
}else{
	$menu = menu_tree_all_data("menu-menu-ingles");
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
			<?php }elseif($child[ "href" ]=="<nolink>") { ?>
				<span  class="dropdown-toggle color_font"><?php print $child[ "link_title" ] ?></span>
			<?php }else{ 
				$pos = strpos($child[ "href" ], "node");
				if($pos !== false){
					$child[ "href" ] = drupal_get_path_alias($child[ "href" ], $language->language);
				}?>
				<a href="<?php print $child[ "href" ] ?>" class="dropdown-toggle color_font"><?php print $child[ "link_title" ] ?></a>
			<?php } ?>						
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
							<?php } 
						}?>
					</ul>
			<?php } ?>
		</li>
	<?php
	}
}
?>