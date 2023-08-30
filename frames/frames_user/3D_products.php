<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3d Try On</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="3D_try_on.css">
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
    <div id="cart_product_details" style="width: 100%; height: max-content;" class="cart_product_details mt-3 mb-3 p-3 d-flex flex-column justify-content-center">
        <img style="display:none" id="cap_img" src="" alt="Captured Image">
        <form id="3d_products" class="row" action="product.php" method="POST">
            <!-- <div class="col-md-4">
                <div class="product_box m-4">
                    <button class="btns" name="selected_product_from_search" value="$view_product_id_home" type="submit">
                    <div class="image-container d-flex justify-content-center align-items-center p-3" style="width:100%;height:18rem;overflow:hidden;">
                        <canvas id="canvasOutput" class="img-fluid"></canvas>
                    </div>
                    <div class="product_name fs-5 px-3 pb-3">John Jacobs</div>
                    <div class="product_price fs-6 px-3 pb-3">₹4200</div>
                    </button>
                </div>
            </div> -->
        </form>
        <!-- <canvas id="canvasOutput"></canvas> -->
        <script src="https://docs.opencv.org/master/opencv.js"></script>
        <script src="3D_products.js"></script>
        <script>
            if (localStorage.getItem('Try_On_Image') !== null) {
                // Retrieve the image data URL from local storage
                var imageData = localStorage.getItem('Try_On_Image');
                document.getElementById('cap_img').src = imageData;
                
                onOpenCvScriptLoad() 

                // The key exists in local storage
                console.log('Key exists');
            }
            else {
                // The key does not exist in local storage
                console.log('Key does not exist');
            }
        </script>
    </div>
</div>
<!-- the box end -->
<script>
    feather.replace()
</script>
</body>
</html>