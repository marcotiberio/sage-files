<?php

/*
|--------------------------------------------------------------------------
| Register ACF Blocks
|--------------------------------------------------------------------------
*/

require get_template_directory() . '/resources/blocks/register-blocks.php';

/*
|--------------------------------------------------------------------------
| Register CPT
|--------------------------------------------------------------------------
*/

add_action( 'init', function() {
	register_extended_post_type( 'report', [

		# Add Gutenberg
		'show_in_rest' => true,

		# Show all posts on the post type archive:
		// 'archive' => [
		// 	'nopaging' => true,
		// ],

		# Add some custom columns to the admin screen:
		// 'admin_cols' => [
		// 	'story_featured_image' => [
		// 		'title'          => 'Illustration',
		// 		'featured_image' => 'thumbnail'
		// 	],
		// 	'story_published' => [
		// 		'title_icon'  => 'dashicons-calendar-alt',
		// 		'meta_key'    => 'published_date',
		// 		'date_format' => 'd/m/Y'
		// 	],
		// 	'story_genre' => [
		// 		'taxonomy' => 'genre'
		// 	],
		// ],

		# Add some dropdown filters to the admin screen:
		// 'admin_filters' => [
		// 	'story_genre' => [
		// 		'taxonomy' => 'genre'
		// 	],
		// 	'story_rating' => [
		// 		'meta_key' => 'star_rating',
		// 	],
		// ],

	], [

		# Override the base names used for labels:
		// 'singular' => 'Story',
		// 'plural'   => 'Stories',
		// 'slug'     => 'stories',

	] );
} );

/*
|--------------------------------------------------------------------------
| Whitelisted Gutenberg Blocks Sage
|--------------------------------------------------------------------------
*/

add_filter( 'allowed_block_types_all', 'sage_allowed_block_types', 25, 2 );
 
function sage_allowed_block_types( $allowed_blocks, $editor_context ) {
 
	// return array(
	// 	'core/image',
	// 	'core/paragraph',
	// 	'core/heading',
	// 	'core/list',
	// 	'acf/testimonial'
	// );
 
}

/*
|--------------------------------------------------------------------------
| Options Page
|--------------------------------------------------------------------------
*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global Options',
        'menu_title'    => 'Global Options',
        'menu_slug'     => 'global-options-settings',
        'capability'    => 'edit_posts',
        'parent_slug'   => '',
        'redirect'      => false,
        'position'      => false,
        'icon_url'      => false
    ));
    
}

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
| Custom Length Excerpt
|--------------------------------------------------------------------------
*/

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
|--------------------------------------------------------------------------
| Deactivate Comments
|--------------------------------------------------------------------------
*/

// Removes from admin menu
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
// Removes from admin bar
function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');

/*
|--------------------------------------------------------------------------
| Clean up wp_head()
|--------------------------------------------------------------------------
|
| Remove unnecessary <link>'s
| Remove inline CSS and JS from WP emoji support
| Remove inline CSS used by Recent Comments widget
| Remove inline CSS used by posts with galleries
| Remove self-closing tag
|
*/

add_action('init', function () {
    // Originally from http://wpengineer.com/1438/wordpress-header/
    remove_action('wp_head', 'feed_links_extra', 3);
    add_action('wp_head', 'ob_start', 1, 0);
    add_action('wp_head', function () {
        $pattern = '/.*' . preg_quote(esc_url(get_feed_link('comments_' . get_default_feed())), '/') . '.*[\r\n]+/';
        echo preg_replace($pattern, '', ob_get_clean());
    }, 3, 0);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('use_default_gallery_style', '__return_false');
    add_filter('emoji_svg_url', '__return_false');
});

/*
|--------------------------------------------------------------------------
| Get File Size
|--------------------------------------------------------------------------
*/

function getFileSize($id)
{
    $file = get_attached_file($id);
    if ($file) {
        $bytes = filesize($file);
        $s = array('b', 'Kb', 'Mb', 'Gb');
        $e = floor(log($bytes) / log(1024));
        return sprintf('%.2f ' . $s[$e], ($bytes / pow(1024, floor($e))));
    } else {
        return null;
    }
}

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
