<?php
/*
 * Nothing found used by files 404, archive, index and search.
 */
?>

<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bluegray' ); ?></h1>
<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'bluegray'); ?></p>
<?php if ( is_search() || is_404() ) : ?>
	<?php get_search_form(); ?>
<?php endif; ?>
