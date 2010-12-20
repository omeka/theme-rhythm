<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html class="<?php echo get_theme_option('Style Sheet'); ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo settings('site_title'); echo $title ? ' | ' . $title : ''; ?></title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo settings('description'); ?>" />

<?php echo auto_discovery_link_tag(); ?>

<!-- Plugin Stuff -->
<?php plugin_header(); ?>

<!-- Stylesheets -->
<?php 
queue_css('style');
display_css(); 
?>

<!-- JavaScripts -->
<?php display_js(); ?>

</head>
<body<?php echo $bodyid ? ' id="'.$bodyid.'"' : ''; ?><?php echo $bodyclass ? ' class="'.$bodyclass.'"' : ''; ?>>

<div id="wrap">
  <div id="header">
	
	<div id="site-title">    
		<p class="sitetitle"><?php echo link_to_home_page(custom_display_logo()); ?></p>
		<?php echo rhythm_display_tagline(); ?>
	</div> <!-- end #site-title -->
	
    <div id="searchwrap">
     	<?php echo simple_search(); ?>
		<?php echo link_to_advanced_search(); ?>
	</div> <!-- end #searchwrap -->
	
  </div>  <!-- end #header -->
  
 <div id="primary-nav">
     <ul class="navigation">
		<?php echo custom_public_nav_header(); ?>
     	
    </ul>
  </div>  <!-- end #primary-nav -->

<div id="content">