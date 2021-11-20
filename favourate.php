<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<!-- INSERT QUERY -->
<?php

$userid=$_SESSION['USERID'];
$favid=$_GET['favid'];
$sel="SELECT * FROM favourate where p_id ='$favid' and u_id='$userid'";
$ex=mysqli_query($con,$sel);
$tot=mysqli_num_rows($ex);
if($tot==1) {
    $msg="Allready in Your WishList";
}
else{
    if($_GET['favid']!="" && $userid!="") {
        $ins="INSERT INTO favourate SET
        p_id ='$favid',u_id='$userid'";

        mysqli_query($con,$ins);
        $msg="Product Add in Your WishList";
    }
}
?>
<!-- DELETE PRODUCT FROM WISHLIST -->
<?php
    $id=$_GET['fid'];
    $del="DELETE FROM favourate WHERE favourate_id='$id'";
    mysqli_query($con,$del);
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>WISHLIST PAGE</title>
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
                <div class="col-lg-12 text-center contact-main1-head">Wishlist <span> Page </span> </div>
                <div class="col-lg-12">
                    <img src="images/border.png" class="main1-head_border">
                </div>
            </div>
            <div class="row mt-5 cards-homepage">

                <div><?php echo $msg; ?></div>
                <table class="table table-bordered fav_table">
                    <thead>
                        <tr class="table_cart--heading">
                            <th>
                                Product Name
                            </th>
                            <th>
                                Product Image
                            </th>
                            <th>
                                Product Price
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // SELECT * FROM favourate inner join 
                              //  add_furniture on favourate.p_id=add_furniture.furniture_id WHERE
                              //  u_id='1'

                            $sel="SELECT * FROM favourate inner join 
                                add_furniture on favourate.p_id=add_furniture.furniture_id WHERE
                                u_id='$userid'";
                                $myfavex=mysqli_query($con,$sel);
                                while($fetch=mysqli_fetch_array( $myfavex)){
                            ?>
                        <tr class="item-row">
                            <td>
                                <?php echo $fetch['furniture_brand']; ?>
                            </td>
                            <td>
                                <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>"
                                    width="100" height="100">
                            </td>
                            <td>
                                ₹ <?php echo $fetch['furniture_price']; ?>/-
                            </td>
                            <td>
                                <a href="favourate.php?fid=<?php echo $fetch['favourate_id']; ?>">
                                    <button class="btn btn-danger" type="button">Delete</button>
                                </a>
                                <div class="fav-furniture-buying">
                                <a href="cart.php?pid=<?php echo $fetch['furniture_id']; ?>">
                                    <button class="btn-primary">
                                        <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div style="width: 80px; float: left;"> Add To Cart </div>
                                    </button>
                                </a>
                            </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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