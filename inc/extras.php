<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BoseFellows
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bosefellows_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bosefellows_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bosefellows_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'bosefellows_pingback_header' );


/**
 * Dont Update the Theme
 * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Bill Erickson
 * @link   http://www.billerickson.net/excluding-theme-from-updates
 * @param array  $r Existing request arguments.
 * @param string $url Request URL.
 * @return array Amended request arguments
 */
function ea_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) :
		return $r; // Not a theme update request. Bail immediately.
	else :
		$themes = json_decode( $r['body']['themes'] );
		$child = get_option( 'stylesheet' );
		unset( $themes->themes->$child );
		$r['body']['themes'] = wp_json_encode( $themes );
		return $r;
	endif;
}

// Remove XML RCP - not using pingbacks or Flickr services.
remove_action( 'wp_head', 'rsd_link' );
// Not using Windows Live Writer.
remove_action( 'wp_head', 'wlwmanifest_link' );
// No need to display what version of WordPress.
remove_action( 'wp_head', 'wp_generator' );
// no real need for relational links in header.
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );


/**
 * Remove emoji.
 */
function disable_emoji_dequeue_script() {
	wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Include Projects in Post_Tag archives
 *
 * @param WP_Query $query Request URL.
 */
function bosefellows_add_custom_types( $query ) {
	if ( ! is_admin() ) {
		if ( is_tag() && empty( $query->query_vars['post_types'] ) ) {
			$query->set( 'post_type', array( 'post', 'nav_menu_item', 'project' ) );
		}
		return $query;
	}
}
add_filter( 'pre_get_posts', 'bosefellows_add_custom_types' );


/**
 * Add a span around "Category:, Tag:, etc...
 * filter get_the_archive_title
 *
 * @param string $title The page titleL.
 */
function bosefellows_archive_title_wrap( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '<div>Category:</div> ', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '<div>Tagged:</div> ', false );
		$title .= display_filter_term(); // see below.
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$ptype = get_post_type( get_the_ID() );
		$title = single_tag_title( '<div>' . $ptype . ' Status:</div> ', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_blog() ) {
		$title = 'Blog' ;
	} else {
		$title = 'Archive' ;
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'bosefellows_archive_title_wrap' );


/**
 * For Filtered searches with multiple Filters - used in is_tag() above
 */
function display_filter_term() {
	if ( ! empty( $_GET['project_status'] ) ) :
		$pstatus = ' <div>Project Status:</div> ' . htmlspecialchars( $_GET['project_status'] );
		return $pstatus;
	endif;
}


/**
 * Change Text in Search Submit Button
 * https://wordpress.org/support/topic/how-do-i-change-some-details-of-the-search-widget
 *
 * @param string $text  the search value.
 */
function bosefellows_search_button( $text ) {
	$text = str_replace( 'value="Search"', 'value="&rsaquo;"', $text );
	return $text;
}
add_filter( 'get_search_form', 'bosefellows_search_button' );

/**
 * Filter the Search Form placeholder text
 *
 * @param string $html the search form placeholder.
 */
function bosefellows_search_form( $html ) {
	return str_replace( 'Search &hellip;', 'Enter search...', $html );
}
add_filter( 'get_search_form', 'bosefellows_search_form' );

/**
 * Filter the Excerpt's Read More link.
 *
 * @param string $more the more text.
 */
function bosefellows_excerpt_more( $more ) {
	return '<a href="' . get_the_permalink() . '" rel="nofollow">Read More...</a>';
}
add_filter( 'excerpt_more', 'bosefellows_excerpt_more' );

/**
 * Remove <p> tags from images
 *
 * @param string $content the content.
 */
function bosefellows_no_ptags_on_images( $content ) {
	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'bosefellows_no_ptags_on_images', 100 );


/**
 * Remove empty paragraphs created by wpautop()
 *
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 * @param string $content the content.
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	return $content;
}
add_filter( 'the_content', 'remove_empty_p', 101, 1 );



/**
 * Place the featured images
 */
function bosefellows_add_featured_image() {
	$featured = '';
	$thumbnail = get_the_post_thumbnail_url();
	$searchimage = get_template_directory_uri() . '/images/fi-search.jpg';
	$errorimage = get_template_directory_uri() . '/images/fi-404.jpg';
	if ( is_page_template( 'templates/amar.php' ) || is_page_template( 'templates/news.php' ) ) {
		return;
	} elseif ( is_search() ) {
		$featured = $searchimage;
	} elseif ( is_404() ) {
		$featured = $errorimage;
	} elseif ( is_page_template( 'archive.php' ) ) {
		$featured = $errorimage;
	} elseif ( $thumbnail ) {
		$featured = $thumbnail;
	} ?>
	<div class="featured-image" <?php if ( $featured ) : ?> style="background-image: url('<?php echo $featured; ?>');"<?php endif; ?>><div class="fi-grad"></div></div>
<?php
}
add_filter( 'themehook_before_content', 'bosefellows_add_featured_image', 5 );


/**
 * Homepage Animation Panels
 */
function bosefellows_home_anim() {
	if ( is_front_page() ) :
	?>
	  <div class="h-panels">
			<div class="h-panel-l"></div>
			<div class="h-panel-r"></div>
		</div>
		<div class="h-panel-content">
			<h2>Reimagining Research</h2>
			<div><a href="<?php echo esc_url( site_url() ); ?>/projects/">Projects</a></div>
			<div><a href="<?php echo esc_url( site_url() ); ?>/program/">Program</a></div>
			<div><a href="<?php echo esc_url( site_url() ); ?>/drbose/">Dr. Bose</a></div>
		</div>
	<?php
	endif;
}
add_filter( 'themehook_before_header', 'bosefellows_home_anim', 6 );

/**
 * Add a body class
 *
 * @param var $classes wp body class.
 */
function bosefellows_home_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'pre-anim';
	}
	return $classes;
}
add_filter( 'body_class', 'bosefellows_home_class' );

/**
 * Add the BIG VIDEO to the Amar page ----
 */
function bosefellows_add_bgvid() {
	if ( ! is_page_template( 'templates/amar.php' ) ) {
		return;
	}
	?>
	<div class="bgvid-wrap">
		<video id="bgvid" class="bgvid" playsinline autoplay muted loop>
			<source src="<?php the_field( 'main_video_webm' ); ?>" type="video/webm">
			<source src="<?php the_field( 'main_video_mp4' ); ?>" type="video/mp4">
		</video>
	</div>
<?php
}
add_filter( 'themehook_before_content', 'bosefellows_add_bgvid', 5 );


/**
 * News top article bg Image ----
 */
function bosefellows_add_top_article() {
	if ( ! is_page_template( 'templates/news.php' ) ) {
		return;
	}
	?>
	<div class="featured-image" style="background-image: url('<?php the_field( 'top_article_image' ); ?>');"><div class="fi-grad"></div></div>
<?php
}
add_filter( 'themehook_before_content', 'bosefellows_add_top_article', 5 );




/**
 * For Single blog posts and Search
 */
function bosefellows_single_bg() {
	if ( is_single() || is_search() || is_page( 'contact' ) ) :
	?>
		<div class="borderbox-tl"></div>
		<div class="nub"></div>
	<?php
	endif;
}
add_filter( 'themehook_before_header', 'bosefellows_single_bg', 6 );

/**
 * For Program and Support
 */
function bosefellows_topborderboxes() {
	if ( ! is_page_template( 'templates/support.php' ) && ! is_page_template( 'templates/program.php' ) && ! is_page_template( 'templates/projects.php' ) && ! is_page_template( 'templates/plato.php' ) ) {
		return;
	}
	if ( is_page_template( 'templates/support.php' ) || is_page_template( 'templates/plato.php' ) ) :
	?>
		<div class="borderbox-tl"></div>
	<?php elseif ( is_page_template( 'templates/program.php' ) || is_page_template( 'templates/projects.php' ) ) : ?>
		<div class="borderbox-tr"></div>
	<?php endif; ?>
<?php
}
add_filter( 'themehook_before_header', 'bosefellows_topborderboxes', 6 );


/**
 * Shortcode for [hangquote]
 */
function bosefellows_hangquote_shortcode() {
	return '<span class="hangquote-left"></span>';
}
add_shortcode( 'hangquote','bosefellows_hangquote_shortcode' );


/**
 * Tag Dropdowns<?php echo esc_url( site_url() ); ?>
 *
 * @link https://codex.wordpress.org/Function_Reference/get_tags
 * @param var $posttype  The current post type.
 */
function bosefellows_post_tag_dropdown( $posttype ) {
	$tags = get_tags();
	$html = '<ul class="post_tags">';
	$html .= '<li class="fb">FILTER BY<ul>';
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id ) . '?post_type=' . $posttype;
		$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'><span>";
		$html .= "{$tag->name}</span></a></li>";
	}
	$html .= "<li class='va'><a href='/?post_type={$posttype}'>View All</a></li>";
	$html .= '</ul></li></ul>';
	echo $html;
}

/**
 * Project Status
 */
function bosefellows_project_status_dropdown() {
	$terms = get_terms( 'project_status', array(
		'hide_empty' => false,
		'orderby' => 'id',
	) );
	$html = '<ul class="status_tags">';
	foreach ( $terms as $term ) {
		$html .= "<li><a href='#{$term->slug}' title='{$term->name} Tag' class='{$term->slug}'>";
		$html .= "{$term->name}</a></li>";
	}
	$html .= '</ul>';
	echo $html;
}
