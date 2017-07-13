<?php
/**
uu









 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nightingale-wp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/node_modules/nightingale/assets/fonts/0811514e-6660-4043-92c1-23d0b8caaa2f.woff2" as="font" type="font/woff2" crossorigin />
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/node_modules/nightingale/assets/fonts/8c92eb68-ce37-4962-a9f4-5b47d336bd1c.woff2" as="font" type="font/woff2" crossorigin />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Hook for inserting ribbons before the header -->
<?php do_action('nightingale_before_header'); ?>

<div id="page" class="site">
	
	<header id="masthead" class="site-header c-page-header" role="banner">
		<div class="site-branding o-wrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/node_modules/nightingale/assets/img/logo-nhs-white.png" alt="NHS" width="74" height="30" class="c-page-header__logo" style="vertical-align: middle;" />
				<strong class="c-page-header__title"><?php bloginfo( 'name' ); ?></strong>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="c-nav-trigger" id="jsNavTrigger" aria-label="menu" data-expands="#primary-menu" aria-controls="primary-menu" aria-expanded="false">☰</button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="o-wrapper">
