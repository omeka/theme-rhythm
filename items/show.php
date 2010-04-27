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

                   <div class="desc">
                       <h3>DESCRIPTION:</h3>
					   <?php if ($text = item('Item Type Metadata', 'Text')): ?>
	    				<div class="item-description">
	    				<p><?php echo $text; ?></p>
	    				</div><!-- end item-description -->
					<?php elseif ($description = item('Dublin Core', 'Description')): ?>
	    				<div class="item-description">
	    				<p><?php echo $description; ?></p>
	    				</div><!-- end item-description -->
					<?php endif; ?>
					
						<?php if(item_has_tags()): ?>
					<div class="tags">
	                     <p> <strong> Tags: </strong><?php echo item_tags_as_string(); ?></p>
	                </div>
						<?php endif;?>
						
                    <div class="meta-main"> 
                      <p><span class="runinHead">CONTRIBUTOR:&nbsp;</span><?php echo item('Dublin Core', 'Contributor'); ?></p>
                      <p><span class="runinHead">DATE ADDED:&nbsp;</span><?php echo item('Date Added'); ?></p>
                        <?php if ( item_belongs_to_collection() ): ?>
					  <p><span class="runinHead">COLLECTION:&nbsp;</span><?php echo link_to_collection_for_item(); ?></p>
  <?php endif; ?>
                      <p><span class="runinHead">ITEM TYPE:&nbsp;</span><?php echo item('Item Type Name'); ?></p>
                      <p><span class="runinHead">CITATION:&nbsp;</span><?php echo item_citation(); ?></p>
                    </div><!-- end meta-main -->

             	   </div><!-- end desc -->


					
             </div>  <!-- end item-meta -->    
        </div><!-- end item hentry --> 
              
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
	         <dt id="publisher">Publisher</dt>
	         <dd><?php echo item('Dublin Core', 'Publisher'); ?></dd>
	         <dt id="creator">Creator</dt>
	         <dd><?php echo item('Dublin Core', 'Creator'); ?></dd>
	         <dt id="source">Source</dt>
	         <dd><?php echo item('Dublin Core', 'Source'); ?></dd>            
	         <dt id="subject">Subject</dt>
	         <dd><?php echo item('Dublin Core', 'Subject'); ?></dd>
	         <dt id="format">Format</dt>
	         <dd><?php echo item('Dublin Core', 'Format'); ?></dd>
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