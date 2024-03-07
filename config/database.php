<?php
ob_start();
session_start();
function db() {
	static $conn;
		if ($conn===NULL){ 
			//$servername = "localhost";
			//$username = "tsbizz_bookingportal_new";
			//$password = "admin@3214";
			//$dbname = "tsbizz_bookingportal_new";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tsbizz_bookingportal_new";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
		}
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	return $conn;
}
date_default_timezone_set('Asia/Calcutta');



?>