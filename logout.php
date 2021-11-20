<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php
	unset($_SESSION['USERID']);
	echo "<script>window.location='index.php'</script>";
?>