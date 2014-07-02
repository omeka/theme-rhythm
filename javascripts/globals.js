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
    });
})(jQuery)