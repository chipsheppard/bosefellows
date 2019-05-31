<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BoseFellows
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header inner-wrap">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						//the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="inner-wrap">
					<?php	$bosecount = 0;
					/* Loop */
					while ( have_posts() ) : the_post();
						$bosecount++;
						set_query_var( 'bose_count', $bosecount );
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile; ?>

					<div class="clearfix"></div>
					<?php
					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( '<span class="circlearrow-left"></span>', 'bosefellows' ),
						'next_text' => __( '<span class="circlearrow-right"></span>', 'bosefellows' ),
					) ); ?>
				</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</main>
	</div>

<?php
get_footer();
