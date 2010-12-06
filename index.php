<?php head(); ?>

    <div id="primary">
        
        <p><?php echo get_theme_option('Homepage Text'); ?></p>
        
        <div id="featured-item" class="featured-box">
        <?php echo display_random_featured_item(); ?>
        </div><!-- end #featured-item -->

        <div id="featured-collection" class="featured-box">
        <?php echo display_random_featured_collection(); ?>
        </div> <!-- end #featured-collection -->  
       	  
    </div> <!-- end #primary -->
<!--testing hiding if no features via css-->


<!--end testing-->

    <div id="secondary">
		<div id="recent-items"><!-- will need to alter css to target #recent-items dl, dt, dd rather than just #secondary -->
	      <h2>Recently Added</h2>
  		<?php 
  		$homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '4';
  		set_items_for_loop(recent_items($homepageRecentItems)); ?>				
				<?php if (has_items_for_loop()): ?>
					
					
				<?php while (loop_items()): ?>
         <dl>
	         <dt><?php echo link_to_item(); ?></dt><!--this echoes the Dublin Core title along with the link-->
	
		
	    	 <dd>	<?php if(item_has_thumbnail()): ?>
	    				<div class="item-img">
	    				<?php echo link_to_item(item_square_thumbnail()); ?>						
	    				</div>
						<?php endif; ?>
					 	<?php if($desc = item('Dublin Core', 'Description', array('snippet'=>200))): ?>
        	        	
					<?php echo $desc; ?><?php echo link_to_item('  |  more &raquo;',(array('class'=>'show'))) ?>
					<?php endif; ?>
    			 	
					</dd>

		
         </dl>
				<?php endwhile; ?>
				
			
			<?php else: ?>
			<p>No recent items available.</p>

				<?php endif; ?><!-- end for if has items for loop? -->

		<p class="view-items-link"><a href="<?php echo uri('items'); ?>">View All Items</a></p>

		</div><!-- end #recent-items -->
      
    </div><!-- end #secondary -->

<?php foot(); ?>