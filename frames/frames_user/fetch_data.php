<?php
include '_dbconnect.php';
if(isset($_POST["action"]))
{
    $search_results =  @$_POST["search"];
    $sort = @$_POST['sort'];
    $product_type_home = @$_POST['product_type_home'];
    $frame_shape_home = @$_POST['frame_shape_home'];
    
    if($search_results !="")
    {
      $search_results = mysqli_real_escape_string($conn, $search_results); 
      $sql_view_product_home = "SELECT * FROM `products` WHERE (`brand` LIKE '%$search_results%' OR `model_no` LIKE '%$search_results%' OR `product_type` LIKE '%$search_results%' OR `gender` LIKE '%$search_results%' OR `frame_type` LIKE '%$search_results%' OR `frame_shape` LIKE '%$search_results%' OR `material` LIKE '%$search_results%')";
      
      if(isset($_POST["product_type"]))
      {
        $frame_shape_filter = implode("','", $_POST["product_type"]);
        $sql_view_product_home .= "AND `product_type` IN ('".@$product_type_filter."')";
      }

      if(isset($_POST["frame_shape"]))
      {
        $frame_shape_filter = implode("','", $_POST["frame_shape"]);
        $sql_view_product_home .= "AND `frame_shape` IN ('".@$frame_shape_filter."')";
      }

      if(isset($_POST["frame_type"]))
      {
        $frame_type_filter = implode("','", $_POST["frame_type"]);
        $sql_view_product_home .= "AND frame_type IN ('".$frame_type_filter."')";
      }
      
      if(isset($_POST["gender"]))
      {
        $gender_filter = implode("','", $_POST["gender"]);
        $sql_view_product_home .= "AND gender IN ('".$gender_filter."')";
      }

      if(isset($_POST["material"]))
      {
        $material_filter = implode("','", $_POST["material"]);
        $sql_view_product_home .= "AND material IN ('".$material_filter."')";
      }

      if(isset($_POST["color"]))
      {
        $color_filter = implode("','", $_POST["color"]);
        $sql_view_product_home .= "AND product_color IN ('".$color_filter."')";
      }

      if(isset($_POST["brand"]))
      {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql_view_product_home .= "AND brand IN ('".$brand_filter."')";
      }

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
      elseif ($sort == 'new' OR $sort == '')
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
    else if($product_type_home !="" AND $frame_shape_home !="")
    {
      $sql_view_product_home = "SELECT * FROM `products` WHERE product_type = '$product_type_home' AND frame_shape = '$frame_shape_home'";

      if(isset($_POST["product_type"]))
      {
        $product_type_filter = implode("','", $_POST["product_type"]);
        $sql_view_product_home .= "AND `product_type` IN ('".$product_type_filter."')";
      }

      if(isset($_POST["frame_shape"]))
      {
        $frame_shape_filter = implode("','", $_POST["frame_shape"]);
        $sql_view_product_home .= "AND `frame_shape` IN ('".$frame_shape_filter."')";
      }

      if(isset($_POST["frame_type"]))
      {
        $frame_type_filter = implode("','", $_POST["frame_type"]);
        $sql_view_product_home .= "AND frame_type IN ('".$frame_type_filter."')";
      }
      
      if(isset($_POST["gender"]))
      {
        $gender_filter = implode("','", $_POST["gender"]);
        $sql_view_product_home .= "AND gender IN ('".$gender_filter."')";
      }

      if(isset($_POST["material"]))
      {
        $material_filter = implode("','", $_POST["material"]);
        $sql_view_product_home .= "AND material IN ('".$material_filter."')";
      }

      if(isset($_POST["color"]))
      {
        $color_filter = implode("','", $_POST["color"]);
        $sql_view_product_home .= "AND product_color IN ('".$color_filter."')";
      }

      if(isset($_POST["brand"]))
      {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql_view_product_home .= "AND brand IN ('".$brand_filter."')";
      }
      
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
                <div class="product_price px-3 pb-3">No Product Found For Your Search</div>
            </div>
            </div>
            result;
        }
    }
    else
    {
      $sql_view_product_home = "SELECT * FROM `products` where (1)";

      if(isset($_POST["product_type"]))
      {
        $product_type_filter = implode("','", $_POST["product_type"]);
        $sql_view_product_home .= "AND `product_type` IN ('".$product_type_filter."')";
      }

      if(isset($_POST["frame_shape"]))
      {
        $frame_shape_filter = implode("','", $_POST["frame_shape"]);
        $sql_view_product_home .= "AND `frame_shape` IN ('".$frame_shape_filter."')";
      }

      if(isset($_POST["frame_type"]))
      {
        $frame_type_filter = implode("','", $_POST["frame_type"]);
        $sql_view_product_home .= "AND frame_type IN ('".$frame_type_filter."')";
      }
      
      if(isset($_POST["gender"]))
      {
        $gender_filter = implode("','", $_POST["gender"]);
        $sql_view_product_home .= "AND gender IN ('".$gender_filter."')";
      }

      if(isset($_POST["material"]))
      {
        $material_filter = implode("','", $_POST["material"]);
        $sql_view_product_home .= "AND material IN ('".$material_filter."')";
      }

      if(isset($_POST["color"]))
      {
        $color_filter = implode("','", $_POST["color"]);
        $sql_view_product_home .= "AND product_color IN ('".$color_filter."')";
      }

      if(isset($_POST["brand"]))
      {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql_view_product_home .= "AND brand IN ('".$brand_filter."')";
      }
      
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
                <div class="product_price px-3 pb-3">No Product Found For Your Search</div>
            </div>
            </div>
            result;
        }
    }
}
?>