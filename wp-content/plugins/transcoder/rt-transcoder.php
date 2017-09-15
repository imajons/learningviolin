<?php
/**
 * Plugin Name: Transcoder
 * Plugin URI: https://rtmedia.io/transcoder/?utm_source=dashboard&utm_medium=plugin&utm_campaign=transcoder
 * Description: Audio & video transcoding services for ANY WordPress website. Allows you to convert audio/video files of any format to a web-friendly format (mp3/mp4).
 * Version: 1.1.2
 * Text Domain: transcoder
 * Author: rtCamp
 * Author URI: https://rtcamp.com/?utm_source=dashboard&utm_medium=plugin&utm_campaign=transcoder
 * Domain Path: /languages/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Transcoder
 */

if ( ! defined( 'RT_TRANSCODER_PATH' ) ) {
	/**
	 * The server file system path to the plugin directory
	 */
	define( 'RT_TRANSCODER_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'RT_TRANSCODER_URL' ) ) {
	/**
	 * The url to the plugin directory
	 */
	define( 'RT_TRANSCODER_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'RT_TRANSCODER_BASE_NAME' ) ) {
	/**
	 * The base name of the plugin directory
	 */
	define( 'RT_TRANSCODER_BASE_NAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'RT_TRANSCODER_VERSION' ) ) {
	/**
	 * The version of the plugin
	 */
	define( 'RT_TRANSCODER_VERSION', '1.1.2' );
}

require_once RT_TRANSCODER_PATH . 'admin/rt-transcoder-functions.php';
require_once RT_TRANSCODER_PATH . 'admin/rt-transcoder-admin.php';

global $rt_transcoder_admin;

$rt_transcoder_admin = new RT_Transcoder_Admin();

/**
* Add Settings/Docs link to plugins area.
*
* @since 1.1.2
*
* @param array $links Links array in which we would prepend our link.
* @param string $file Current plugin basename.
*
* @return array Processed links.
*/
function rtt_action_links( $links, $file ) {
	// Return normal links if not plugin.
	if ( plugin_basename( 'transcoder/rt-transcoder.php' ) !== $file ) {
		return $links;
	}

	// Add a few links to the existing links array.
	return array_merge( $links, array(
		'settings' => '<a href="' . esc_url( admin_url( 'admin.php?page=rt-transcoder' ) ) . '">' . esc_html__( 'Settings', 'rtmedia' ) . '</a>',
		'docs'     => '<a target="_blank" href="' . esc_url( 'https://rtmedia.io/docs/transcoder/' ) . '">' . esc_html__( 'Docs', 'rtmedia' ) . '</a>',
	) );
}

add_filter( 'plugin_action_links', 'rtt_action_links', 11, 2 );
add_filter( 'network_admin_plugin_action_links', 'rtt_action_links', 11, 2 );
