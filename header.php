<?php
/*
 * The header for displaying site title, tagline, logo, menu and header image.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="container">
	<?php if ( is_page_template( 'page-full.php' ) || is_page_template( 'single-full.php' ) ) {
		$main_content = '#content-full';
	} else {
		$main_content = '#content';
	} ?>
	<a class="skip-link screen-reader-text" href="<?php echo esc_url( $main_content ); ?>"><?php esc_html_e( 'Skip to content', 'bluegray' ); ?></a>
	<div id="header-first">
		<div class="logo">
			<?php if ( get_theme_mod( 'bluegray_logo' ) ) : ?>
				<?php if ( get_theme_mod( 'bluegray_logo_width' ) ) {
					$logo_width = 'style="width:'.get_theme_mod( 'bluegray_logo_width' ).'px;"';
				} else {
					$logo_width = '';
				} ?>
				<div class="site-logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
					<img src='<?php echo esc_url( get_theme_mod( 'bluegray_logo' ) ); ?>' <?php echo $logo_width; ?> class="site-logo-img" alt='<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				</div>
			<?php endif; ?>
			<?php if ( ( get_theme_mod( 'bluegray_site_title' ) != 'no' ) || ( get_theme_mod( 'bluegray_tagline' ) != 'no' ) ) : ?>
				<div class="site-title-tagline">
					<?php if ( get_theme_mod( 'bluegray_site_title' ) != 'no' ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'bluegray_tagline' ) != 'no' ) : ?>
						<?php if ( get_bloginfo( 'description' ) ) : ?>
							<div class="site-tagline"><?php bloginfo( 'description' ); ?></div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div id="header-second">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="nav-head-container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
			</div>
			<div class="mobile-nav-container">
				<?php if ( get_theme_mod( 'bluegray_mobile_menu_label' ) ) {
					$mobile_menu_label = get_theme_mod( 'bluegray_mobile_menu_label' );
				} else {
					$mobile_menu_label = __( 'Menu', 'bluegray' ).' &#43;';
				} ?>
				<button id="mobile-nav-toggle" class="mobile-nav-toggle"><?php echo esc_html( $mobile_menu_label ); ?></button>
				<div id="mobile-nav" class="mobile-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( is_front_page() || ( !is_front_page() && ( get_theme_mod( 'bluegray_header_image' ) == 'no' ) ) ) { ?>
			<?php if ( get_header_image() ) { ?>
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>" />
			<?php } ?>
		<?php } ?>
	</div>
	<div id="main">
		<?php if ( is_front_page() ) { ?>
			<?php get_template_part( 'content-homepage' ); ?>
		<?php } ?>
		<div id="main-content">
