<?php head(array('title'=>'Browse Items','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">
	
	<h1>Browsing Items by Tag</h1>
	<ul class="items-nav navigation" id="secondary-nav">
		<?php echo rhythm_nav_items(); ?>
	</ul>
	<?php echo tag_cloud($tags,uri('items/browse')); ?>

</div><!-- end primary -->

<?php foot(); ?>