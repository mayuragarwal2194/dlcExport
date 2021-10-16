<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- DELETE QUERY -->
<?php
	$id=$_GET['uid'];

	$del="DELETE FROM user_list WHERE user_id='$id'";
	mysqli_query($con,$del);
?>
<!-- MULTIPLE DELETE QUERY -->
<?php
	$userid=$_POST['del'];

	if (count($_POST['del'])>0) {
		foreach ($userid as $uids) {
			$del="DELETE FROM user_list WHERE user_id='$uids'";
			mysqli_query($con,$del);
		}
	}	
?>
<!-- SEARCH QUERY -->
<?php
	$name=$_POST['title'];
	if ($name!="") {
		$where="where user_name like '%$name%'";
	}
?>
<!-- PAGINATION -->
<?php
	$start=0;
	$limit=2;
	$next=$_GET['page']+1;
	$pre=$_GET['page']-1;

	if ($_GET['page']<=0) {
		$_GET['page']=0;
	}
	else{
		$start=$limit*$_GET['page'];
	}
?>
<html>
<head>
	<title>view User</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css">

</head>
<body class="view_body">
	<?php include_once('navbar.php'); ?>
	<div class="clear"></div>
	<div class="dashboard-menu">
	<?php include_once('leftmenu.php'); ?>
		<div class="dashboard-menu-R">
			<div class="dashboard-menu-R-head">
				View User:
			</div>
			<div class="view_table">
				<form method="post">
					<div class="countryname">
						<div>Search By User Name:</div>
						<div>
							<input type="search" value="<?php echo $fetch['user_name']; ?>" name="title">
						</div>
					</div>
					<div style="margin-bottom: 10px;">
						<input type="submit" class="submit" value="Search" name="" style="background-color: green; border-color:green;">
						<input type="submit" class="submit" value="Clear" name="" style="background-color: green; border-color:green;">
					</div>
					<table class="table table-bordered ">
						<tr style="font-weight: bold;">
							<td>
								<button type="submit" class="btn" name="mul-del">
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<td>Sr. No</td>
							<td>User Name</td>
							<td>Primary Address</td>
							<td>Secondary Address</td>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Password</td>
							<td>Confirm Password</td>
							<td>Birth Day</td>
							<td>E-Mail</td>
							<td>Contact No.</td>
							<td>User Profession</td>
							<td>Website</td>
							<td>Twitter</td>
							<td>Instagram</td>
							<td>Facebook</td>
							<td>Gender</td>
						</tr>
						<!-- SELECT QUERY START -->
						<?php
							$sel="SELECT * FROM user_list $where ORDER BY user_id ASC LIMIT $start,$limit";
							$exe=mysqli_query($con,$sel);

							while ($fetch=mysqli_fetch_array($exe)) {
						?>
						<tr>
							<td>
								<input type="checkbox" value="<?php echo $fetch['user_id']; ?>" name="del[]">
							</td>
							<td><?php echo $fetch['user_id']; ?></td>
							<td><?php echo $fetch['user_name']; ?></td>
							<td><?php echo $fetch['primary_address']; ?></td>
							<td><?php echo $fetch['secondary_address']; ?></td>
							<td><?php echo $fetch['first_name']; ?></td>
							<td><?php echo $fetch['last_name']; ?></td>
							<td><?php echo $fetch['user_password']; ?></td>
							<td><?php echo $fetch['confirm_password']; ?></td>
							<td><?php echo $fetch['user_birthday']; ?></td>
							<td><?php echo $fetch['user_email']; ?></td>
							<td><?php echo $fetch['user_contact']; ?></td>
							<td><?php echo $fetch['user_profession']; ?></td>
							<td><?php echo $fetch['user_website']; ?></td>
							<td><?php echo $fetch['user_twitter']; ?></td>
							<td><?php echo $fetch['user_instagram']; ?></td>
							<td><?php echo $fetch['user_facebook']; ?></td>
							<td>
								<?php
									if ($fetch['user_gender']==1) {
										echo "Male";
									}
									else{
										echo "Female";
									}
								?>
							</td>
							<td>
								<a href="view_user.php?uid=<?php echo $fetch['user_id']; ?>">
									<button class="btn btn-danger" type="button">Delete</button>
								</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</form>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	<?php
				  		if ($_GET['page']==0) {		
				  	?>
				  <?php } else{ ?>
				  	<li class="page-item"><a class="page-link" href="view_user.php?page=0">First</a></li>
				    <li class="page-item"><a class="page-link" href="view_user.php?page=<?php echo $pre ?>">Previous</a></li>
				    <?php } ?>

				    <?php
				    	$sel="SELECT * FROM user_list";
				    	$exe=mysqli_query($con,$sel);
				    	$totalrows=mysqli_num_rows($exe);
				    	$totalpage=ceil($totalrows/$limit);
				    	for ($i=1; $i<=$totalpage; $i++) { 
				    ?>
				    <li class="page-item">
				    	<a class="page-link" href="view_user.php?page=<?php echo $i-1 ?>">
				    		<?php echo $i; ?>
				    	</a>
				    </li>
				    <?php } ?>
				    <?php
				    	if ($_GET['page']==$totalpage-1) {
				    ?>
					<?php }else{ ?>
				    <li class="page-item"><a class="page-link" href="view_user.php?page=<?php echo $next ?>">Next</a></li>
				    <li class="page-item"><a class="page-link" href="view_user.php?page=<?php echo $totalpage-1 ?>">Last</a></li>
					<?php } ?>
				  </ul>
				</nav>
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