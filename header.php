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
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
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
					<div class="o-layout--right">
						<?php dynamic_sidebar( 'header-widget-area' ); ?>
					</div><!-- .o-layout--right -->
					
					<!-- Main menu -->
					<button class="c-nav-trigger" id="jsNavTrigger" aria-label="menu" data-expands="#jsNav" >☰</button>
					<nav class="c-nav-primary" id="primaryNav" role="navigation">
						<?php wp_nav_menu( array( 
							'theme_location' => 'primary', 
							'menu_class' => 'c-nav-primary__list', 
							'menu_id' => 'jsNav', 
							'walker'  => new Walker_Nightingale_Menu(),
							'container' => false,
							'depth' => 2  // limit menu depth (otherwise login button goes astray)
						)); ?>
					</nav><!-- #site-navigation -->
					
				</div><!-- .c-page-header__controls -->
				
		</div><!-- .o-wrapper .c-page-header__inner-->
		
	</header><!-- #jsPageHeader -->

	<!-- page-specific partnership ribbon (added via custom field named "partnership_ribbon") -->
	<?php $PartneshipRibbonText = get_post_meta(get_the_ID(), "partnership_ribbon", true);
	if ($PartneshipRibbonText) { ?>
		<div class="c-ribbon c-ribbon--expandable page-partnership-ribbon">
			<div class="o-wrapper">
				<details class="c-ribbon__body">
					<summary><b>In partnership with:</b> <?php echo $PartneshipRibbonText; ?></summary>
				</details>
			</div>
		</div>
	<?php } ?>
	
	<div id="content" class="o-wrapper">		