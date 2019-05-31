<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BoseFellows
 */

?>

		<div class="clear"></div>
	</div><!-- #content .site-content -->

  <?php

	bosefellows_prev_next();

  do_action( 'themehook_before_footer' );

	if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') ) : ?>
	<div class="footer-widgets">
		<div class="inner-wrap" role="complementary">

			<div class="footer-widget-area widget-area-1">
				<?php dynamic_sidebar('footer-1'); ?>
			</div>

			<div class="footer-widget-area widget-area-2">
				<?php dynamic_sidebar('footer-2'); ?>
			</div>
			<div class="clear"></div>

		</div>
	</div><!-- .footer-widgets -->
	<?php endif; ?>


	<?php if ( is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) : ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-wrap">

			<div class="footer-widget-area widget-area-3">
				<?php dynamic_sidebar('footer-3'); ?>
			</div>

			<div class="footer-widget-area widget-area-4">
				<?php dynamic_sidebar('footer-4'); ?>
			</div>

			<div class="clear"></div>
		</div>
	</footer><!-- #colophon .site-footer -->
	<?php endif; ?>

</div><!-- #page .site -->

<?php wp_footer(); ?>

</body>
</html>
