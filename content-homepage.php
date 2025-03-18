<?php
/*
 * The homepage widgets.
 */
?>

<?php if ( is_active_sidebar( 'homepage-left' ) || is_active_sidebar( 'homepage-middle' ) || is_active_sidebar( 'homepage-right' ) ) { ?>
	<div id="homepage-content">
		<div id="homepage-widgets" role="complementary">
			<div class="home-left">
				<?php dynamic_sidebar( 'homepage-left' ); ?>
			</div>
			<div class="home-middle">
				<?php dynamic_sidebar( 'homepage-middle' ); ?>
			</div>
			<div class="home-right">
				<?php dynamic_sidebar( 'homepage-right' ); ?>
			</div>
		</div>
	</div>
<?php } ?>
