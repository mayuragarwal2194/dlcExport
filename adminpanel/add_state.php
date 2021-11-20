<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$state_name=$_POST['sname'];
	$country_name=$_POST['cname'];
	$status=$_POST['status'];
	$sid=$_GET['editid'];

	if ($sid=="") {
		if ($state_name!="" && $country_name!="" && $status!="") {

			$selst="SELECT * FROM add_state WHERE state_name='$state_name'";
			$exest=mysqli_query($con,$selst);
			$totst=mysqli_num_rows($exest);

			if ($totst==1) {
				$error="State Name Is Already Exist...!!!!...";
			}
			else{
				$ins="INSERT INTO add_state SET 
				state_name='$state_name',
				c_id='$country_name',
				state_status='$status'";

				mysqli_query($con,$ins);

				// PAGE KO REDIRECT KARNA
				echo "<script>window.location='view_state.php'</script>";		
			}
		}
	}
	else{
	// <!-- UPDATE QUERY -->
	$sel="SELECT * FROM add_state WHERE state_id='$sid'";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe);
	if ($state_name!="" && $country_name!="" && $status!="") {
			$ins="UPDATE add_state SET 
			state_name='$state_name',
			c_id='$country_name',
			state_status='$status' WHERE
			state_id='$sid'";

			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_state.php'</script>";		
		}
	}		
?>
<html>
<head>
	<title>Add State</title>
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
				Add State:
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
								<input type="text" name="sname" value="<?php echo $fetch['state_name']; ?>">
							</div>
						</div>
						<div class="coursename">
							<div>Country:</div>
							<select name="cname">
								<option>
									--- Select a Country ---
								</option>
								<?php
									$selcountry="SELECT * FROM add_country";
									$execountry=mysqli_query($con,$selcountry);

									while ($fetchcountry=mysqli_fetch_array($execountry)) {
								?>
								<option value="<?php echo $fetchcountry['country_id'] ?>">
									<?php echo $fetchcountry['country_name']; ?>
								</option>
								<?php } ?>
							</select>
						</div>	
					</div>
					<div>
						<div>
							<div>Status:</div>
							<div style="margin-bottom: 10px;">
								<input type="radio" name="status" value="1" <?php if ($fetch['state_status']==1) {
									echo "checked";
								} ?>> Active
								<input type="radio" name="status" value="0" <?php if ($fetch['state_status']==0) {
									echo "checked";
								} ?>> Deactive
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