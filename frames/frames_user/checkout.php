<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
  session_start();

    if (!isset($_SESSION['user_email'])) {
        // Redirect the user to the cart page or login page
        header('Location: home.php');
        exit;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
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
<body onload="displayLocalStorageValues()">
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $productIds = $_POST['product_ids'];
    $productQuantities = $_POST['product_quantities'];
    $customerId = $_POST['customer_id'];
    $totalAmount = $_POST['total_amount'];
    $paymentStatus = $_POST['payment_mode'];
    $deliveryStatus = $_POST['delivery_status'];

    // Prepare the SQL statement
    $insert_order = "INSERT INTO orders (product_ids, product_quantities, customer_id, total_amount, payment_status, delivery_status)
    VALUES ('$productIds', '$productQuantities', '$customerId', '$totalAmount', '$paymentStatus', '$deliveryStatus')";

    // Execute the query
    if ($conn->query($insert_order) === TRUE) {
    echo <<<alert
    <script>localStorage.removeItem("cart");
    window.location.href = 'order_history.php';
    </script>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Order placed <strong>successfully</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    
    } else {
    echo <<<alert
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Something went <strong>wrong</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    }
}
?>

<div class=" mt-5 cart_product_container1 cart_product_container2 d-flex flex-column justify-content-center">
    <form method="POST">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center pt-3 my-3" style="color: rgb(18, 70, 143); font-size: 30px; line-height: 1.4;">Select payment method</div>
        <div style="width:20%;margin:auto;">
        <div class="form-check">
            <input value="0" class="form-check-input fs-5" type="radio" name="payment_mode" id="cod">
            <label class="form-check-label fs-5" for="cod">
            Cash on delivery
            </label>
        </div>
        <div class="form-check">
            <input value="1" class="form-check-input fs-5" type="radio" name="payment_mode" id="online" checked>
            <label class="form-check-label fs-5" for="online">
            Pay Online
            </label>
        </div>

        <input type="hidden" name="product_ids" id="product_ids" required>
        <input type="hidden" name="customer_id" id="customer_id" required value="<?php echo $_SESSION['user_email']; ?>">
        <input type="hidden" name="product_quantities" id="product_quantities" required>
        <input type="hidden" name="delivery_status" id="delivery_status" value="Order Received">
        <input type="hidden" name="total_amount" id="total_amount">

        <div class="d-flex flex-coloumn justify-content-center mt-4 mb-3 px-3">
            <button type="submit" class="btn btn-primary py-2" style="width:100%">Done</button>
        </div>
        <script>
            function displayLocalStorageValues() {
                var cartData = localStorage.getItem('cart');
                var customerEmail = '<?php echo isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : "" ?>';

                if (cartData && cartData !== '{}') {
                var cart = JSON.parse(cartData);
                var productIds = [];
                var productQuantities = [];
                var totalAmount = 0;

                for (var productId in cart) {
                    if (cart.hasOwnProperty(productId)) {
                    var productInfo = cart[productId];
                    var quantity = productInfo.quantity;
                    var price = productInfo.price;

                    productIds.push(productId);
                    productQuantities.push(quantity);

                    // Calculate the total amount for each product
                    var productAmount = price * quantity;
                    totalAmount += productAmount + 100;
                    }
                }

                document.getElementById('product_ids').value = productIds.join(',');
                document.getElementById('product_quantities').value = productQuantities.join(',');
                document.getElementById('customer_id').value = customerEmail;
                document.getElementById('total_amount').value = totalAmount.toFixed(2);

                // Submit the form
                } else {
                // Redirect the user to the cart page
                window.location.href = 'cart.php';
                }
            }
            </script>
        </div>
    </div>
    </form>
<div>
<script src="script3.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>