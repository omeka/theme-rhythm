<?php
$title = __('Browse Items');
head(array('title'=>$title,'bodyid'=>'items','bodyclass' => 'browse')); ?>

	<div id="primary">

        <h1><?php echo $title; ?> <?php echo __('(%s total)', total_results()); ?>
        	
		 <?php if(!empty($_REQUEST['tags'])) echo 'Tagged&nbsp; &lsquo;', html_escape($_REQUEST['tags']), '&rsquo;'; ?>
		</h1>	
		
		<ul class="items-nav navigation" id="secondary-nav">
    		<?php echo custom_nav_items(); ?>
    	</ul>	
		<div id="pagination-top" class="pagination"><?php echo pagination_links(); ?></div>
		
		<?php while (loop_items()): ?>
			<div class="item hentry">
				<div class="item-meta">
					<?php if ($text = item('Dublin Core', 'Type')): ?>
	    				<p class="item-type"><?php echo $text; ?></p>
	    			<?php endif; ?>
			
				<h2><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?></h2>
				   
				<?php if (item_has_thumbnail()): ?>
    				<div class="item-img">
    					<div class="fltlft"><?php echo link_to_item(item_thumbnail()); ?></div>						
    				</div>
				<?php endif; ?>
				
				
				<?php if ($text = item('Item Type Metadata', 'Text', array('snippet'=>250))): ?>
    				<div class="item-description">
    				<p><?php echo $text; ?></p>
    				</div>
				<?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
    				<div class="item-description">
    				<p><?php echo $description; ?></p>
    				</div>
				<?php endif; ?>

				<?php if (item_has_tags()): ?>
                    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
    				<?php echo item_tags_as_string(); ?></p>
    				</div>
				<?php endif; ?>
				
				<?php echo plugin_append_to_items_browse_each(); ?>

				</div><!-- end class="item-meta" -->
			</div><!-- end class="item hentry" -->			
		<?php endwhile; ?>
	
		<div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>
		
		<?php echo plugin_append_to_items_browse(); ?>
			
	</div><!-- end primary -->
	<div id="secondary">
		<div id="featured-item" class="featured-box">
		    <?php echo rhythm_display_random_featured_item_squarethumb(); ?>
          </div><!-- end #featured-item -->

    </div><!-- end secondary -->
	
<?php foot(); ?>
