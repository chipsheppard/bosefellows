<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BoseFellows
 */

global $wp_query;
$total_results = $wp_query->found_posts;

get_header(); ?>

		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<header class="page-header">
					<h1 class="page-title">Search<br>Results</h1>
				</header>

				<div class="entry-content inner-wrap">

					<div class="results-brief">
						<?php printf( esc_html__( '%s Results for: "%s"', 'bosefellows' ), $total_results, '<span>' . get_search_query() . '</span>' ); ?>
					</div>

					<div class="results col-2-3 silo">

						<?php
						if ( have_posts() ) :

							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'search' );
							endwhile;

							the_posts_pagination( array(
								'mid_size' => 2,
								'prev_text' => __( '<span class="circlearrow-left"></span>', 'bosefellows' ),
								'next_text' => __( '<span class="circlearrow-right"></span>', 'bosefellows' ),
							) );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</div><!-- .silo -->
				</div><!-- .entry-content -->

			</main>
		</section>

<?php
get_footer();
