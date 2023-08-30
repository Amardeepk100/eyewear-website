<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3d Try On</title>
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
    <div id="cart_product_details" style="width: 70%; height: max-content;" class="cart_product_details mt-3 p-3 d-flex flex-column justify-content-center">
        <div id="video_container" style="height:30rem" class="d-flex justify-content-center mt-3">
            <video style="width: 100%;" id="video" autoplay></video>
            <canvas id="canvas_oval"></canvas>
        </div>
        <button style="width:50%;margin:auto;" type="button" class="btn btn-outline-primary mt-4 my-3" id="capture-btn" onclick="onCaptureClick()">Capture Image</button>
    </div>
    <div id="cart_product_amount_details" style="width: 25%;" class="cart_product_amount_details mt-3 d-flex flex-column justify-content-center align-item-center">
        <div class="p-3" style="width:100%;height:100%" id="instructions_display">
            <ul><b class="fs-5">Instructions</b>
                <li style="color:#495057;">Align your face inside the red oval.</li>
                <li style="color:#495057;">Look straight at the camera with a relaxed face.</li>
                <li style="color:#495057;">Make sure thier is plenty of light in the room.</li>
                <li style="color:#495057;">If everything goes smoothly, you will see a button that will allow you to continue to the product page.</li>
            </ul>
        </div>
        <canvas style="display:none" class="p-3" style="width:100%;height:100%" id="canvas_display"></canvas>
        <div style="display:none" id="image-container"></div>
        <button style="width:50%;margin:auto;display:none;" type="button" class="btn btn-primary mt-1 mb-3" id="continue-capture" onclick="ReDirect()">Continue</button>
    </div>
</div>
<!-- the box end -->
<script src="https://docs.opencv.org/master/opencv.js" async></script>
<script src="3D_try_on.js" async></script>
<script>
    feather.replace()
</script>
</body>
</html>