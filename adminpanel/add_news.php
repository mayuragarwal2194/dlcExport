<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('connection.php'); ?>
<?php include_once('restriction.php') ?>
<!-- INSERT QUERY -->
<?php
	$title=$_POST['ntitle'];
	$description=$_POST['ndescription']; 
	$expiry_date=$_POST['nexpiry_date'];
	$status=$_POST['status'];
	$nwsid=$_GET['editid'];

	if ($nwsid=="") {
		if ($title!="" && $description!="" && $expiry_date!="" && $status!="") {
			$ins="INSERT INTO add_news SET 
			news_title='$title',
			news_description='$description',
			news_date='$expiry_date',
			news_status='$status'";
			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_news.php'</script>";
		}
	}
	else{
//UPDATE QUERY		
		$sel="SELECT * FROM add_news WHERE news_id='$nwsid'";
		$exe=mysqli_query($con,$sel);
		$fetch=mysqli_fetch_array($exe);
		if ($title!="" && $description!="" && $expiry_date!="" && $status!="") {
			$ins="UPDATE add_news SET 
			news_title='$title',
			news_description='$description',
			news_date='$expiry_date',
			news_status='$status' WHERE
			news_id='$nwsid'";
			mysqli_query($con,$ins);

	// PAGE KO REDIRECT KARNA
			echo "<script>window.location='view_news.php'</script>";
		}
	}	
?>
<html>

<head>
    <title>Add News</title>
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
                Add News:
            </div>
            <div class="contacts">
                <form method="post">
                    <div>
                        <div class="coursename">
                            <div>Title:</div>
                            <div>
                                <input type="text" name="ntitle" style="width: 820px;"
                                    value="<?php echo $fetch['news_title']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="contact1">
                        <div>Description:</div>
                        <div class="course_textarea">
                            <textarea name="ndescription" id="description" style="width: 820px;">
								<?php echo $fetch['news_description']; ?>
							</textarea>
                            <!-- <textarea id="txtEditor" name="ndescription"></textarea>  -->
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="coursename">
                        <div>Expiry Date:</div>
                        <div>
                            <input type="date" name="nexpiry_date" style="width: 820px;"
                                value="<?php echo $fetch['news_date']; ?>">
                        </div>
                    </div>
                    <div>
                        <div>Status:</div>
                        <div style="margin-bottom: 10px;">
                            <input type="radio" name="status" value="1" <?php if ($fetch['news_status']==1) {
								echo "checked";
							} ?>> Active
                            <input type="radio" name="status" value="0" <?php if ($fetch['news_status']==0) {
								echo "checked";
							} ?>> Deactive
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