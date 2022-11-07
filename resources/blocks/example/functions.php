<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_example',
		'title' => 'Example',
		'fields' => array(
			array(
				'key' => 'field_contentHtml',
				'label' => 'Content',
				'name' => 'contentHtml',
				'aria-label' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'tabs' => 'all',
				'toolbar' => 'default',
				'media_upload' => 1,
				'delay' => 0,
			),
			array(
				'key' => 'field_image',
				'label' => 'Image',
				'name' => 'image',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/example',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'render_template'   => 'resources/blocks/example/index.blade.php',
		'render_callback'   => 'my_acf_bock_render_callback',
		'show_in_rest' => 0,
	));
endif;

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	// check function exists
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block
		acf_register_block_type(array(
				'name'          => 'example',
				'title'         => __('Example'),
				'description'       => __('A custom example block.'),
				'render_template'   => 'resources/blocks/example/example.blade.php',
				'render_callback'   => 'my_acf_bock_render_callback',
				'category'      => 'formatting',
				'icon'          => 'admin-comments',
				'keywords'      => array( 'testimonial', 'quote' ),
		));
	}
}
