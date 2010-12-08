<?php head(array('title' => item('Dublin Core', 'Title'),'bodyid'=>'items','bodyclass' => 'show')); ?>


   <div id="primary">
        <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

        <?php
        $titles = item('Dublin Core', 'Title', 'all');

        if (count($titles) > 1):

        ?>

        <h2>All Titles</h2>	
    	<ul class="title-list">
            <?php foreach ($titles as $title): ?>
               <li class="item-title">
               <?php echo $title; ?>
               </li>
            <?php endforeach; ?>
    	</ul>
        <?php endif; ?>
		
        <div class="item hentry">
             <div class="item-meta">
				<?php while(loop_files_for_item()): ?>
		
                   <div class="item-img">	<?php 
				        $file = get_current_file();
				        if ($file->hasThumbnail()):
			            echo display_file($file,array('imageSize'=>'fullsize'));
			            endif;
			        ?>					
				   </div>
				
				<?php endwhile; ?>

                <?php echo custom_show_item_metadata(); ?>
					
             </div>  <!-- end item-meta -->    
        </div><!-- end item hentry --> 

		<?php echo plugin_append_to_items_show(); ?>
              
		<ul class="item-pagination navigation">
		<li id="previous-item" class="previous">
			<?php echo link_to_previous_item('Previous Item'); ?>
		</li>
		<li id="next-item" class="next">
			<?php echo link_to_next_item('Next Item'); ?>
		</li>
		</ul>  
              
   </div>
         <!-- end #primary-->
   <div id="secondary">
        <div id="show-sidebar">
	         <h2>About the Original Item</h2>
	         <dl>
	         <dt id="publisher">Date Added</dt>
	         <dd><?php echo rhythm_display_date_added(); ?></dd>
	        
	         <?php if (item_belongs_to_collection()): ?>
	         <dt id="creator">Collection</dt>
	         <dd><?php echo link_to_collection_for_item(); ?></dd>
	         <?php endif; ?>
	         
	         <?php if (item_has_type()): ?>
	         <dt id="source">Item Type</dt>
	         <dd><?php echo item('Item Type Name'); ?></dd>
	         <?php endif; ?>
	         
	         <?php if(item_has_tags()): ?>
			<dt>Tags</dt>
			<dd><?php echo item_tags_as_string(); ?></dd>
			<?php endif;?>   
			      
	         <dt id="subject">Citation</dt>
	         <dd><?php echo item_citation(); ?></dd>
	         <dt id="files">Associated Files</dt>
	         <!-- The following returns all of the files associated with an item. -->
			 <dd>	
				<?php $hasShownFile = false; ?>
		            
	 		  	<?php while(loop_files_for_item()): ?>

	     		    <?php 
	     		        $file = get_current_file();
	     		        if (!$file->hasThumbnail()):
	     		          echo display_file($file);
	     		          $hasShownFile = true;
	     		        endif;
	     		    ?>
     

	     		<?php endwhile; ?>
 		
	     		<?php if (!$hasShownFile): ?>
	     		    No files are associated with this item.
	 		    <?php endif; ?>
	         </dd>
	         </dl>
        </div> <!-- end show-sidebar -->
   </div> <!-- end #secondary -->
<?php foot(); ?>