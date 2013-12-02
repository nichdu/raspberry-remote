<?php
/*
 * Raspberry Remote
 * http://xkonni.github.com/raspberry-remote/
 *
 * webinterface
 *
*/

/*
 * get configuration
 * don't forget to edit config.php
 */
//include("config.php");

/*
 * get parameters
 */
$group = $_GET['group'];
$switch = (int)$_GET['switch'];
$switch = "0" . $switch;
$action = $_GET['action'] == "1" ? 1 : 0;
$delay = 0;

require 'class.Switcher.php';
$switcher = new Switcher($group);

header("Content-type: application/json");
$ret = array('code' => 1, 'message' => 'Ein unbekannter Fehler ist aufgetreten.');
if (!(isset($_GET['group']) && isset($_GET['switch']) && isset($_GET['action'])))
{
	$ret = array('code' => 15, 'message' => 'Geben Sie alle Parameter an.', 'info' => 'Parameter sind: group, switch, action, delay');
} else {
	try {
		$action == 1 ? $switcher->switchOn($switch) : $switcher->switchOff($switch);
		$ret = array('code' => 0, 'message' => 'Erfolg');
	} catch (ErrorException $e) {
		$ret = array('code' => -1, 'message' => $e->getMessage());
	}
}

print json_encode($ret);