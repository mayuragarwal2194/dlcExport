<?php
// SESSION START
	session_start();
// SERVER AND DATABASE CONNECTION
	$hostname="localhost";
	$user="root";
	$password="";
	$dbname="dlc_export";
	$con=mysqli_connect($hostname,$user,$password,$dbname);
	//to check if database & server is connected successfully orr not
	// if ($con=mysqli_connect($hostname,$user,$password,$dbname)) {
	// 	echo "Database Connected";
	// }
	// else{
	// 	echo "Not Connected";
	// }
?>