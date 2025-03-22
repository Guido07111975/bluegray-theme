<?php
/*
 * The content used by files archive, index and search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list' ); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<p class="sticky-title"><?php esc_html_e( 'Featured post', 'bluegray' ); ?></p>
	<?php endif; ?>

	<?php the_title( '<h2 class="entry-title post-title" rel="bookmark"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

	<?php get_template_part( 'content-postmeta' ); ?>

	<div class="entry-content post-content">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'post-thumbnail', array( 'class' => 'list-image' ) );
		} ?>
		<?php if ( get_theme_mod( 'bluegray_content_type' ) == 'no' ) { ?>
			<?php the_content(); ?>
		<?php } else { ?>
			<?php the_excerpt(); ?>
		<?php } ?>
	</div>

	<?php if ( get_theme_mod( 'bluegray_read_more_label' ) ) {
		$read_more_label = get_theme_mod( 'bluegray_read_more_label' );
	} else {
		$read_more_label = __( 'Read More', 'bluegray' ).' &raquo;';
	} ?>
	<?php if ( get_theme_mod( 'bluegray_read_more' ) != 'no' ) { ?>
		<div class="more">
			<a class="read-more" href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_html( $read_more_label ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
		</div>
	<?php } ?>
</article>
