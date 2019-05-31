<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BoseFellows
 */

$bosecount = get_query_var('bose_count');
$artclass = 'bosepost' . $bosecount;
if (is_singular('post')) : $iwrap = ' inner-wrap'; endif;
if ( ! empty( $iwrap ) ) {
	$artclass .= $iwrap;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $artclass ); ?>>

	<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

	<header class="entry-header<?php if ( empty( $featured_image_url ) ) : echo ' nofi'; endif; ?>">

		<?php
		if ( is_single() ) : ?>

			<footer class="entry-footer">
				<?php bosefellows_entry_tags(); ?>
			</footer>

			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

		else :

			if ( ! empty( $featured_image_url ) && $bosecount != 1 ) : ?>
			<div class="feat-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>');"></div>
			<?php	endif; ?>

				<div class="entry-meta">
					<?php
					if ( 'post' === get_post_type() ) :
						the_field('publish_date'); ?> // <?php the_field('author');
					elseif ( 'project' === get_post_type() ) :
						the_field('researcher_name'); ?> / Awarded in <?php the_field('year_awarded');
					endif; ?>
				</div>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark">View Article  <span class="arrow-right"></span></a></div>

		<?php endif; ?>

	</header>

	<div class="entry-content">

		<?php
		if ( is_single() ) : ?>

		  <div class="shareholder">
				<div class="sharelink">
					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
				</div>
		  </div>

			<div class="entry-meta">
				<span class="date"><?php the_field('publish_date'); ?></span> <span class="sep">//</span> <span class="author"><?php the_field('author'); ?></span>
			</div>

			<?php
			$post_object = get_field('featured_project_insert');
			if( $post_object ):
				$post = $post_object;
				setup_postdata( $post ); ?>
				<div class="insert-wrap"><div class="project-insert">
					<div class="researcher-photo"><img src="<?php the_field('researcher_photo'); ?>" height="94" width="94" alt="<?php the_field('researcher_name'); ?>"></div>
					<div class="project-insert-text">
						<div class="project-title"><?php the_title() ?></div>
						<div class="researcher-name"><?php the_field('researcher_name'); ?></div>
						<div class="researcher-title"><?php the_field('researcher_title'); ?></div>
					</div>
				</div></div>
		    <?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bosefellows' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bosefellows' ),
				'after'  => '</div>',
			) );

		else : ?>

			<footer class="entry-footer">
				<?php bosefellows_entry_tags(); ?>
			</footer>

		<?php endif; ?>

	</div>

</article>
