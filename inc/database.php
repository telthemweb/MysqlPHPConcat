<?php 
    $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "leaveapp";

	
try {
		$conn = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if ($conn) {
		return null;
		// echo "Connected";
	}
	else{
		echo "Failed:" . $conn->connect_error;
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
}