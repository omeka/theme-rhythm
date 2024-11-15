<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="<?php echo get_theme_option('Style Sheet'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts', 'normalize', 'style'));
    queue_css_url('//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic|PT+Serif:700');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php queue_js_file(array('globals', 'vendor/jquery-accessibleMegaMenu')); ?>
    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to Main Content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>

<div id="wrap">
    <header role="banner">
	    <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
	    <?php echo theme_header_image(); ?>
        <div id="title-tagline">
            <h1 id="site-title"><?php echo link_to_home_page(theme_logo()); ?></h1>
            <?php echo rhythm_display_tagline(); ?>
        </div> <!-- end #site-title -->

        <div id="search-container" role="search">
            <?php 
                $showAdvanced = get_theme_option('use_advanced_search'); 
                $formClass = ($showAdvanced) ? 'with-advanced' : '';
                echo search_form(array('show_advanced' => $showAdvanced, 'form_attributes' => array('class' => $formClass)));
            ?>
        </div>
    </header>

    <nav id="primary-nav" role="navigation" aria-labelledby="site-title primary-nav" aria-label="<?php echo __('Navigation'); ?>">
            <?php echo public_nav_main(); ?>
    </nav>  <!-- end #primary-nav -->

    <div id="content" role="main" tabindex="-1">
        <?php fire_plugin_hook('public_content_top', array('view' => $this)); ?>
