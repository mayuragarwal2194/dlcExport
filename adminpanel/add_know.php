<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$know_image=$_FILES['kimage'];

	$title=$_POST['ktitle'];
	$description=$_POST['kdescription']; 
	$status=$_POST['status'];
	$knowid=$_GET['editid'];

	if ($knowid=="") {
		if ($title!="" && $description!="" && $status!="") {
			$imagename=$know_image['name'];

			$tmpname=$know_image['tmp_name'];

			$path="file_upload(know)/".$imagename;

			move_uploaded_file($tmpname, $path);

			$ins="INSERT INTO add_know SET 
			know_title='$title',
			know_description='$description',
			know_image='$imagename',
			know_status='$status'";
			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_know.php'</script>";
		}
	}
	else{
//UPDATE QUERY		
		$sel="SELECT * FROM add_know WHERE know_id='$knowid'";
		$exe=mysqli_query($con,$sel);
		$fetch=mysqli_fetch_array($exe);
		if ($title!="" && $description!="" && $status!="") {
			$imagename=$know_image['name'];

			$tmpname=$know_image['tmp_name'];

			$path="file_upload(know)/".$imagename;

			move_uploaded_file($tmpname, $path);

			$ins="UPDATE add_know SET 
			know_title='$title',
			know_description='$description',
			know_image='$imagename',
			know_status='$status' WHERE
			know_id='$knowid'";
			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_know.php'</script>";
		}
	}	
?>
<html>
<head>
	<title>Add Know</title>
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
				Add Know:
			</div>
			<div class="contacts">
				<form method="post" enctype="multipart/form-data">
					<div>
						<div class="coursename">
							<div>Title:</div>
							<div>
								<input type="text" name="ktitle" style="width: 820px;" value="<?php echo $fetch['know_title']; ?>">
							</div>
						</div>	
					</div>
					<div class="contact1">
						<div>Description:</div>
						<div class="course_textarea">
							<textarea name="kdescription" id="description" style="width: 820px;">
								<?php echo $fetch['know_description']; ?>
							</textarea>
							<!-- <textarea id="txtEditor" name="ndescription"></textarea>  -->
						</div>
					</div>
					<div class="clear"></div>
					<div style="margin-top: 15px;">
						<div class="coursename">
							<div>Choose an Image:</div>
							<div>
								<input type="file" name="kimage"  value="<?php echo $fetch['know_image']; ?>">
							</div>
						</div>	
					</div>	
					<div>
						<div>Status:</div>
						<div style="margin-bottom: 10px;">
							<input type="radio" name="status" value="1" <?php if ($fetch['know_status']==1) {
								echo "checked";
							} ?> > Active
							<input type="radio" name="status" value="0" <?php if ($fetch['know_status']==0) {
								echo "checked";
							} ?> > Deactive
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
	 CKEDITOR.replace('description');

	$(".has-children").on('click', function() {
		// $(this).children('.children').attr('class','children open');
		// $(".open").slideUp();
		$(this).children('.children').slideToggle();
	});
</script>

<?php include_once('left_dropdown.php'); ?>