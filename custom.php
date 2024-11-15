<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible. Ideally, you should namespace these with your theme name.


function rhythm_display_tagline()
{
    if ($tagline = get_theme_option('site_tagline')) {
        return '<p class="tagline">'.html_escape($tagline).'</p>';
    }
}

function rhythm_display_date_added($format = 'F j, Y', $item = null) {
    if (!$item) {
        $item = get_current_record('item');
    }
    
    $dateAdded = metadata($item, 'added');
    return date($format, strtotime($dateAdded));   
}