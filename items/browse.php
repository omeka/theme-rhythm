<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav" aria-label="<?php echo __('Items'); ?>">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<?php if(count(get_random_featured_items()) > 0): ?>
<div id="featured-item">
    <h2><?php echo __('Featured Item'); ?></h2>
    <?php 
    echo random_featured_items(1); 
    ?>
</div>
<?php endif; ?>

<div class="items-list">
    <?php foreach (loop('items') as $item): ?>
    <div class="item hentry">
        <?php 
            $itemLinkContent = '<span class="item-title">' . metadata('item', array('Dublin Core', 'Title')) . '</span>';
            if (metadata('item', 'has thumbnail')) {
                $itemLinkContent .= item_image('thumbnail', array('alt' => ''));
            }
        ?>
        <h2><?php echo link_to_item($itemLinkContent, array('class'=>'permalink')); ?></h2>
    
        <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
        <div class="item-description">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>
    
        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>
    
        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item hentry" -->
    <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
