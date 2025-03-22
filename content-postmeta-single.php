<?php
/*
 * Postmeta used by files single and single-full.
 */
?>

<div class="post-metadata post-metadata-bottom">
	<?php printf(
		/* translators: %s: category. */
		esc_html__( 'Category: %s', 'bluegray' ),
		get_the_category_list( __( ', ', 'bluegray' ) )
	); ?>
	<?php if ( has_tag() ) : ?>
		<?php echo '|'; ?>
		<?php printf(
			/* translators: %s: tag. */
			esc_html__( 'Tag: %s', 'bluegray' ),
			get_the_tag_list( '', __( ', ', 'bluegray' ) )
		); ?>
	<?php endif; ?>
	<?php $format = get_post_format(); ?>
	<?php if ( has_post_format() ) : ?>
		<?php echo '|'; ?>
		<?php printf(
			/* translators: %s: format. */
			esc_html__( 'Format: %s', 'bluegray' ),
			sprintf( '<a href="%1$s">%2$s</a>',
				get_post_format_link( $format ),
				get_post_format_string( $format )
			)
		); ?>
	<?php endif; ?>
</div>
