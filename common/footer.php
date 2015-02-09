        </div>

        <footer role="contentinfo">

            <nav id="bottom-nav">
                <?php echo public_nav_main(); ?>
            </nav>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
            </div>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>

    </div><!-- end wrap -->

    <script>

    jQuery(document).ready(function() {
        jQuery("#primary-nav").accessibleMegaMenu({
            /* prefix for generated unique id attributes, which are required
               to indicate aria-owns, aria-controls and aria-labelledby */
            uuidPrefix: "accessible-megamenu",

            /* css class used to define the megamenu styling */
            menuClass: "nav-menu",

            /* css class for a top-level navigation item in the megamenu */
            topNavItemClass: "nav-item",

            /* css class for a megamenu panel */
            panelClass: "sub-nav",

            /* css class for a group of items within a megamenu panel */
            panelGroupClass: "sub-nav-group",

            /* css class for the hover state */
            hoverClass: "hover",

            /* css class for the focus state */
            focusClass: "focus",

            /* css class for the open state */
            openClass: "open"
        });
    });

    </script>
    <script>
      jQuery(document).ready(function() {
        // add a click handler to all links
        // that point to same-page targets (href="#...")
        jQuery("a[href^='#']").click(function() {
          // get the href attribute of the internal link
          // then strip the first character off it (#)
          // leaving the corresponding id attribute
          jQuery("#"+jQuery(this).attr("href").slice(1)+"")
            // give that id focus (for browsers that didn't already do so)
            .focus()
            // add a highlight effect to that id (comment out if not using)
            //.effect("highlight", {}, 3000);
        });
      });
    </script>

</body>
</html>
