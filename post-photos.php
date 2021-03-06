<?php
/**
 * Post Template: Photo essay
 *
 * This is the photo essay post template.  It deletes the sidebars and expands
 * the content area to fit the full with of the screen
 *
 * @package Oxygen
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
	</div>

	<?php do_atomic( 'before_content' ); // oxygen_before_content ?>
	
	<div class="page-template-fullwidth">
	<div class="content-wrap">

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
							
							<div class="post-content">
							
								<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'single-thumbnail', 'link_to_post' => false, 'image_class' => 'featured', 'attachment' => false, 'width' => 470, 'height' => 260 ) ); ?>
								
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
	
								<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published] &middot;', 'oxygen' )); ?> by <?php if ( function_exists( 'coauthors_posts_links' ) ) { coauthors_posts_links(); } else { the_author_posts_link(); } ?></div>
	
								<div class="entry-content">
									
									<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oxygen' ) ); ?>
									
									<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'oxygen' ), 'after' => '</p>' ) ); ?>
									
								</div><!-- .entry-content -->
	
								<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="post_tag" before="Tags: "]', 'oxygen' ) . '</div>' ); ?>
	
								<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>
							
							</div><!-- .post-content -->
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>
	
						<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>
	
						<?php do_atomic( 'after_singular' ); // oxygen_after_singular ?>
	
						<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>
	
					<?php endwhile; ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
		</div>
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>