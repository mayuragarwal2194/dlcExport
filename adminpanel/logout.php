<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php
	unset($_SESSION['ADMINID']);
	echo "<script>window.location='index.php'</script>"; 
?>