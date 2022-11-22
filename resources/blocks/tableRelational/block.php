<?php
/**
 * Posts Loop Block
 */


// $data is what we're going to expose to our render template
$data = array(
	'selection_type' => get_field( 'selection_type' ),
	'category' => get_field( 'category' ),
	'limit' => get_field( 'limit' ),
	'select_posts' => get_field('select_posts')
);

// Dynamic block ID
$block_id = 'tableRelational-' . $block['id'];

// Check if a custom ID is set in the block editor
if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
}

// Block classes
$class_name = 'tableRelational';
if( !empty($block['class_name']) ) {
    $class_name .= ' ' . $block['class_name'];
}

// WP Query Args
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$queryArgs = array(
	'paged'     => $paged, 
    'post_type' => 'report',
	'posts_per_page' => -1
);

// If the selection type is "recent", check  for categories and limit
if ( $data['selection_type'] == 'recent' ) {
    $queryArgs['category__in'] = $data['category'];
    // $queryArgs['posts_per_page'] = $data['limit'];
}

// If the selection type is "select", pass in the selected post IDs
// if ( $data['selection_type'] == 'select' ) {
//     $queryArgs['post__in'] = $data['select_posts'];
// }

// Create a new WP_Query instance
$posts = new WP_Query( $queryArgs );

// Expose the response of WP_Query to the render template
$data['posts'] = $posts;

/** 
 * Pass the block data into the template part
 */ 

get_template_part(
	'/resources/blocks/tableRelational/template',
	null,
	array(
		'block'      => $block,
		'is_preview' => $is_preview,
		'post_id'    => $post_id,

		'data'       => $data,
        'class_name' => $class_name,
        'block_id'   => $block_id,
	)
);
