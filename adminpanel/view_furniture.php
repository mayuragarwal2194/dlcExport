<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- DELETE QUERY -->
<?php
	$id=$_GET['fid'];

	$del="DELETE FROM add_furniture WHERE furniture_id='$id'";
	mysqli_query($con,$del);
?>
<!-- MULTIPLE DELETE QUERY -->
<?php
	$furnids=$_POST['del'];

	if (count($_POST['del'])>0) {
		foreach ($furnids as $fids) {
			$del="DELETE FROM add_furniture WHERE furniture_id='$fids'";
			mysqli_query($con,$del);	
		}
	}		
?>
<!-- SEARCH QUERY -->
<?php
	$collection=$_POST['title'];
	if ($collection!="") {
		$where="where furniture_collection = '%$collection%'";
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
	<title>view Furniture</title>
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
				View Furniture:
			</div>
			<div class="view_table" style="width: 1100px;">
				<form method="post">
					<div class="countryname">
						<div>Search By Furniture Collection:</div>
						<div>
							<input type="text" value="<?php echo $fetch['furniture_collection']; ?>" name="title">
						</div>
					</div>
					<div style="margin-bottom: 20px;">
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
							<td>Brand Name</td>
							<td>Furniture Dimension</td>
							<td>Price</td>
							<td>Discounted Price</td>
							<td>Colour</td>
							<td>Material</td>
							<td>Maximum Weight Recommendation:</td>
							<td>Generic Name</td>
							<td>Product Weight</td>
							<td>Manufacturer</td>
							<td>ASIN</td>
							<td>Country Of Origin</td>
							<td>Product Description</td>
							<td>Date First Available</td>
							<td>About Item 1</td>
							<td>About Item 2</td>
							<td>About Item 3</td>
							<td>About Item 4</td>
							<td>Image 1</td>
							<td>Image 2</td>
							<td>Image 3</td>
							<td>Image 4</td>
							<td>Image 5</td>
							<td>Furniture Collection</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
						<!-- SELECT QUERY -->
						<?php
							$sel="SELECT * FROM add_furniture $where ORDER BY furniture_id ASC LIMIT $start,$limit";
							$exe=mysqli_query($con,$sel);

							while ($fetch=mysqli_fetch_array($exe)) {
						?>
						<tr>
                            <td>
                                <input type="checkbox" value="<?php echo $fetch['furniture_id']; ?>" name="del[]">
                            </td>
                            <td><?php echo $fetch['furniture_id']; ?></td>
                            <td><?php echo $fetch['furniture_brand']; ?></td>
                            <td><?php echo $fetch['furniture_dimension']; ?></td>
                            <td><?php echo $fetch['furniture_price']; ?></td>
                            <td><?php echo $fetch['discounted_price']; ?></td>
                            <td><?php echo $fetch['furniture_colour']; ?></td>
                            <td><?php echo $fetch['furniture_material']; ?></td>
                            <td><?php echo $fetch['maxweight_recommondation']; ?></td>
                            <td><?php echo $fetch['furniture_genericname']; ?></td>
                            <td><?php echo $fetch['furniture_weight']; ?></td>
                            <td><?php echo $fetch['furniture_manufacturer']; ?></td>
                            <td><?php echo $fetch['furniture_asin']; ?></td>
                            <td><?php echo $fetch['country_origin']; ?></td>
                            <td><?php echo $fetch['furniture_description']; ?></td>
                            <td><?php echo $fetch['furniture_date']; ?></td>
                            <td><?php echo $fetch['furniture_about1']; ?></td>
                            <td><?php echo $fetch['furniture_about2']; ?></td>
                            <td><?php echo $fetch['furniture_about3']; ?></td>
                            <td><?php echo $fetch['furniture_about4']; ?></td>
                            <td>
                            	<img src="file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>" width="100" >
                            </td>
                            <td>
                            	<img src="file_upload(furniture)/<?php echo $fetch['furniture_image2'] ?>" width="100" >
                            </td>
                            <td>
                            	<img src="file_upload(furniture)/<?php echo $fetch['furniture_image3'] ?>" width="100" >
                            </td>
                            <td>
                            	<img src="file_upload(furniture)/<?php echo $fetch['furniture_image4'] ?>" width="100" >
                            </td>
                            <td>
                            	<img src="file_upload(furniture)/<?php echo $fetch['furniture_image5'] ?>" width="100" >
                            </td>
                            <td>
                            	<?php
									if ($fetch['furniture_collection']==0) {
										echo "Wooden";
									}
									else if ($fetch['furniture_collection']==1) {
										echo "Iron";
									}
									else if ($fetch['furniture_collection']==2) {
										echo "Leather";
									}
									else{
										echo "Plastic";
									}
								?>
                            </td>
                            <td>
								<?php
									if ($fetch['furniture_status']==1) {
										echo "Active";
									}
									else{
										echo "Deactive";
									}
								?>
							</td>
							<td>
								<a href="view_furniture.php?fid=<?php echo $fetch['furniture_id']; ?>">
									<button class="btn btn-danger" type="button">Delete</button>
								</a>
								<a href="add_furniture.php?editid=<?php echo $fetch['furniture_id']; ?>">
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
				  	<li class="page-item"><a class="page-link" href="view_furniture.php?page=0">First</a></li>
				    <li class="page-item"><a class="page-link" href="view_furniture.php?page=<?php echo $pre ?>">Previous</a></li>
				    <?php } ?>

				    <?php
				    	$sel="SELECT * FROM add_furniture $where";
				    	$exe=mysqli_query($con,$sel);
				    	$totalrows=mysqli_num_rows($exe);
				    	$totalpage=ceil($totalrows/$limit);
				    	for ($i=1; $i<=$totalpage; $i++) { 
				    ?>
				    <li class="page-item">
				    	<a class="page-link" href="view_furniture.php?page=<?php echo $i-1 ?>">
				    		<?php echo $i; ?>
				    	</a>
				    </li>
				    <?php } ?>
				    <?php
				    	if ($_GET['page']==$totalpage-1) {
				    ?>
					<?php }else{ ?>
				    <li class="page-item"><a class="page-link" href="view_furniture.php?page=<?php echo $next ?>">Next</a></li>
				    <li class="page-item"><a class="page-link" href="view_furniture.php?page=<?php echo $totalpage-1 ?>">Last</a></li>
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