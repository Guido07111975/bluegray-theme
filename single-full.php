<?php
/*
 * Template Name: No Sidebar Template
 * Description: Template without sidebar
 * Template Post Type: post
 */
?>

<?php get_header(); ?>
<div id="content-full" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
			<h1 class="entry-title post-title"><?php the_title(); ?></h1>

			<?php get_template_part( 'content-postmeta' ); ?>

			<div class="entry-content post-content">
				<?php if ( get_theme_mod( 'bluegray_post_image' ) == 'yes' ) {
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'post-thumbnail', array( 'class' => 'single-image' ) );
					}
				} ?>

				<?php the_content(); ?>

				<?php wp_link_pages( array(
					'before' => '<div class="pagelink">' . __( 'Pages:', 'bluegray' ),
					'after'  => '</div>',
				) ); ?>
			</div>

			<?php get_template_part( 'content-postmeta-single' ); ?>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'bluegray' ), '<div class="edit-link">', '</div>' ); ?>
</div>
<?php get_footer(); ?>
