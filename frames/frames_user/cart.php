<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style3.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&:wght@400family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<!-- navigation start -->
<?php include 'navbar.php'; ?>
<!-- navigation end -->
<!-- the box -->
<div id="cart_product_container" class="cart_product_container1 mt-3 d-flex justify-content-evenly">
    <div id="cart_product_details" class="cart_product_details mt-3 p-3">
        <div class="pb-2 border-bottom">My Cart (<span id="total_item"></span> item) <button onclick="clearCart()" class="btns" style="font-size: 11px;color: #0086ff;font-weight: 500;">CLEAR CART</button></div>
        <div style="overflow:auto;height:85%">
        <table class="table">
        <thead>
            <tr>
            <th scope="col" style="width:70%;color:#979baa;font-weight: 700;font-size: 14px;">Item(s) Details</th>
            <th class="text-center" scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Quantity</th>
            <th class="text-center" scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Amount</th>
            </tr>
        </thead>
        <tbody id="cart-items">
            
        </tbody>
        </table>
        </div>
        <button type="button" onclick="window.location.href = 'search.php';" class="btn btn-outline-primary my-3 mx-1 px-4"><i class="mb-1" id="search_icon" data-feather="chevron-left"></i>CONTINUE SHOPPING</button>
    </div>
    <div id="cart_product_amount_details" class="cart_product_amount_details mt-3">
        <div class="d-flex flex-coloumn justify-content-between mt-3 px-3">
            <div style="color:#979baa;font-weight: 700;font-size: 14px;">Item(s) Total</div>
            <div style="color:#979baa;font-weight: 700;font-size: 14px;" id="total_cost">₹0</div>
        </div>
        <div class="d-flex flex-coloumn justify-content-between mt-3 px-3">
            <div style="color:#979baa;font-weight:500;font-size: 14px;">Delivery Charge</div>
            <div style="color:#979baa;font-weight:500;font-size: 14px;">₹100</div>
        </div>
        <hr class="my-3 self" style="width:90%;margin:auto;border-top:2px dotted;">
        <div class="d-flex flex-coloumn justify-content-between px-3">
            <div style="color:#333;font-weight:500;font-size: 16px;">Amount Payable</div>
            <div style="color:#333;font-weight:500;font-size: 16px;" id="total_payable">₹100</div>
        </div>
        <div class="d-flex flex-coloumn justify-content-center mt-4 mb-3 px-3">
            <button onclick="window.location.href = 'checkout.php';" type="button" class="btn btn-primary py-2" style="width:100%">Checkout</button>
        </div>
    </div>


    <div id="cart_no_product" class="justify-content-center align-items-center flex-column" style="width:30%;height:auto;background-color:white;overflow:hidden;">
        <div>
            <img src="assests/cart/cart-icon.webp" style="max-width: 100%; max-height: 100%; object-fit: contain;">
        </div>
        <div class="px-3 mt-3">
            <div style="color:#414e5a;font-weight:500;font-size: 20px;">Your Cart is Empty</div>
        </div>
        <div class="px-3 mt-3">
            <div style="color:#7d7d7d;font-weight:500;font-size: 14px;">Looks Like You haven't made Your Choice Yet</div>
        </div>
        <button type="button" onclick="window.location.href = 'search.php';" class="btn btn-primary mt-3 mb-3 px-3" style="width:55%">Start Shopping</button>
    </div>

</div>
<!-- the box end -->
<script src="script3.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>