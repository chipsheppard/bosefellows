<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BoseFellows
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bosefellows' ); ?></a>

	<?php do_action( 'themehook_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<div class="inner-wrap">

			<div class="site-branding">

				<?php
				if ( function_exists( 'jetpack_the_site_logo' ) ) {
					jetpack_the_site_logo();
				}
				?>

				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span><?php bloginfo( 'name' ); ?></span><div class="text"></div></a></div>

				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
					?>
					<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
				<?php endif; ?>

			</div><!-- .site-branding -->


			<div class="header-left">
				<nav id="left-navigation" class="left-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menuleft',
						'menu_id' => 'menu-left',
						'container' => '',
					) );
					?>
				</nav>
			</div>

			<button class="mobilenav-icon" aria-controls="right-navigation" aria-expanded="false"></button>
			<button class="mobilenav-icon-home" aria-controls="mobile-navigation-home" aria-expanded="false"><div class="menu-icon-wrap"><div class="menu-icon"></div></div></button>

			<div class="header-right">
				<nav id="right-navigation" class="right-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menuright',
						'menu_id' => 'menu-right',
						'container' => '',
					) );
					?>
				</nav>
				<nav id="mobile-navigation-home" class="mobile-navigation-home" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menumobilehome',
						'menu_id' => 'menu-mobile-home',
						'container' => '',
					) );
					?>
				</nav>
				<div class="search-wrap">
					<div class="search-icon-wrap so"><div class="search-icon"></div></div><?php get_search_form(); ?>
					<div class="search-icon-wrap sc"><div class="search-icon"></div></div>
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
		</div><!-- .inner-wrap -->

	</header><!-- #masthead .site-header -->

	<?php do_action( 'themehook_before_content' ); ?>

	<div id="content" class="site-content">
