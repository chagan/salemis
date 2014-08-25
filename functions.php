<?php // Opening PHP tag - nothing should be before this, not even whitespace

/**
 * Co-authors in RSS and other feeds
 * /wp-includes/feed-rss2.php uses the_author(), so we selectively filter the_author value
 */
function db_coauthors_in_rss( $the_author ) {

if ( !is_feed() || !function_exists( 'coauthors' ) )
   return $the_author;

return coauthors( null, null, null, null, false );
}
add_filter( 'the_author', 'db_coauthors_in_rss' );

add_filter( 'breadcrumb_trail', '__return_false' );

?>