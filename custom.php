<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible. Ideally, you should namespace these with your theme name.


function rhythm_display_random_featured_item_squarethumb()
{
    $featuredItems = get_random_featured_items(1);
    $featuredItem = $featuredItems[0];

    $html = '<h2>Featured <span class="type-featured">Item</span></h2>';
    if ($featuredItem) {
        set_current_record('item', $featuredItem); // Needed for transparent access of item metadata.

       if (metadata('item', 'has thumbnail')) {
           $html .= link_to_item(item_square_thumbnail(), array('class'=>'image'));
       }
       // Grab the 1st Dublin Core description field (first 150 characters)
       $itemDescription = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>150));
       $html .= '<p><span class="title">' . link_to_item() . '</span>&nbsp;&nbsp;&nbsp;' . $itemDescription . '</p>';
    } else {
       $html .= '<p>No featured items are available.</p>';
    }

    return $html;
}


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