<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Relevanssi and Site Editor Compatibility
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Makes Relevanssi compatible with the Site Editor (see <a href="https://www.relevanssi.com/knowledge-base/gutenberg-full-site-editing/">www.relevanssi.com</a>)
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

add_filter( 'relevanssi_search_ok', function ( $ok, $query ) {
	if ( ! empty( $query->query_vars['s'] ) ) {
		$ok = true;
	}
	return $ok;
}, 10, 2 );

add_filter( 'wp_trim_words', function ( $text, $num_words, $more, $original_text ) {
	global $post;
	if ( isset( $post->relevance_score ) ) {
		return $post->post_excerpt;
	}
	return $text;
}, 10, 4 );
