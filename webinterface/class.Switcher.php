<?php 

require_once 'config.php';

class Switcher {
	private $houseId;

	public function __construct($houseId)
	{
		$this->houseId = $houseId;
	}
	
	public function switchOn($switchId)
	{
		$switchId = "0" . (int) $switchId;
		$this->switchTo($switchId, "1");
	}
	
	public function switchOff($switchId)
	{
		$switchId = "0" . (int) $switchId;
		$this->switchTo($switchId, "0");
	}
	
	private function switchTo($switchId, $mode = "1")
	{
		if (!preg_match('/^[01]{5}$/', $this->houseId))
		{
			throw new ErrorException('Die House-ID ist ungültig.');
		} else if ($switchId < 0 || $switchId > 4) {
			throw new ErrorException('Die Schalter-ID ist ungültig.');
		} else {
			$output = $this->houseId . $switchId . $mode . "0"; // kein Delay
			if (strlen($output) >= 8) {
			  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
			  socket_bind($socket, SWITCH_SOCKET_SOURCE) or die("Could not bind to socket\n");
			  socket_connect($socket, SWITCH_SOCKET_DEST, SWITCH_SOCKET_PORT) or die("Could not connect to socket\n");
			  socket_write($socket, $output, strlen ($output)) or die("Could not write output\n");
			  socket_close($socket);
			  return true;
			} else {
				throw new ErrorException("Unbekannter Fehler");
			}
		}
		
	}
}