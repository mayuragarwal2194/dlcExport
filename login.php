<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php
    if (isset($_POST['login'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sel="SELECT * FROM user_list WHERE user_name='$username' and user_password='$password'";
        $exe=mysqli_query($con,$sel);
        $tot=mysqli_num_rows($exe);
        if ($tot==1) {
            $fetch=mysqli_fetch_array($exe);
            $_SESSION['USERID']=$fetch['user_id'];
            echo "<script>window.location='index.php'</script>";
        }
        else{
            $msg="Invalid Username or Password...!!!....";
        }
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login Page</title>

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
    <?php include_once('navbar.php'); ?>
    <div class="clear"></div>
    <div class="container-fluid img-fluid login-background">
        <div class="container">
            <div class="row">
                <div class="loginbox mb-5">
                    <div class="mt-5 mb-5 loginbox-logo">
                        <a class="navbar-brand">
                            <img src="images/dlclogo.png" width="75px" alt="Logo">
                        </a>
                    </div>
                    <div class="text-danger text-center">
                        <?php echo $msg; ?>
                    </div>
                    <form method="post">
                        <div class="login_head">
                            <div class="mb-4 login_head_R1">LOGIN</div>
                            <div class="mb-4 create_an_account"><a href="register.php"> CREATE AN ACCOUNT </a></div>
                        </div>
                        <div class="username">
                            <div>Username</div>
                            <input type="text" name="username">
                        </div>
                        <div class="username logineye">
                            <div>Password</div>
                            <input type="password" name="password" id="password">
                            <i class="far fa-eye" id="togglePassword"></i>
                        </div>
                        <div class="loginbox-R5">
                            <div class="rem1">
                                <input type="checkbox" name="rem">&nbsp Remember Me
                            </div>
                            <div class="rem2">
                                <div class="forgot_password"> <a href=""> FORGET YOUR PASSWORD ? </a> </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="buttons">
                            <div class="btn1">
                                <button type="submit" class="btn btn-outline-info mb-5" name="login">LOG IN</button>
                            </div>
                            <!-- <div class="btn2">
								<button type="submit" class="btn btn-outline-info mb-5" name="login">CREATE AN ACCOUNT</button>
							</div> -->
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