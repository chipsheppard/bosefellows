<?php
/**
 * The template for displaying the Projects page.
 *
 * Template Name: Projects
 *
 * @package BoseFellows
 */

$proj0 = new WP_Query(array(
	'post_type' => 'project',
	'posts_per_page' => 5,
	'orderby' => 'rand',
	'tax_query' => array(
		array(
			'taxonomy' => 'project_type',
			'field' => 'slug',
			'terms' => 'featured',
		),
	),

));
$cnt = 0;
while ( $proj0->have_posts() && $cnt < 1 ) :
	$proj0->the_post();
	$cnt++;
	$featured = get_the_post_thumbnail_url();
	$furl = get_the_permalink();
endwhile;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php wp_reset_postdata(); ?>

			<header class="page-header inner-wrap">
				<h1 class="page-title">
					<?php the_field( 'page_header' ); ?>
				</h1>
				<div class="more white"><a href="<?php echo esc_url( $furl ); ?>">Show Me <span class="arrow-right"></span></a></div>
			</header>

			<div class="entry-content">

				<div class="inner-wrap">
					<div class="project-intro-block">
						<?php the_field( 'page_intro' ); ?>
					</div>
					<div class="project-filter stick-to-top">
						<?php
						the_field( 'filter_block' );
						bosefellows_post_tag_dropdown( 'project' );
						bosefellows_project_status_dropdown();
						?>
					</div>
				</div>


				<div class="cards-wrap clearfix">
					<div class="inner-wrap">

<a name="new"></a>
						<div class="left-col first">
							<?php if ( get_field( 'first_callout' ) ) : ?>
								<div class="callout co1">
									<?php the_field( 'first_callout' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( get_field( 'second_callout' ) ) : ?>
								<div class="callout co2">
									<?php the_field( 'second_callout' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( get_field( 'third_callout' ) ) : ?>
								<div class="callout co3">
									<?php the_field( 'third_callout' ); ?>
								</div>
							<?php endif; ?>
							&nbsp;
						</div>

						<div class="cards">
							<?php
							$proj1 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 30,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'new',
									),
								),
							));
							while ( $proj1->have_posts() ) :
								$proj1->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'q1 card' ); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi';endif;?>">
<?php if ( ! empty( $featured_image_url ) ) : ?>
										<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $proj1->ID, 'thumbnail' ); ?>');"></div>
<?php endif; ?>
										<div class="awarded"><?php the_field( 'year_awarded' ); ?></div>
									</header>
									<div class="entry-content">
										<h2 class="project-title"><span><?php the_title(); ?></span></h2>
										<div class="project-description"><?php the_field( 'short_description' ); ?></div>
										<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ) : ?>, <?php the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ) : ?>, <?php the_field( 'third_researcher' ); endif; ?></div>
										<div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div>
									</div>
									<footer class="entry-footer"><?php bosefellows_entry_tags(); ?></footer>
								</a>
							</article>
							<?php
							endwhile;
							wp_reset_postdata();
							?>

<a name="underway"></a>
							<?php
							$proj2 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 30,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'underway',
									),
								),
							));
							while ( $proj2->have_posts() ) :
								$proj2->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'q2 card' ); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi';endif;?>">
<?php if ( ! empty( $featured_image_url ) ) : ?>
										<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $proj2->ID, 'thumbnail' ); ?>');"></div>
<?php endif; ?>
										<div class="awarded"><?php the_field( 'year_awarded' ); ?></div>
									</header>
									<div class="entry-content">
										<h2 class="project-title"><span><?php the_title(); ?></span></h2>
										<div class="project-description"><?php the_field( 'short_description' ); ?></div>
										<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ) : ?>, <?php the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ) : ?>, <?php the_field( 'third_researcher' ); endif; ?></div>
										<div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div>
									</div>
									<footer class="entry-footer"><?php bosefellows_entry_tags(); ?></footer>
								</a>
							</article>
							<?php
							endwhile;
							wp_reset_postdata();
							?>

<!--
						</div>

					</div>
					<div class="clearfix"></div>
-->
<!--
					<?php // if ( get_field( 'insert_image' ) ) :. ?>
						<div class="bosequote-insert clearfix">
							<img src="<?php // the_field( 'insert_image' );. ?>" width="1280" height="508">
							<div class="borderbox-tl"></div>
							<div class="more white"><a href="<?php // the_field( 'insert_link_url' );. ?> " rel="bookmark"><?php // the_field( 'insert_link_text' );. ?>  <span class="arrow-right"></span></a></div>
							<div class="text-overlay">
								<?php // the_field( 'insert_text' );. ?>
							</div>
						</div>
					<?php // endif;. ?>
-->
<!--
					<div class="inner-wrap">

						<div class="left-col first">
							<div>&nbsp;</div>
						</div>

						<div class="cards">
-->
<a name="completed"></a>
							<?php
							$proj3 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 30,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'completed',
									),
								),
							));
							while ( $proj3->have_posts() ) :
								$proj3->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'q3 card' ); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi';endif;?>">
<?php if ( ! empty( $featured_image_url ) ) : ?>
										<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $proj3->ID, 'thumbnail' ); ?>');"></div>
<?php endif; ?>
										<div class="awarded"><?php the_field( 'year_awarded' ); ?></div>
									</header>
									<div class="entry-content">
										<h2 class="project-title"><span><?php the_title(); ?></span></h2>
										<div class="project-description"><?php the_field( 'short_description' ); ?></div>
										<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ) : ?>, <?php the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ) : ?>, <?php the_field( 'third_researcher' ); endif; ?></div>
										<div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div>
									</div>
									<footer class="entry-footer"><?php bosefellows_entry_tags(); ?></footer>
								</a>
							</article>
							<?php
							endwhile;
							wp_reset_postdata();
							?>

							<div class="clearfix">&nbsp;</div>

						</div><!-- /cards -->
					</div><!-- /inner-wrap -->
				</div><!-- /cards-wrap -->

				<div class="end-sticky"></div>
				<div class="page-footer">
					<h2><?php the_field( 'bottom_block_title' ); ?></h2>
					<p><?php the_field( 'bottom_block_text' ); ?></p>
					<div class="more"><a href="<?php the_field( 'bottom_block_link_url' ); ?>"><?php the_field( 'bottom_block_link_text' ); ?> <span class="arrow-right"></span></a></div>
				</div>

			</div><!-- /entry-content -->
		</main>
	</div>

<?php
get_footer();
