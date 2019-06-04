<?php
/**
 * The template for displaying the Program page.
 *
 * Template Name: Program
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

			<article id="post-<?php the_ID(); ?>">

				<div class="entry-content">

					<header class="page-header">
						<div class="inner-wrap">
							<h1 class="page-title">
								<?php the_field( 'page_header' ); ?>
							</h1>
						</div>
					</header>


					<div class="inner-wrap">

						<div class="intro-block">
							<?php the_field( 'page_intro' ); ?>
						</div>

						<div class="left-col col-1-3 first">
							<ul class="status_tags stick-to-top">
								<?php if ( get_field( 's1_menu' ) ) : ?>
									<li><a href="#pm1"><?php the_field( 's1_menu' ); ?></a></li>
								<?php endif; ?>
								<?php if ( get_field( 's2_menu' ) ) : ?>
									<li><a href="#pm2"><?php the_field( 's2_menu' ); ?></a></li>
								<?php endif; ?>
								<?php if ( get_field( 's3_menu' ) ) : ?>
									<li><a href="#pm3"><?php the_field( 's3_menu' ); ?></a></li>
								<?php endif; ?>
								<?php if ( get_field( 's4_menu' ) ) : ?>
									<li><a href="#pm4"><?php the_field( 's4_menu' ); ?></a></li>
								<?php endif; ?>
								<?php if ( get_field( 's5_menu' ) ) : ?>
									<li><a href="#pm5"><?php the_field( 's5_menu' ); ?></a></li>
								<?php endif; ?>
								<?php if ( get_field( 's6_menu' ) ) : ?>
									<li><a href="#pm6"><?php the_field( 's6_menu' ); ?></a></li>
								<?php endif; ?>
							</ul>
						</div>

<a name="pm1"></a>
						<div class="section s1 col-2-3">
							<div class="heading"><?php the_field( 'section1_heading' ); ?></div>
							<h2><?php the_field( 'section1_title' ); ?></h2>
							<?php the_field( 'section1_text' ); ?>
						</div>
						<div class="clearfix"></div>

						<div class="images-insert">
							<img src="<?php the_field( 'image1' ); ?>" class="img1">
							<img src="<?php the_field( 'image2' ); ?>" class="img2">
							<img src="<?php the_field( 'image3' ); ?>" class="img3">
						</div>

						<div class="left-col col-1-3 first">
							<?php if ( get_field( 'second_callout' ) ) : ?>
								<div class="callout co2">
									<?php the_field( 'second_callout' ); ?>
								</div>
							<?php endif; ?>
							&nbsp;
						</div>

<a name="pm2"></a>
						<div class="section s2 col-2-3">
							<div class="heading"><?php the_field( 'section2_heading' ); ?></div>
							<h2><?php the_field( 'section2_title' ); ?></h2>
							<?php the_field( 'section2_text' ); ?>
						</div>
						<div class="clearfix"></div>

					</div><!-- /inner-wrap -->


					<div class="bosequote-insert clearfix">
						<img src="<?php the_field( 'insert_image' ); ?>" width="1280" height="508">
						<div class="borderbox-tl"></div>
						<div class="trigger v1"><a href="#v1"><span class="circlearrow-r white"></span><span class="trigger-text"><?php the_field( 'button_text' ); ?></span></a></div>
						<div class="text-overlay">
							<?php the_field( 'insert_quote' ); ?>
							<?php
							if ( get_field( 'quote_citation' ) ) :
								echo '<div class="vid-citation">';
								echo '&mdash;';
								the_field( 'quote_citation' );
								echo '</div>';
							endif;
							?>
						</div>
					</div>


<a name="pm3"></a>
					<div class="inner-wrap">

						<div class="left-col col-1-3 first">
							&nbsp;
						</div>

						<?php if ( get_field( 'section3_title' ) ) : ?>
							<div class="section s3 col-2-3">
								<div class="heading"><?php the_field( 'section3_heading' ); ?></div>
								<h2><?php the_field( 'section3_title' ); ?></h2>
								<?php the_field( 'section3_text' ); ?>
							</div>
							<div class="clearfix"></div>
						<?php endif; ?>


<a name="pm4"></a>
						<div class="left-col col-1-3 first">
							<?php if ( get_field( 'section4_callout' ) ) : ?>
								<div class="callout co4">
									<?php the_field( 'section4_callout' ); ?>
								</div>
							<?php endif; ?>
							&nbsp;
						</div>

						<div class="section s4 col-2-3">
							<div class="heading"><?php the_field( 'section4_heading' ); ?></div>
							<h2><?php the_field( 'section4_title' ); ?></h2>
							<?php the_field( 'section4_text' ); ?>
						</div>
						<div class="clearfix"></div>


						<div class="images-insert">
							<img src="<?php the_field( 'image2_1' ); ?>" class="img3">
							<img src="<?php the_field( 'image2_2' ); ?>" class="img2">
							<img src="<?php the_field( 'image2_3' ); ?>" class="img1">
						</div>


						<div class="left-col col-1-3 first">
							&nbsp;
						</div>

<a name="pm5"></a>
						<?php if ( get_field( 'section5_title' ) ) : ?>
							<div class="section s5 col-2-3">
								<div class="heading"><?php the_field( 'section5_heading' ); ?></div>
								<h2><?php the_field( 'section5_title' ); ?></h2>
								<?php the_field( 'section5_text' ); ?>
							</div>
							<div class="clearfix"></div>
						<?php endif; ?>


						<div class="left-col col-1-3 first">
							&nbsp;
						</div>

<a name="pm6"></a>
						<div class="section s6 col-2-3">
							<div class="heading"><?php the_field( 'section6_heading' ); ?></div>
							<h2><?php the_field( 'section6_title' ); ?></h2>
							<?php the_field( 'section6_text' ); ?>
						</div>
						<div class="clearfix"></div>


					</div><!-- /inner-wrap -->

				</div><!-- /entry-content -->
			</article>



			<div class="end-sticky"></div>
			<div class="page-footer">
				<h2><?php the_field( 'bottom_block_title' ); ?></h2>
				<p>
					<?php the_field( 'bottom_block_text' ); ?>
				</p>
				<div class="more"><a href="<?php the_field( 'bottom_block_link_url' ); ?>"><?php the_field( 'bottom_block_link_text' ); ?> <span class="arrow-right"></span></a></div>
			</div>

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
// ACF fileds ONLY work if script is on page, not in .js file
jQuery(function( $ ) {
	var vid1 = '<?php echo esc_html( the_field( 'insert_video_embed' ) ); ?>';
	var info1 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 'insert_video_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 'insert_video_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var src = $('#bosemodal').children('iframe').attr('src');
	$('.trigger').click(function() {
		$('.bosemodal-content').children('iframe').attr('src', src);
		$('#bosemodal').fadeIn();});
	$('#bosemodal, .bosemodal-close').click(function() {
		$('.bosemodal-content').children('iframe').attr('src', '');
		$('#bosemodal').fadeOut();});
	$('.v1').click(function() {
		$('.bosemodal-content').html(vid1);
		$('.bosemodal-info').html(info1);
	});
});
</script>

<?php
get_footer();
