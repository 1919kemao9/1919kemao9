<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Lonely Road
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/js/html5shiv.js"></script>
<![endif]-->
</head>

<?php $theme_mods = get_theme_mods(); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lonely-road' ); ?></a>

	<div class="header-wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php $has_logo = !empty( $theme_mods['lonely_road_logo'] ) ? true : false; ?>
					<h1 class="site-title" style="<?php echo $has_logo ? 'display: none' : ''; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description" style="<?php echo $has_logo ? 'display: none' : ''; ?>"><?php bloginfo( 'description' ); ?></h2>

					<div class="site-logo" style="<?php echo !$has_logo ? 'display: none' : ''; ?>">
						<?php if( $has_logo ): ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
							<img src="<?php echo $theme_mods['lonely_road_logo']; ?>"/>
						</a>
						<?php endif; ?>
					</div>
			</div>
			
			<div class="social clear">
				<ul>
					<?php foreach( $theme_mods as $theme_mod => $theme_mod_val ): ?>
						<?php if( substr( $theme_mod, 0, 19 ) === "lonely_road_social_" && !empty( $theme_mod_val ) && $theme_mod != 'lonely_road_social_rss' ): ?>
							<?php $network = substr( $theme_mod, 19 ); ?>
							<li><a href="<?php echo $theme_mod_val; ?>" class="<?php echo $network ?>" title="<?php echo $network ?>"><i class="icon-<?php echo $network ?>"></i></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
					
					<?php if( !isset( $theme_mods['lonely_road_social_rss'] ) || $theme_mods['lonely_road_social_rss'] === 'yes' ): ?>
						<li><a href="<?php bloginfo('rss2_url'); ?>" class="rss" title="RSS"><i class="icon-rss"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</header>
	</div>
	
	<div class="navigation-wrapper">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'lonely-road' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clear', 'container_class' => 'menu-menu-container clear', 'fallback_cb' => false ) ); ?>
		</nav>
	</div>

	<div id="content" class="site-content">
