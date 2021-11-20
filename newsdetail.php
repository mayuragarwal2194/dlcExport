<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>NEWS DETAIL PAGE</title>
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
    <!-- <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <img src="images/tim-unsplash.jpg" class="d-block w-100" alt="...">
    </div> -->
    <!-- col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 -->
    <div class="container-fluid main1 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center main1-head mt-5 fs-2 fw-bold">NEWS DETAIL</div>
                <div class="col-12">
                    <img src="images/border.png" class="main1-head_border m-auto d-block mt-2">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 main1-left">
                    <?php
                        $nwsid=$_GET['nwsid'];

                        $selnews="SELECT * FROM add_news WHERE news_id='$nwsid'";
                        $exenews=mysqli_query($con,$selnews);
                        $fetchnews=mysqli_fetch_array($exenews)
                    ?>
                    <div class="row mb-4">
                        <div
                            class="col-12 main1-left-head fs-5 mb-2 fw-bold">
                            <?php echo $fetchnews['news_title']; ?>
                        </div>
                        <div
                            class="col-12 main2-left-matter">
                            <div class="row ml-2">
                                <div class="main1-left-matter-icon border border-2 mt-3 d-flex justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="images/like.png" width="38" height="35">
                                </div>
                                <div class="main1-left-matter-content lh-base">
                                    <p>
                                        <?php echo $fetchnews['news_description']; ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
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