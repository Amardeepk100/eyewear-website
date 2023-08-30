<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
<!--the box-->
<?php

  $product_id = $_POST['selected_product_from_search'];
  $sql_view_product_search = "SELECT * FROM `products` WHERE `product_id`= '$product_id'";
  $result_view_product_search = mysqli_query($conn,$sql_view_product_search);

  if (mysqli_num_rows($result_view_product_search) > 0)
  {
    while($row_view_product_search = mysqli_fetch_assoc($result_view_product_search))
    {
      $view_brand_name_search = $row_view_product_search['brand'];
      $view_product_price_search = $row_view_product_search['product_price'];
      $view_product_type_search = $row_view_product_search['product_type'];
      $view_product_model_no_search = $row_view_product_search['model_no'];
      $view_product_image_search = $row_view_product_search['image_paths'];
      $view_product_color_code_search = $row_view_product_search['product_color'];

      $firstImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_search)[0];
      $firstImagePath = str_replace('#', '%23', $firstImagePath_with_hash);
      $secondImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_search)[1];
      $secondImagePath = str_replace('#', '%23', $secondImagePath_with_hash);
      $thirdImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_search)[2];
      $thirdImagePath = str_replace('#', '%23', $thirdImagePath_with_hash);
    }
  }

  $sql_view_color_search = "SELECT `color_name` FROM `product_color` WHERE `color`= '$view_product_color_code_search'";
  $result_view_color_search = mysqli_query($conn,$sql_view_color_search);

  if (mysqli_num_rows($result_view_color_search) > 0)
  {
    while($row_view_color_search = mysqli_fetch_assoc($result_view_color_search))
    {
      $view_product_color_search = $row_view_color_search['color_name'];
    }
  }

?>
<div class="selected_product_container mt-5 d-flex flex-row" style="margin-top:6rem!important;">
  <div class="selected_product border-end d-flex justify-content-center align-items-center">
    <div class="border border-secondary d-flex justify-content-center align-items-center" style="height:92%;width:95%;border-color:#dee2e6 !important;border-radius:10px;">
      <!--carousel -->
      <div style="margin:auto; width:85%; oveflow:hidden;">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo $firstImagePath;?>" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo $secondImagePath;?>" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo $thirdImagePath;?>" class="d-block w-100 img-fluid" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icons" style="position:absolute;left:-100%" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icons" style="position:absolute;right:-100%" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!--carousel end -->
    </div>
  </div>
  <div class="selected_product_details">
    <div class="p-5">
      <span class="fs-5" style="color:#1f1f1f;font-weight: 400;"><?php echo $view_brand_name_search;?></span>
      <span class="fs-5" style="color:#1f1f1f;font-weight: 400;"><?php echo $view_product_model_no_search;?></span>
      <span class="fs-5" style="color:#1f1f1f;font-weight: 400;"><?php echo $view_product_color_search;?></span>
      <span class="fs-5" style="color:#1f1f1f;font-weight: 400;"><?php echo $view_product_type_search?></span>
      <div class="fs-3 py-4" style="color:#333;font-weight: 500;">₹<?php echo $view_product_price_search?></div>
      <form action="cart.php" method="POST">
        <div class="my-2">
          <div class="mx-1" style="font-weight:400;color:#666;font-size:14px;">Quantity</div>
          <select id="quantitySelect" class="form-select form-select-sm my-1" style="width:350px" aria-label=".form-select-sm example">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <div class="mx-1" style="font-weight:470;color:#333;font-size:14px;">Select number of quatities to be delivered</div>
        </div>
        <div class="pt-4">
          <button onclick="addToCart()" type="button" class="btn btn-primary px-5 py-2 me-3"><span class="mb-1" data-feather="shopping-cart"></span> Add to Cart</button>
          <button onclick="addToCart(); setTimeout(function() { window.location.href = 'cart.php'; }, 500);" type="button" class="btn btn-primary px-5 py-2"><span class="mb-1" data-feather="play"></span> Buy Now</button>
        </div>
      </form>
      <div class="pt-3">
        <div class="mx-1" style="font-weight:500;color:#333;font-size:16px;"><span class="mb-1" data-feather="shield"></span> Safe and Secure payments.100% Authentic products</div>
      </div>
    </div>
  </div>
</div>
<!--box end-->
<script>
  function addToCart() {
    // Retrieve the necessary information from PHP variables
    var productId = <?php echo $product_id; ?>;
    var brandName = <?php echo json_encode($view_brand_name_search); ?>;
    var modelNo = <?php echo json_encode($view_product_model_no_search); ?>;
    var color = <?php echo json_encode($view_product_color_search); ?>;
    var type = <?php echo json_encode($view_product_type_search); ?>;
    var price = <?php echo $view_product_price_search; ?>;
    var image = <?php echo json_encode($firstImagePath); ?>;

    // Retrieve the selected quantity
    var quantitySelect = document.getElementById('quantitySelect');
    var quantity = parseInt(quantitySelect.value);

    // Check if the product already exists in the cart
    var cartItems = JSON.parse(localStorage.getItem('cart')) || {}; // Retrieve existing cart items from local storage

    if (cartItems[productId]) {
      // Product already exists in the cart, check the quantity
      var existingQuantity = cartItems[productId].quantity;
      var totalQuantity = existingQuantity + quantity;

      if (totalQuantity <= 3) {
        // Quantity is less than or equal to 3, update the quantity and show a success message
        cartItems[productId].quantity = totalQuantity;
        localStorage.setItem('cart', JSON.stringify(cartItems));
        alert('Quantity added to cart!');
      } else {
        // Quantity exceeds the limit of 3, show an error message
        alert('Maximum limit per item is 3!');
      }
    } else {
      // Product doesn't exist in the cart, add it with the quantity
      cartItems[productId] = {
        brandName: brandName,
        modelNo: modelNo,
        color: color,
        type: type,
        price: price,
        quantity: quantity,
        image: image
      };

      // Update the local storage with the new cart items
      localStorage.setItem('cart', JSON.stringify(cartItems));

      // Show a success message or perform any other desired action
      alert('Product added to cart!');
    }
  }
</script>
<script>feather.replace()</script>
</body>
</html>