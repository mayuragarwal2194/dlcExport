<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php
    $funid=$_GET['funid'];
    $sel="SELECT * FROM add_furniture WHERE furniture_id='$funid'";
    $exe=mysqli_query($con,$sel);
    $fetch=mysqli_fetch_array($exe);
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>FURNITURE DETAIL PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- JSOR IMAGE SLIDER CDN  -->
    <link rel="stylesheet" href="https://k1ngzed.com/dist/swiper/swiper.min.css">
    <link rel="stylesheet" href="https://k1ngzed.com/dist/EasyZoom/easyzoom.css">

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
    <div class="container-fluid mb-5 mt-5">
        <div class="container furniture-detail-main">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 furniture-image">
                    <div class="product__carousel product_car">
                        <!-- Swiper and EasyZoom plugins start -->
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide easyzoom easyzoom--overlay">
                                    <a
                                        href="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>">
                                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="swiper-slide easyzoom easyzoom--overlay">
                                    <a
                                        href="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image2'] ?>">
                                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image2'] ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="swiper-slide easyzoom easyzoom--overlay">
                                    <a
                                        href="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image3'] ?>">
                                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image3'] ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="swiper-slide easyzoom easyzoom--overlay">
                                    <a
                                        href="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image4'] ?>">
                                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image4'] ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="swiper-slide easyzoom easyzoom--overlay">
                                    <a
                                        href="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image5'] ?>">
                                        <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image5'] ?>"
                                            alt="" />
                                    </a>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="text-center" style="color: gray;">Roll over image to zoom in</div>
                        <div class="swiper-container gallery-thumbs mt-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide swipe_slide">
                                    <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image1'] ?>"
                                        alt="">
                                </div>
                                <div class="swiper-slide swipe_slide">
                                    <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image2'] ?>"
                                        alt="">
                                </div>
                                <div class="swiper-slide swipe_slide">
                                    <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image3'] ?>"
                                        alt="">
                                </div>
                                <div class="swiper-slide swipe_slide">
                                    <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image4'] ?>"
                                        alt="">
                                </div>
                                <div class="swiper-slide swipe_slide">
                                    <img src="adminpanel/file_upload(furniture)/<?php echo $fetch['furniture_image5'] ?>"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Swiper and EasyZoom plugins end -->
                        <div class="furniture-buying">
                            <div class="row">
                                <div class="col-2">price:</div>
                                <div class="col-10">
                                    <span>₹ <?php echo $fetch['furniture_price']; ?></span>&nbsp;&nbsp;
                                    <span style="text-decoration: line-through; color: gray;">RS, <?php echo $fetch['discounted_price']; ?> &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                            </div>
                            <div>
                                <a href="cart.php?pid=<?php echo $fetch['furniture_id']; ?>">
                                    <button>
                                        <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div style="width: 80px; float: left;"> Add To Cart </div>
                                    </button>
                                </a>
                            </div>
                            <div>
                                <button>
                                    <i class="fas fa-play"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div style="width: 80px; float: left;"> Buy Now </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 furniture-detail">
                    <div class="row furniture-detail-r1">
                        <p>
                            <?php echo $fetch['furniture_description']; ?>
                        </p>
                    </div>
                    <div class="row furniture-detail-r2">
                        <div class="product_availability mb-3">Currently Available.</div>
                        <div class="furniture-specification">
                            <div class="row mb-3 furniture-specification-1">
                                <div
                                    class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 furniture_spec_L">
                                    Colour
                                </div>
                                <div
                                    class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                                    <?php echo $fetch['furniture_colour']; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 furniture_spec_L">
                                    Material
                                </div>
                                <div
                                    class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-9 furniture_spec_R">
                                    <?php echo $fetch['furniture_material']; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 furniture_spec_L">
                                    Item Dimensions (LxWxH)
                                </div>
                                <div
                                    class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                                    <?php echo $fetch['furniture_dimension']; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 furniture_spec_L">
                                    Maximum Weight Recommendation
                                </div>
                                <div
                                    class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                                    <?php echo $fetch['maxweight_recommondation']; ?>
                                </div>
                            </div>
                            <div class="row mb-3 furniture-specification-last">
                                <div
                                    class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 furniture_spec_L">
                                    Brand
                                </div>
                                <div
                                    class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                                    <?php echo $fetch['furniture_brand']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="furniture-about">
                            <h4>About This Item</h4>
                            <ul>
                                <li>
                                    <?php echo $fetch['furniture_about1']; ?>
                                </li>
                                <li>
                                    <?php echo $fetch['furniture_about2']; ?>
                                </li>
                                <li>
                                    <?php echo $fetch['furniture_about3']; ?>
                                </li>
                                <li>
                                    <?php echo $fetch['furniture_about4']; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row">
                <div class="product-detail pb-3">
                    <h4>Product Detail</h4>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Product Dimensions :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_dimension']; ?>
                        </div>
                    </div>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Date First Available :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_date']; ?>
                        </div>
                    </div>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Manufacturer :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_manufacturer']; ?>
                        </div>
                    </div>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Product No. :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_asin']; ?>
                        </div>
                    </div>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Country of Origin :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['country_origin']; ?>
                        </div>
                    </div>
                    <!-- <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Department :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            Unisex-adult
                        </div>
                    </div> -->
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Item Weight :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_weight']; ?>
                        </div>
                    </div>
                    <div class="row mb-3 furniture-specification-1">
                        <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 furniture_spec_L">
                            Generic Name :
                        </div>
                        <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 furniture_spec_R">
                            <?php echo $fetch['furniture_genericname']; ?>
                        </div>
                    </div>
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
<!-- JSOR IMAGE SLIDER CDN  -->
<script src="https://k1ngzed.com/dist/swiper/swiper.min.js"></script>
<script src="https://k1ngzed.com/dist/EasyZoom/easyzoom.js"></script>

<!-- TOOLTIP JAVA SCRIPT  -->
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

<!-- JSOR IMAGE SLIDER JAVA SCRIPT  -->
<script>
// product Gallery and Zoom

// activation carousel plugin
var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 5,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    breakpoints: {
        0: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 4,
        },
    }
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs
    },
});
// change carousel item height
// gallery-top
let productCarouselTopWidth = $('.gallery-top').outerWidth();
$('.gallery-top').css('height', productCarouselTopWidth);

// gallery-thumbs
let productCarouselThumbsItemWith = $('.gallery-thumbs .swiper-slide').outerWidth();
$('.gallery-thumbs').css('height', productCarouselThumbsItemWith);

// activation zoom plugin
var $easyzoom = $('.easyzoom').easyZoom();
</script>