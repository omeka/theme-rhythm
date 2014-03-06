<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="<?php echo get_theme_option('Style Sheet'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head'); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('normalize', 'style'));
    queue_css_url('http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic|PT+Serif:700');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body'); ?>

<div id="wrap">
    <header>
	    <?php fire_plugin_hook('public_header'); ?>
	    <?php echo theme_header_image(); ?>
        <div id="title-tagline">    
            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
            <?php echo rhythm_display_tagline(); ?>
        </div> <!-- end #site-title -->
	
        <div id="searchwrap">
            <?php echo search_form(); ?>
    	</div> <!-- end #searchwrap -->
    </header>
  
    <nav id="primary-nav">
            <?php echo public_nav_main(); ?>
    </nav>  <!-- end #primary-nav -->
    
    <div id="content">
        <?php fire_plugin_hook('public_content_top'); ?>