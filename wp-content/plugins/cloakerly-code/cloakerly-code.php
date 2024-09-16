<?php
/**
 * @package cloakerly-code
 */
/*
Plugin Name: Cloakerly
Plugin URI: https://cloakerly.com
Description: Cloakerly WordPress plugin
Version: 1.0.1
Author: Cloakerly Developers
Author URI: https://cloakerly.com
Text Domain: Cloakerly
 */
 if (!function_exists('add_action')) {
 	echo 'Hi Users, This is a plugin to execute PHP Script on top of Pages and Posts';
 	exit;
 }

 define('Cloakerly_VERSION', '1.0.1');
 define('Cloakerly__MINIMUM_WP_VERSION', '4.0');
 define('Cloakerly__PLUGIN_URL', plugin_dir_url(__FILE__));
 define('Cloakerly__PLUGIN_DIR', plugin_dir_path(__FILE__));
 define('Cloakerly_DELETE_LIMIT', 100000);

 /**
  * Adds a box to the main column on the Post and Page edit screens.
  */

function myplugin_add_meta_box_cloakerly() {

	$screens = array('post', 'page');

	foreach ($screens as $screen) {

		add_meta_box(
			'myplugin_sectionid',
			__('Cloakerly Code', 'myplugin_cloakerly'),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action('add_meta_boxes', 'myplugin_add_meta_box_cloakerly');

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback($post) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field('myplugin_save_meta_box_data_cloakerly', 'myplugin_meta_box_nonce_cloakerly');

	/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
	*/
	$value = get_post_meta($post->ID, '_my_meta_value_key_cloakerly', true);

	echo '<label for="myplugin_cloakerly_field">';
	_e('Place PHP Code Here', 'myplugin_cloakerly');
	echo '</label> ';
	echo '<textarea id="myplugin_cloakerly_field" name="myplugin_cloakerly_field" class="widefat" cols="50" rows="5">' . esc_attr($value) . '</textarea>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function myplugin_save_meta_box_data_cloakerly($post_id) {

	/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
	*/

	// Check if our nonce is set.
	if (!isset($_POST['myplugin_meta_box_nonce_cloakerly'])) {
		return;
	}

	// Verify that the nonce is valid.
	if (!wp_verify_nonce($_POST['myplugin_meta_box_nonce_cloakerly'], 'myplugin_save_meta_box_data_cloakerly')) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check the user's permissions.
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

		if (!current_user_can('edit_page', $post_id)) {
			return;
		}

	} else {

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if (!isset($_POST['myplugin_cloakerly_field'])) {
		return;
	}

	// Sanitize user input.
	//$my_data = sanitize_text_field( $_POST['myplugin_cloakerly_field'] );
	$my_data = $_POST['myplugin_cloakerly_field'];
	$my_data = preg_replace(array('/<(\?|\%)\=?(php)?/', '/(\%|\?)>/'), array('', ''), $my_data);
	// Update the meta field in the database.
	update_post_meta($post_id, '_my_meta_value_key_cloakerly', $my_data);
}
add_action('save_post', 'myplugin_save_meta_box_data_cloakerly');

// place redirect code before header

//add_action('wp_head','user_redirection_code', 1);
add_action('template_redirect', 'user_redirection_code', 1);
function user_redirection_code() {
	// This line solves the problem by checking that you're actually on a post page
	// if(!is_single(get_the_ID())) {
	// 	return;
	// }

	/*$key_1_values = get_post_meta( get_the_ID(), '_my_meta_value_key_cloakerly' );
		foreach ($key_1_values as $key => $value) {
		echo $value;
	*/

	$key_1_values = get_post_meta(get_the_ID(), '_my_meta_value_key_cloakerly');
	// echo $key_1_values."xx";

	if (is_array($key_1_values) || is_object($key_1_values)) {
		foreach ($key_1_values as $key => $value) {
				eval($value);
		}
	}
}
?>
