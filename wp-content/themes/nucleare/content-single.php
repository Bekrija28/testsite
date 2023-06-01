<?php
/**
 * @package nucleare
 */
?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb( '<div class="topBreadcrumb"><p id="breadcrumbs">','</p></div>' );
}
?>
<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<figure class="entry-featuredImg">';
			the_post_thumbnail('nucleare-normal-post', array( 'alt' => the_title_attribute('echo=0'), 'class' => 'nucleare-single-featured-image'));
			if (get_the_post_thumbnail_caption()) {
				echo '<div class="featImageCaption smallPart">';
				the_post_thumbnail_caption();
				echo '</div>';
			}
			echo '</figure>';
		}
	?>
	<header class="entry-header">
		<div class="entry-category">
			<?php nucleare_entry_category(); ?>
		</div><!-- .entry-category -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta smallPart">
			<?php nucleare_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links smallPart">' . esc_html__( 'Pages:', 'nucleare' ) . '<span>',
				'after'  => '</span></div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-bottom smallPart">
			<?php nucleare_entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
