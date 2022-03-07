<nav class="navbar navbar-expand-lg navbar-light bg-light stick-top" style="position: sticky;z-index: 99999;">
    <div class="container">
        <a class="navbar-brand" href="https://dlccraft.com/">
            <img src="images/dlclogo.png" width="75px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item" id="home">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item" id="about">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item" id="contact">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item dropdown" id="collection">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Collection
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="wooden.php">Wooden</a></li>
                        <li><a class="dropdown-item" href="iron.php">Iron</a></li>
                        <li><a class="dropdown-item" href="leather.php">Leather</a></li>
                        <li><a class="dropdown-item" href="plastic.php">Plastic</a></li>
                    </ul>
                </li>
                <li class="nav-item" id="reg-login">
                    <?php if($_SESSION['USERID']=="") { ?>
                    <a class="nav-link" href="login.php">Register | Login</a>
                    <?php } else {?>

                    <li class="nav-item dropdown" id="myProfile">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user-circle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="My Profile"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="favourate.php">
                                    <i class="far fa-heart" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Favouraties">
                                    </i>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="my_order.php">My Order</a></li>
                            <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                            <li><a class="dropdown-item" href="#">Update Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </li>
                <li class="nav-item" id="favouraties">
                    <a class="nav-link" href="cart.php">
                        <i class="fas fa-cart-plus" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Favouraties"></i>   
                        <?php
                            $userId=$_SESSION['USERID'];
                                $sel="SELECT * FROM cart inner join 
                            add_furniture on cart.pid=add_furniture.furniture_id WHERE
                            user_id ='$userId'";
                            $myfavex=mysqli_query($con,$sel);

                            echo mysqli_num_rows($myfavex);
                       ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="JS/jquery-3.4.1.min.js"></script>
<script>
    $("#about").click(function() {
        $("#about").addClass("active");
        $("#contact").removeClass("active");
        $("#collection").removeClass("active");
        $("#reg-login").removeClass("active");
        $("#myProfile").removeClass("active");
        $("#favouraties").removeClass("active");
        $("#home").removeClass("active");

    })
</script>