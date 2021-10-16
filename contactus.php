<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<?php 
    $where="where contact_status ='1'";
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>CONTACT US PAGE</title>
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
    <div class="container-fluid contact-main1" ; style="border-top: 1px solid lightgrey" ;>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 text-center contact-main1-head">Our <span> Address </span> </div>
                <div class="col-lg-12">
                    <img src="images/border.png" class="main1-head_border">
                </div>
            </div>
            <div class="row con-address mb-5">
                <?php
                    $sel="SELECT * FROM contact_us 
                        INNER JOIN add_state ON contact_us.contact_state=add_state.state_id 
                        INNER JOIN add_country ON contact_us.contact_country=add_country.country_id 
                        $where ORDER BY contact_id ASC LIMIT 0,1";
                    $exe=mysqli_query($con,$sel);
                    $fetch=mysqli_fetch_array($exe);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 con-address1">
                    <div> <?php if($fetch['state_name']!="") { ?> <?php echo $fetch['country_name']; ?>,<?php echo $fetch['state_name']; ?> <?php } ?></div>
                    <div>
                        <?php echo $fetch['contact_address'];?><br>
                        <?php echo $fetch['contact_email'];?><br>
                        <?php echo $fetch['contact_website'];?><br>
                        <?php echo $fetch['contact_phone'];?>&nbsp;&nbsp;<?php echo $fetch['contact_mobile'];?>
                    </div>
                </div>
                <?php
                    $sel="SELECT * FROM contact_us 
                            INNER JOIN add_state ON contact_us.contact_state=add_state.state_id 
                            INNER JOIN add_country ON contact_us.contact_country=add_country.country_id 
                            $where ORDER BY contact_id ASC LIMIT 1,1";
                    $exe=mysqli_query($con,$sel);
                    $fetch=mysqli_fetch_array($exe);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 con-address2">
                    <div> <?php if($fetch['state_name']!="") { ?> <?php echo $fetch['country_name']; ?>,<?php echo $fetch['state_name']; ?> <?php } ?></div>
                    <div>
                        <?php echo $fetch['contact_address'];?><br>
                        <?php echo $fetch['contact_email'];?><br>
                        <?php echo $fetch['contact_website'];?><br>
                        <?php echo $fetch['contact_phone'];?>&nbsp;&nbsp;<?php echo $fetch['contact_mobile'];?>
                    </div>
                </div>
            </div>
            <div class="row contact-map-row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="contact-main2-r3-L">
                        <div class="testimonial-touch-head">
                            Let's <span>Keep In Touch</span>
                        </div>
                        <div class="testimonial-touch-matter">
                            <div style="margin-top: 10px;">
                                <form>
                                    <input type="text" class="testimonial-touch-input1" placeholder="Name:">
                                    <input type="text" class="testimonial-touch-input1" placeholder="Email:">
                                    <input type="text" class="testimonial-touch-input1" placeholder="Country:">
                                    <input type="text" class="testimonial-touch-input1" placeholder="Website Name:">
                                    <textarea class="testimonial-touch-textarea1" placeholder="Message:"></textarea>
                                    <div>
                                        <input type="button" class="testimonial-touch-buttn1" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                    <div class="contact-main2-r3-R">
                        <div>Find <span> Us </span></div>
                        <div class="row">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d223.57630226157795!2d72.99719084961694!3d26.286940034986284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDE3JzEzLjQiTiA3MsKwNTknNTAuMSJF!5e0!3m2!1sen!2sin!4v1623510739165!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
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