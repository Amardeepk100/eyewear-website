<!DOCTYPE html>
<html lang="en">
<?php 
    include '_dbconnect.php';
?>
<head>
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>                
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&:wght@400family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
<!-- navigation start -->
<?php include 'navbar.php'; ?>
<!-- navigation end -->

<div style="margin:auto; width:70%;">
  <!--carousel-->
  <div id="carousel_banner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assests/carousel/slide1.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assests/carousel/slide2.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assests/carousel/slide3.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assests/carousel/slide4.webp" class="d-block w-100" alt="...">
      </div>
    </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel_banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icons" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel_banner" data-bs-slide="next">
        <span class="carousel-control-next-icons" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>
  <!--carousel end-->

  <!--eyeglasses section-->
  <div id="eyeglasses">
    <p class="text-center mb-5" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">Eyeglasses</p>
    <div class="eyeglasses_image_container">
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Eyeglasses">
        <button class="btns" name="frame_shape" value="Cat Eye" type="submit">
          <div class="eyeglasses_image" style="background-image:url('assests/eyeglasses/eyeglasses1.webp')"></div>
          <p class="text-center mt-3 fs-5">Cat Eye</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Eyeglasses">
        <button class="btns" name="frame_shape" value="Oval" type="submit">
          <div class="eyeglasses_image" style="background-image:url('assests/eyeglasses/eyeglasses2.webp')"></div>
          <p class="text-center mt-3 fs-5">Oval</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Eyeglasses">
        <button class="btns" name="frame_shape" value="Square" type="submit">
          <div class="eyeglasses_image" style="background-image:url('assests/eyeglasses/eyeglasses3.webp')"></div>
          <p class="text-center mt-3 fs-5">Square</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Eyeglasses">
        <button class="btns" name="frame_shape" value="Aviator" type="submit">
          <div class="eyeglasses_image" style="background-image:url('assests/eyeglasses/eyeglasses4.webp')"></div>
          <p class="text-center mt-3 fs-5">Aviator</p>
        </button>
      </form>
    </div>
  </div>
  <!--eyeglasses section end-->
  <!--sunglasses section-->
  <div id="sunglasses">
    <p class="text-center mb-5" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">Sunglasses</p>
    <div class="sunglasses_image_container">
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Sunglasses">
        <button class="btns" name="frame_shape" value="Cat Eye" type="submit">
          <div class="sunglasses_image" style="background-image:url('assests/sunglasses/sunglasses1.webp')"></div>
          <p class="text-center mt-3 fs-5">Cat Eye</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Sunglasses">
        <button class="btns" name="frame_shape" value="Oval" type="submit">
          <div class="sunglasses_image" style="background-image:url('assests/sunglasses/sunglasses2.webp')"></div>
          <p class="text-center mt-3 fs-5">Oval</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Sunglasses">
        <button class="btns" name="frame_shape" value="Aviator" type="submit">
          <div class="sunglasses_image" style="background-image:url('assests/sunglasses/sunglasses3.webp')"></div>
          <p class="text-center mt-3 fs-5">Aviator</p>
        </button>
      </form>
      <form action="search.php" method="POST">
        <input type="hidden" name="product_type" value="Sunglasses">
        <button class="btns" name="frame_shape" value="Wayfarer" type="submit">
          <div class="sunglasses_image" style="background-image:url('assests/sunglasses/sunglasses4.webp')"></div>
          <p class="text-center mt-3 fs-5">Wayfarer</p>
        </button>
      </form>
    </div>
  </div>
  <!--sunglasses section end-->
  <hr style="color:gray">
  <!--brands-->
  <div id="brands">
    <p class="text-center mb-5" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">Brands</p>
    <div class="brands_container d-flex justify-content-around">
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand1.webp');"></div>
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand2.webp');"></div>
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand3.webp');"></div>
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand4.webp');"></div>
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand5.webp');"></div>
      <div class="brand_image mx-3" style="background-image: url('assests/brands/brand6.webp');"></div>
    </div>
  </div>
  <br>
  <!--brands end-->
  <hr style="color:gray">
  <!--product cards section-->
  <?php
    $sql_view_collection = "SELECT * FROM `products` ORDER BY RAND() LIMIT 6;";
    $result_view_collection = mysqli_query($conn,$sql_view_collection);
  ?>
  <div id="product_cards">
    <p class="text-center mb-5" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">Our Collection</p>
    <div class="product_card d-flex align-items-center">
      <div class="owl-carousel owl-carousel1 owl-theme">
        <?php
          if (mysqli_num_rows($result_view_collection) > 0) 
          {
              while($row_view_collection = mysqli_fetch_assoc($result_view_collection))
              {
                  $view_product_id_collection = $row_view_collection['product_id'];
                  $view_brand_name_collection = $row_view_collection['brand'];
                  $view_model_no_collection = $row_view_collection['model_no'];
                  $view_product_type_collection = $row_view_collection['product_type'];
                  $view_product_price_collection = $row_view_collection['product_price'];
                  $view_product_image_collection = $row_view_collection['image_paths'];
                  $firstImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_collection)[0];
                  $firstImagePath = str_replace('#', '%23', $firstImagePath_with_hash);

                  echo <<<result
                  <div class="product_item">
                    <form action="product.php" method="POST">
                      <button class="btn2" name="selected_product_from_search" value="$view_product_id_collection" type="submit">
                      <div class="product_bg_image" style="background-image: url('$firstImagePath');">
                        <div class="blur_layer d-flex align-items-center">
                          <div class="product_image" style="background-image: url('$firstImagePath');"></div>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <span class="mt-3" style="font-size:16px;color:#212121">$view_brand_name_collection $view_model_no_collection</span>
                        <span class="mt-1" style="font-size:16px;color:414E51;font-weight:700">₹$view_product_price_collection</span>
                      </div>
                      </button>
                    </form>
                  </div>
                  result;
              }
          }
        ?>
      </div>
      <div class="product_prev align-self-center"></div>
      <div class="product_next align-self-center"></div>
    </div>
  </div>
  <!--product cards section end-->
  <hr style="color:gray">
  <!--brag-->
  <div id="brag">
    <p class="text-center mb-5" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">What Makes Us Stand Apart?</p>
    <div class="brag_container d-flex justify-content-around">
      <div class="d-flex flex-column">
        <div class="brag_image align-self-center" style="background-image: url('assests/brag/brag1.webp');"></div>
        <div class="text-center py-5 fs-5">Wide Variety</div>
      </div>
      <div class="d-flex flex-column">
        <div class="brag_image align-self-center" style="background-image: url('assests/brag/brag2.webp');"></div>
        <div class="text-center py-5 fs-5">100% Genuine</div>
      </div>
      <div class="d-flex flex-column">
        <div class="brag_image align-self-center" style="background-image: url('assests/brag/brag3.webp');"></div>
        <div class="text-center py-5 fs-5">Reasonable Price</div>
      </div>
      <div class="d-flex flex-column">
        <div class="brag_image align-self-center" style="background-image: url('assests/brag/brag4.webp');"></div>
        <div class="text-center py-5 fs-5">Premium Eyewear</div>
      </div>
    </div>
  </div>
  <!--brag end-->
  <hr style="color:gray">
  <!--About us-->
  <div id="about_us">
    <div class="d-flex justify-content-around">
      <div class="about_us_image mx-3" style="background-image: url('assests/about_us/about_us.webp');"></div>
      <div class="about_us_text mx-3">
      <p class="text-center my-2" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px;">About Us</p>
        <div class="text-center" style="font-size:18px; overflow:hidden;">
          We, The Elite Eyewear situated at Mahatma Gandhi Road, Mantralaya, Fort, Mumbai, has evolved over the years and we have achieved milestones as being one of the Largest Distributors of Eyewear in India. Our mission is to be the premier shopping and inspiration destination for the top brands, latest trends and exclusive styles of high quality fashion and performance eyewear. After all, eyewears aren't just a means to an end, they're part of your identity. We work hard to help you find frames that fit your style. Our team of highly skilled team will make sure you are guided properly, when you are selecting your eye wear.
        </div>
      </div>
    </div>
  </div>
  <!--About us end-->
  <hr style="color:gray">
  <!--testimonials-->
  <div id="testimonials">
    <div style="display:flex;">
      <div class="testimonials_image" style="background-image: url('assests/testimonials/testimonials.webp');"></div>
      <div class="testimonials_quote mx-5 d-flex align-items-center">
        <div class="owl-carousel owl-carousel2 owl-theme">
          <div class="testimonial_item d-flex flex-row">
            <div class="align-self-start m-2 quote_icon"><img src="assests/testimonials/quote_icon.png"></img></div>
            <div class="d-flex flex-column m-2" style="width:85%">
              <span class="quote_name">Praful Joshi</span>
              <span class="quote_text">They have a wide range of glasses of various qualities that fit my budget.</span>
            </div>
          </div>
          <div class="testimonial_item d-flex flex-row">
            <div class="align-self-start m-2 quote_icon"><img src="assests/testimonials/quote_icon.png"></img></div>
            <div class="d-flex flex-column m-2" style="width:85%">
              <span class="quote_name">Devesh Pillai</span>
              <span class="quote_text">The staff is very helpful, they made sure I get a frame of my liking.</span>
            </div>
          </div>
          <div class="testimonial_item d-flex flex-row">
            <div class="align-self-start m-2 quote_icon"><img src="assests/testimonials/quote_icon.png"></img></div>
            <div class="d-flex flex-column m-2" style="width:85%">
              <span class="quote_name">Kshitij Sharma</span>
              <span class="quote_text">Found the perfect frame that fits my frame nicely and enhances my features.</span>
            </div>
          </div>
        </div>
        <div class="testimonial_prev align-self-center"></div>
        <div class="testimonial_next align-self-center"></div>
      </div>
    </div>
  </div>
  <!--testimonials end-->
  <!--contact us-->
  <div id="contact_us" style="padding-bottom: 200px;">
    <div class="d-flex justify-content-evenly">
      <iframe class="mx-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5337.330999160872!2d72.82929923841688!3d18.92860790040725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1c31de0a5d9%3A0x7a593c99f631b64f!2sUniversity%20of%20Mumbai!5e0!3m2!1sen!2sin!4v1692991122739!5m2!1sen!2sin" width="50%" height="auto" style="box-shadow: 0px 0px 20px -5px #111; border-radius:15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div class="d-flex flex-column">
        <p class="text-center mb-4" style="font-family: Adamina; color: rgb(18, 70, 143); font-size: 36px; line-height: 1.4;">Contact Us</p>
        <div class="contact_us_items d-flex flex-row mb-4">
          <div class="contact_us_image mx-3"><img src="assests/contact_us/contact_us1.webp" style="width:100%;height:100%;"></img></div>
          <div class="d-flex flex-column mx-3">
            <span class="contact_us_name my-1">Our Office Address</span>
            <span class="contact_us_text my-1">Mahatma Gandhi Road, Mantralaya, Fort, Mumbai, Maharashtra 400032</span>
          </div>
        </div>
        <div class="contact_us_items d-flex flex-row mb-4">
          <div class="contact_us_image mx-3"><img src="assests/contact_us/contact_us2.png" style="width:100%;height:100%;"></img></div>
          <div class="d-flex flex-column mx-3">
            <span class="contact_us_name my-1">General Enquiries</span>
            <span class="contact_us_text my-1">amardeepk100@gmail.com</span>
          </div>
        </div>
        <div class="contact_us_items d-flex flex-row mb-4">
          <div class="contact_us_image mx-3"><img src="assests/contact_us/contact_us3.webp" style="width:100%;height:100%;"></img></div>
          <div class="d-flex flex-column mx-3">
            <span class="contact_us_name my-1">Call Us</span>
            <span class="contact_us_text my-1">+91-8888888888</span>
          </div>
        </div>
        <div class="contact_us_items d-flex flex-row mb-4">
          <div class="contact_us_image mx-3"><img src="assests/contact_us/contact_us4.webp" style="width:100%;height:100%;"></img></div>
          <div class="d-flex flex-column mx-3">
            <span class="contact_us_name my-1">Our Timing</span>
            <span class="contact_us_text my-1">Mon - Sun : 09:00 AM - 10:00 PM</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--contact us end-->
</div>
</body>
<script>feather.replace()</script>
<script src="script.js"></script>
</html>