<?php
/**
 * The template for displaying the homepage.
 *
 * Template Name: Homepage
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

			<header class="page-header">
				<h1 class="page-title"
						data-aos="fade-up"
						data-aos-anchor=".entry-content"
						data-aos-anchor-placement="top-bottom">
					<?php the_field( 'page_header' ); ?>
				</h1>
			</header>

			<div class="entry-content">

				<div class="borderbox-tl"></div>
				<div class="home-intro inner-wrap">
					<?php the_content(); ?>
				</div>

				<div class="section-head">
					<h2>Recently completed projects</h2>
				</div>

				<div class="home-completed-projects">
					<div class="inner-wrap">

						<div class="top">
							<?php
							$home1 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 10,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'completed',
									),
								),
							));
							$home1count = -1;
							while ( $home1->have_posts() ) :
								$home1->the_post();
								$home1count++;
								$h1slide = 'cslide' . $home1count;
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'home1 ' . $h1slide ); ?>>
								<div class="right">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>">
											<?php the_post_thumbnail( 'large' ); ?>
										</a>
									<?php endif; ?>
									<div class="post-info">
										<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ) : echo ', '; the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ): echo ', '; the_field( 'third_researcher' ); endif; ?></div>
										<div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div>
										<div class="more"><a href="<?php the_permalink(); ?>">View Project <span class="arrow-right"></span></a></div>
									</div>
								</div>
								<?php the_title( '<h2 class="project-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
								<div class="project-description">
									<?php the_field( 'short_description' ); ?>
								</div>
								<div class="the-excerpt">
									<?php the_content(); ?>
								</div>
							</article>

							<?php
						endwhile;
							wp_reset_postdata();
							?>
						</div><!-- /top -->
						<div class="clearfix"></div>

						<div class="cards clearfix">
							<?php
							$home2 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 10,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'completed',
									),
								),
							));
							while ( $home2->have_posts() ) :
								$home2->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
								<header class="entry-header
									<?php
									if ( empty( $featured_image_url ) ) :
										echo ' nofi';
									endif;
									?>
								">
									<?php if ( ! empty( $featured_image_url ) ) : ?>
									<div class="feat-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $home2->ID, 'thumbnail' ) ); ?>');"></div>
									<?php endif; ?>
								</header>
								<div class="project-title"><span><?php the_title(); ?></span></div>
								<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ): echo ', '; the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ): echo ', '; the_field( 'third_researcher' ); endif; ?></div>
							</article>
							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div><!-- /cards 1 -->
						<div class="clearfix"></div>

					</div><!-- /inner-wrap -->
				</div><!-- /home-completed-projects -->


				<div class="home-news">

					<div class="news-head">
						<h3>The latest news</h3>
						<div class="more white"><a href="<?php echo esc_url( site_url() ); ?>/news/">View All News <span class="arrow-right"></span></a></div>
					</div>

					<article <?php post_class( 'feat-image' ); ?> style="background-image: url('<?php the_field( 'top_article_image', 332 ); ?>');">
						<?php
						$r_link = get_field( 'top_article_link', 332 );
						if ( $r_link ) :
							$r_url = $r_link['url'];
							$r_title = $r_link['title'];
							$r_target = $r_link['target'] ? $r_link['target'] : '_self';
						endif;
						?>
						<div class="entry-meta">
							<?php the_field( 'top_article_date', 332 ); ?> // <a href="<?php echo esc_url( $r_url ); ?>" target="<?php echo esc_html( $r_target ); ?>"><?php echo esc_html( $r_title ); ?></a>
						</div>
						<h2 class="entry-title"><a href="<?php echo esc_url( $r_url ); ?>" target="<?php echo esc_html( $r_target ); ?>"><?php the_field( 'top_article_title', 332 ); ?></a></h2>
						<div class="more white"><a href="<?php echo esc_url( $r_url ); ?>">View Article  <span class="arrow-right"></span></a></div>
					</article>

					<article <?php post_class( 'feat-image' ); ?> style="background-image: url('<?php the_field( 'left_article_image', 332 ); ?>');">
						<?php
						$l_link = get_field( 'left_article_link', 332 );
						if ( $l_link ) :
							$l_url = $l_link['url'];
							$l_title = $l_link['title'];
							$l_target = $l_link['target'] ? $l_link['target'] : '_self';
						endif;
						?>
						<div class="entry-meta">
							<?php the_field( 'left_article_date', 332 ); ?> // <a href="<?php echo esc_url( $l_url ); ?>" target="<?php echo esc_html( $l_target ); ?>"><?php echo esc_html( $l_title ); ?></a>
						</div>
						<h2 class="entry-title"><a href="<?php echo esc_url( $l_url ); ?>" target="<?php echo esc_html( $l_target ); ?>"><?php the_field( 'left_article_title', 332 ); ?></a></h2>
						<div class="more white"><a href="<?php echo esc_url( $l_url ); ?>">View Article  <span class="arrow-right"></span></a></div>
					</article>



					<div class="clearfix"></div>
					<div class="borderbox-tl"></div>

				</div><!-- /home-completed-projects -->


				<div class="home-new-projects">
					<div class="inner-wrap">

						<div class="section-head">
							<h2>Recently awarded projects</h2>
							<div class="more"><a href="<?php echo esc_url( site_url() ); ?>/projects/">View All Projects <span class="arrow-right"></span></a></div>
						</div>

						<div class="top">
							<?php
							$home3 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 10,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'new',
									),
								),
							));
							$home3count = -1;
							while ( $home3->have_posts() ) :
								$home3->the_post();
								$home3count++;
								$h3slide = 'nslide' . $home3count;
							?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'home3 ' . $h3slide ); ?>>
									<div class="left">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>">
												<?php the_post_thumbnail( 'large' ); ?>
											</a>
										<?php endif; ?>
										<div class="post-info">
											<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ) : echo ', '; the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ): echo ', '; the_field( 'third_researcher' ); endif; ?></div>
											<div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div>
											<div class="more"><a href="<?php the_permalink(); ?>">View Project <span class="arrow-right"></span></a></div>
										</div>
									</div>
									<div class="right">
										<div class="the-excerpt">
											<?php the_content(); ?>
										</div>
										<?php the_title( '<h2 class="project-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
										<div class="project-description">
											<?php the_field( 'short_description' ); ?>
										</div>
									</div>
								</article>

								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div><!-- /top -->
						<div class="clearfix"></div>

						<div class="cards clearfix">
							<?php
							$home4 = new WP_Query(array(
								'post_type' => 'project',
								'posts_per_page' => 10,
								'tax_query' => array(
									array(
										'taxonomy' => 'project_status',
										'field' => 'slug',
										'terms' => 'new',
									),
								),
							));
							while ( $home4->have_posts() ) :
								$home4->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
									<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi'; endif; ?>">
										<?php if ( ! empty( $featured_image_url ) ) : ?>
										<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $home3->ID, 'thumbnail' ); ?>');"></div>
										<?php	endif; ?>
									</header>
									<div class="project-title"><span><?php the_title(); ?></span></div>
									<div class="researcher-name"><?php the_field( 'researcher_name' ); if ( get_field( 'other_researchers' ) ): echo ', '; the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ): echo ', '; the_field( 'third_researcher' ); endif; ?></div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div><!-- /cards 1 -->
						<div class="clearfix"></div>

					</div><!-- /inner-wrap -->
				</div><!-- /home-new-projects -->


				<div class="home-bottom">
					<div class="image">
						<img src="<?php the_field( 'bottom_image' ); ?>" width="890" height="504">
						<div class="title">
							<?php the_field( 'bottom_title' ); ?>
						</div>
					</div>
					<div class="borderbox-tl"></div>
					<div class="text">
						<?php the_field( 'bottom_text' ); ?>
					</div>
					<div class="clearfix"></div>
				</div>

			</div> <!-- .entry-content -->

		<?php endwhile; ?>

		</main>
	</div>

<?php
get_footer();
