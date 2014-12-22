<?php
/**
 * The template for displaying Category Events page
 */

get_header(); ?>
<?php echo '<!-- '.__file__.' -->' ?>
<section id="primary" class="site-content">
	<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

				<?php if ( category_description() ) : // Show an optional category description ?>
					<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 * Since we are getting these as events.. we 
				 */

				//get_template_part( 'content', get_post_format() );
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<div class="featured-post">
							<?php _e( 'Featured post', 'twentytwelve' ); ?>
						</div>
					<?php endif; ?>
					<header class="entry-header">
						<?php if ( ! post_password_required() && ! is_attachment() ) :
						the_post_thumbnail();
						endif; ?>

						<?php if ( is_single() ) : ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php else : ?>
							<h1 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h1>
						<?php endif; // is_single() ?>
						<?php if ( comments_open() ) : ?>
							<div class="comments-link">
								<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open() ?>
					</header><!-- .entry-header -->

					<?php if ( is_search() ) : // Only display Excerpts for Search ?>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->
					<?php else : ?>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					<?php endif; ?>

					<footer class="entry-meta">
						<?php twentytwelve_entry_meta(); ?>
						<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
						<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
							<div class="author-info">
								<div class="author-avatar">
									<?php
									/** This filter is documented in author.php */
									$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
									echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
									?>
								</div><!-- .author-avatar -->
								<div class="author-description">
									<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
									<p><?php the_author_meta( 'description' ); ?></p>
									<div class="author-link">
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
											<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
										</a>
									</div><!-- .author-link	-->
								</div><!-- .author-description -->
							</div><!-- .author-info -->
						<?php endif; ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->



				<?php
				endwhile;
				twentytwelve_content_nav( 'nav-below' );
				else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
	<?php get_footer(); ?>