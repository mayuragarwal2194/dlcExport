<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<!-- INSERT QUERY -->
<?php
	$first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$primary_address=$_POST['paddress'];
	$secondary_address=$_POST['saddress'];
	$user_name=$_POST['uname'];
	$password=$_POST['upass'];
	$confirm_password=$_POST['conpass'];
	$birthday=$_POST['bday'];
	$user_email=$_POST['email'];
	$user_contact=$_POST['cnum'];
	// $user_profession=$_POST['uprofession'];
	// $user_website=$_POST['website'];
	// $user_twitter=$_POST['twitter'];
	// $user_instagram=$_POST['instagram'];
	// $user_facebook=$_POST['facebook'];
	$gender=$_POST['gender'];
	if ($first_name!="" && $last_name!="" && $primary_address!="" && $user_name!="" && $password!="" && 
		$confirm_password!="" && $birthday!="" && $user_email!="" && $user_contact!="" && 
		$gender!="") {
		
		if($password==$confirm_password) {

		$sel="SELECT * from user_list where user_name='$user_name' or user_email='$user_email' ";
		$exe=mysqli_query($con,$sel);
		$tot=mysqli_num_rows($exe);

		if($tot==1){
			$error="Email or Username Allredy exits";
		}
		else{
		$ins="INSERT INTO user_list SET
		user_name='$user_name',
		primary_address='$primary_address',
		secondary_address='$secondary_address',
		first_name='$first_name',
		last_name='$last_name',
		user_password='$password',
		confirm_password='$confirm_password',
		user_birthday='$birthday',
		user_email='$user_email',
		user_contact='$user_contact',
		-- user_profession='$user_profession',
		-- user_website='$user_website',
		-- user_twitter='$user_twitter',
		-- user_instagram='$user_instagram',
		-- user_facebook='$user_facebook',
		user_gender='$gender'";
		mysqli_query($con,$ins);
		$_POST=[];
		$mess="Account created successfully";
		}

	}

	else{
		$error="Password & Confirm Password Does Not Matched";
	}
	}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>REGISTER PAGE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- FONTS FAMILY CDN(ONLINE LINK) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Roboto&display=swap"
        rel="stylesheet">
</head>

<body>
    <form method="post">
        <?php if( $mess!="") {  ?>
        <div class="alert alert-success" role="alert" value="succ-mess">
            <div style="text-align:center;">
                <?php echo $mess; ?>
            </div>
        </div>
        <?php  } ?>
        <?php if( $error!="") {  ?>
        <div class="alert alert-danger" role="alert" value="dan-mess">
            <div style="text-align: center;">
                <?PHP echo $error; ?>
            </div>
        </div>
        <?php } ?>
    </form>
    <?php include_once('navbar.php'); ?>
    <div class="clear"></div>
    <div class="container-fluid main2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center main1-head mt-5 fs-2 fw-bold">Register</div>
                <div class="col-lg-12">
                    <img src="images/border.png" class="main1-head_border m-auto d-block mt-2">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 register-form">
                    <form method="post">
                        <div class="register1 mb-3">
                            <div class="register1-l">First Name</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['fname']; ?>" placeholder="First Name"
                                        class="placeholder" name="fname">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Last Name</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['lname']; ?>" placeholder="(Optional))"
                                        class="placeholder" name="lname">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Primary Address</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['paddress']; ?>" placeholder="Location"
                                        class="placeholder" name="paddress">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Secondary Address</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['saddress']; ?>"
                                        placeholder="(Optional)" class="placeholder" name="saddress">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">User Name</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['uname']; ?>" placeholder="User Name"
                                        class="placeholder" name="uname">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Password</div>
                            <div class="register1-r eye">
                                <div class="register1-r-logo">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="password" value="<?php echo $_POST['upass']; ?>" placeholder="Password"
                                        class="placeholder" id="password" name="upass">
                                    <i class="far fa-eye" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Confirm Password</div>
                            <div class="register1-r eye">
                                <div class="register1-r-logo">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="password" value="<?php echo $_POST['conpass']; ?>"
                                        placeholder="Confirm Password" class="placeholder" id="conpassword"
                                        name="conpass">
                                    <i class="far fa-eye" id="contogglePassword"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Birth Day</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="date" value="<?php echo $_POST['bday']; ?>" placeholder="Birth Day"
                                        class="placeholder" name="bday">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">E-Mail</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['email']; ?>"
                                        placeholder="E-Mail Address" class="placeholder" name="email">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Contact No.</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['cnum']; ?>" placeholder="(+91)"
                                        class="placeholder" name="cnum">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- <div class="register1 mb-3">
                            <div class="register1-l">User Profession</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['uprofession']; ?>"
                                        placeholder="Profession" class="placeholder" name="uprofession">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div> -->
                        <!-- <div class="register1 mb-3">
                            <div class="register1-l">Website</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['website']; ?>" placeholder="(Optional)"
                                        class="placeholder" name="website">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Twitter</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['twitter']; ?>" placeholder="(Optional)"
                                        class="placeholder" name="twitter">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Instagram</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['instagram']; ?>"
                                        placeholder="(Optional)" class="placeholder" name="instagram">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="register1 mb-3">
                            <div class="register1-l">Facebook</div>
                            <div class="register1-r">
                                <div class="register1-r-logo">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <div class="register1-r-input">
                                    <input type="text" value="<?php echo $_POST['facebook']; ?>"
                                        placeholder="(Optional)" class="placeholder" name="facebook">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div> -->

                        <div class="register1 mb-3">
                            <div class="register1-l">Gender</div>
                            <div class="register1-r">

                                <div class="register1-r-radio">
                                    <input type="radio" name="gender" <?php if($_POST['gender']==1) echo "checked"; ?>
                                        value="1"> Male
                                    <input type="radio" name="gender" value="0"
                                        <?php if($_POST['gender']==0) echo "checked"; ?>> Female
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <button type="submit" class="main2-button text-white border rounded fs-6 text-decoration-none">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
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
<!-- PASSWORD KO SHOW/HIDE  -->
<script type="text/javascript">
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<!-- CONFIRM PASSWORD KO SHOW/HIDE  -->
<script type="text/javascript">
const contogglePassword = document.querySelector('#contogglePassword');
const conpassword = document.querySelector('#conpassword');

contogglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = conpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    conpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>