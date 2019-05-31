<?php
/**
 * The template for displaying the Support page.
 *
 * Template Name: Support
 *
 * @package BoseFellows
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="page-header">
					<h1 class="page-title">
						<?php the_field( 'page_header' ); ?>
					</h1>
				</header>

				<div class="entry-content">
					<div class="inner-wrap">

						<div class="intro-block">
							<?php the_field( 'page_intro' ); ?>
						</div>
						<div class="clearfix"></div>

						<div class="top-insert">
							<?php the_field( 'top_insert' ); ?>
						</div>
						<div class="clearfix"></div>

						<div class="content-block">
							<div class="image">
								<img src="<?php the_field( 'content_image' ); ?>" width="" height="">
							</div>
							<div class="borderbox-tr"></div>
							<div class="title">
								<?php the_field( 'content_title' ); ?>
							</div>
							<div class="text">
								<?php the_field( 'content_text' ); ?>
							</div>
						</div>

					</div>
				</div>

			</article>

		<?php endwhile; ?>

		</main>
	</div>

<?php
get_footer();
