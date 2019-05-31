<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BoseFellows
 */

if ( ! function_exists( 'bosefellows_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function bosefellows_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html( '%s', 'post date', 'bosefellows' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html( '%s', 'post author', 'bosefellows' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span> // <span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'bosefellows_entry_cats' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function bosefellows_entry_cats() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bosefellows' ) );
			if ( $categories_list && bosefellows_categorized_blog() ) {
				/* translators: used before list items */
				printf( '<div class="cat-links">' . esc_html__( 'Posted in %1$s', 'bosefellows' ) . '</div>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;



if ( ! function_exists( 'bosefellows_entry_tags' ) ) :
	/**
	 * Prints HTML with meta information for the tags.
	 */
	function bosefellows_entry_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() || 'project' === get_post_type() ) {

			$posttags = get_the_tags();
			if ( $posttags ) {
				echo '<div class="tag-links">';
				foreach ( $posttags as $tag ) {
					echo '<div class="t-link ' . $tag->slug . '"><a href="' . esc_url( site_url() ) . '/tag/' . $tag->slug . '"><span class="abbr">' . $tag->description . '</span><span class="name">' . $tag->name . '</span></a></div>';
				}
				echo '</div>';
			}
		}
	}
endif;



if ( ! function_exists( 'bosefellows_project_status' ) ) :
	/**
	 * Prints the "Status" custom taxonomy on Single Project pages.
	 */
	function bosefellows_project_status() {
		// Hide category and tag text for pages.
		if ( 'project' === get_post_type() ) {
			global $post;
			$status_list = get_the_term_list( $post->ID, 'project_status', '<span class="project-status">', ', ', '</span>' );
			if (!$status_list || is_wp_error($status_list)) {
				echo 'no terms';
			}
			printf( esc_html__( '%1$s', 'bosefellows' ), $status_list ); // WPCS: XSS OK.
			wp_reset_postdata();
		}
	}
endif;



if ( ! function_exists( 'bosefellows_prev_next' ) ) :
	/**
	 * PREVIOUS NEXT LINKS.
	 */
	function bosefellows_prev_next() {
		if ( is_singular( 'post' ) || is_singular( 'project' ) ) :
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			if ( 'post' === get_post_type() ) :
				$linktext = 'View Article';
			elseif ( 'project' === get_post_type() ) :
				$linktext = 'View Project';
			endif;
			?>

		<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text">Post navigation</h2>
			<?php
			if ( ! empty( $prev_post ) ) :
				$previd = $prev_post->ID;
			?>
			<div class="nav-previous" style="background-image: url('<?php echo get_the_post_thumbnail_url( $previd ); ?>');">
					<div class="pnav-link">
						<a href="<?php echo get_permalink( $previd ); ?>" rel="prev"><div class="circlearrow-left"></div> Previous</a>
					</div>
					<div class="pnav-head">
						<?php if ( is_singular( 'post' ) ) : ?>
							<div class="acf-meta">
								<?php the_field( 'publish_date', $previd ); ?> // <?php the_field( 'author', $previd ); ?>
							</div>
						<?php endif; ?>
						<h3><a href="<?php echo get_permalink( $previd ); ?>" rel="prev"><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></a></h3>
						<?php if ( is_singular( 'project' ) ) : ?>
							<div class="project-description">
								<?php the_field( 'short_description', $previd ); ?>
							</div>
						<?php endif; ?>
						<div class="va"><a href="<?php echo get_permalink( $previd ); ?>" rel="bookmark"><?php echo $linktext; ?>  <span class="arrow-right"></span></a></div>
					</div>
				</div>
			<?php else : ?>
				<div class="nav-previous" style="background-image: url('<?php echo get_template_directory_uri() . '/images/fi-search.jpg'; ?>');">
					<div class="pnav-link"><div class="close"></div></div>
					<div class="pnav-head"></div>
				</div>
				<?php
			endif;

			if ( ! empty( $next_post ) ) :
				$nextid = $next_post->ID;
				?>
				<div class="nav-next" style="background-image: url('<?php echo get_the_post_thumbnail_url( $nextid ); ?>');">
					<div class="pnav-link">
						<a href="<?php echo get_permalink( $nextid ); ?>" rel="next">Next <div class="circlearrow-right"></div></a>
					</div>
					<div class="pnav-head">
						<?php if ( is_singular( 'post' ) ) : ?>
							<div class="acf-meta">
								<?php the_field( 'publish_date', $previd ); ?> // <?php the_field( 'author', $previd ); ?>
							</div>
						<?php endif; ?>
						<h3><a href="<?php echo get_permalink( $nextid ); ?>" rel="next"><?php echo apply_filters( 'the_title', $next_post->post_title ); ?></a></h3>
						<?php if ( is_singular( 'project' ) ) : ?>
							<div class="project-description">
								<?php the_field( 'short_description', $nextid ); ?>
							</div>
						<?php endif; ?>
						<div class="va"><a href="<?php echo get_permalink( $nextid ); ?>" rel="bookmark"><?php echo $linktext; ?>  <span class="arrow-right"></span></a></div>
					</div>
				</div>
			<?php else : ?>
				<div class="nav-next" style="background-image: url('<?php echo get_template_directory_uri() . '/images/fi-search.jpg'; ?>');">
					<div class="pnav-link"><div class="close"></div></div>
					<div class="pnav-head"></div>
				</div>
			<?php endif; ?>
			</div>
		</nav>

	<?php
	endif;
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bosefellows_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bosefellows_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bosefellows_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bosefellows_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bosefellows_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bosefellows_categorized_blog.
 */
function bosefellows_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bosefellows_categories' );
}
add_action( 'edit_category', 'bosefellows_category_transient_flusher' );
add_action( 'save_post',     'bosefellows_category_transient_flusher' );
