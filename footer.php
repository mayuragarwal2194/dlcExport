<div class="container-fluid footer pt-2">
    <div class="container footer-contain">
        <div class="row mb-2 mt-5">
            <div class="col-12 col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 footer-coloumn1 pb-3">
                <div class="footer-head text-white fw-bold">
                    QUICK LINK
                    <div class="footer-head-border mb-4 mt-2"></div>
                </div>
                <div class="footer-matter">
                    <ul class="m-0 p-0 list-unstyled">
                        <li class="p-2"><a class="text-decoration-none" href="index.php">Home</a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="about.php"> About Us </a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="wooden.php"> Wooden </a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="iron.php"> Iron </a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="leather.php"> Leather </a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="plastic.php"> Plastic </a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 footer-coloumn1 pb-3">
                <div class="footer-head text-white fw-bold">
                    FOLLOW UP WITH US
                    <div class="footer-head-border mb-4 mt-2"></div>
                </div>
                <div class="footer-matter">
                    <div class="social-icons mb-4 d-flex">
                        <div class="social-icons1 rounded-circle d-flex align-items-center justify-content-center">
                            <a class="text-decoration-none text-white" href="https://twitter.com/?lang=en">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="social-icons1 rounded-circle d-flex align-items-center justify-content-center">
                            <a class="text-decoration-none text-white" href="https://www.facebook.com/dlc.craft.9">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="social-icons1 rounded-circle d-flex align-items-center justify-content-center">
                            <a class="text-decoration-none text-white" href="https://instagram.com/dlc_handicraft?utm_medium=copy_link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-3 col-xxl-3 footer-coloumn1">
                <div class="footer-head text-white fw-bold">
                    SUPPORT
                    <div class="footer-head-border mb-4 mt-2"></div>
                </div>
                <div class="footer-matter">
                    <ul class="m-0 p-0 list-unstyled">
                        <li class="p-2"> <a class="text-decoration-none" href="contactus.php"> Contact Us </a> </li>
                        <li class="p-2"><a class="text-decoration-none" href="about.php"> About Us </a></li>
                        <li class="p-2"><a class="text-decoration-none" href="login.php">Register | Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 footer-coloumn1">
                <div class="footer-head text-white fw-bold">
                    CONTACT US
                    <div class="footer-head-border mb-4 mt-2"></div>
                </div>
                <?php 
                        $sel="SELECT * FROM contact_us 
                        INNER JOIN add_state ON contact_us.contact_state=add_state.state_id 
                        INNER JOIN add_country ON contact_us.contact_country=add_country.country_id 
                        ORDER BY contact_id ASC LIMIT 0,1";
                        $exe=mysqli_query($con,$sel);
                        $fetch=mysqli_fetch_array($exe);
                     ?>
                <div class="footer-matter">
                    <div class="row  mb-3">
                        <div class="footer-contact-icon float-start">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="footer-contact-matter float-end">
                            <?php echo $fetch['country_name']; ?>,<?php echo $fetch['state_name']; ?><br>
                            <?php echo $fetch['contact_address'];?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row ml-1 mb-3">
                        <div class="footer-contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="footer-contact-matter">
                            <div><?php echo $fetch['contact_phone']; ?></div>
                            <div><?php echo $fetch['contact_mobile']; ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row ml-1 mb-3">
                        <div class="footer-contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="footer-contact-matter">
                            <div class="footer-contact-matter-gmail"><?php echo $fetch['contact_email']; ?></div>
                            <div><?php echo $fetch['contact_website']; ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row footer-row2 mb-3">
            Furniture is available to all persons, regardless of race, color, religion, sex, handicap, familial
            status, or national origin.
        </div> -->
    </div>
</div>
<!-- <div class="container-fluid footer-bottom">
    <div class="container">
        <div class="row">
            <div class=" col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 footer-bottom-left text-start">
                Copyright © 2018 /<span> XYZ Furniture </span> /All rights reserved.</div>
            <div class=" col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 footer-bottom-right text-end">
                Design and Developed by Mayur Agarwal</div>
        </div>
    </div>
</div> -->
