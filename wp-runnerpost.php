<?php

/**  Constants Globally useful*/
define("KILOMETERS_IN_MILE",  1.60934);

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
if ( is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wp-runnerpost-admin.php' );
	add_action( 'plugins_loaded', array( 'WP_RunnerPost_Admin', 'get_instance' ) );
}