<?php
/**
 * The template for displaying the Plato page.
 *
 * Template Name: Plato
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

						<div class="content-block">

							<div class="leftcol">

								<?php
								// 1.
								$image = get_field( 'v1_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v1_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v1_title' ); ?></div>
											<div class="trigger v1"><a href="#v1">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

								<?php
								// 2.
								$image = get_field( 'v2_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v2_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v2_title' ); ?></div>
											<div class="trigger v2"><a href="#v2">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

								<?php
								// 3.
								$image = get_field( 'v3_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v3_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v3_title' ); ?></div>
											<div class="trigger v3"><a href="#v3">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

							</div>

							<div class="rightcol">

								<?php
								// 4.
								$image = get_field( 'v4_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v4_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v4_title' ); ?></div>
											<div class="trigger v4"><a href="#v4">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

								<?php
								// 5.
								$image = get_field( 'v5_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v5_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v5_title' ); ?></div>
											<div class="trigger v5"><a href="#v5">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

								<?php
								// 6.
								$image = get_field( 'v6_image' );
								if ( ! empty( $image ) ) :
									$alt = $image['alt'];
									$size = 'medium_large';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
								?>
								<div class="vidblock">
									<div class="plato-image">
										<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<div class="plato-text">
											<div class="plato-date"><?php the_field( 'v6_date' ); ?></div>
											<div class="plato-title"><?php the_field( 'v6_title' ); ?></div>
											<div class="trigger v6"><a href="#v6">WATCH VIDEO <span class="arrow-right"></span></a></div>
										</div>
										<div class="fi-grad rev"></div>
									</div>
								</div>
								<?php endif; ?>

							</div>

						</div>

						<div class="clearfix"></div>
						<div class="vline"></div>

					</div>
				</div>

				<div class="page-footer">
					<h2><?php the_field( 'bottom_block_title' ); ?></h2>
					<p>
						<?php the_field( 'bottom_block_text' ); ?>
					</p>
					<div class="more"><a href="<?php the_field( 'bottom_block_link_url' ); ?>"><?php the_field( 'bottom_block_link_text' ); ?> <span class="arrow-right"></span></a></div>
				</div>

			</article>

		<?php endwhile; ?>

		</main>
	</div>

	<div id="bosemodal">
		<div class="bosemodal-wrap">
			<div class="bosemodal-close">CLOSE <div class="close"></div></div>
			<div class="bosemodal-content"></div>
			<div class="bosemodal-info"></div>
		</div>
	</div>

	<script type="text/javascript">
	// vid modals
	// ACF fileds ONLY work if script is on page, not in .js file loaded into the head or after the footer.
	jQuery(function( $ ) {
		var vid1 = '<?php echo esc_html( the_field( 'v1_embed' ) ); ?>';
		var vid2 = '<?php echo esc_html( the_field( 'v2_embed' ) ); ?>';
		var vid3 = '<?php echo esc_html( the_field( 'v3_embed' ) ); ?>';
		var vid4 = '<?php echo esc_html( the_field( 'v4_embed' ) ); ?>';
		var vid5 = '<?php echo esc_html( the_field( 'v5_embed' ) ); ?>';
		var vid6 = '<?php echo esc_html( the_field( 'v6_embed' ) ); ?>';

		var info1 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v1_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v1_title' ) ); ?></div></div>';
		var info2 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v2_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v2_title' ) ); ?></div></div>';
		var info3 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v3_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v3_title' ) ); ?></div></div>';
		var info4 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v4_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v4_title' ) ); ?></div></div>';
		var info5 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v5_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v5_title' ) ); ?></div></div>';
		var info6 = '<div><div class="vid-date"><?php echo esc_html( the_field( 'v6_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'v6_title' ) ); ?></div></div>';

		var src = $('#bosemodal').children('iframe').attr('src');
		$('.trigger').click(function() {
			$('.bosemodal-content').children('iframe').attr('src', src);
			$('#bosemodal').fadeIn();});
		$('#bosemodal, .bosemodal-close').click(function() {
		  $('.bosemodal-content').children('iframe').attr('src', '');
		  $('#bosemodal').fadeOut();});
		$('.v1').click(function() {$('.bosemodal-content').html(vid1);$('.bosemodal-info').html(info1);});
		$('.v2').click(function() {$('.bosemodal-content').html(vid2);$('.bosemodal-info').html(info2);});
		$('.v3').click(function() {$('.bosemodal-content').html(vid3);$('.bosemodal-info').html(info3);});
		$('.v4').click(function() {$('.bosemodal-content').html(vid4);$('.bosemodal-info').html(info4);});
		$('.v5').click(function() {$('.bosemodal-content').html(vid5);$('.bosemodal-info').html(info5);});
		$('.v6').click(function() {$('.bosemodal-content').html(vid6);$('.bosemodal-info').html(info6);});
	});
	</script>

<?php
get_footer();
