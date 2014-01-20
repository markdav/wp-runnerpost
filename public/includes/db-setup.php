<?php
/**
 * DB_Setup
 *
 * Functions useful for setting up or upgrading the database
 */
class DB_Setup {

global $rup_db_version;
$rup_db_version = "1.0";

public function rup_install() {
   global $wpdb;
   global $rup_db_version;

   $table_name = $wpdb->prefix . "runnerpost_log";
      
   $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  note tinytext NOT NULL,
  miles float NOT NULL,
  url VARCHAR(55) DEFAULT '' NULL,
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
