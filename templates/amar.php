<?php
/**
 * The template for displaying the Amar page.
 *
 * Template Name: Amar
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
					<div class="name">
						<?php the_field( 'page_header_caption' ); ?>
					</div>
				</header>

				<div class="entry-content">

					<div class="borderbox-tl" data-aos="fade-up"></div>

					<div class="section s-one" data-aos="fade-up"><div class="fakenews"></div><div class="fakenews bot"></div><div class="inner-wrap">

						<div class="image" data-aos="fade-up">
							<img src="<?php the_field( 's1_img' ); ?>" width="637" height="451">
							<h3 class="title">
								<?php the_field( 's1_title' ); ?>
							</h3>
						</div>
						<div class="hline" data-aos="fade-up"></div>
						<div class="text" data-aos="fade-up">
							<?php the_field( 's1_txt1' ); ?>
						</div>
						<div class="vline" data-aos="fade-up"></div>

					</div></div><!-- .s-one -->



					<div class="section s-two"><div class="inner-wrap">

						<h2 class="heading" data-aos="fade-up">
							<?php the_field( 's2_heading' ); ?>
						</h2>
						<div class="vid1" data-aos="fade-up">
							<img src="<?php the_field( 's2_vid1' ); ?>" width="717" height="397">
							<div class="hoverimage">
								<img src="<?php the_field( 's2_img1' ); ?>" width="360" height="255">
							</div>
							<div class="caption">
								<?php the_field( 's2_cap1' ); ?>
							</div>
							<div class="trigger v1"><a href="#v1"></a></div>
						</div>

						<div class="image" data-aos="fade-up">
							<img src="<?php the_field( 's2_img2' ); ?>" width="435" height="231">
							<div class="hline"></div>
							<h3 class="title">
								<?php the_field( 's2_title' ); ?>
							</h3>
						</div>

						<div class="text" data-aos="fade-up">
							<div class="col-1-2 first"><?php the_field( 's2_txt1' ); ?></div>
							<div class="col-1-2"><?php the_field( 's2_txt2' ); ?></div>
						</div>

						<div class="clearfix"></div>
						<div class="vline" data-aos="fade-up"></div>
					</div></div><!-- .s-two -->



					<div class="section s-three">

						<div class="backdrop"></div>
						<div class="inner-wrap">
						<h2 class="heading" data-aos="fade-up">
							<?php the_field( 's3_heading' ); ?>
						</h2>
						<h4 class="q-text" data-aos="fade-up">
							<?php the_field( 's3_quote' ); ?>
						</h4>
						<div class="q-image" data-aos="fade-up">
							<img src="<?php the_field( 's3_img1' ); ?>" width="510" height="660">
							<div class="hline"></div>
							<h3 class="title">
								<?php the_field( 's3_title' ); ?>
							</h3>
						</div>

						<div class="vid1" data-aos="fade-up">
							<img src="<?php the_field( 's3_vid1' ); ?>" width="328" height="211">
							<div class="cap1">
								<?php the_field( 's3_cap1' ); ?>
							</div>
							<div class="trigger v2"><a href="#v2"></a></div>
						</div>

						<div class="vid2" data-aos="fade-up">
							<img src="<?php the_field( 's3_vid2' ); ?>" width="353" height="258">
							<div class="cap2">
								<?php the_field( 's3_cap2' ); ?>
							</div>
							<div class="trigger v3"><a href="#v3"></a></div>
						</div>

						<div class="text" data-aos="fade-up">
							<?php the_field( 's3_txt1' ); ?>
						</div>

						<div class="vline" data-aos="fade-up"></div>

					</div></div><!-- .s-three -->



					<div class="section s-four"><div class="inner-wrap">

						<h2 class="heading" data-aos="fade-up">
							<?php the_field( 's4_heading' ); ?>
						</h2>

						<div class="vid1" data-aos="fade-up">
							<img src="<?php the_field( 's4_vid1' ); ?>" width="650" height="408">
							<div class="cap1">
								<?php the_field( 's4_cap1' ); ?>
							</div>
							<h4 class="q-block">
								<?php the_field( 's4_quote' ); ?>
							</h4>
							<div class="trigger v4"><a href="#v4"></a></div>
						</div>

						<div class="text" data-aos="fade-up">
							<div class="col-1-2 first"><?php the_field( 's4_txt1' ); ?></div>
							<div class="col-1-2"><?php the_field( 's4_txt2' ); ?></div>
						</div>

						<div class="img1" data-aos="fade-up">
							<img src="<?php the_field( 's4_img1' ); ?>" width="458" height="287">
							<div class="hline"></div>
							<h3 class="title">
								<?php the_field( 's4_title' ); ?>
							</h3>
						</div>

						<div class="clearfix"></div>
						<div class="vline" data-aos="fade-up"></div>
					</div></div><!-- .s-four -->



					<div class="section s-five">
						<h2 class="heading" data-aos="fade-up">
							<?php the_field( 's5_heading' ); ?>
						</h2>
						<div class="img1" data-aos="fade-up">
							<img src="<?php the_field( 's5_img1' ); ?>" width="1280" height="588">
						</div>
						<div class="borderbox-tl" data-aos="fade-up"></div>
						<div class="inner-wrap">
							<div class="q-block" data-aos="fade-up">
								<?php the_field( 's5_quote' ); ?>
							</div>
							<h3 class="title" data-aos="fade-up">
								<div class="hline"></div>
								<?php the_field( 's5_title' ); ?>
							</h3>

							<div class="clearfix"></div>
							<div class="image" data-aos="fade-up">
								<img src="<?php the_field( 's5_img2' ); ?>" width="431" height="437">
							</div>

							<div class="text" data-aos="fade-up">
								<?php the_field( 's5_txt1' ); ?>
							</div>

							<div class="clearfix"></div>
							<div class="vline" data-aos="fade-up"></div>

						</div>
					</div><!-- .s-five -->



					<div class="section s-six"><div class="inner-wrap">

						<h2 class="heading" data-aos="fade-up">
							<?php the_field( 's6_heading' ); ?>
						</h2>

						<div class="vid1" data-aos="fade-up">
							<img src="<?php the_field( 's6_vid1' ); ?>" width="698" height="476">
							<div class="cap">
								<?php the_field( 's6_cap1' ); ?>
							</div>
							<div class="trigger v5"><a href="#v5"></a></div>
						</div>

						<div class="q-block" data-aos="fade-up">
							<?php the_field( 's6_quote' ); ?>
						</div>

						<div class="image" data-aos="fade-up">
							<img src="<?php the_field( 's6_img1' ); ?>" width="454" height="342">
							<div class="hline"></div>
							<h3 class="title">
								<?php the_field( 's6_title' ); ?>
							</h3>
						</div>

						<div class="vid2" data-aos="fade-up">
							<img src="<?php the_field( 's6_vid2' ); ?>" width="368" height="240">
							<div class="cap">
								<?php the_field( 's6_cap2' ); ?>
							</div>
							<div class="trigger v6"><a href="#v6"></a></div>
						</div>

						<div class="text" data-aos="fade-up">
							<div class="col-1-2 first"><?php the_field( 's6_txt1' ); ?></div>
							<div class="col-1-2"><?php the_field( 's6_txt2' ); ?></div>
						</div>

						<div class="image2" data-aos="fade-up">
							<img src="<?php the_field( 's6_img2' ); ?>" width="276" height="212">
						</div>

						<div class="clearfix"></div>
						<div class="vline" data-aos="fade-up"></div>
					</div></div><!-- .s-six -->


					<div class="page-footer">
						<h2><?php the_field( 'bottom_block_title' ); ?></h2>
						<p>
							<?php the_field( 'bottom_block_text' ); ?>
						</p>
						<div class="more"><a href="<?php the_field( 'bottom_block_link_url' ); ?>"><?php the_field( 'bottom_block_link_text' ); ?> <span class="arrow-right"></span></a></div>
					</div>

				</div><!-- /entry-content -->

			</article><!-- /post -->
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
	var vid1 = '<?php echo esc_html( the_field( 's2_vid1_embed' ) ); ?>';
	var vid2 = '<?php echo esc_html( the_field( 's3_vid1_embed' ) ); ?>';
	var vid3 = '<?php echo esc_html( the_field( 's3_vid2_embed' ) ); ?>';
	var vid4 = '<?php echo esc_html( the_field( 's4_vid1_embed' ) ); ?>';
	var vid5 = '<?php echo esc_html( the_field( 's6_vid1_embed' ) ); ?>';
	var vid6 = '<?php echo esc_html( the_field( 's6_vid2_embed' ) ); ?>';

	var info1 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's2_vid_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's2_vid_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var info2 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's3_vid1_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's3_vid1_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var info3 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's3_vid2_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's3_vid2_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var info4 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's4_vid_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's4_vid_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var info5 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's6_vid1_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's6_vid1_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';
	var info6 = '<div class="col-1-2 first"><div class="vid-date"><?php echo esc_html( the_field( 's6_vid2_date' ) ); ?></div><div class="vid-title"><?php echo esc_html( the_field( 's6_vid2_title' ) ); ?></div></div><div class="col-1-2"><div class="more"><a href="<?php echo esc_url( site_url() ); ?>/plato/">View More Videos <span class="arrow-right"></span></a></div></div><div class="clearfix"></div>';

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
