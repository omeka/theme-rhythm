<?php head(array('title'=>'Browse Items','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">
	
	<h1>Browsing Items by Tag</h1>
	<ul class="items-nav navigation" id="secondary-nav">
		<?php echo public_nav_items(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
	</ul>
	<?php echo tag_cloud($tags,uri('items/browse')); ?>

</div><!-- end primary -->

<?php foot(); ?>