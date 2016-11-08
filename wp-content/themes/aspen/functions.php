<?php

/* This theme uses Adobe Typekit for a few custom fonts (https://typekit.com).
 * The ID is unique to this particular site so if you wanted to use this theme for another site
 * you would need to register with Typekit and get your own ID.
 *
 * Included fonts/weights in this bundle:
 *	- Prenton Condensed Bold
 *	- FF Meta Serif Web Pro Book and Bold
 *	- LFT Etica Web Extra Bold
 */
function aspen_typekit() { ?>
	<script type="text/javascript" src="//use.typekit.net/zni4nda.js"></script>
	<script src="//use.typekit.net/zni4nda.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php
}
add_action( 'wp_head', 'aspen_typekit' );


function aspen_search_filter($query) {
	if ( !$query->is_admin && $query->is_search) {
		$query->set('post_type', array('post', 'page') );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'aspen_search_filter' );

/**
 * Include compiled aspen.min.css
 */
function aspen_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );
	$suffix = (LARGO_DEBUG)? '' : '.min';
	wp_enqueue_style( 'aspen', get_stylesheet_directory_uri().'/css/child' . $suffix . '.css' );
}
add_action( 'wp_enqueue_scripts', 'aspen_stylesheet', 20 );

function aspen_archive_rounduplink_title() {
	$title = __( 'The Bucket: News of Interest to Aspenites', 'aspen' );
	return $title;
}
add_filter( 'largo_archive_rounduplink_title', 'aspen_archive_rounduplink_title' );