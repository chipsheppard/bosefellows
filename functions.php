<?php
/**
 * BoseFellows functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BoseFellows
 */

if ( ! function_exists( 'bosefellows_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bosefellows_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'bosefellows', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in 3 locations.
		register_nav_menus( array(
			'menuleft' => esc_html__( 'Menu Left', 'bosefellows' ),
			'menuright' => esc_html__( 'Menu Right', 'bosefellows' ),
			'menumobilehome' => esc_html__( 'Mobile Menu Home', 'bosefellows' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bosefellows_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'bosefellows_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 * https://codex.wordpress.org/Content_Width
 *
 * @global int $content_width
 */
function bosefellows_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bosefellows_content_width', 1024 );
}
add_action( 'after_setup_theme', 'bosefellows_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bosefellows_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bosefellows' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'The Sidebar Widget', 'bosefellows' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Upper Left Footer Widget Area', 'bosefellows' ),
		'id' => 'footer-1',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bosefellows' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Upper Right Footer Widget Area', 'bosefellows' ),
		'id' => 'footer-2',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bosefellows' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Bottom Left Footer Widget Area', 'bosefellows' ),
		'id' => 'footer-3',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bosefellows' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Bottom Right Footer Widget Area', 'bosefellows' ),
		'id' => 'footer-4',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bosefellows' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

}
add_action( 'widgets_init', 'bosefellows_widgets_init' );


/*
 * Add Theme support for WooCommerce
 *
 * http://www.wpexplorer.com/woocommerce-compatible-theme/
 *
 */

// Add new constant that returns true if WooCommerce is active.
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

// Checking if WooCommerce is active.
if ( WPEX_WOOCOMMERCE_ACTIVE ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Enqueue scripts and styles.
 */
function bosefellows_scripts() {
	wp_enqueue_style( 'bosefellows-style', get_stylesheet_uri(), array(), '1.0.1' );

	wp_enqueue_script( 'bosefellows-headroom', get_template_directory_uri() . '/js/headroom-min.js', array(), '20170612', true );
	wp_enqueue_script( 'bosefellows-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170605', true );
	wp_enqueue_script( 'bosefellows-javascript', get_template_directory_uri() . '/js/global-min.js', array( 'jquery' ), '20170605', true );

	if ( is_page_template( 'templates/news.php' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
		wp_enqueue_script( 'masonry-init', get_template_directory_uri() . '/js/masonry-init-min.js', array( 'masonry', 'jquery' ), null, true );
	}

	if ( is_page_template( 'templates/projects.php' ) || is_singular( 'project' ) || is_page_template( 'templates/program.php' ) ) {
		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll-min.js', array(), null, true );
	}

	if ( is_page_template( 'templates/amar.php' ) ) {
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '2.1.1', true );
	}

	if ( is_page_template( 'templates/homepage.php' ) ) {
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '2.1.1', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
		wp_enqueue_script( 'home', get_template_directory_uri() . '/js/home-min.js', array( 'jquery' ), null, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bosefellows_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
