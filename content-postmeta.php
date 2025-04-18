<?php
/*
 * Postmeta used by files content-list, single and single-full.
 */
?>

<div class="post-meta">
	<?php printf(
		/* translators: %s: post date. */
		esc_html__( 'Posted on %s', 'bluegray' ),
		'<a href="'. esc_url( get_permalink() ) .'"><time class="updated" datetime="'. esc_html( get_the_date( 'c' ) ) .'">'. esc_html( get_the_date() ) .'</time></a>'
	); ?>
	<?php echo '|'; ?>
	<?php printf(
		/* translators: %s: post author. */
		esc_html__( 'By %s', 'bluegray' ),
		sprintf( '<span class="author vcard"><a class="url fn" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	); ?>
	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<?php echo '|'; ?>
		<?php comments_popup_link( __( 'No comments', 'bluegray' ), __( '1 comment', 'bluegray' ), __( '% comments', 'bluegray' ) ); ?>
	<?php endif; ?>
</div>
