<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>                
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
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
<!-- body -->
<?php
  $sql_view_product_material = "SELECT * FROM `product_material`";
  $result_view_product_material = mysqli_query($conn,$sql_view_product_material);
  $product_material_count = mysqli_num_rows( $result_view_product_material);

  $sql_view_product_brand = "SELECT * FROM `product_brand`";
  $result_view_product_brand = mysqli_query($conn,$sql_view_product_brand);
  $product_brand_count = mysqli_num_rows( $result_view_product_brand);

  $sql_view_product_color = "SELECT * FROM `product_color`";
  $result_view_product_color = mysqli_query($conn,$sql_view_product_color);
  $product_color_count = mysqli_num_rows( $result_view_product_color);
?>
<div class="main_body d-flex flex-row">
  <!-- side body -->
  <form class="side_body ps-2 border-end">
    <div class="filter_headings my-1 px-1">PRODUCT TYPE</div>
    <div id="product_type" style="height:auto; overflow: auto;" class="px-1">
    </div>
    <div class="filter_headings my-1 px-1">FRAME SHAPE</div>
    <div id="frame_shape" style="height:auto; overflow: auto;" class="px-1">
    </div>
    <div class="filter_headings my-1 px-1">FRAME TYPE</div>
    <div id="frame_type" style="height:auto;overflow: auto;" class="px-1">
    </div>
    <div class="filter_headings my-1 px-1">GENDER</div>
    <div id="gender" style="height:auto;overflow: auto;" class="px-1">
    </div>
    <div class="filter_headings my-1 px-1">MATERIAL</div>
    <div style="height:30vh;overflow:auto;" class="px-1" class="px-1">
    <script src="script2.js"></script>
      <?php
        while($row_view_material_name = mysqli_fetch_assoc($result_view_product_material))
        {
        $view_material_name = $row_view_material_name['material_name'];
        echo <<<tr
        <div class="form-check">
            <input class="form-check-input common_selector material_filter" type="checkbox" value="$view_material_name" id="$view_material_name">
            <label class="form-check-label filter_text" for="$view_material_name">
              $view_material_name
            </label>
        </div>
        tr;
        }
      ?>
    </div>
    <div class="filter_headings my-1 px-1">COLOUR</div>
    <div style="height:20vh;overflow: auto;" class="px-1">
        <?php
          while($row_view_product_color = mysqli_fetch_assoc($result_view_product_color))
          {
          $view_color_name = $row_view_product_color['color_name'];
          $view_color = $row_view_product_color['color'];
          echo <<<tr
          <div class="form-check">
            <input class="form-check-input common_selector color_filter" type="checkbox" value="$view_color" id="$view_color_name">
            <label class="form-check-label filter_text" for="$view_color_name">
              $view_color_name
            </label>
          </div>
          tr;
          }
        ?>
    </div>
    <div class="filter_headings my-1 px-1">BRAND</div>
    <div style="height:30vh;overflow:auto;" class="px-1">
      <?php
        while($row_view_brand_name = mysqli_fetch_assoc($result_view_product_brand))
        {
        $view_brand_name = $row_view_brand_name['brand_name'];
        echo <<<tr
        <div class="form-check">
            <input class="form-check-input common_selector brand_filter" type="checkbox" value="$view_brand_name" id="$view_brand_name">
            <label class="form-check-label filter_text" for="$view_brand_name">
              $view_brand_name
            </label>
        </div>
        tr;
        }
      ?>
    </div>
  </form>
  <!-- side body end-->
  <!-- product body -->
    <div class="product_body">
      <div class="d-flex justify-content-between sticky-top" style="width:100%; background-color:#ededed; z-index:auto">
        <div class="align-self-center ps-1" id="selected-filters"></div>
        <form id="sort_form" method="post" action="search.php" width="200%" class="d-flex flex-row">
          <input type="hidden" class="form-control" id="search" name="search" value="<?php echo $search_results?>">
          <input type="hidden" class="form-control" id="product_type" name="product_type" value="<?php echo $product_type_home?>">
          <input type="hidden" class="form-control" id="frame_shape" name="frame_shape" value="<?php echo $frame_shape_home?>">
          <span style="width:50%" class="align-self-center px-1">Sort By</span>
          <select id="sort_option" name="sort_option" class="common_selector form-select form-select-sm my-1 align-self-center mx-1" aria-label="Default select example">
            <option selected value="new"></option>
            <option value="new">New</option>
            <option value="l2h">Price:low to high</option>
            <option value="h2l">Price:high to low</option>
          </select>
          </form>
          <script>
            document.getElementById("sort_option").addEventListener("change", function() {
              var form = document.getElementById("sort_form");
              form.submit();
            });
          </script>
      </div>
      <form action="product.php" method="POST" class="row filter_data">
      <!-- filteration -->
      <script>
        $(document).ready(function()
        {
          function filter_data()
          {
            var action = 'fetch_data';
            var product_type = get_filter('product_type_filter')
            var frame_shape = get_filter('frame_shape_filter')
            var frame_type = get_filter('frame_type_filter')
            var gender = get_filter('gender_filter')
            var material = get_filter('material_filter')
            var color = get_filter('color_filter')
            var brand = get_filter('brand_filter')
            var search = "<?php echo $search_results; ?>";
            var sort = "<?php echo $sort; ?>";
            var frame_shape_home = "<?php echo $frame_shape_home; ?>";
            var product_type_home = "<?php echo $product_type_home; ?>";

            $.ajax({
              url:"fetch_data.php",
              method:"POST",
              data:{action:action,product_type:product_type,frame_shape:frame_shape,frame_type:frame_type,gender:gender,material:material,color:color,brand:brand,search:search,sort:sort,frame_shape_home:frame_shape_home,product_type_home:product_type_home},
              success:function(data){
                $('.filter_data').html(data);
              }
            });
          }

          function get_filter(class_name)
          {
            var filter = []
            $('.'+class_name+':checked').each(function(){
              filter.push($(this).val());
            });
            return filter;
          }

          $('.common_selector').click(function(){
            filter_data();
          });


          $('#sort_option').change(function() {
            filter_data();
          });

        });
      </script>
      <!-- filteration end -->
      <!-- products will be displayed using catergories, home search or search and sorting -->
      <?php
        if ($product_type_home!="" and $frame_shape_home!="")
        {
          $sql_view_product_home = "SELECT * FROM `products` WHERE `product_type`= '$product_type_home' AND `frame_shape`= '$frame_shape_home'";
          
          if ($sort == 'l2h') 
          {
            $sql_view_product_home .= " ORDER BY product_price ASC";
            echo <<<set
              <script>
              // Get the sort_option select element
              const sortOptionSelect = document.getElementById('sort_option');
              
              // Set the selected option
              const selectedOption = 'l2h'; // Replace with the desired option value
              sortOptionSelect.value = selectedOption;
              </script>
              set;
          }
          elseif ($sort == 'h2l')
          {
            $sql_view_product_home .= " ORDER BY product_price DESC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'h2l'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }
          elseif ($sort == 'new')
          {
            $sql_view_product_home .= " ORDER BY product_id ASC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'new'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }

          $result_view_product_home = mysqli_query($conn,$sql_view_product_home);

          if (mysqli_num_rows($result_view_product_home) > 0)
          {
            while($row_view_product_home = mysqli_fetch_assoc($result_view_product_home))
            {
              $view_product_id_home = $row_view_product_home['product_id'];
              $view_brand_name_home = $row_view_product_home['brand'];
              $view_product_price_home = $row_view_product_home['product_price'];
              $view_product_image_home = $row_view_product_home['image_paths'];
              $firstImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_home)[0];
              $firstImagePath = str_replace('#', '%23', $firstImagePath_with_hash);

              echo <<<result
              <div class="col-md-4">
                <div class="product_box m-4">
                  <button class="btns" name="selected_product_from_search" value="$view_product_id_home" type="submit">
                    <div class="image-container d-flex justify-content-center align-items-center p-5" style="width:100%;height:18rem;overflow:hidden;"><img src="$firstImagePath" class="img-fluid" alt="Your Image"></div>
                    <div class="product_name px-3 pb-3">$view_brand_name_home</div>
                    <div class="product_price px-3 pb-3">₹$view_product_price_home</div>
                  </button>
                </div>
              </div>
              result;
            }
          }
          else
          {
            echo <<<result
            <div class="col-md-4">
              <div class="product_box m-4">
                <div class="product_name px-3 p-3">Sorry</div>
                <div class="product_price px-3 pb-3">No Product Found</div>
              </div>
            </div>
            result;
          }
        }
        else if($search_results !="")
        {
          $search_results = mysqli_real_escape_string($conn, $search_results); 
          $sql_view_product_home = "SELECT * FROM `products` WHERE `brand` LIKE '%$search_results%' OR `model_no` LIKE '%$search_results%' OR `product_type` LIKE '%$search_results%' OR `gender` LIKE '%$search_results%' OR `frame_type` LIKE '%$search_results%' OR `frame_shape` LIKE '%$search_results%' OR `material` LIKE '%$search_results%'";
          
          $sort = @$_POST['sort_option'];
          
          if ($sort == 'l2h') 
          {
            $sql_view_product_home .= " ORDER BY product_price ASC";
            echo <<<set
              <script>
              // Get the sort_option select element
              const sortOptionSelect = document.getElementById('sort_option');
              
              // Set the selected option
              const selectedOption = 'l2h'; // Replace with the desired option value
              sortOptionSelect.value = selectedOption;
              </script>
              set;
          }
          elseif ($sort == 'h2l')
          {
            $sql_view_product_home .= " ORDER BY product_price DESC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'h2l'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }
          elseif ($sort == 'new')
          {
            $sql_view_product_home .= " ORDER BY product_id ASC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'new'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }

          $result_view_product_home = mysqli_query($conn, $sql_view_product_home);

          if (mysqli_num_rows($result_view_product_home) > 0) 
          {
            while($row_view_product_home = mysqli_fetch_assoc($result_view_product_home))
            {
              $view_product_id_home = $row_view_product_home['product_id'];
              $view_brand_name_home = $row_view_product_home['brand'];
              $view_product_price_home = $row_view_product_home['product_price'];
              $view_product_image_home = $row_view_product_home['image_paths'];
              $firstImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_home)[0];
              $firstImagePath = str_replace('#', '%23', $firstImagePath_with_hash);

              echo <<<result
              <div class="col-md-4">
                <div class="product_box m-4">
                  <button class="btns" name="selected_product_from_search" value="$view_product_id_home" type="submit">
                    <div class="image-container d-flex justify-content-center align-items-center p-5" style="width:100%;height:18rem;overflow:hidden;"><img src="$firstImagePath" class="img-fluid" alt="Your Image"></div>
                    <div class="product_name px-3 pb-3">$view_brand_name_home</div>
                    <div class="product_price px-3 pb-3">₹$view_product_price_home</div>
                  </button>
                </div>
              </div>
              result;
            }
          }
          else
          {
            echo <<<result
            <div class="col-md-4">
              <div class="product_box m-4">
                <div class="product_name px-3 p-3">Sorry</div>
                <div class="product_price px-3 pb-3">No Product Found For Your Search</div>
              </div>
            </div>
            result;
          }
        }
        else
        {
          $sql_view_product_home = "SELECT * FROM `products`";
          $sort = @$_POST['sort_option'];
          
          if ($sort == 'l2h') 
          {
            $sql_view_product_home .= " ORDER BY product_price ASC";
            echo <<<set
              <script>
              // Get the sort_option select element
              const sortOptionSelect = document.getElementById('sort_option');
              
              // Set the selected option
              const selectedOption = 'l2h'; // Replace with the desired option value
              sortOptionSelect.value = selectedOption;
              </script>
              set;
          }
          elseif ($sort == 'h2l')
          {
            $sql_view_product_home .= " ORDER BY product_price DESC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'h2l'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }
          elseif ($sort == 'new')
          {
            $sql_view_product_home .= " ORDER BY product_id ASC";
            echo <<<set
            <script>
            // Get the sort_option select element
            const sortOptionSelect = document.getElementById('sort_option');
            
            // Set the selected option
            const selectedOption = 'new'; // Replace with the desired option value
            sortOptionSelect.value = selectedOption;
            </script>
            set;
          }

          $result_view_product_home = mysqli_query($conn,$sql_view_product_home);

          while($row_view_product_home = mysqli_fetch_assoc($result_view_product_home))
          {
            $view_product_id_home = $row_view_product_home['product_id'];
            $view_brand_name_home = $row_view_product_home['brand'];
            $view_product_price_home = $row_view_product_home['product_price'];
            $view_product_image_home = $row_view_product_home['image_paths'];
            $firstImagePath_with_hash = "../frames_admin/".explode(',', $view_product_image_home)[0];
            $firstImagePath = str_replace('#', '%23', $firstImagePath_with_hash);

            echo <<<result
            <div class="col-md-4">
              <div class="product_box m-4">
                <button class="btns" name="selected_product_from_search" value="$view_product_id_home" type="submit">
                  <div class="image-container d-flex justify-content-center align-items-center p-5" style="width:100%;height:18rem;overflow:hidden;"><img src="$firstImagePath" class="img-fluid" alt="Your Image"></div>
                  <div class="product_name px-3 pb-3">$view_brand_name_home</div>
                  <div class="product_price px-3 pb-3">₹$view_product_price_home</div>
                </button>
              </div>
            </div>
            result;
          }
        }
      ?>
      <!-- products will be displayed using catergories, home search or search and sorting END-->
      </form>
    </div>
    <!-- product end -->
<div>
<!-- body end -->
</body>
<script>feather.replace()</script>
<script src="script.js"></script>
</html>