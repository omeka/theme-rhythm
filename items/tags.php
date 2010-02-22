<?php head(array('title'=>'Browse Items','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">

	<ul class="items-nav navigation" id="browse">
		<?php echo nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
	</ul>
	
	<h1>Browsing Items by Tag</h1>

	<?php echo tag_cloud($tags,uri('items/browse')); ?>

</div><!-- end primary -->

<?php foot(); ?>