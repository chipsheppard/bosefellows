<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BoseFellows
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'inner-wrap' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bosefellows' ),
				'after'  => '</div>',
			) );
		?>
	</div>

</article>
