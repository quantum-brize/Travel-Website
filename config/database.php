<?php
ob_start();
session_start();
function db() {
	static $conn;
		if ($conn===NULL){ 
			$servername = "localhost";
			$username = "tsbizz_bookingportal_new";
			$password = "admin@3214";
			$dbname = "tsbizz_bookingportal_new";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
		}
	return $conn;
}
date_default_timezone_set('Asia/Calcutta');



?>