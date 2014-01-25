<?php
/**
 * Runners post log
 *
 * My first wordpress plugin.. and bit of php work so don't laugh.. :-)
 *
 * @package   wp-runnerpost
 * @author    Mark Davis <mark.davis2@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.attheborders.com
 * @copyright 2014 Mark Davis
 *
 * @wordpress-plugin
 * Plugin Name:       WP RunnerPost
 * Plugin URI:        http://www.attheborders.com
 * Description:       Plugin to let runners mix blogging and mileage logging
 * Version:           1.0.0
 * Author:            Mark Davis
 * Author URI:        http://www.attheborders.com
 * Text Domain:       wp-runnerpost-en
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-wp-runnerpost.php' );


/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'WP_RunnerPost', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_RunnerPost', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_RunnerPost', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wp-runnerpost-admin.php' );
	add_action( 'plugins_loaded', array( 'WP_RunnerPost_Admin', 'get_instance' ) );
}