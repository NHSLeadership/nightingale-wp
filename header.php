<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nightingale-wp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> id="jsPage" class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/nightingale-wp/assets/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/nightingale-wp/assets/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/nightingale-wp/assets/img/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/nightingale-wp/assets/img/site.webmanifest">
	<link rel="mask-icon" href="/wp-content/themes/nightingale-wp/assets/img/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/wp-content/themes/nightingale-wp/assets/img/favicon.ico">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-config" content="/wp-content/themes/nightingale-wp/assets/img/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Hook for inserting ribbons before the header -->
<?php do_action('nightingale_before_header'); ?>

<div id="page" class="site">

	<header id="jsPageHeader" class="c-page-header" role="banner">
		<div class="o-wrapper c-page-header__inner">

				<!-- Logo -->
				<?php if ( has_custom_logo() ) {
					the_custom_logo();
				}
				else { ?>
					<h1>
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					</h1>
				<?php } ?>

				<div class="c-page-header__controls">

					<!-- Search box -->
					<?php dynamic_sidebar( 'header-widget-area' ); ?>

					<!-- Main menu -->
					<button class="c-nav-trigger" id="jsNavTrigger" aria-label="menu" data-expands="#jsNav">☰</button>

					<nav class="c-nav-primary c-page-header__nav" id="primaryNav">
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class' => 'c-nav-primary__list',
							'menu_id' => 'jsNav',
							'walker'  => new Walker_Nightingale_Menu(),
							'container' => false,
							'depth' => 2  // limit menu depth (otherwise login button goes astray)
						));
						// If required, display login/out button in nav
						if (get_theme_mod('login_button')) {
							wp_loginout();
						}
						?>
					</nav><!-- #site-navigation -->

				</div><!-- .c-page-header__controls -->

		</div><!-- .o-wrapper .c-page-header__inner-->

	</header><!-- #jsPageHeader -->

	<div id="content" class="o-wrapper">

		<!-- Breadcrumbs -->
		<?php nightingale_breadcrumb() ?>

		<!-- page-specific partnership ribbon (added via custom field named "partnership_ribbon") -->
		<?php
		if (get_the_ID()) {
			$PartneshipRibbonText = get_post_meta(get_the_ID(), "partnership_ribbon", true);
			if ($PartneshipRibbonText) {
				$SummaryDetail = '<b>In partnership with:</b> '.$PartneshipRibbonText;
				?>
				<div class="c-ribbon c-ribbon--expandable c-ribbon--page-specific u-margin-bottom">
					<div class="o-wrapper">
						<?php
						if (strlen($PartneshipRibbonText) <= 30 ) {
							// don't use details/summary for short text
							echo '<div class="c-ribbon__body short-ribbon">'.$SummaryDetail.'</div><!-- .c-ribbon__body -->';
						}
						else {
							echo '<details class="c-ribbon__body"><summary>'.$SummaryDetail.'</summary></details><!-- .c-ribbon__body -->';
			 			}
						?>
				</div><!-- .o-wrapper -->
			</div><!-- .c-ribbon -->
			<?php
			}
		}
	?>
