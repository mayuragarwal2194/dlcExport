<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$website=$_POST['website'];
	$address=$_POST['address'];
	$map=$_POST['map'];
	$state_name=$_POST['sname'];
	$country_name=$_POST['cname'];
	$facebook=$_POST['facebook'];
	$instagram=$_POST['instagram'];
	$twitter=$_POST['twitter'];
	$status=$_POST['status'];
	$cid_edit=$_GET['editid'];

	if ($cid_edit=="") {
		if ($phone!="" && $mobile!="" && $email!="" && $website!="" && $address!="" && $map!="" &&
		$state_name!="" && $country_name!="" && $facebook!="" &&
	        $instagram!="" && $twitter!="" && $status!="") {
			$ins="INSERT INTO contact_us SET
			contact_phone='$phone',
			contact_mobile='$mobile',
			contact_email='$email',
			contact_website='$website',
			contact_address='$address',
			map_html='$map',
			contact_state='$state_name',
			contact_country='$country_name',
			contact_facebook='$facebook',
			contact_instagram='$instagram',
			contact_twitter='$twitter',
			contact_status='$status'";
			mysqli_query($con,$ins);

			// PAGE KO REDIRECT KARNA
			echo" <script> window.location='contactus.php'; </script> ";
		}
	}
	else{
		// <!-- UPDATE QUERY -->
		$sel_edit="SELECT * FROM contact_us WHERE contact_id='$cid_edit'";
		$exe_edit=mysqli_query($con,$sel_edit);
		$fetch_edit=mysqli_fetch_array($exe_edit);
		if ($phone!="" && $mobile!="" && $email!="" && $website!="" && $address!="" && $map!="" &&
		    $state_name!="" && $country_name!="" && $facebook!="" &&
	        $instagram!="" && $twitter!="" && $status!="") {
			$ins="UPDATE contact_us SET
			contact_phone='$phone',
			contact_mobile='$mobile',
			contact_email='$email',
			contact_website='$website',
			contact_address='$address',
			map_html='$map',
			contact_state='$state_name',
			contact_country='$country_name',
			contact_facebook='$facebook',
			contact_instagram='$instagram',
			contact_twitter='$twitter',
			contact_status='$status' WHERE
			contact_id='$cid_edit'";
			mysqli_query($con,$ins);

			// PAGE KO REDIRECT KARNA
			echo" <script> window.location='contactus.php'; </script> ";
		}
	}	
?>
<!-- DELETE QUERY -->
<?php
	$id=$_GET['cid'];

	$del="DELETE FROM contact_us WHERE contact_id='$id'";
	mysqli_query($con,$del);
?>
<!-- MULTIPLE DELETE QUERY -->
<?php
	$conids=$_POST['del'];

	if (count($_POST['del'])>0) {
		foreach ($conids as $cids) {
			$del="DELETE FROM contact_us WHERE contact_id='$cids'";
			mysqli_query($con,$del);
		}
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
	<title>Contact Us</title>
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
				Contact Us:
			</div>
			<div class="contacts">
				<form method="post">
					<div>
						<div class="contact1">
							<div>Phone:</div>
							<div>
								<input type="text" name="phone" value="<?php echo $fetch_edit['contact_phone']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Mobile:</div>
							<div>
								<input type="text" name="mobile" value="<?php echo $fetch_edit['contact_mobile']; ?>">
							</div>
						</div>
					</div>
					<div>
						<div class="contact1">
							<div>Email:</div>
							<div>
								<input type="text" name="email" value="<?php echo $fetch_edit['contact_email']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Website:</div>
							<div>
								<input type="text" name="website" value="<?php echo $fetch_edit['contact_website']; ?>">
							</div>
						</div>
					</div>
					<div>
						<div class="contact1">
							<div>Address:</div>
							<div>
								<textarea name="address">
									<?php echo $fetch_edit['contact_address']; ?>
								</textarea>
							</div>
						</div>
						<div class="contact2">
							<div>Map HTML:</div>
							<div>
								<textarea name="map">
									<?php echo $fetch_edit['map_html']; ?>
								</textarea>
							</div>
						</div>
					</div>
					<div>
						<div class="contact1" style="width: 420px;">
							<div class="coursename">
							<div>State:</div>
							<select name="sname" style="width: 400px;">
								<option>
									--- Select a State ---
								</option>
								<?php
									$selstate="SELECT * FROM add_state";
									$exestate=mysqli_query($con,$selstate);

									while ($fetchstate=mysqli_fetch_array($exestate)) {
								?>
								<option value="<?php echo $fetchstate['state_id'] ?>">
									<?php echo $fetchstate['state_name']; ?>
								</option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="contact2" style="float: left;">
							<div class="coursename">
							<div>Country:</div>
							<select name="cname" style="width: 400px;">
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
					</div>
					<div class="clear"></div>
					<div style="margin-top:10px;">
						<div class="contact1">
							<div>Facebook:</div>
							<div>
								<input type="text" name="facebook" value="<?php echo $fetch_edit['contact_facebook']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Instagram:</div>
							<div>
								<input type="text" name="instagram" value="<?php echo $fetch_edit['contact_instagram']; ?>">
							</div>
						</div>
					</div>
                    <div>
						<div class="contact1">
							<div>twitter:</div>
							<div>
								<input type="text" name="twitter" value="<?php echo $fetch_edit['contact_twitter']; ?>">
							</div>
						</div>
						<!-- <div class="contact2">
							<div>Instagram:</div>
							<div>
								<input type="text" name="instagram">
							</div>
						</div> -->
					</div>
					<div class="clear"></div>
					<div class="about_Status" style="margin-top: 0px;">
						<div>
							<div>Status:</div>
							<div style="margin-bottom: 10px;">
								<input type="radio" name="status" value="1" <?php if ($fetch_edit['contact_status']==1) {
									echo "checked";
								} ?> > Active
								<input type="radio" name="status" value="0" <?php if ($fetch_edit['contact_status']==0) {
									echo "checked";
								} ?> > Deactive
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<input type="submit" class="submit" value="Update" name="">
				</form>
			</div>
			<div class="clear"></div>
			<div style="margin: auto; margin-top: 100px;">
				<div class="view_table">
				<form method="post">
					<!-- <div class="countryname">
						<div>Search By State Name:</div>
						<div>
							<input type="search" value="" name="title">
						</div>
					</div> -->
					<!-- <div style="margin-bottom: 10px;">
						<input type="submit" class="submit" value="Search" name="" style="background-color: green; border-color:green;">
						<input type="submit" class="submit" value="Clear" name="" style="background-color: green; border-color:green;">
					</div> -->
					<table class="table table-bordered ">
						<tr style="font-weight: bold;">
							<td>
								<button type="submit" class="btn" name="mul-del">
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<td>Sr. No</td>
							<td>Phone</td>
							<td>Mobile</td>
							<td>Email</td>
							<td>Website</td>
							<td>Address</td>
							<td>Map HTML</td>
							<td>State</td>
							<td>Country</td>
							<td>Facebook</td>
							<td>Instagram</td>
							<td>twitter</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
						<!-- SELECT QUERY START -->
						<?php
							$sel="SELECT * FROM contact_us 
							INNER JOIN add_state ON contact_us.contact_state=add_state.state_id 
							INNER JOIN add_country ON contact_us.contact_country=add_country.country_id 
							ORDER BY contact_id ASC LIMIT $start,$limit";
							
							$exe= mysqli_query($con,$sel);

							while ($fetch=mysqli_fetch_array($exe)) {
						?>
						<tr>
							<td>
								<input type="checkbox" value="<?php echo $fetch['contact_id']; ?>" name="del[]">
							</td>
							<td><?php echo $fetch['contact_id']; ?></td>
							<td><?php echo $fetch['contact_phone']; ?></td>
							<td><?php echo $fetch['contact_mobile']; ?></td>
							<td><?php echo $fetch['contact_email']; ?></td>
							<td><?php echo $fetch['contact_website']; ?></td>
							<td><?php echo $fetch['contact_address']; ?></td>
							<td><?php echo $fetch['map_html']; ?></td>
							<td><?php echo $fetch['state_name']; ?></td>
							<td><?php echo $fetch['country_name']; ?></td>
							<td><?php echo $fetch['contact_facebook']; ?></td>
							<td><?php echo $fetch['contact_instagram']; ?></td>
							<td><?php echo $fetch['contact_twitter']; ?></td>
							<td>
								<?php
									if ($fetch['contact_status']==1) {
										echo "Active";
									}
									else{
										echo "Deactive";
									}
								?>
							</td>
							<td>
								<a href="contactus.php?cid=<?php echo $fetch['contact_id']; ?>">
									<button class="btn btn-danger" type="button">Delete</button>
								</a>
								<a href="contactus.php?editid=<?php echo $fetch['contact_id']; ?>">
									<button class="btn btn-primary" type="button">Edit</button>
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
				  	<li class="page-item"><a class="page-link" href="contactus.php?page=0">First</a></li>
				    <li class="page-item"><a class="page-link" href="contactus.php?page=<?php echo $pre ?>">Previous</a></li>
				    <?php } ?>

				    <?php
				    	$sel="SELECT * FROM contact_us";
				    	$exe=mysqli_query($con,$sel);
				    	$totalrows=mysqli_num_rows($exe);
				    	$totalpage=ceil($totalrows/$limit);
				    	for ($i=1; $i<=$totalpage; $i++) { 
				    ?>
				    <li class="page-item">
				    	<a class="page-link" href="contactus.php?page=<?php echo $i-1 ?>">
				    		<?php echo $i; ?>
				    	</a>
				    </li>
				    <?php } ?>
				    <?php
				    	if ($_GET['page']==$totalpage-1) {
				    ?>
					<?php }else{ ?>
				    <li class="page-item"><a class="page-link" href="contactus.php?page=<?php echo $next ?>">Next</a></li>
				    <li class="page-item"><a class="page-link" href="contactus.php?page=<?php echo $totalpage-1 ?>">Last</a></li>
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