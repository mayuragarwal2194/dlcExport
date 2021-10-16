<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<?php
	if (isset($_POST['update'])) {
		$oldpass=$_POST['oldpass'];
		$newpass=$_POST['newpass'];
		$conpass=$_POST['conpass'];
		$adminid=$_SESSION['ADMINID'];
		$sel="SELECT * FROM admin WHERE admin_password='$oldpass' and admin_id='$adminid'";
		$exe=mysqli_query($con,$sel);
		$tot=mysqli_num_rows($exe);
		if ($tot==1) {
			if ($newpass==$conpass) {
				$upd="UPDATE admin SET admin_password='$newpass' WHERE admin_id='$adminid'";
				mysqli_query($con,$upd);
			}
			else{
				$msg="New Password and Confirm Password Do Not Matched..!!!!...";
			}
		}
		else{
			$msg="Invalid Old Password...!!!....";
		}
	}
?>

<html>
<head>
	<title>Change Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php include_once('navbar.php'); ?>
	<div class="clear"></div>
	<div class="dashboard-menu">
	<?php include_once('leftmenu.php'); ?>
		<div class="dashboard-menu-R">
			<div class="dashboard-menu-R-head">
				Change Password:
			</div>
			<?php echo "$msg"; ?>
			<form method="post">
				<div class="changepass">
					<div>
						<div class="contact1">
							<div>Old Password:</div>
							<div>
								<input type="password" name="oldpass">
							</div>
						</div>
						<div class="contact1">
							<div>New Password:</div>
							<div>
								<input type="password" name="newpass">
							</div>
						</div>
						<div class="contact1">
							<div>Confirm New Password:</div>
							<div>
								<input type="password" name="conpass">
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<input type="submit" class="submit" value="Update Password" name="update"> 
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

<?php include_once('left_dropdown.php'); ?>    