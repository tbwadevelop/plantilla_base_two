
	<section class="breadcrumb">
		<article class="container">
			<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
			<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
			<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
		</article>
	</section>


<div class="content-master-intermediate container ">
	<h1><?php print $node->title ?></h1>
	<section class="listed-box">
		<?php
		foreach ($node->field_enlaces_internos_m7['und'] as $caja){
			$target=$caja["attributes"]["target"];
			$link=$caja["url"];
			$title=$caja["title"];
			?>
			<article class="item_listed-box">
				<h2><a href="<?php print $link ?>"><?php print $title ?></a></h2>
			</article>

			<?php 
		}
		?>
	</section>
</div>