<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CHECKOUT FORM</title>

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
    <div class="row">
        <div class="col-lg-12 text-center contact-main1-head">Checkout <span> Form </span> </div>
        <div class="col-lg-12">
            <img src="images/border.png" class="main1-head_border">
        </div>
    </div>
    <div class="row" style="justify-content: center;">
        <div class="col-md-4 container bg-default billing mt-5 mb-5">
            <h4 class="my-4">
                Billing Address
            </h4>
            <form method="post">
                <div class="row mt-4">
                    <div class="col-md-6 form-group billing-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="First Name">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-md-6 form-group billing-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="form-group billing-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="form-group billing-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                </div>

                <div class="form-group billing-group">
                    <label for="adress">Address</label>
                    <input type="text" class="form-control" id="adress" placeholder="1234 Main Street" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="form-group billing-group">
                    <label for="address2">Address 2
                        <span class="text-muted">(Optional)</span>
                    </label>
                    <input type="text" class="form-control" id="adress2" placeholder="Flat No">
                </div>

                <div class="row">
                    <div class="col-md-4 form-group billing-group">
                        <label for="country">Country</label>
                        <select type="text" class="form-control" id="country">
                            <option value>Choose...</option>
                            <option>United Kingdom</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-4 form-group billing-group">
                        <label for="city">City</label>
                        <select type="text" class="form-control" id="city">
                            <option value>Choose...</option>
                            <option>London</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>

                    <div class="col-md-4 form-group billing-group">
                        <label for="postcode">Postcode</label>
                        <select type="text" class="form-control" id="postcode">
                            <option value>Choose...</option>
                            <option>NW6 2LS</option>
                        </select>
                        <div class="invalid-feedback">
                            Postcode required.
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="shipping-adress">
                    Shipping address is the same as my billing address
                    <label for="shipping-adress" class="form-check-label"></label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-adress">
                    Save this information for next time
                    <label for="same-adress" class="form-check-label"></label>
                </div>

                <hr>

                <h4 class="mb-4">Payment</h4>

                <div class="form-check">
                    <input type="radio" class="form-check-input" id="credit" name="payment-method" checked required>
                    <label for="credit" class="form-check-label">Credit Card</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" id="debit" name="payment-method" required>
                    <label for="debit" class="form-check-label">Debit Card</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" id="paypal" name="payment-method" required>
                    <label for="paypal" class="form-check-label">PayPal</label>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 form-group billing-group">
                        <label for="card-name">Name on card</label>
                        <input type="text" class="form-control" id="card-name" placeholder required>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>

                    <div class="col-md-6 form-group billing-group">
                        <label for="card-no">Card Number</label>
                        <input type="text" class="form-control" id="card-no" placeholder required>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group billing-group">
                        <label for="card-name">Expiry Date</label>
                        <input type="text" class="form-control" id="card-name" placeholder required>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>

                    <div class="col-md-6 form-group billing-group">
                        <label for="card-no">Security Number</label>
                        <input type="text" class="form-control" id="card-no" placeholder required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <button class="btn btn-primary bt-lg btn-block mb-3" type="submit">Continue to Checkout</button>
            </form>
        </div>
        <div class="col-md-3 checkout-right mt-5">
            <h5>My Cart <span> (1 items) </span></h5>
            <div class="checkout-item">
                <div class="row">
                    <div class="col-md-4 checkout-right-img">
                        <img src="adminpanel/file_upload(furniture)/c6.jfif" width="80" height="80">
                    </div>
                    <div class="col-md-8 checkout-right-matter">
                        <div class="checkout-right-matter-off">3.33% OFF</div>
                        <div>Brand Name</div>
                        <div>Quantity</div>
                        <div class="mt-3" style="font-weight: 500;">
                            ₹ 15,000 &nbsp; <span> ₹-18,000</span>
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