<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BoseFellows
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

	<div class="entry-summary">
		<?php
		if ( 'project' === get_post_type() ) :
			the_field( 'short_description' );
		else :
			the_excerpt();
		endif;
		?>
	</div>

	<footer class="entry-footer">
		<?php
		if ( 'post' === get_post_type() ) :
			the_field( 'publish_date' ); ?> // <?php the_field( 'author' );
		elseif ( 'project' === get_post_type() ) :
			the_field( 'researcher_name' ); ?> / Awarded in <?php the_field( 'year_awarded' );
		endif;
		?>

		<?php bosefellows_entry_cats(); ?>
		<?php bosefellows_entry_tags(); ?>
	</footer>

</article>
