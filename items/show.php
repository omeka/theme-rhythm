<?php echo head(array('title' => metadata('Item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>


    <h1><?php echo metadata('Item', array('Dublin Core', 'Title')); ?></h1>

    <div class="item hentry">
         <div class="item-meta">

            <?php echo all_element_texts('item'); ?>

             <!-- The following returns all of the files associated with an item. -->
            <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
                <h3><?php echo __('Files'); ?></h3>
                <div class="element-text"><?php echo files_for_item(); ?></div>
            </div>
            <?php endif; ?>

            <?php echo fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

         </div>  <!-- end item-meta -->
    </div><!-- end item hentry -->

     <!-- end #primary-->
    <div id="show-sidebar">
         <dl>
         <dt id="publisher"><?php echo __('Date Added'); ?></dt>
         <dd><?php echo rhythm_display_date_added(); ?></dd>

         <?php if (metadata('item', 'Collection Name')): ?>
         <dt id="creator"><?php echo __('Collection'); ?></dt>
         <dd><?php echo link_to_collection_for_item(); ?></dd>
         <?php endif; ?>

         <?php if (metadata('item', 'Item Type Name')): ?>
         <dt id="source"><?php echo __('Item Type'); ?></dt>
         <dd><?php echo metadata('item', 'Item Type Name'); ?></dd>
         <?php endif; ?>

         <?php if(metadata('item', 'has tags')): ?>
        <dt><?php echo __('Tags'); ?></dt>
        <dd><?php echo tag_string('item'); ?></dd>
        <?php endif;?>

         <dt id="subject"><?php echo __('Citation'); ?></dt>
         <dd><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></dd>
         </dl>
    </div> <!-- end show-sidebar -->


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous button">
            <?php echo link_to_previous_item_show(); ?>
        </li>
        <li id="next-item" class="next button">
            <?php echo link_to_next_item_show (); ?>
        </li>
    </ul>

<?php echo foot(); ?>
