<?php
Class dbObj{
	/* Database connection start */
	var $servername = "arduino.czlvl2wt3ovq.eu-west-2.rds.amazonaws.com";
	var $username = "nader";
	var $password = "arduinoproject";
	var $dbname = "DDNS_DB";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
?>