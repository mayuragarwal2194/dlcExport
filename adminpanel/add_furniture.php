<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<?php
	$furniture_image1=$_FILES['fimage1'];
	$furniture_image2=$_FILES['fimage2'];
	$furniture_image3=$_FILES['fimage3'];
	$furniture_image4=$_FILES['fimage4'];
	$furniture_image5=$_FILES['fimage5'];

	// print_r($furniture_image1);
	// print_r($furniture_image2);
	// print_r($furniture_image3);
	// print_r($furniture_image4);
	// print_r($furniture_image5);

	$brand_name=$_POST['fbname'];
	$furniture_price=$_POST['fprice'];
	$discounted_price=$_POST['disprice'];
	$furniture_colour=$_POST['fcolour'];
	$furniture_material=$_POST['fmaterial'];
	$furniture_dimension=$_POST['fdimension'];
	$maximum_weight=$_POST['fmweight'];
	$generic_name=$_POST['fgname'];
	$furniture_weight=$_POST['fweight'];
	$furniture_manufacturer=$_POST['fmanufacturer'];
	$fasin=$_POST['fasin'];
	$origin_country=$_POST['forigin'];
	$furniture_description=$_POST['fdescription'];
	$furniture_date=$_POST['fdate'];
	$furniture_about1=$_POST['fabout1'];
	$furniture_about2=$_POST['fabout2'];
	$furniture_about3=$_POST['fabout3'];
	$furniture_about4=$_POST['fabout4'];
	$status=$_POST['status'];
	$furniture_collection=$_POST['fcollection'];
	$fid=$_GET['editid'];

	if ($fid=="") {
		if ($brand_name!="" && $furniture_price!="" && $discounted_price!="" && $furniture_colour!="" && $furniture_material!="" && $furniture_dimension!="" && $maximum_weight!="" && $generic_name!="" && $furniture_weight!="" && $furniture_manufacturer!="" && $fasin!="" && $origin_country!="" && $furniture_description!="" && $furniture_date!="" && $furniture_about1!="" && $furniture_about2!="" && $furniture_about3!="" && $furniture_about4!="" && $status!="" && $furniture_collection!="") {

			$imagename1=$furniture_image1['name'];
			$imagename2=$furniture_image2['name'];
			$imagename3=$furniture_image3['name'];
			$imagename4=$furniture_image4['name'];
			$imagename5=$furniture_image5['name'];

			$tmpname1=$furniture_image1['tmp_name'];
			$tmpname2=$furniture_image2['tmp_name'];
			$tmpname3=$furniture_image3['tmp_name'];
			$tmpname4=$furniture_image4['tmp_name'];
			$tmpname5=$furniture_image5['tmp_name'];

			$path1="file_upload(furniture)/".$imagename1;
			$path2="file_upload(furniture)/".$imagename2;
			$path3="file_upload(furniture)/".$imagename3;
			$path4="file_upload(furniture)/".$imagename4;
			$path5="file_upload(furniture)/".$imagename5;

			move_uploaded_file($tmpname1, $path1);
			move_uploaded_file($tmpname2, $path2);
			move_uploaded_file($tmpname3, $path3);
			move_uploaded_file($tmpname4, $path4);
			move_uploaded_file($tmpname5, $path5);
			
			$ins="INSERT INTO add_furniture SET
			furniture_brand='$brand_name',
			furniture_price='$furniture_price',
			discounted_price='$discounted_price',
			furniture_colour='$furniture_colour',
			furniture_material='$furniture_material',
			furniture_dimension='$furniture_dimension',
			maxweight_recommondation='$maximum_weight',
			furniture_genericname='$generic_name',
			furniture_weight='$furniture_weight',
			furniture_manufacturer='$furniture_manufacturer',
			furniture_asin='$fasin',
			country_origin='$origin_country',
			furniture_description='$furniture_description',
			furniture_date='$furniture_date',
			furniture_about1='$furniture_about1',
			furniture_about2='$furniture_about2',
			furniture_about3='$furniture_about3',
			furniture_about4='$furniture_about4',
			furniture_image1='$imagename1',
			furniture_image2='$imagename2',
			furniture_image3='$imagename3',
			furniture_image4='$imagename4',
			furniture_image5='$imagename5',
			furniture_status='$status',
			furniture_collection='$furniture_collection'";

			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_furniture.php'</script>";
		}
	}
	else{
// <!-- UPDATE QUERY -->
	$sel="SELECT * FROM add_furniture WHERE furniture_id='$fid'";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe);
	if ($brand_name!="" && $furniture_price!="" && $discounted_price!="" && $furniture_colour!="" && $furniture_material!="" && $furniture_dimension!="" && $maximum_weight!="" && $generic_name!="" && $furniture_weight!="" && $furniture_manufacturer!="" && $fasin!="" && $origin_country!="" && $furniture_description!="" && $furniture_date!="" && $furniture_about1!="" && $furniture_about2!="" && $furniture_about3!="" && $furniture_about4!="" && $status!="" && $furniture_collection!="") {

			$imagename1=$furniture_image1['name'];
			$imagename2=$furniture_image2['name'];
			$imagename3=$furniture_image3['name'];
			$imagename4=$furniture_image4['name'];
			$imagename5=$furniture_image5['name'];

			$tmpname1=$furniture_image1['tmp_name'];
			$tmpname2=$furniture_image2['tmp_name'];
			$tmpname3=$furniture_image3['tmp_name'];
			$tmpname4=$furniture_image4['tmp_name'];
			$tmpname5=$furniture_image5['tmp_name'];

			$path1="file_upload(furniture)/".$imagename1;
			$path2="file_upload(furniture)/".$imagename2;
			$path3="file_upload(furniture)/".$imagename3;
			$path4="file_upload(furniture)/".$imagename4;
			$path5="file_upload(furniture)/".$imagename5;

			move_uploaded_file($tmpname1, $path1);
			move_uploaded_file($tmpname2, $path2);
			move_uploaded_file($tmpname3, $path3);
			move_uploaded_file($tmpname4, $path4);
			move_uploaded_file($tmpname5, $path5);
			
			$ins="UPDATE add_furniture SET
			furniture_brand='$brand_name',
			furniture_price='$furniture_price',
			discounted_price='$discounted_price',
			furniture_colour='$furniture_colour',
			furniture_material='$furniture_material',
			furniture_dimension='$furniture_dimension',
			maxweight_recommondation='$maximum_weight',
			furniture_genericname='$generic_name',
			furniture_weight='$furniture_weight',
			furniture_manufacturer='$furniture_manufacturer',
			furniture_asin='$fasin',
			country_origin='$origin_country',
			furniture_description='$furniture_description',
			furniture_date='$furniture_date',
			furniture_about1='$furniture_about1',
			furniture_about2='$furniture_about2',
			furniture_about3='$furniture_about3',
			furniture_about4='$furniture_about4',
			furniture_image1='$imagename1',
			furniture_image2='$imagename2',
			furniture_image3='$imagename3',
			furniture_image4='$imagename4',
			furniture_image5='$imagename5',
			furniture_status='$status',
			furniture_collection='$furniture_collection' WHERE
			furniture_id='$fid'";

			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_furniture.php'</script>";
		}
	}	
?>
<html>
<head>
	<title>Add Furniture</title>
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
				Add Furniture:
			</div>
			<div class="contacts">
				<form method="post" enctype="multipart/form-data">
					<div>
						<div class="contact1">
							<div>Brand Name:</div>
							<div>
								<input type="text" name="fbname" value="<?php echo $fetch['furniture_brand']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Furniture Dimensions :</div>
							<div>
								<input type="text" name="fdimension" value="<?php echo $fetch['furniture_dimension']; ?>">
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div>
						<div class="contact1">
							<div>Price:</div>
							<div>
								<input type="text" name="fprice"  value="<?php echo $fetch['furniture_price']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Discounted Price:</div>
							<div>
								<input type="text" name="disprice" value="<?php echo $fetch['discounted_price']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>Colour:</div>
							<div>
								<input type="text" name="fcolour" value="<?php echo $fetch['furniture_colour']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Material:</div>
							<div>
								<input type="text" name="fmaterial" value="<?php echo $fetch['furniture_material']; ?>">
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>Maximum Weight Recommendation:</div>
							<div>
								<input type="text" name="fmweight" value="<?php echo $fetch['maxweight_recommondation']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Generic Name:</div>
							<div>
								<input type="text" name="fgname" value="<?php echo $fetch['furniture_genericname']; ?>">
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>Product Weight:</div>
							<div>
								<input type="text" name="fweight" value="<?php echo $fetch['furniture_weight']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Manufacturer</div>
							<div>
								<input type="text" name="fmanufacturer" value="<?php echo $fetch['furniture_manufacturer']; ?>">
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>ASIN:</div>
							<div>
								<input type="text" name="fasin" value="<?php echo $fetch['furniture_asin']; ?>">
							</div>
						</div>
						<div class="contact2">
							<div>Country Of Origin</div>
							<div>
								<input type="text" name="forigin" value="<?php echo $fetch['country_origin']; ?>">
							</div>
						</div>
					</div>
					<!-- <div style="clear: both;">
						<div class="coursename">
							<div>Furniture Dimensions :</div>
							<div>
								<input type="text" name="fdimension" value="<?php echo $fetch['furniture_dimension']; ?>">
							</div>
						</div>	
					</div> -->
					<div style="clear: both;">
						<div class="contact1">
							<div>Product Description</div>
							<div>
								<textarea name="fdescription">
									<?php echo $fetch['furniture_description']; ?>
								</textarea>
							</div>
						</div>
						<div class="contact2">
							<div>Date First Available:</div>
							<div>
								<input type="date" name="fdate" value="<?php echo $fetch['furniture_date']; ?>">
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>About Item 1:</div>
							<div>
								<textarea name="fabout1">
									<?php echo $fetch['furniture_about1']; ?>
								</textarea>
							</div>
						</div>
						<div class="contact2">
							<div>About Item 2:</div>
							<div>
								<textarea name="fabout2">
									<?php echo $fetch['furniture_about2']; ?>
								</textarea>
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="contact1">
							<div>About Item 3:</div>
							<div>
								<textarea name="fabout3">
									<?php echo $fetch['furniture_about3']; ?>
								</textarea>
							</div>
						</div>
						<div class="contact2">
							<div>About Item 4:</div>
							<div>
								<textarea name="fabout4">
									<?php echo $fetch['furniture_about4']; ?>
								</textarea>
							</div>
						</div>
					</div>
					<div style="clear: both;">
						<div class="coursename">
							<div>Choose Image 1:<br>(The Main Image)</div>
							<div>
								<input type="file" name="fimage1" value="<?php echo $fetch['furniture_image1']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="coursename">
							<div>Choose Image 2:</div>
							<div>
								<input type="file" name="fimage2" value="<?php echo $fetch['furniture_image2']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="coursename">
							<div>Choose Image 3:</div>
							<div>
								<input type="file" name="fimage3" value="<?php echo $fetch['furniture_image3']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="coursename">
							<div>Choose Image 4:</div>
							<div>
								<input type="file" name="fimage4" value="<?php echo $fetch['furniture_image4']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="coursename">
							<div>Choose Image 5:</div>
							<div>
								<input type="file" name="fimage5" value="<?php echo $fetch['furniture_image5']; ?>">
							</div>
						</div>	
					</div>
					<div style="clear: both;">
						<div class="contact3">
							<div>
								<div style="width: 436px;">Furniture Collection:</div>
								<div style="margin-bottom: 10px;">
									<input type="radio" name="fcollection" value="0" <?php if ($fetch['furniture_collection']==0) {
										echo "checked";
									} ?> > Wooden
									<input type="radio" name="fcollection" value="1" <?php if ($fetch['furniture_collection']==1) {
										echo "checked";
									} ?> > Iron
									<input type="radio" name="fcollection" value="2" <?php if ($fetch['furniture_collection']==2) {
										echo "checked";
									} ?> > Leather
									<input type="radio" name="fcollection" value="3" <?php if ($fetch['furniture_collection']==3) {
										echo "checked";
									} ?>> Plastic
								</div>
							</div>
						</div>
						<div class="contact4">
							<div>
								<div>Status:</div>
								<div style="margin-bottom: 10px;">
									<input type="radio" name="status" value="1" <?php if ($fetch['furniture_status']==1) {
										echo "checked";
									} ?>> Active
									<input type="radio" name="status" value="0" <?php if ($fetch['furniture_status']==0) {
										echo "checked";
									} ?> > Deactive
								</div>
							</div>
						</div>
					</div>
                   
					<div class="clear"></div>
					<input type="submit" class="submit" value="Update" name="">
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