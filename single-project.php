<?php
/**
 * The template for displaying all single projects.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'inner-wrap' ); ?>>

			<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi'; endif; ?>">

				<div class="researcher-photo">
					<img src="<?php the_field( 'researcher_photo' ); ?>" height="94" width="94" alt="<?php the_field( 'researcher_name' ); ?>">
				</div>
				<?php if ( get_field( 'other_researchers_photo' ) ) : ?>
				<div class="researcher-photo">
					<img src="<?php the_field( 'other_researchers_photo' ); ?>" height="94" width="94" alt="<?php the_field( 'other_researchers' ); ?>">
				</div>
				<?php endif; ?>
				<?php if ( get_field( 'third_researchers_photo' ) ) : ?>
				<div class="researcher-photo">
					<img src="<?php the_field( 'third_researchers_photo' ); ?>" height="94" width="94" alt="<?php the_field( 'third_researchers' ); ?>">
				</div>
				<?php endif; ?>

				<footer class="entry-footer">
					<?php bosefellows_entry_tags(); ?>
				</footer>

				<h1 class="entry-title">
					<?php
					the_field( 'researcher_name' );
					if ( get_field( 'other_researchers' ) ) : ?>, <span class="others"><?php the_field( 'other_researchers' ); endif; if ( get_field( 'third_researcher' ) ) : ?>,</span> <span class="others"><?php the_field( 'third_researcher' ); endif; ?></span>
				</h1>
				<!--div class="researcher-title"><?php // the_field( 'researcher_title' );. ?></div-->

			</header>


			<div class="entry-content">

			  <div class="shareholder">
					<div class="proj-info">
						<?php /** .bosefellows_project_status(); */ ?>
						<!-- / -->Awarded in <?php the_field( 'year_awarded' ); ?>
					</div>
					<div class="sharelink">
						<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
			  </div>

				<div class="entry-meta more">

					<?php
					if ( get_field( 'researcher_website' ) ) :
						if ( get_field( 'other_researchers' ) ) : ?><div class="rname"><?php the_field('researcher_name'); ?></div><?php endif; ?>
						<a href="<?php the_field( 'researcher_website' ); ?>" target="_blank">Personal Website <span class="arrow-right"> </span></a>
					<?php endif; ?>
					<?php if ( get_field( 'researcher_staff_page' ) ) : ?>
						<a href="<?php the_field( 'researcher_staff_page' ); ?>" target="_blank">MIT Staff Page <span class="arrow-right"> </span></a>
					<?php endif; ?>

					<?php
					// If we have any combo of researcher and other researcher links, put in a break.
					if ( (get_field( 'researcher_website' ) && get_field( 'other_researchers_website' ) ) || ( get_field( 'researcher_website' ) && get_field( 'other_researchers_staff_page' ) ) || (get_field( 'researcher_staff_page' ) && get_field( 'other_researchers_website' ) ) || ( get_field( 'researcher_staff_page' ) && get_field( 'other_researchers_staff_page' ) ) ) :
						?>
						<br />
					<?php endif; ?>

					<?php
					// Other researchers - if any.
					if ( get_field( 'other_researchers_website' ) ) : ?>
						<div class="orname"><?php the_field( 'other_researchers' ); ?></div>
						<a href="<?php the_field( 'other_researchers_website' ); ?>" target="_blank">Personal Website <span class="arrow-right"> </span></a>
					<?php endif; ?>
					<?php if ( get_field( 'other_researchers_staff_page' ) ) : ?>
						<a href="<?php the_field( 'other_researchers_staff_page' ); ?>" target="_blank">MIT Staff Page <span class="arrow-right"> </span></a>
					<?php endif;?>

					<?php
					// If we have any combo of Other researchers and THird researcher links, put in a break.
					if ( (get_field( 'other_researchers_website' ) && get_field( 'third_researchers_website' ) ) || ( get_field( 'other_researchers_website' ) && get_field( 'third_researchers_staff_page' ) ) || (get_field( 'other_researchers_staff_page' ) && get_field( 'third_researchers_website' ) ) || ( get_field( 'other_researchers_staff_page' ) && get_field( 'third_researchers_staff_page' ) ) ) :
						?>
						<br />
					<?php endif; ?>

					<?php
					// Third researcher - if any.
					if ( get_field( 'third_researchers_website' ) ) : ?>
						<div class="orname"><?php the_field( 'third_researcher' ); ?></div>
						<a href="<?php the_field( 'third_researchers_website' ); ?>" target="_blank">Personal Website <span class="arrow-right"> </span></a>
					<?php endif; ?>
					<?php if ( get_field( 'third_researchers_staff_page' ) ) : ?>
						<a href="<?php the_field( 'third_researchers_staff_page' ); ?>" target="_blank">MIT Staff Page <span class="arrow-right"> </span></a>
					<?php endif;?>

				</div>

				<?php the_title( '<h1 class="project-title">', '</h1>' ); ?>

				<div class="project-description">
					<?php the_field( 'short_description' ); ?>
				</div>

				<div class="jump-menu stick-to-top">
					<?php
					if ( have_rows( 'project_sections' ) ) :
						$i = 0;
						while ( have_rows( 'project_sections' ) ) :
							the_row();
							$i++;
							if ( get_row_layout() === 'content_section' ) :
								?>
								<a href="#<?php echo $i; ?>"><?php the_sub_field( 'heading' ); ?></a><br class="deskpad-only">
							<?php
						endif;
						endwhile;
					endif;
					if ( have_rows( 'sections_bot' ) ) :
						?>
						<a href="#pub"><?php the_field( 'publications_heading' ); ?></a>
					<?php endif; ?>
				</div>





				<div class="content-sections">

					<?php
					if ( have_rows( 'project_sections' ) ) :
						$i = 0;
						while ( have_rows( 'project_sections' ) ) :
							the_row();
							$i++;

							if ( get_row_layout() === 'content_section' ) :
								?>

								<a name="<?php echo $i; ?>"></a>
								<div class="section">
									<div class="heading"><?php the_sub_field( 'heading' ); ?></div>
									<h2><?php the_sub_field( 'title' ); ?></h2>
									<?php the_sub_field( 'text' ); ?>
								</div>

							<?php elseif ( get_row_layout() === 'quote_insert' ) : ?>

								<div class="quote-insert">
									<?php the_sub_field( 'the_quote' ); ?>
									<div class="image-caption">
										<div class="caption">
											<?php the_sub_field( 'quote_image_caption' ); ?>
										</div>
										<img src="<?php the_sub_field( 'quote_image' ); ?>">
									</div>
								</div>

							<?php elseif ( get_row_layout() === 'images_insert' ) : ?>

								<div class="images-insert">
									<div class="caption">
										<?php the_sub_field( 'caption' ); ?>
								  </div>
									<img src="<?php the_sub_field( 'image1' ); ?>" class="img1">
									<img src="<?php the_sub_field( 'image2' ); ?>" class="img2">
									<img src="<?php the_sub_field( 'image3' ); ?>" class="img3">
								</div>

							<?php elseif ( get_row_layout() === 'leftcol_insert' ) : ?>

								<div class="leftcol-insert" style="top: <?php the_sub_field( 'vertical_offset' ); ?>px;">
									<?php the_sub_field( 'leftcol_block' ); ?>
								</div>

								<?php
							endif; // .layouts
						endwhile;
					endif; // .sections



					if ( have_rows( 'sections_bot' ) ) :
						?>
					<a name="pub"></a>
					<div class="section publications clearfix">
						<div class="heading"><?php the_field( 'publications_heading' ); ?></div>
						<h2><?php the_field( 'publications_text' ); ?></h2>

						<?php
						while ( have_rows( 'sections_bot' ) ) :
							the_row();

							if ( get_row_layout() === 'off_site_link' ) :
								?>

								<article class="card">
									<header class="entry-header<?php if ( !get_sub_field( 'f_img' ) ) : echo ' nofi'; endif; ?>">
										<?php if ( get_sub_field( 'f_img' ) ) : ?>
										<div class="feat-image" style="background-image: url('<?php echo the_sub_field( 'f_img' ); ?>');"></div>
										<?php	endif; ?>
										<div class="entry-meta">
											<span class="date"><?php the_sub_field( 'publish_date' ); ?></span> <span class="sep">//</span> <span class="author"><?php the_sub_field( 'author' ); ?></span>
										</div>
										<h2 class="entry-title"><a href="<?php the_sub_field( 'url' ); ?>" rel="bookmark" target="_blank"><?php the_sub_field( 'title' ); ?></a></h2>
										<div class="more"><a href="<?php the_sub_field( 'url' ); ?>" target="_blank">View Article  <span class="arrow-right"></span></a></div>
									</header>
									<footer class="entry-footer">
									<?php
									$terms = get_sub_field( ' project_tags' );
									if ( $terms ) :
										?>
										<div class="tag-links">
											<?php foreach ( $terms as $term ) : ?>
											<div class="t-link <?php echo $term->slug; ?>">
												<a href="/tag/<?php echo $term->slug; ?>">
													<span class="abbr"><?php echo $term->description; ?></span>
													<span class="name"><?php echo $term->name; ?></span>
												</a>
											</div>
										<?php endforeach; ?>
										</div>
										<?php endif; ?>
									</footer>

								</article>

							<?php
							elseif ( get_row_layout() === 'link_to_news_article' ) :

								$post_object = get_sub_field( 'the_post' );
								if ( $post_object ) :
									// override $post.
									$post = $post_object;
									setup_postdata( $post );
									$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
									?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
										<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi'; endif; ?>">
											<?php if ( ! empty( $featured_image_url ) ) : ?>
											<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>');"></div>
											<?php	endif; ?>
											<div class="entry-meta">
												<?php the_field( 'publish_date' ); ?> // <?php the_field( 'author' ); ?>
											</div>
											<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
											<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark">View Article  <span class="arrow-right"></span></a></div>
										</header>
										<footer class="entry-footer">
											<?php bosefellows_entry_tags(); ?>
										</footer>
									</article>

									<?php
									wp_reset_postdata();

								endif;
							endif;
						endwhile;

					else :
						// no layouts found.
					?>

					</div><!-- /publications -->
					<?php endif; ?>

				</div><!-- /content-sections -->
			</div><!-- /entry-content -->

		</article>

		<?php endwhile; ?>

		</main>
	</div>
	<div class="end-sticky"></div>

<?php
get_footer();
