<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

		<div id="secondary" class="widget-area" role="complementary">
		<?php if ( is_page_template( 'page-clemson.php' ) ) {
			//echo 'page-clemson.php';
			dynamic_sidebar( 'clemson-sidebar' );
		}
		if ( is_page_template( 'page-greenville.php' ) ) {
			//echo 'page-clemson.php';
			dynamic_sidebar( 'greenville-sidebar' );
		} 
		if ((!is_page_template( 'page-clemson.php' )) && (!is_page_template( 'page-greenville.php' ))){
			//echo 'Other Template';
			dynamic_sidebar( 'site-sidebar' );
		}
		?>
		</div><!-- #secondary -->








