<?php

// function custom_excerpt_length( $length ) {
// 	return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// die((get_template_directory()));

//add component fields
// foreach (glob(get_template_directory() . "/resources/blocks/**/*.php") as $file) {
//     // die($file);
//     include $file;
// }

// add_action( 'acf/init', 'my_register_blocks' );
//     function my_register_blocks() {

//         // check function exists
//         if ( function_exists( 'acf_register_block' ) ) {
//             // register a testimonial block
//             acf_register_block( array(
//                 'name'            => 'example',
//                 'title'           => __( 'Example' ),
//                 'description'     => __( 'A test block.' ),
//                 'render_template' => 'resources/blocks/example/example.blade.php'
//             ));
//         }

//         // check function exists
//         if ( function_exists( 'acf_register_block' ) ) {
//             // register a testimonial block
//             acf_register_block( array(
//                 'name'            => 'ciao',
//                 'title'           => __( 'Ciao' ),
//                 'description'     => __( 'A ciao block.' ),
//                 'render_template' => 'resources/blocks/example/ciao.blade.php'
//             ));
//         }
//     }

/*
|--------------------------------------------------------------------------
| Whitelisted Gutenberg Blocks Sage
|--------------------------------------------------------------------------
*/

// add_filter( 'allowed_block_types_all', 'sage_allowed_block_types', 25, 2 );
 
// function sage_allowed_block_types( $allowed_blocks, $editor_context ) {
 
// 	return array(
// 		'core/image',
// 		'core/paragraph',
// 		'core/heading',
// 		'core/list',
// 		'acf/testimonial'
// 	);
 
// }

/*
|--------------------------------------------------------------------------
| Add Custom Classes to Menu Items
|--------------------------------------------------------------------------
*/

add_filter( 'wp_nav_menu_objects', 'add_nav_menu_item_class' );

function add_nav_menu_item_class( $items ) {
    foreach ( $items as $item ) {
        $item->classes[] = 'no-underline hover:underline';
    }
    return $items;
}

/*
|--------------------------------------------------------------------------
| Add TinyMce Support
|--------------------------------------------------------------------------
*/

function getBlockFormats($blockFormats)
{
    if (!empty($blockFormats)) {
        $blockFormatStrings = array_map(
            function ($tag, $label) {
                return "${label}=${tag}";
            },
            $blockFormats,
            array_keys($blockFormats)
        );
        return implode(';', $blockFormatStrings);
    }
    return '';
}

function getConfig()
{
    return [
        'blockformats' => [
            'Paragraph' => 'p',
            'Heading 1' => 'h1',
            'Heading 2' => 'h2',
            'Heading 3' => 'h3',
            'Heading 4' => 'h4',
            'Heading 5' => 'h5',
            'Heading 6' => 'h6'
        ],
        'styleformats' => [
            [
                'title' => 'Headings',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Heading 1',
                        'classes' => 'h1',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 2',
                        'classes' => 'h2',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 3',
                        'classes' => 'h3',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 4',
                        'classes' => 'h4',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 5',
                        'classes' => 'h5',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 6',
                        'classes' => 'h6',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Serif',
                        'classes' => 'serif',
                        'selector' => '*'
                    ]
                ]
            ],
            [
                'title' => 'Body',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Small',
                        'classes' => 'small',
                        'selector' => 'p'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ]
                ]
            ],
            [
                'title' => 'Buttons',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Button',
                        'classes' => 'button',
                        'selector' => 'a,button'
                    ],
                    [
                        'title' => 'Button Ghost',
                        'classes' => 'button--ghost',
                        'selector' => 'a,button'
                    ],
                    [
                        'title' => 'Button Small',
                        'classes' => 'button--small',
                        'selector' => '.button'
                    ],
                    [
                        'title' => 'Button Link',
                        'classes' => 'button--link',
                        'selector' => '.button'
                    ]
                ]
            ]
        ],
        'toolbars' => [
            'default' => [
                [
                    'formatselect',
                    'styleselect',
                    'bold',
                    'italic',
                    'underline',
                    'superscript',
                    'blockquote',
                    '|',
                    'forecolor',
                    'backcolor',
                    '|',
                    'alignleft',
                    'aligncenter',
                    'alignright',
                    'alignjustify',
                    '|',
                    'bullist',
                    'numlist',
                    '|',
                    'link',
                    'unlink',
                    '|',
                    'removeformat'
                ]
            ],
            'basic' => [
                [
                    'bold',
                    'italic',
                    'underline',
                    'superscript',
                    'blockquote',
                    '|',
                    'forecolor',
                    'backcolor',
                    '|',
                    'alignleft',
                    'aligncenter',
                    'alignright',
                    'alignjustify',
                    '|',
                    'link',
                    'unlink'
                ]
            ]
        ]
    ];
}

/*
|--------------------------------------------------------------------------
| Custom Length Excerpt
|--------------------------------------------------------------------------
*/

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');
