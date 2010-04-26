<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible.

add_filter(array('Display', 'Item', 'Dublin Core', 'Title'), 'show_untitled_items');

function show_untitled_items($title)
{
    // Remove all whitespace and formatting before checking to see if the title 
    // is empty.
    $prepTitle = trim(strip_formatting($title));
    if (empty($prepTitle)) {
        return '[Untitled]';
    }
    return $title;
}

function rhythm_display_random_featured_collection()
{
    $featuredCollection = random_featured_collection();
    set_current_collection($featuredCollection);
    $html = '<h2>Featured <span class="type-featured">Collection</span></h2>';
    if ( $featuredCollection ) {

        if ($featuredCollection->description) {
            $html .= '<p><span class="title">' . link_to_collection() . '</span>&nbsp;' . collection('Description', array('snippet'=>150)) . '</p>';
        }
        
    } else {
        $html .= '<p>There are no featured collections right now.</p>';
    }
    return $html;
}

function rhythm_display_random_featured_item($withImage=true)
{
    $featuredItem = random_featured_item($withImage);

	$html = '<h2>Featured <span class="type-featured">Item</span></h2>';
	if ($featuredItem) {
        set_current_item($featuredItem); // Needed for transparent access of item metadata.

	   if (item_has_thumbnail()) {
	       $html .= link_to_item(item_thumbnail(), array('class'=>'image'));
	   }
	   // Grab the 1st Dublin Core description field (first 150 characters)
	   $itemDescription = item('Dublin Core', 'Description', array('snippet'=>150));
	   $html .= '<p><span class="title">' . link_to_item() . '</span>&nbsp;&nbsp;&nbsp;' . $itemDescription . '</p>';
	} else {
	   $html .= '<p>No featured items are available.</p>';
	}

    return $html;
}

function rhythm_display_random_featured_item_squarethumb($withImage=true)
{
    $featuredItem = random_featured_item($withImage);

	$html = '<h2>Featured <span class="type-featured">Item</span></h2>';
	if ($featuredItem) {
        set_current_item($featuredItem); // Needed for transparent access of item metadata.

	   if (item_has_thumbnail()) {
	       $html .= link_to_item(item_square_thumbnail(), array('class'=>'image'));
	   }
	   // Grab the 1st Dublin Core description field (first 150 characters)
	   $itemDescription = item('Dublin Core', 'Description', array('snippet'=>150));
	   $html .= '<p><span class="title">' . link_to_item() . '</span>&nbsp;&nbsp;&nbsp;' . $itemDescription . '</p>';
	} else {
	   $html .= '<p>No featured items are available.</p>';
	}

    return $html;
}

/**
 * This function returns the style sheet for the theme. It will use the argument
 * passed to the function first, then the theme_option for Style Sheet, then
 * a default style sheet.
 *
 * @param $styleSheet The name of the style sheet to use. (null by default)
 *
 **/
function rhythm_get_stylesheet($styleSheet = null)
{    
    if (!$styleSheet) {
        
        $styleSheet = get_theme_option('Style Sheet') ? get_theme_option('Style Sheet') : 'fall';
    }
    
    return $styleSheet; 
    
}

function rhythm_display_tagline()
{
    if ($tagline = get_theme_option('site_tagline')) {
        return '<p class="tagline">'.$tagline.'</p>';  
    }
}