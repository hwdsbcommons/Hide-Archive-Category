<?php
/*
Plugin Name: Hide 'Archive' Category
Plugin URI: http://commons.hwdsb.on.ca
Description: Based heavily on the NANOWRIMO Category Reverse Order plugin. Hide posts from the home page if you categorize them as "archive". You need to create a category called "archive".
Version: 1.0
Author: r-a-y, mrjarbenne (kinda)
Author URI: http://commons.hwdsb.on.ca

/**
* Exclude 'archive' category posts from homepage.
*/
function hwdsb_archive_exclude_from_home( $query = false ) {
// Bail if not home, not a query, or not main query
if ( ! is_home() || ! is_a( $query, 'WP_Query' ) || ! $query->is_main_query() )
return;
// Get 'archive' category
$cat = get_category_by_slug( 'archive' );
 
// Cat doesn't exist, so stop now!
if ( empty( $cat ) )
return;
 
// Exclude 'archive' category posts
$query->set( 'cat', '-' . $cat->term_id );
}
add_action( 'pre_get_posts', 'hwdsb_archive_exclude_from_home' );
