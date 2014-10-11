<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Basis
 */
?>
<?php
	if ( basis_get_featured_image_url() )
		$extra_classes[] = "has-featured-image";
?>
<article id="post-<?php the_ID(); ?>" class="<?php echo implode( " ", get_post_class($extra_classes) ); ?>">
	<?php if ( basis_get_featured_image_url() ) { ?>
		<header class="entry-header" style="background-image: url('<?php echo basis_get_featured_image_url(); ?>')">
	<?php } else { ?>
		<header class="entry-header">
	<?php } ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			$format = get_post_format( get_the_ID() );
			if ( false === $format ) {
				$format = 'standard';
			}
			echo '<span class="post-format">' . $format . '</span>';
			?>
			<?php basis_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'basis' ) );
				if ( $categories_list && basis_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'basis' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'basis' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'basis' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'basis' ), __( '1 Comment', 'basis' ), __( '% Comments', 'basis' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'basis' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->