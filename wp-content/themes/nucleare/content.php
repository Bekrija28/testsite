<?php
/**
 * @package nucleare
 */
?>
<?php 
	$showPost = get_theme_mod('nucleare_theme_options_postshow', 'excerpt'); 
	$showCatsTags = get_theme_mod('nucleare_theme_options_show_cats_tags', ''); 
	$readMoreText = get_theme_mod('nucleare_theme_options_readmoretext', __( 'Read More', 'nucleare' ));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<figure class="entry-featuredImg"><a href="' .esc_url(get_permalink()). '" title="' .the_title_attribute('echo=0'). '">';
			the_post_thumbnail('nucleare-normal-post', array( 'alt' => the_title_attribute('echo=0'), 'class' => 'nucleare-loop-featured-image'));
			if (get_the_post_thumbnail_caption()) {
				echo '<div class="featImageCaption smallPart">';
				the_post_thumbnail_caption();
				echo '</div>';
			}
			echo '<figcaption><p><i class="fa fa-file-text"></i></p></figcaption></a></figure>';
		}
	?>
	<header class="entry-header">
		<?php if($showCatsTags): ?>
			<div class="entry-category">
				<?php nucleare_entry_category(); ?>
			</div><!-- .entry-category -->
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta smallPart">
			<?php nucleare_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if($showPost == 'excerpt'): ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else: ?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nucleare' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links smallPart">' . esc_html__( 'Pages:', 'nucleare' ) . '<span>',
					'after'  => '</span></div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<div class="entry-bottom smallPart">
			<?php if($showCatsTags): ?>
				<?php nucleare_entry_footer(); ?>
			<?php else: ?>
				<?php edit_post_link( esc_html__( 'Edit', 'nucleare' ), '<span class="edit-link floatLeft"><i class="fa fa-wrench spaceRight" aria-hidden="true"></i>', '</span>' ); ?>
			<?php endif; ?>
			<?php if($showPost == 'excerpt'): ?>
				<div class="readMoreLink">
					<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html($readMoreText); ?><i class="fa spaceLeft fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
			<?php endif; ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->