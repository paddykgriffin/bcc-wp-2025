<?php

/**
 * bcc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bcc
 */

if (! defined('BCC_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('BCC_VERSION', '1.1.12');
}

if (! defined('BCC_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `bcc_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'BCC_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none '
	);
}

if (! function_exists('bcc_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bcc_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bcc, use a find and replace
		 * to change 'bcc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('bcc', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'bcc'),
				'footer1' => __('Footer Menu 1', 'bcc'),
				'footer2' => __('Footer Menu 2', 'bcc'),
				'footer3' => __('Footer Menu 3', 'bcc'),
				'footerPrivacy' => __('Footer Privacy', 'bcc'),
				'sidebarRightMenu' => __('Sidebar Menu', 'bcc'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'bcc_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bcc_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'bcc'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'bcc'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => __('News Sidebar', '_bless'),
			'id' => 'news-sidebar',
			'description' => __('Add widgets here on the latest news page.', '_bless'),
			'before_widget' => '<div id="%1$s" class="widget %2$s mb-8">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
			array(
				'name'          => __('Mailchimp Full', 'bcc'),
				'id'            => 'mailchimp',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s ">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
			)
		);


}
add_action('widgets_init', 'bcc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bcc_scripts()
{
	wp_enqueue_style('bcc-style', get_stylesheet_uri(), array(), BCC_VERSION);
	wp_enqueue_script('bcc-script', get_template_directory_uri() . '/js/script.min.js', array(), BCC_VERSION, true);
	wp_enqueue_script('bcc-custom-script', get_template_directory_uri() . '/js/custom.min.js', array(), BCC_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bcc_scripts');

/**
 * Enqueue the block editor script.
 */
function bcc_enqueue_block_editor_script()
{
	$current_screen = function_exists('get_current_screen') ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_script(
			'bcc-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			BCC_VERSION,
			true
		);
		wp_add_inline_script('bcc-editor', "tailwindTypographyClasses = '" . esc_attr(BCC_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'bcc_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function bcc_tinymce_add_class($settings)
{
	$settings['body_class'] = BCC_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'bcc_tinymce_add_class');

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function bcc_modify_heading_levels($args, $block_type)
{
	if ('core/heading' !== $block_type) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array(2, 3, 4);

	return $args;
}
add_filter('register_block_type_args', 'bcc_modify_heading_levels', 10, 2);

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
function wpse_remove_edit_post_link($link)
{
	return '';
}
add_filter('edit_post_link', 'wpse_remove_edit_post_link');


// 

/**
 * Excerpt length
 */
function custom_excerpt_length($length)
{
	return 20; // Set to 30 words
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

/**
 * Support SVG uploads.
 */
function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
 * Function add google fonts to wp-head - Raleway (Headings & Body)
 */
function enqueue_google_fonts()
{
	wp_enqueue_style('google-raleway', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');


/**
 * Function add google fonts to wp-head - Bree Serif (Buttons)
 */
function enqueue_google_fonts2()
{
	wp_enqueue_style('google-bree-serif', 'https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts2');


/**
 * Function add google icons to wp-head
 */
function enqueue_google_icons()
{
	wp_enqueue_style('google-material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');
}
add_action('wp_enqueue_scripts', 'enqueue_google_icons');

/**
 * Function - Hide Admin Bar
 */
add_filter('show_admin_bar', '__return_false');


/**
 * Function custom link on the primary menu
 */
function add_primary_menu_link($atts, $item, $args, $depth)
{

	$menu_locations = ['menu-1']; // Define the menu locations

	if (in_array($args->theme_location, $menu_locations)) {
		$atts['class'] = 'nav-primary-link default-transition'; // Add your custom class
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_primary_menu_link', 10, 4);


/**
 * Function - Tile/Square Images
 */
add_image_size('tile-sm', 200, 200, true);
add_image_size('tile-md', 400, 400, true);
add_image_size('tile-lg', 800, 800, true);


/**
 * Function - Content Images (recentangles)
 */
add_image_size('landscape', 640, 400, true);
add_image_size('landscape-md', 960, 600, true);
add_image_size('landscape-lg', 1280, 800, true);


/**
 * Function - Hero Inner Size
 */
add_image_size('banner-xl', 1680, 375, true);


/**
 * Function - Desktop Hero Images
 */
add_image_size('desktop-lg-hero', 1440, 900, true);
add_image_size('desktop-xl-hero', 1680, 1050, true);
add_image_size('desktop-xxl-hero', 1920, 1080, true);
add_image_size('desktop-xxxl-hero', 2465, 1216, true);

/*-----------------------------------------------------------------------------------*/
/* Menu Name
/* ref: https://gist.github.com/BronsonQuick/2706609
/*-----------------------------------------------------------------------------------*/



/**
 * Function - Returns Menu Name
 */
function wp_nav_menu_title($theme_location)
{
	$title = '';
	if ($theme_location && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
		$menu = wp_get_nav_menu_object($locations[$theme_location]);
		if ($menu && $menu->name) {
			$title = $menu->name;
		}
	}
	return apply_filters('wp_nav_menu_title', $title, $theme_location);
}

/**
 * Function - Add Menu Item Class
 */
function add_menu_list_item_class($classes, $item, $args) {
  if (property_exists($args, 'list_item_class')) {
      $classes[] = $args->list_item_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


/**
 * Function - Add Menu Link Class
 */
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


function custom_search_form($form)
{
	$form = '
    <form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label class="sr-only">
           Search
        </label>
		 <input type="search" class="search-field" placeholder="' . esc_attr__('Search', '_bless') . '" value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit">
            <span class="material-symbols-outlined text-primary">search</span>
        </button>
    </form>';
	return $form;
}
add_filter('get_search_form', 'custom_search_form');