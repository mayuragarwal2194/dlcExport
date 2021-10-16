<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php
    $where="where furniture_collection='3' and furniture_status='1'"
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>PLASTIC FURNITURE PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" href="css/responsive.css">

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
    <!-- col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 -->
    <div class="container-fluid main2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center contact-main1-head">Plastic <span> Furniture </span> </div>
                <div class="col-lg-12">
                    <img src="images/border.png" class="main1-head_border">
                </div>
            </div>
            <div class="row mt-5 cards-homepage">
                <?php
                    $sel="SELECT * FROM add_furniture $where";
                    $exe=mysqli_query($con,$sel);
                    while ($fetch=mysqli_fetch_array($exe)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 main2-c1">
                    <div class="card furniture-card h-auto">
                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>"
                            class="card-img-top crd-img" alt="...">
                        <div class="card-body crd-body">
                            <p class="card-text crd-text fw-bold">
                                RS, <?php echo $fetch['furniture_price']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if($_SESSION["USERID"]!="") { ?>
                                <a href="favourate.php?favid=<?php echo $fetch['furniture_id']; ?>">
                                    <i class="far fa-heart" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Add To Favourate">
                                    </i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php } else { ?>
                                <a href="login.php">
                                    <i class="far fa-heart" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Add To Favourate Please First Login">
                                    </i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php } ?>
                                <a href="cart.php?pid=<?php echo $fetch['furniture_id']; ?>">
                                    <i class="far fa-cart-plus" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Add To Cart">
                                    </i>
                                </a>
                            </p>
                            <a href="furniture_detail.php?funid=<?php echo $fetch['furniture_id']; ?>">
                                <button class="wooden-main2-button">See More</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
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
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>