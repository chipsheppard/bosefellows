<?php
/**
 * The template for a page with a right sidebar.
 *
 * Template Name: Right Sidebar
 *
 * @package BoseFellows
 */

add_filter( 'body_class', function( $classes ) {
  return array_merge( $classes, array( 'sidebar-right' ) );
} );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
			while ( have_posts() ) : the_post();

  			get_template_part( 'template-parts/content', 'page' );

  			// If comments are open or we have at least one comment, load up the comment template.
  			if ( comments_open() || get_comments_number() ) :
  				comments_template();
  			endif;

      endwhile; // End of the loop.
      ?>

		</main>
	</div>

<?php
get_sidebar();
get_footer();
