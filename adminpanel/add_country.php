<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$country_name=$_POST['cname'];
	$status=$_POST['status'];
	$cid=$_GET['editid'];

	if ($cid=="") {
		if ($country_name!="" && $status!="") {

			$selco="SELECT * FROM add_country WHERE country_name='$country_name'";
			$execo=mysqli_query($con,$selco);
			$totco=mysqli_num_rows($execo);

			if ($totco==1) {
				$error="Country Name Is Already Exist...!!!!...";
			}
			else{
				$ins="INSERT INTO add_country SET
				country_name='$country_name',
				country_status='$status'";
				mysqli_query($con,$ins);

				// PAGE KO REDIRECT KARNA
				echo "<script>window.location='view_country.php'</script>";		
			}
		}
	}
	else{
// <!-- UPDATE QUERY -->		
		$sel="SELECT * FROM add_country WHERE country_id='$cid'";
		$exe=mysqli_query($con,$sel);
		$fetch=mysqli_fetch_array($exe);
		if ($country_name!="" && $status!="") {
			$ins="UPDATE add_country SET
			country_name='$country_name',
			country_status='$status' WHERE
			country_id='$cid'";
			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_country.php'</script>";		
		}
	}	
?>
<html>
<head>
	<title>Add Country</title>
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
				Add Country:
			</div>
			<?php if( $error!="") {  ?>
            <div class="alert alert-danger" role="alert" value="dan-mess">
                <div style="text-align: center;">
                    <?PHP echo $error; ?>
                </div>
            </div>
            <?php } ?>
			<div class="contacts">
				<form method="post">
					<div>
						<div class="coursename">
							<div>Name:</div>
							<div>
								<input type="text" name="cname" value="<?php echo $fetch['country_name']; ?>">
							</div>
						</div>	
					</div>
					<div>
						<div>
							<div>Status:</div>
							<div style="margin-bottom: 10px;">
								<input type="radio" name="status" value="1" <?php if ($fetch['country_status']==1) {
									echo "checked";
								} ?> > Active
								<input type="radio" name="status" value="0" <?php if ($fetch['country_status']==0) {
									echo "checked";
								} ?> > Deactive
							</div>
						</div>	
					</div>
					<div class="clear"></div>
					<input type="submit" class="submit" value="Add" name="">	
				</form>
			</div>
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