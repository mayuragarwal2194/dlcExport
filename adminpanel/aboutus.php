<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$title=$_POST['title'];
	$description=$_POST['description'];
	$status=$_POST['status'];
	$aid_edit=$_GET['editid'];

	if ($aid_edit=="") {
		if ($title!="" && $description!="" && $status!="") {
			$ins="INSERT INTO about_us SET
			about_title='$title',
			about_description='$description',
			about_status='$status'";
			mysqli_query($con,$ins);
		}
	}
	else{
		// <!-- UPDATE QUERY -->
		$sel_edit="SELECT * FROM about_us WHERE about_id='$aid_edit'";
		$exe_edit=mysqli_query($con,$sel_edit);
		$fetch_edit=mysqli_fetch_array($exe_edit);
		if ($title!="" && $description!="" && $status!="") {
			$ins="UPDATE about_us SET
			about_title='$title',
			about_description='$description',
			about_status='$status' WHERE
			about_id='$aid_edit'";
			mysqli_query($con,$ins);

			// PAGE KO REDIRECT KARNA
			echo" <script> window.location='aboutus.php'; </script> ";
		}
	}	
?>
<!-- DELETE QUERY -->
<?php
	$id=$_GET['aid'];

	$del="DELETE FROM about_us WHERE about_id='$id'";
	mysqli_query($con,$del);
?>
<!-- MULTIPLE DELETE QUERY -->
<?php
	$abids=$_POST['del'];

	if (count($_POST['del'])>0) {
		foreach ($abids as $abtids) {
			$del="DELETE FROM about_us WHERE about_id='$abtids'";
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
	<title>About Us</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- <link href="css/editor.css" type="text/css" rel="stylesheet"/> -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include_once('navbar.php'); ?>
	<div class="clear"></div>
	<div class="dashboard-menu">
		<?php include_once('leftmenu.php'); ?>
		<div class="dashboard-menu-R">
			<div class="dashboard-menu-R-head">
				About Us:
			</div>
			<div class="contacts">
				<form method="post">
                    <div class="coursename">
                        <div>Title:</div>
                        <div>
                            <input type="text" name="title" style="width: 820px;" value="<?php echo $fetch_edit['about_title']; ?>">
                        </div>
                    </div>	
					<div class="contact1">
						<div>Description:</div>
						<div class="container-fluid">
							<div class="row">
								<div class="container">
									<div class="row">
										<div class="nopadding">
										   <textarea name="description" id="description" style="width: 820px;">
										   		<?php echo $fetch_edit['about_description']; ?>
										   </textarea>
											<!-- <textarea id="txtEditor" name="description"></textarea> --> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="about_Status">
						<div>
							<div>Status:</div>
							<div style="margin-bottom: 10px;">
								<input type="radio" name="status" value="1" <?php if ($fetch_edit['about_status']==1) {
									echo "checked";
								} ?> > Active
								<input type="radio" name="status" value="0" <?php if ($fetch_edit['about_status']==0) {
									echo "checked";
								} ?> > Deactive
							</div>
						</div>
					</div>
					<input type="submit" class="submit" value="Update" name="" style="margin-top: 20px;">
				</form>
			</div>
			<div class="clear"></div>
			<div style="margin: auto; margin-top: 100px;">
				<div class="view_table">
					<form method="post">
						<!-- <div class="countryname">
							<div>Search By Title:</div>
							<div>
								<input type="search" value="<?php echo $fetch['about_title']; ?>" name="title">
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
								<td>About Title</td>
								<td>About Description</td>
								<td>Status</td>
								<td>Action</td>
							</tr>
							<!-- SELECT QUERY START -->
							<?php
								$sel="SELECT * FROM about_us $where ORDER BY about_id ASC LIMIT $start,$limit";
								$exe=mysqli_query($con,$sel); 

								while ($fetch=mysqli_fetch_array($exe)) {
							?>
							<tr>
								<td>
									<input type="checkbox" value="<?php echo $fetch['about_id']; ?>" name="del[]">
								</td>
								<td><?php echo $fetch['about_id']; ?></td>
								<td><?php echo $fetch['about_title']; ?></td>
								<td><?php echo $fetch['about_description']; ?></td>
								<td>
									<?php
										if ($fetch['about_status']==1) {
											echo "Active";
										}
										else{
											echo "Deactive";
										}
									?>
								</td>
								<td>
									<a href="aboutus.php?aid=<?php echo $fetch['about_id']; ?>">
										<button class="btn btn-danger" type="button">Delete</button>
									</a>
									<a href="aboutus.php?editid=<?php echo $fetch['about_id']; ?>">
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
					  	<li class="page-item"><a class="page-link" href="aboutus.php?page=0">First</a></li>
					    <li class="page-item"><a class="page-link" href="aboutus.php?page=<?php echo $pre ?>">Previous</a></li>
					    <?php } ?>

					    <?php
					    	$sel="SELECT * FROM about_us";
					    	$exe=mysqli_query($con,$sel);
					    	$totalrows=mysqli_num_rows($exe);
					    	$totalpage=ceil($totalrows/$limit);
					    	for ($i=1; $i<=$totalpage; $i++) { 
					    ?>
					    <li class="page-item">
					    	<a class="page-link" href="aboutus.php?page=<?php echo $i-1 ?>">
					    		<?php echo $i; ?>
					    	</a>
					    </li>
					    <?php } ?>
					    <?php
					    	if ($_GET['page']==$totalpage-1) {
					    ?>
						<?php }else{ ?>
					    <li class="page-item"><a class="page-link" href="aboutus.php?page=<?php echo $next ?>">Next</a></li>
					    <li class="page-item"><a class="page-link" href="aboutus.php?page=<?php echo $totalpage-1 ?>">Last</a></li>
						<?php } ?>
					  </ul>
					</nav>
		 		</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>
<!-- <script src="js/editor.js"></script>
<script>
	$(document).ready(function() {
		$("#txtEditor").Editor();
	});
</script> -->
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