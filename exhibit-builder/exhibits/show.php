<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>

<div id="primary">
<?php exhibit_builder_render_exhibit_page(); ?>
</div>

<nav id="exhibit-pages">
    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit, metadata('exhibit', 'title')); ?></h4>
    <ul>
        <?php $currentPageId = metadata('exhibit_page', 'id'); ?>
        <?php $currentPage = get_current_record('exhibit page'); ?>
        <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
        <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
        <?php echo rhythm_exhibit_builder_page_nav($exhibitPage, $currentPageId); ?>
        <?php endforeach; ?>
        <?php set_current_record('exhibit page', $currentPage); ?>
    </ul>
</nav>

<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
    <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>
</div>


<?php echo foot(); ?>
