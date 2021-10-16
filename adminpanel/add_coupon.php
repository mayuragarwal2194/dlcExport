<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$cpname=$_POST['cpname'];
	$cpcode=$_POST['cpcode'];
	$cpprice=$_POST['cpprice'];
	$cpdate=$_POST['cpdate'];
	$cptype=$_POST['cptype'];
	$status=$_POST['status'];
	$cpid_edit=$_GET['editid'];

	if ($cpid_edit=="") {
		if ($cpname!="" && $cpcode!="" && $cpprice!="" && $cpdate!="" && $cptype!="" && $status!="") {

			$selcoup="SELECT * FROM add_coupon WHERE coupon_code='$cpcode'";
			$execoup=mysqli_query($con,$selcoup);
			$totcoup=mysqli_num_rows($execoup);

			if ($totcoup==1) {
				$error="Coupon Code Is Already Exist...!!!!...";
			}
			else{
				$ins="INSERT INTO add_coupon SET
				coupon_name='$cpname',
				coupon_code='$cpcode',
				coupon_price='$cpprice',
				coupon_expiry='$cpdate',
				coupon_type='$cptype',
				coupon_status='$status'";
				mysqli_query($con,$ins);

				// PAGE KO REDIRECT KARNA
				echo" <script> window.location='view_coupon.php'; </script> ";
			}
		}
	}
	else{
		// <!-- UPDATE QUERY -->
		$sel_edit="SELECT * FROM add_coupon WHERE coupon_id='$cpid_edit'";
		$exe_edit=mysqli_query($con,$sel_edit);
		$fetch_edit=mysqli_fetch_array($exe_edit);
		if ($cpname!="" && $cpcode!="" && $cpprice!="" && $cpdate!="" && $cptype!="" && $status!="") {
			$ins="UPDATE add_coupon SET
			coupon_name='$cpname',
			coupon_code='$cpcode',
			coupon_price='$cpprice',
			coupon_expiry='$cpdate',
			coupon_type='$cptype',
			coupon_status='$status' WHERE
			coupon_id='$cpid_edit'";
			mysqli_query($con,$ins);

			// PAGE KO REDIRECT KARNA
			echo" <script> window.location='view_coupon.php'; </script> ";
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
    <title>Add Coupon</title>
<!-- JAVA VALIDATION FOR NUMERIC NUMBER -->
	<script>
		function numbervalidation() {
			
			var n= document.getElementById('cpprice').value;
			
			 if (isNaN(n)) { 
			 	document.getElementById("showdata").style.display="block";
				document.getElementById("numbertext").innerHTML="Please enter Numeric value";
				return false;
			}
			
		}
	</script>
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
                Add Coupon:
            </div>
            <?php if( $error!="") {  ?>
            <div class="alert alert-danger" role="alert" value="dan-mess">
                <div style="text-align: center;">
                    <?PHP echo $error; ?>
                </div>
            </div>
            <?php } ?>

            <div class="alert alert-danger" id="showdata" style="display: none;" role="alert" value="dan-mess">
                <div style="text-align: center;">
                    <span id="numbertext"></span>
                </div>
            </div>
            <div class="contacts">
                <form method="post" name="form" onsubmit="return numbervalidation()">
                    <div>
                        <div class="contact1">
                            <div>Coupon Name:</div>
                            <div>
                                <input type="text" name="cpname" value="<?php echo $fetch_edit['coupon_name']; ?>">
                            </div>
                        </div>
                        <div class="contact2">
                            <div>Coupon Code:</div>
                            <div>
                                <input type="text" name="cpcode" value="<?php echo $fetch_edit['coupon_code']; ?>">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="contact1">
                            <div>Coupon Price:</div>
                            <div>
                                <input type="text" name="cpprice" id="cpprice" value="<?php echo $fetch_edit['coupon_price']; ?>">
                            </div>
                        </div>
                        <div class="contact2">
                            <div>Expiry Date:</div>
                            <div>
                                <input type="date" name="cpdate" value="<?php echo $fetch_edit['coupon_expiry']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div style="clear: both;">
                        <div class="contact3">
                            <div>
                                <div style="width: 395px;">Coupon Type:</div>
                                <div style="margin-bottom: 10px;">
                                    <input type="radio" name="cptype" value="0" <?php if ($fetch['coupon_type']==0) {
										echo "checked";
									} ?>> Fixed
                                    <input type="radio" name="cptype" value="1" <?php if ($fetch['coupon_type']==1) {
										echo "checked";
									} ?>> Percentage
                                </div>
                            </div>
                        </div>
                        <div class="contact4">
                            <div>
                                <div>Status:</div>
                                <div style="margin-bottom: 10px;">
                                    <input type="radio" name="status" value="1" <?php if ($fetch['coupon_status']==1) {
										echo "checked";
									} ?>> Active
                                    <input type="radio" name="status" value="0" <?php if ($fetch['coupon_status']==0) {
										echo "checked";
									} ?>> Deactive
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
