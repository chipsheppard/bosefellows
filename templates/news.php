<?php
/**
 * The template for News page.
 *
 * Template Name: News
 *
 * @package BoseFellows
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">

				<article <?php post_class( 'q1 inner-wrap' ); ?>>
					<?php
					$t_link = get_field( 'top_article_link' );
					if ( $t_link ) :
						$t_url = $t_link['url'];
						$t_title = $t_link['title'];
						$t_target = $t_link['target'] ? $t_link['target'] : '_self';
					endif;
					?>
					<div class="entry-meta">
						<?php the_field( 'top_article_date' ); ?> // <a href="<?php echo esc_url( $t_url ); ?>" target="<?php echo esc_html( $t_target ); ?>"><?php echo esc_html( $t_title ); ?></a>
					</div>
					<h2 class="entry-title"><a href="<?php echo esc_url( $t_url ); ?>" target="<?php echo esc_html( $t_target ); ?>"><?php the_field( 'top_article_title' ); ?></a></h2>
					<div class="more white"><a href="<?php echo esc_url( $t_url ); ?>">View Article  <span class="arrow-right"></span></a></div>
				</article>

				<article <?php post_class( 'q2 feat-image bosepost1' ); ?> style="background-image: url('<?php the_field( 'left_article_image' ); ?>');">
					<?php
					$tl_link = get_field( 'left_article_link' );
					if ( $tl_link ) :
						$tl_url = $tl_link['url'];
						$tl_title = $tl_link['title'];
						$tl_target = $tl_link['target'] ? $tl_link['target'] : '_self';
					endif;
					?>
					<div class="fi-grad"></div>
					<div class="entry-meta">
						<?php the_field( 'left_article_date' ); ?> // <a href="<?php echo esc_url( $tl_url ); ?>" target="<?php echo esc_html( $tl_target ); ?>"><?php echo esc_html( $tl_title ); ?></a>
					</div>
					<h2 class="entry-title"><a href="<?php echo esc_url( $tl_url ); ?>" target="<?php echo esc_html( $tl_target ); ?>"><?php the_field( 'left_article_title' ); ?></a></h2>
					<div class="more white"><a href="<?php echo esc_url( $tl_url ); ?>">View Article  <span class="arrow-right"></span></a></div>
				</article>

				<article <?php post_class( 'q2 feat-image bosepost2' ); ?> style="background-image: url('<?php the_field( 'right_article_image' ); ?>');">
					<?php
					$tr_link = get_field( 'right_article_link' );
					if ( $tr_link ) :
						$tr_url = $tr_link['url'];
						$tr_title = $tr_link['title'];
						$tr_target = $tr_link['target'] ? $tr_link['target'] : '_self';
					endif;
					?>
					<div class="fi-grad"></div>
					<div class="entry-meta">
						<?php the_field( 'right_article_date' ); ?> // <a href="<?php echo esc_url( $tr_url ); ?>" target="<?php echo esc_html( $tr_target ); ?>"><?php echo esc_html( $tr_title ); ?></a>
					</div>
					<h2 class="entry-title"><a href="<?php echo esc_url( $tr_url ); ?>" target="<?php echo esc_html( $tr_target ); ?>"><?php the_field( 'right_article_title' ); ?></a></h2>
					<div class="more white"><a href="<?php echo esc_url( $tr_url ); ?>">View Article  <span class="arrow-right"></span></a></div>
				</article>

				<div class="clearfix"></div>

				<div class="news-filter">
					<?php

					/*
					Filter
					the_field( 'filter_block' );
					bosefellows_post_tag_dropdown( 'post' );
					*/
					?>
				</div>

				<div class="cards-wrap clearfix">

					<div class="cards inner-wrap clearfix">

						<div class="masonrycards">
							<?php
							if ( have_rows( 'news_articles' ) ) :
								while ( have_rows( 'news_articles' ) ) :
									the_row();
								?>

								<article <?php post_class( 'q3 card' ); ?>>

									<header class="entry-header
										<?php
										if ( ! get_sub_field( 'article_image' ) ) :
											echo ' nofi';
										endif;
										?>
										">
										<?php
										// IMAGE.
										$image = get_sub_field( 'article_image' );
										if ( ! empty( $image ) ) :
											$alt = $image['alt'];
											$size = 'medium';
											$width = $image['sizes'][ $size . '-width' ];
											$height = $image['sizes'][ $size . '-height' ];
											$url = $image['sizes'][ $size ];
										?>
										<div class="feat-image" style="background-image: url('<?php echo esc_url( $url ); ?>');"></div>
										<?php endif; ?>

										<?php
										$link = get_sub_field( 'article_link' );
										if ( $link ) :
											$l_url = $link['url'];
											$l_title = $link['title'];
											$l_target = $link['target'] ? $link['target'] : '_self';
										endif;
										?>
										<div class="entry-meta">
											<span class="date"><?php the_sub_field( 'article_date' ); ?></span> <span class="sep">//</span> <span class="author"><a href="<?php echo esc_url( $l_url ); ?>" target="<?php echo esc_html( $l_target ); ?>"><?php echo esc_html( $l_title ); ?></a></span>
										</div>
										<h2 class="entry-title"><a href="<?php echo esc_url( $l_url ); ?>" target="<?php echo esc_html( $l_target ); ?>"><?php the_sub_field( 'article_title' ); ?></a></h2>
										<div class="more"><a href="<?php echo esc_url( $l_url ); ?>" target="<?php echo esc_html( $l_target ); ?>">View Article  <span class="arrow-right"></span></a></div>
									</header>

									<div class="entry-content">
										<footer class="entry-footer">
											<?php bosefellows_entry_tags(); ?>
										</footer>
									</div>

								</article>
								<?php
								endwhile;
							endif;
							?>

						</div>
					</div><!-- /cards -->


				</div><!-- /cards-wrap -->
			</div>

		</main>
	</div>

<?php
get_footer();
