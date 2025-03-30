<?php
/*
 * Postmeta used by files single and single-full.
 */
?>

<div class="post-meta post-meta-bottom">
	<?php printf(
		/* translators: %s: category. */
		esc_html__( 'Category: %s', 'bluegray' ),
		get_the_category_list( __( ', ', 'bluegray' ) ) // phpcs:ignore
	); ?>
	<?php if ( has_tag() ) : ?>
		<?php echo '|'; ?>
		<?php printf(
			/* translators: %s: tag. */
			esc_html__( 'Tag: %s', 'bluegray' ),
			get_the_tag_list( '', __( ', ', 'bluegray' ) ) // phpcs:ignore
		); ?>
	<?php endif; ?>
	<?php $format = get_post_format(); ?>
	<?php if ( has_post_format() ) : ?>
		<?php echo '|'; ?>
		<?php printf(
			/* translators: %s: format. */
			esc_html__( 'Format: %s', 'bluegray' ),
			sprintf( '<a href="%1$s">%2$s</a>',
				esc_url( get_post_format_link( $format ) ),
				esc_html( get_post_format_string( $format ) )
			)
		); ?>
	<?php endif; ?>
</div>
