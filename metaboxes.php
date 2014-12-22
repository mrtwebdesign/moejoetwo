<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
	require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
	require_once  __DIR__ . '/CMB2/init.php';
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_mj_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['events'] = array(
		'id'            => 'Event Date',
		'title'         => __( 'Event date', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'side',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'        => array(
			array(
				'name' => __( 'Event Date and Time', 'cmb2' ),
				'desc' => __( 'Click fields for date and time pickers.', 'cmb2' ),
				'id'   => $prefix . 'event_date',
				'type' => 'text_datetime_timestamp',
				),
			),
);

	// Add other metaboxes as needed

return $meta_boxes;
}
