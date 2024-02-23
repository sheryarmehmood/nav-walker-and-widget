<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version.
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />

<title><?php echo wp_get_document_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if ( file_exists( get_stylesheet_directory() . '/images/kubrickbgwide.jpg' ) ) { ?>
<style type="text/css" media="screen">

	<?php
	// Checks to see whether it needs a sidebar.
	if ( empty( $withcomments ) && ! is_single() ) {
		?>
	#page { background: url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/kubrickbg-<?php bloginfo( 'text_direction' ); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar. ?>
	#page { background: url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>
<?php } ?>

<?php
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}
?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </div>
        </div>
    </div>
</nav>



<div id="page">

<div id="header" role="banner">
	<div id="headerimg">
		<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
</div>
<hr />


<?php
    wp_nav_menu( array(
        'theme_location'    => 'prime',
        'container'         => '',
        'menu_class'        => 'navbar navbar-expand-lg navbar-light bg-light',
        'fallback_cb'       => '__return_false',
        'walker'            => new Bootstrap_Navwalker(),
        'depth'             => 2,
    ) );
?>

