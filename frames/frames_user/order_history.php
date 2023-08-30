<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
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
        <div class="pb-2 border-bottom">My Orders</div>
        <div style="overflow:auto;height:85%">
        <table class="table">
        <thead>
            <tr>
            <th scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Order Details</th>
            <th scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Items</th>
            <th class="text-center" scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Amount</th>
            <th class="text-center" scope="col" style="color:#979baa;font-weight: 700;font-size: 14px;">Order status</th>
            </tr>
        </thead>
        <tbody id="cart-items">
        <?php
                    // Retrieve orders from the database
                    $userEmail = $_SESSION['user_email'];
                    $query = "SELECT * FROM orders WHERE customer_id = '$userEmail'";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $orderId = $row['order_id'];
                            $orderDate = $row['order_date_time'];
                            $productIds = explode(',', $row['product_ids']);
                            $productQuantities = explode(',', $row['product_quantities']);
                            $totalAmount = $row['total_amount'];
                            $orderStatus = $row['delivery_status'];
                            ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex" style="width: 100%; height: 100%;">
                                        <div class="d-flex flex-column justify-content-center p-2">
                                            <div class="p-1" style="font-size: 18px; color: rgb(21, 21, 21); font-weight: 600;">Order Id: <?php echo $orderId; ?></div>
                                            <div class="p-1" style="font-size: 16px; color: rgb(51, 51, 51);">Date: <?php echo $orderDate; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div id="<?php echo $orderId ?>" class="text-center d-flex flex-column">
                                        <?php
                                        // Retrieve product details
                                        foreach ($productIds as $index => $productId) {
                                            $quantity = $productQuantities[$index];
                                            $productQuery = "SELECT * FROM products WHERE product_id = '$productId'";
                                            $productResult = $conn->query($productQuery); // Changed variable name to $productResult
                                            if ($productResult->num_rows > 0) {
                                                $product = $productResult->fetch_assoc();
                                                $productName = $product['model_no'];
                                                $productImage = $product['image_paths'];
                                                $productImage = "../frames_admin/".explode(',', $productImage)[0];
                                                $firstImagePath = str_replace('#', '%23', $productImage);
                                                echo <<<output
                                                    <script>
                                                        var productItems = document.getElementById("$orderId");
                                                        // Create the HTML code to be appended
                                                        var htmlCode = `
                                                            <div class="d-flex flex-row">
                                                                <div class="d-flex p-1" style="height: 100px; width: 100px; overflow: hidden;">
                                                                    <img class="align-self-center" src="${firstImagePath}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                                </div>
                                                            <div class="align-self-center mx-5" >${productName} (Quantity: ${quantity})
                                                            </div>
                                                        `;
                                                        productItems.innerHTML += htmlCode;
                                                    </script>
                                                output;
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="text-center total_cost" id="amount"><?php echo $totalAmount; ?></div>
                                </td>
                                <td class="align-middle">
                                    <div class="text-center"><?php echo $orderStatus; ?></div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        // No orders found
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">No orders found.</td>
                        </tr>
                        <?php
                    }
                    ?>
        </tbody>
        </table>
        </div>
        <button type="button" onclick="window.location.href = 'search.php';" class="btn btn-outline-primary my-3 mx-1 px-4"><i class="mb-1" id="search_icon" data-feather="chevron-left"></i>CONTINUE SHOPPING</button>
    </div>

</div>
<!-- the box end -->
<script>
    feather.replace()
</script>
</body>
</html>