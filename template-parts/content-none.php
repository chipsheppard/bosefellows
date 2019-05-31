<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BoseFellows
 */

add_filter( 'body_class','bosefellows_addbodyclass' );
function bosefellows_addbodyclass( $classes ) {
	$classes[] = 'no-results';
	return $classes;
}

$featured = get_template_directory_uri() . '/images/fi-404.jpg';

?>

<section class="no-results not-found inner-wrap">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found.', 'bosefellows' ); ?></h1>
	</header>

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Where did all the Posts go? <a href="%1$s">Get started here</a>.', 'bosefellows' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bosefellows' ); ?></p>
			<?php	get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bosefellows' ); ?></p>
			<?php get_search_form();

		endif; ?>

	</div>

</section>
