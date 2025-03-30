<?php
/*
 * The search bar.
 */
?>

<div id="search-bar">
	<?php if ( get_theme_mod( 'myknowledgebase_search' ) ) {
		$search_title = get_theme_mod( 'myknowledgebase_search' );
	} else {
		$search_title = __( 'Search Posts', 'myknowledgebase' );
	}
	if ( get_theme_mod( 'myknowledgebase_search_field_placeholder' ) ) {
		$search_field_placeholder = get_theme_mod( 'myknowledgebase_search_field_placeholder' );
	} else {
		$search_field_placeholder = __( 'Search Posts', 'myknowledgebase' );
	} ?>
	<div class="search-bar-title"><?php echo esc_html( $search_title ); ?></div>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label><span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'myknowledgebase' ); ?></span></label>
		<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr( $search_field_placeholder ); ?>" value="<?php echo get_search_query(); ?>" />
		<input type="hidden" name="post_type" value="post" />
		<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'myknowledgebase' ); ?>" />
	</form>
</div>
