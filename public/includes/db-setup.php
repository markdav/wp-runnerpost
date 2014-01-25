<?php
/**
 * DB_Setup
 *
 * Functions useful for setting up or upgrading the database
 */
class DB_Setup {

const rup_db_version = "1.0";

public static function rup_install() {
   global $wpdb;
   global $rup_db_version;

    error_log("trying to install the db tables..");

   $table_name = $wpdb->prefix . "runnerpost_log";
      
   $sql = "CREATE TABLE $table_name (
   id mediumint(9) NOT NULL AUTO_INCREMENT,
   run_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
   run_note tinytext NOT NULL,
   run_distance float NOT NULL,
   run_unit varchar(10) DEFAULT 'miles' NOT NULL,
   run_url VARCHAR(55) DEFAULT '' NULL,
   UNIQUE KEY id (id)
    );";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
 
   add_option( "rup_db_version", $rup_db_version );
}
/*
public function jal_install_data() {
   global $wpdb;
   $welcome_name = "Mark Davis";
   $note = "Congratulations, you just completed the installation!";
   $table_name = $wpdb->prefix . "runnerpost_log";
   $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'note' => $welcome_name, 'text' => $welcome_text ) );
}
*/

}
