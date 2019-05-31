<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BoseFellows
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found inner-wrap">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Page not found.', 'bosefellows' ); ?></h1>
				</header>

				<div class="page-content">
					<p class="error-message"><?php esc_html_e( 'Nothing found at this location. Try the menu.', 'bosefellows' ); ?></p>
				</div>

			</section>

		</main>
	</div>

<?php
get_footer();
