<?php

/*
	Template name: index
*/

get_header();


foreach ( $GLOBALS['sections'] as $section ) {
	if ( $section['is_visible'] ) {
		$section_id = $section['sect_id'] ? ' id="' . $section['sect_id'] . '"' : '';

		// if ( $GLOBALS['sections'][0] === $section ) {
		// 	$section_title_tag_start = '<h1>';
		// 	$section_title_tag_end = '</h1>';
		// } else {
		// 	$section_title_tag_start = '<h2>';
		// 	$section_title_tag_end = '</h2>';
		// }
		
		require 'template-parts/' . $section['acf_fc_layout'] . '.php';
	}
}

get_footer();