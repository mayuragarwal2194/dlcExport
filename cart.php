<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php include_once('adminpanel/connection.php'); ?>
<!-- INSERT QUERY -->

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>CART PAGE</title>
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
    <?php

echo $userid=$_SESSION['USERID'];



if ($userid!="") {
    
$pid=$_GET['pid'];
$sel="SELECT * FROM cart where pid ='$pid' and user_id  ='$userid'";
$ex=mysqli_query($con,$sel);
$tot=mysqli_num_rows($ex);
if($tot==1) {

    
    $msg="Product AllReady in Cart";
}
else{

   
   if($_GET['pid']!="" && $userid!="") {
        $ins="INSERT INTO cart SET
        pid ='$pid',qty=1,user_id ='$userid'";

        mysqli_query($con,$ins);
        $msg="Product Add in Your Cart";
    }
}
?>
<?php
    $cid=$_GET['cid'];
    $qty=$_GET['qty'];
    if($cid!="" && $qty!="") {
        $ins="UPDATE cart SET
        qty=$qty where cart_id='$cid'";

        mysqli_query($con,$ins);
        $msg="Update Cart Successfully";
    }
?>
<!-- DELETE PRODUCT FROM WISHLIST -->
<?php
    $id=$_GET['fid'];
    $del="DELETE FROM cart WHERE cart_id='$id'";
    mysqli_query($con,$del);


    if(isset($_POST['ac'])){
        $cp_code= $_POST['coupon_code'];

        $selcp="SELECT * FROM add_coupon WHERE coupon_code='$cp_code'";
        $execp=mysqli_query($con,$selcp);
        $totcp=mysqli_num_rows($execp);
        if($totcp==1){
            $fecthCp=mysqli_fetch_array($execp);
            $_SESSION['COU_CODE']= $fecthCp['coupon_code'];
            $_SESSION['COU_TYPE']= $fecthCp['coupon_type'];
            $_SESSION['COU_AMOUNT']= $fecthCp['coupon_price'];
        }
        else{
            unset($_SESSION['COU_CODE']);
            unset($_SESSION['COU_TYPE']);
            unset($_SESSION['COU_AMOUNT']);
            $coupon_error="Invalid Coupon Code";
        }
    }
?>
    <div class="clear"></div>
    <!-- col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 -->
    <div class="container-fluid main2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center contact-main1-head">My <span> Cart </span> </div>
                <div class="col-lg-12">
                    <img src="images/border.png" class="main1-head_border">
                </div>
            </div>
            <div class="row mt-5 cards-homepage">

                <div><?php echo $msg; ?></div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table_cart--heading">
                            <th>
                                Product Name
                            </th>
                            <th>
                                Product Image
                            </th>
                             <th>
                                Product Quantity
                            </th>

                            <th>
                                Product Price
                            </th>
                            <th>
                                Total Price
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // SELECT * FROM cart inner join 
                              //  add_furniture on cart.pid=add_furniture.furniture_id WHERE
                              //  user_id   ='1'

                        $totalfprice=0;
                        $item=0;
                            $sel="SELECT * FROM cart inner join 
                                add_furniture on cart.pid=add_furniture.furniture_id WHERE
                                user_id ='$userid'";
                                $myfavex=mysqli_query($con,$sel);
                                while($fetch=mysqli_fetch_array( $myfavex)){
                                    $item++;
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
                                <button type="button" class="cart-qty" onclick="updateqty(1,<?php echo $fetch['cart_id'] ?>,<?php echo $fetch['discounted_price']; ?>)">-</button>
                                <input type="text" value="<?php echo $fetch['qty']; ?>" id="cartqty<?php echo $fetch['cart_id'] ?>" style="width:30px; text-align: center; float: left; margin-left: 10px; margin-right: 10px;" name="">
                                <button type="button" class="cart-qty"  onclick="updateqty(2,<?php echo $fetch['cart_id'] ?>,<?php echo $fetch['discounted_price']; ?>)">+</button>
                                <div class="clear"></div>
                            </td>
                            <?php 
                                $prd_price=$fetch['discounted_price'];
                                $prd_qty=$fetch['qty'];
                                $total_price=$prd_price*$prd_qty;
                            ?>
                            <td>
                               <strike> ₹ <?php echo number_format($fetch['furniture_price']); ?>/-</strike>
                                ₹ <?php echo number_format($fetch['discounted_price']); ?>/-
                            </td>
                            <td>
                                ₹ <span id="finaltotal<?php echo $fetch['cart_id'] ?>"> 
                                <?php echo number_format($total_price); ?>/- </span>
                            </td>
                            <?php $totalfprice=$totalfprice+ $total_price; ?>
                            <td>
                                <a href="cart.php?fid=<?php echo $fetch['cart_id']; ?>">
                                    <button class="btn btn-danger" type="button">Delete</button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-primary" type="button" onclick="updateCart(<?php echo $fetch['cart_id'] ?>)">Update</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <form method="post">
                        <div>
                            <?php echo $coupon_error; ?>
                        </div>
                        <input type="text" name="coupon_code">
                        <button type="submit" name="ac">Apply Coupen</button>
                    </form>
                </div>
                <div class="price-detail">
                    <h5>PRICE DETAIL</h5>
                    <hr/>
                    <div style="padding-left: 10px; line-height: 40px;">
                        <div class="price-detail1">
                            <div class="price-detail1-L">Price (<?php echo $item ?> items)</div>
                            <div class="price-detail1-R"> ₹<?php  echo number_format($totalfprice); ?>
                                
                                <?php
                                    if($_SESSION['COU_TYPE']==0){
                                        $disamount=$totalfprice*$_SESSION['COU_AMOUNT']/100;
                                    }
                                    else{
                                        $disamount=$_SESSION['COU_AMOUNT'];
                                    }




                                ?>



                            </div>
                        </div>
                        <div class="price-detail1">
                            <div class="price-detail1-L">Discount</div>
                            <div class="price-detail1-R"><span> − <?php  echo number_format($disamount); ?></span></div>
                        </div>
                        <div class="price-detail1">
                            <div class="price-detail1-L">Delivery Charges</div>
                            <div class="price-detail1-R"><span>  ₹0 </span></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="price-detail-total">
                        <div class="price-detail-total-L">Total Amount</div>
                        <div class="price-detail-total-R">
                            ₹<?php  echo number_format($totalfprice-$disamount); ?>
                        </div>
                        <div class="clear"></div>
                    </div> 
                    <div class="price-detail-save">You will save ₹24,550 on this order</div>   
                </div>
                
                <div class="clear"></div>
                <div class="mt-3">
                    <a href="checkout.php">
                        <input type="button" class="testimonial-touch-buttn1" value="Place Order">
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

Hello






<?php } ?>

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



<script type="text/javascript">
    
    function updateqty(type,cartid,price){

        //-
        if(type==1){
                   //2-1=1


            if(parseInt($("#cartqty"+cartid).val())>1) {        
                var t=parseInt($("#cartqty"+cartid).val())-1;  //2-1=1

                var f=t*price;

                $("#cartqty"+cartid).val(t);
            }
            else{
                alert("Your Quantity Must greater then one....");
            }
        }
        else if(type==2){
             var t=parseInt($("#cartqty"+cartid).val())+1;
            var f=t*price;
            $("#cartqty"+cartid).val(t);
        }

        $("#finaltotal"+cartid).html(f);



    }


    function updateCart(cartid){
        var qty=parseInt($("#cartqty"+cartid).val());
        var cid=cartid;
        window.location="cart.php?cid="+cid+"&qty="+qty;
        //cart.php?cid=1&qty=5;
    }
</script>