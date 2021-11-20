<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<?php
	$slider_image1=$_FILES['simage1'];
	$slider_image2=$_FILES['simage2'];
	$slider_image3=$_FILES['simage3'];

	$slider_title=$_POST['stitle'];
	$status=$_POST['status'];
	$sid=$_GET['editid'];

	if ($sid==""){
		if ($slider_title!="" && $status!="") {

			$imagename1=$slider_image1['name'];
			$imagename2=$slider_image2['name'];
			$imagename3=$slider_image3['name'];

			$tmpname1=$slider_image1['tmp_name'];
			$tmpname2=$slider_image2['tmp_name'];
			$tmpname3=$slider_image3['tmp_name'];

			$path1="file_upload(slider)/".$imagename1;
			$path2="file_upload(slider)/".$imagename2;
			$path3="file_upload(slider)/".$imagename3;

			move_uploaded_file($tmpname1, $path1);
			move_uploaded_file($tmpname2, $path2);
			move_uploaded_file($tmpname3, $path3);

			$ins="INSERT INTO add_slider SET
			slider_title='$slider_title',
			slider_image1='$imagename1',
			slider_image2='$imagename2',
			slider_image3='$imagename3',
			slider_status='$status'";
			mysqli_query($con,$ins);

		// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_slider.php'</script>";
		}
	}
	else{
	// <!-- UPDATE QUERY -->
		$sel="SELECT * FROM add_slider WHERE slider_id='$sid'";
		$exe=mysqli_query($con,$sel);
		$fetch=mysqli_fetch_array($exe);
		if ($slider_title!="" && $status!="") {

			$imagename1=$slider_image1['name'];
			$imagename2=$slider_image2['name'];
			$imagename3=$slider_image3['name'];

			$tmpname1=$slider_image1['tmp_name'];
			$tmpname2=$slider_image2['tmp_name'];
			$tmpname3=$slider_image3['tmp_name'];

			$path1="file_upload(slider)/".$imagename1;
			$path2="file_upload(slider)/".$imagename2;
			$path3="file_upload(slider)/".$imagename3;

			move_uploaded_file($tmpname1, $path1);
			move_uploaded_file($tmpname2, $path2);
			move_uploaded_file($tmpname3, $path3);

			$ins="UPDATE add_slider SET
			slider_title='$slider_title',
			slider_image1='$imagename1',
			slider_image2='$imagename2',
			slider_image3='$imagename3',
			slider_status='$status' WHERE
			slider_id='$sid'";
			mysqli_query($con,$ins);

		// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_slider.php'</script>";
		}
	}	
?>
<html>
<head>
	<title>Add Slider</title>
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
				Add Slider:
			</div>
			<div class="contacts">
				<form method="post" enctype="multipart/form-data">
					<div>
						<div class="coursename">
							<div>Image Title:</div>
							<div>
								<input type="text" name="stitle" value="<?php echo $fetch['slider_title']; ?>">
							</div>
						</div>	
					</div>
					<div>
						<div class="coursename">
							<div>Choose an Image1:</div>
							<div>
								<input type="file" name="simage1"  value="<?php echo $fetch['slider_image1']; ?>">
							</div>
						</div>	
					</div>
					<div>
						<div class="coursename">
							<div>Choose an Image2:</div>
							<div>
								<input type="file" name="simage2"  value="<?php echo $fetch['slider_image2']; ?>">
							</div>
						</div>	
					</div>
					<div>
						<div class="coursename">
							<div>Choose an Image3:</div>
							<div>
								<input type="file" name="simage3"  value="<?php echo $fetch['slider_image3']; ?>">
							</div>
						</div>	
					</div>
					<div>
						<div>
							<div>Status:</div>
							<div style="margin-bottom: 10px;">
								<input type="radio" name="status" value="1" <?php if ($fetch['slider_status']==1) {
									echo "checked";
								} ?> > Active
								<input type="radio" name="status" value="0" <?php if ($fetch['slider_status']==0) {
									echo"checked";
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