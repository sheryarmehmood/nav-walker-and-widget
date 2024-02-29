<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom_nav_walker_and_widg
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'custom-nav-walker-and-widg' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
				<?php
			else :
				?>
				<!-- <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> -->
				<?php
			endif;
			$custom_nav_walker_and_widg_description = get_bloginfo( 'description', 'display' );
			if ( $custom_nav_walker_and_widg_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $custom_nav_walker_and_widg_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		

<!-- 
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'custom-nav-walker-and-widg' ); ?></button>
			<?php
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'menu-1',
			// 		'menu_id'        => 'primary-menu',
			// 	)
			// );
			?>
		</nav> -->
		<!-- #site-navigation -->
	</header><!-- #masthead -->




<nav class="navbar navbar-expand-md navbar-dark bg-primary" role="navigation">
			
	<div class="container">
				
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Navbar</a>
		<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2, //2 for dropdown, 1 for no dropdown
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'Bootstrap_Navwalker::fallback',
				'submenu_class'     => 'dropdown-menu bg-dark',
				'walker'            => new Bootstrap_Navwalker(),
			) );
		?>

	</div>

</nav>