<?php
	// SERVER AND DATABASE CONNECTION
	$user="root";
	$password="";
	try{
		$con=new PDO('mysql:host=localhost;dbname=dlc_export', $user, $password );
		create_logs('database connected');
	}catch(PDOException $e){
		create_logs($e->getMessage());
		echo "Something went wrong, please try again later.";
		die();
	}
?>