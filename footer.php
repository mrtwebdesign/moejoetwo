<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
</div><!-- #main .wrapper -->
<footer id="colophon" role="contentinfo">
	<div class="widget-wrap">
		<?php if ( is_page_template( 'page-clemson.php' ) ) {
			echo 'page-clemson.php';
			dynamic_sidebar( 'clemson-footer' );
		}
		if ( is_page_template( 'page-greenville.php' ) ) {
			echo 'page-clemson.php';
			dynamic_sidebar( 'greenville-footer' );
		} 
		if ((!is_page_template( 'page-clemson.php' )) && (!is_page_template( 'page-greenville.php' ))){
			echo 'Other Template';
			dynamic_sidebar( 'site-footer' );
		}
		?>
	</div>


	<div class="site-info">
		<?php do_action( 'twentytwelve_credits' ); ?>
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>