</div><!-- end #content -->
	
<div id="footer">

		<ul class="navigation">
	        <?php echo public_nav_main(array('Home' => uri(''), 'Browse Items' => uri('items'), 'Browse Collections'=>uri('collections')));
	    	?>
		</ul>

        <div id="footer-text">
            <?php if ($footerText = get_theme_option('Footer Text')): ?>
                <p><?php echo $footerText; ?></p>
            <?php endif; ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = settings('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
		<p>Theme <em>Rhythm and Blues</em>. Proudly powered by <a href="http://omeka.org">Omeka</a>.</p>
		</div>

</div><!-- end footer -->
</div><!-- end wrap -->

	<?php // echo plugin_footer(); ?> 

</body>
</html>