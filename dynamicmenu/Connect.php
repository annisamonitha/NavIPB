<?php
class Connect{
	public $db = "dbci3";

	public function connect(){
		return mysqli_connect('localhost', 'root', '', $this->db);
	}
}
?>
