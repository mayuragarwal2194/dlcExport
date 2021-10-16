<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php 
    $_SESSION['USERID'];
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>Home PAGE</title>
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
    <div class="container-fluid news-line">
        <div class="marquee">
            <div class="marquee__item">
                <?php 
                    $selnews="SELECT * FROM add_news WHERE news_status='1'";
                    $exenews=mysqli_query($con,$selnews);
                    while ($fetchnews=mysqli_fetch_array($exenews)) {
                ?>
                <a href="newsdetail.php?nwsid=<?php echo $fetchnews['news_id']; ?>"> 
                    <?php echo $fetchnews['news_title']; ?> 
                </a>
                <span class="marquee__seperator">+++</span>
                <?php } ?>
            </div>
            <div class="marquee__item">
                <?php 
                    $selnews="SELECT * FROM add_news WHERE news_status='1'";
                    $exenews=mysqli_query($con,$selnews);
                    while ($fetchnews=mysqli_fetch_array($exenews)) {
                ?>
                <a href="newsdetail.php?nwsid=<?php echo $fetchnews['news_id']; ?>"> 
                    <?php echo $fetchnews['news_title']; ?> 
                </a>
                <span class="marquee__seperator">+++</span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php
                   $selslider1="SELECT * FROM add_slider LIMIT 0,1";
                   $exeselslider11=mysqli_query($con,$selslider1);
                 $fetch1=mysqli_fetch_array($exeselslider11);
                ?>
                <div class="carousel-item active">
                    <img src="adminpanel/file_upload(slider)/<?php echo $fetch1['slider_image1']; ?>"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="adminpanel/file_upload(slider)/<?php echo $fetch1['slider_image2']; ?>"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="adminpanel/file_upload(slider)/<?php echo $fetch1['slider_image3']; ?>"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 -->
    <div class="container-fluid main1 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center main1-head mt-5 fs-2 fw-bold">WHY CHOOSE US</div>
                <div class="col-12">
                    <img src="images/border.png" class="main1-head_border m-auto d-block mt-2">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-7 main1-left">
                    <?php
                        $sel="SELECT * FROM about_us LIMIT 0,1";
                        $exe=mysqli_query($con,$sel);
                        while ($fetch=mysqli_fetch_array($exe)) {
                    ?>
                    <div class="row mb-4">
                        <div
                            class="col-12 main1-left-head fs-5 mb-2 fw-bold">
                            <?php echo $fetch['about_title']; ?>
                        </div>
                        <div
                            class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 main2-left-matter">
                            <div class="row ml-2">
                                <div class="main1-left-matter-icon border border-2 mt-3 d-flex justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="images/like.png" width="38" height="35">
                                </div>
                                <div class="main1-left-matter-content lh-base">
                                    <p>
                                        <?php echo $fetch['about_description']; ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                        $sel="SELECT * FROM about_us LIMIT 1,1";
                        $exe=mysqli_query($con,$sel);
                        while ($fetch=mysqli_fetch_array($exe)) {
                    ?>
                    <div class="row mb-4">
                        <div
                            class="col-12 main1-left-head fs-5 mb-2 fw-bold">
                            <?php echo $fetch['about_title']; ?>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 main2-left-matter">
                            <div class="row ml-2">
                                <div class="main1-left-matter-icon border border-2 mt-3 d-flex justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="images/service.png" width="38" height="35">
                                </div>
                                <div class="main1-left-matter-content lh-base">
                                    <p>
                                        <?php echo $fetch['about_description']; ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                        $sel="SELECT * FROM about_us LIMIT 2,1";
                        $exe=mysqli_query($con,$sel);
                        while ($fetch=mysqli_fetch_array($exe)) {
                    ?>
                    <div class="row mb-4">
                        <div
                            class="col-12 main1-left-head fs-5 mb-2 fw-bold">
                            <?php echo $fetch['about_title']; ?>
                        </div>
                        <div
                            class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 main2-left-matter">
                            <div class="row ml-2">
                                <div class="main1-left-matter-icon border border-2 mt-3 d-flex justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="images/quality.png" width="38" height="35">
                                </div>
                                <div class="main1-left-matter-content lh-base">
                                    <p>
                                        <?php echo $fetch['about_description']; ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-5 col-lg-5 d-flex justify-content-end position-relative mt-3">
                    <div class="main1-right">
                        <div class="main1-right-image position-absolute">
                            <img src="images/why_us2.jpg">
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid main2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center main1-head mt-5 fs-2 fw-bold">KNOW ABOUT</div>
                <div class="col-12">
                    <img src="images/border.png" class="main1-head_border m-auto d-block mt-2">
                </div>
            </div>
            <div class="row mt-5 cards-homepage">
                <?php
                    $sel3="SELECT * FROM add_know LIMIT 0,1";
                    $exe3=mysqli_query($con,$sel3);
                    while ($fetch3=mysqli_fetch_array($exe3)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 main2-c1">
                    <div class="card">
                        <img src="adminpanel/file_upload(know)/<?php echo $fetch3['know_image'] ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch3['know_title']; ?></h5>
                            <div class="card-text">
                                <?php echo $fetch3['know_description']; ?>
                            </div>
                            <a href="wooden.php" class="main2-button text-white border rounded fs-6 text-decoration-none">See More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                    $sel3="SELECT * FROM add_know LIMIT 1,1";
                    $exe3=mysqli_query($con,$sel3);
                    while ($fetch3=mysqli_fetch_array($exe3)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 main2-c1">
                    <div class="card">
                        <img src="adminpanel/file_upload(know)/<?php echo $fetch3['know_image'] ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch3['know_title']; ?></h5>
                            <div class="card-text">
                                <?php echo $fetch3['know_description']; ?>
                            </div>
                            <a href="iron.php" class="main2-button text-white border rounded fs-6 text-decoration-none">See More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                    $sel3="SELECT * FROM add_know LIMIT 2,1";
                    $exe3=mysqli_query($con,$sel3);
                    while ($fetch3=mysqli_fetch_array($exe3)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 main2-c1">
                    <div class="card">
                        <img src="adminpanel/file_upload(know)/<?php echo $fetch3['know_image'] ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch3['know_title']; ?></h5>
                            <div class="card-text">
                                <?php echo $fetch3['know_description']; ?>
                            </div>
                            <a href="leather.php" class="main2-button text-white border rounded fs-6 text-decoration-none">See More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                    $sel3="SELECT * FROM add_know LIMIT 3,1";
                    $exe3=mysqli_query($con,$sel3);
                    while ($fetch3=mysqli_fetch_array($exe3)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 main2-c1">
                    <div class="card">
                        <img src="adminpanel/file_upload(know)/<?php echo $fetch3['know_image'] ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch3['know_title']; ?></h5>
                            <div class="card-text">
                                <?php echo $fetch3['know_description']; ?>
                            </div>
                            <a href="plastic.php" class="main2-button text-white border rounded fs-6 text-decoration-none">See More</a>
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