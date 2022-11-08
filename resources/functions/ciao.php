<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_ciao',
	'title' => 'Ciao',
	'fields' => array(
		array(
			'key' => 'field_text',
			'label' => 'Text',
			'name' => 'text',
			'type' => 'text',
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
				'value' => 'acf/ciao',
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
	'show_in_rest' => 0,
));

endif;		


add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	// check function exists
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block
		acf_register_block_type(array(
                'key' => 'group_ciao',
				'name'          => 'ciao',
				'title'         => __('Ciao'),
				'description'       => __('Ciao block.'),
				'render_template'   => 'resources/views/blocks/ciao.php',
				'render_callback'   => 'my_acf_bock_render_callback',
				'category'      => 'formatting',
				'icon'          => 'admin-comments',
		));
	}
}
