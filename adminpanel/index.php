<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<!-- LOGIN KA KAAM -->
<?php
//BACK AANE SE ROKNA
	if ($_SESSION['ADMINID']!="") {
		echo "<script>window.location='dashboard.php'</script>";
	}
	if (isset($_POST['login'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sel="SELECT * FROM admin WHERE admin_username='$username' and admin_password='$password'";
		$exe=mysqli_query($con,$sel);
		$tot=mysqli_num_rows($exe);
		if ($tot==1) {
			$rem=$_POST['rem'];
			if ($rem==1) {
				setcookie("UNAME",$username,time()+60);
				setcookie("PASSWORD",$password,time()+60);
			}
			$fetch=mysqli_fetch_array($exe);
			$_SESSION['ADMINID']=$fetch['admin_id'];
			echo "<script> window.location='dashboard.php' </script>";
		}
		else{
			$msg="Invalid Username & Password";
		}
	}
?>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="loginbody">
	<div class="loginbox">
		<div class="text-danger text-center">
			<?php echo $msg; ?>
		</div>
		<form method="post">
			<div class="login_head">
				<h2>ADMIN PANEL</h2>
			</div>
			<div class="username">
				<div>Username</div> 
				<input type="text" name="username" value="<?php echo $_COOKIE['UNAME']; ?>">
			</div>
			<div class="username">
				<div>Password</div>
				<input type="text" name="password" value="<?php echo $_COOKIE['PASSWORD']; ?>">
			</div>
			<div style="font-size: 14px; color: grey;">
				<input type="checkbox" name="rem" value="1">Remember Me
			</div>
			<button type="submit" class="btn btn-outline-info" name="login">LOGIN</button>
		</form>
	</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>