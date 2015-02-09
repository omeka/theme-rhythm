if (!Rhythm) {
    var Rhythm = {};
}

(function($) {
    $(document).ready(function() {
        var show_advanced = '<a href="#" class="show-advanced button">&hellip;</a>';
        var search_submit = $('#search-form input[type=submit]');
        var advanced_form = $('#advanced-form');

        /* 
            Setup classes and DOM elements jQuery will use.
        */
        
        if(advanced_form.length > 0) {
            $('#search-container').addClass('with-advanced');
        }
        advanced_form.addClass('closed').before(show_advanced);
        
        /*
            Setup flags for when "shift" key is used, mainly for
            tabbing between elements. 
        */
        var shift_state = false;
        $(document).keydown( function(e) {
            if (e.keyCode == 16) {
                shift_state = true;
            }
        });

        $(document).keyup( function(e) {
            if (e.keyCode == 16) {
                shift_state = false;
            }
        });

        $('.show-advanced').click(function(e) {
            e.preventDefault();
            advanced_form.toggleClass('open').toggleClass('closed');
        });
        $('.show-advanced').keydown(function(e) {
            var advanced_closed = e.keyCode == 40 && advanced_form.hasClass('closed');
            var advanced_hidden = e.keyCode == 38 && advanced_form.hasClass('open');
            if (advanced_closed || advanced_hidden) {
                e.preventDefault();
                advanced_form.toggleClass('open').toggleClass('closed');
            } else if (e.keyCode == 9 && advanced_form.hasClass('closed')) {
                e.preventDefault();
                if (shift_state == true) {
                    $(this).prev().focus();
                } else {
                    search_submit.focus();
                }
            }
        });
        search_submit.keydown(function(e) {
            if (e.keyCode == 9 && advanced_form.hasClass('closed') && shift_state == true) {
                e.preventDefault();
                $('.show-advanced').focus();
            }
        });
        
        Rhythm.skipNav = function() {
          $("a[href^='#']").click(function() {
            $("#"+$(this).attr("href").slice(1)+"").focus();
          });
        };
        
        Rhythm.megaMenu = function () {
          $("#primary-nav").accessibleMegaMenu({
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
          };
    });
})(jQuery)
