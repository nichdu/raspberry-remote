<?php
/*
 * Raspberry Remote
 * http://xkonni.github.com/raspberry-remote/
 *
 * configuration for the webinterface
 *
 */

/*
 * define ip address and port here
 */
define('SWITCH_SOCKET_SOURCE', 'localhost');
define('SWITCH_SOCKET_DEST', 'localhost');
define('SWITCH_SOCKET_PORT', 11337);

/*
 * specify configuration of sockets to use
 *   array("group", "plug", "description");
 * use empty string to create empty box
 *   ""
 *
 */
$config=array(
  array("10001", "4", "Bettlicht"),
  array("10001", "2", "Fernseher"),
  "",
  array("10001", "1", "Schreibtisch"),
)
?>
