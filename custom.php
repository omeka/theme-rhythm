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
        $html .= '<p><span class="title">' . link_to_collection() . '</span>';
        if ($featuredCollection->description) {
            $html .= '&nbsp;' . collection('Description', array('snippet'=>150));
        }
        $html .= '</p>';
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

/**
 * This function checks the Logo theme option, then returns either an
 * image tag with the logo as the src, or returns null.
 *
 **/
function rhythm_display_logo()
{
    if(function_exists('get_theme_option')) {
        
        $logo = get_theme_option('Logo');
        
        $logoPath = WEB_THEME_UPLOADS.DIRECTORY_SEPARATOR.$logo;
        
	    $siteTitle = $logo ? '<img src="'.$logoPath.'" title="'.settings('site_title').'" />' : null;
	
	    return $siteTitle;
    }
    
    return null;
}

function rhythm_show_item_metadata(array $options = array(), $item = null)
{
    if (!$item) {
        $item = get_current_item();
    }
	if ($dcFieldsList = get_theme_option('display_dublin_core_fields')) {
	    $html = '';
	    $dcFields = explode(',', $dcFieldsList);
	    foreach ($dcFields as $field) {
	        $field = trim($field);
	        if ($fieldValue = item('Dublin Core', $field)) {
	            $html .= '<h3>'.$field.'</h3>';
	            $html .= $fieldValue;
	        }
	    }
	    $html .= show_item_metadata(array('show_element_sets' => array('Item Type Metadata')));
	    return $html;
	} else {
	    return show_item_metadata($options, $item); 
    }
}

function rhythm_public_nav_header()
{
    if ($customHeaderNavigation = get_theme_option('custom_header_navigation')) {
        $navArray = array();
        $customLinkPairs = explode("\n", $customHeaderNavigation);
        foreach ($customLinkPairs as $pair) {
            $pair = trim($pair);
            if ($pair != '') {
                $pairArray = explode('|', $pair, 2);
                if (count($pairArray) == 2) {
                    $link = trim($pairArray[0]);
                    $url = trim($pairArray[1]); 
                    if (!string_begins_with($url, 'http://') && !string_begins_with($url, 'https://')){
                        $url = uri($url);
                    }
                }
                $navArray[$link] = $url;
            }
        }
        return nav($navArray);
    } else {
        $navArray = array('Browse Items' => uri('items'), 'Browse Collections'=>uri('collections'));
        return public_nav_main($navArray);
    }
}

// General helpers
function string_begins_with($string, $search)
{
    return (strncmp($string, $search, strlen($search)) == 0);
}