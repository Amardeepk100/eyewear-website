<!doctype html>
<html>
  <?php 
    include '_dbconnect.php';
    session_start();

    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }

    if (isset($_POST['logout'])) {
      // Clear all session variables
      session_unset();
  
      // Destroy the session
      session_destroy();
  
      // Redirect to the login page
      header("Location: login.php");
      exit();
    }
  ?>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    </head>
    <body>
        <!-- navbar start -->
        <nav class="navbar sticky-top navbar-dark bg-primary">
          <div class="container-fluid">
              <a class="navbar-brand px-4">Admin Panel</a>
              <form method="post">
                  <button type="submit" name="logout" class="d-flex btn btn-dark px-4">Logout</button>
              </form>
            </div>
          </nav>
          <!-- nav end -->
          <!-- side nav start -->
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 navbar-dark bg-dark" style="height: 100vh;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="mx-3 mt-2 text-start text-white nav-link active  " id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"><i data-feather="monitor"></i> Dashboard</button>
              
              <div class="nav-item disabled collapsable">
                <button class="mx-3 mt-2 text-start text-white nav-link" href="#v-pills-product" data-bs-toggle="collapse" type="button" aria-current="page">
                  <i data-feather="package"></i> Product
                  <i data-feather="chevron-down"></i>
                </button>
                <ul class="nav collapse ms-1 flex-column" id="v-pills-product" role="tablist" data-bs-parent="#menu">
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-insert-product-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert-product" type="button" role="tab" aria-controls="v-pills-insert-product" aria-selected="false">Insert Product</button></li>
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-view-product-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-product" type="button" role="tab" aria-controls="v-pills-view-product" aria-selected="false">View Product</button></li>
                </ul>
              </div>

              <div class="nav-item disabled collapsable">
                <button class="mx-3 mt-2 text-start text-white nav-link" href="#v-pills-brand-name" data-bs-toggle="collapse" type="button" aria-current="page">
                  <i data-feather="star"></i> Brands
                  <i data-feather="chevron-down"></i>
                </button>
                <ul class="nav collapse ms-1 flex-column" id="v-pills-brand-name" data-bs-parent="#menu" >
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-insert-brand-name-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert-brand-name" type="button" role="tab" aria-controls="v-pills-insert-brand-name" aria-selected="false">Insert Brands</button></li>
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-view-brand-name-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-brand-name" type="button" role="tab" aria-controls="v-pills-view-brand-name" aria-selected="false">View Brands</button></li>
                </ul>
              </div>
              
              <div class="nav-item disabled collapsable">
                <button class="mx-3 mt-2 text-start text-white nav-link" href="#v-pills-product-material" data-bs-toggle="collapse" type="button" aria-current="page">
                  <i data-feather="box"></i> Product-material
                  <i data-feather="chevron-down"></i>
                </button>
                <ul class="nav collapse ms-1 flex-column" id="v-pills-product-material" data-bs-parent="#menu" >
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-insert-product-material-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert-product-material" type="button" role="tab" aria-controls="v-pills-insert-product-material" aria-selected="false">Insert material</button></li>
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-view-product-material-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-product-material" type="button" role="tab" aria-controls="v-pills-view-product-material" aria-selected="false">View material</button></li>
                </ul>
              </div>

              <div class="nav-item disabled collapsable">
                <button class="mx-3 mt-2 text-start text-white nav-link" href="#v-pills-product-color" data-bs-toggle="collapse" type="button" aria-current="page">
                  <i data-feather="droplet"></i> Product-<br>colour
                  <i data-feather="chevron-down"></i>
                </button>
                <ul class="nav collapse ms-1 flex-column" id="v-pills-product-color" data-bs-parent="#menu" >
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-insert-product-color-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert-product-color" type="button" role="tab" aria-controls="v-pills-insert-product-color" aria-selected="false">Insert color</button></li>
                  <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-view-product-color-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-product-color" type="button" role="tab" aria-controls="v-pills-view-product-color" aria-selected="false">View color</button></li>
                </ul>
              </div>

            <div style="display: none;" class="nav-item disabled collapsable">
              <button class="mx-3 mt-2 text-start text-white nav-link" href="#v-pills-sliders" data-bs-toggle="collapse" type="button" aria-current="page">
                Sliders
                <i data-feather="chevron-down"></i>
              </button>
              <ul class="nav collapse ms-1 flex-column" id="v-pills-sliders" data-bs-parent="#menu" >
                <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-insert-sliders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert-sliders" type="button" role="tab" aria-controls="v-pills-insert-product-sliders" aria-selected="false">Insert Sliders</button></li>
                <li><button class="mx-3 my-0 text-white text-start nav-link" id="v-pills-view-sliders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-sliders" type="button" role="tab" aria-controls="v-pills-view-product-sliders" aria-selected="false">View Sliders</button></li>
              </ul>
            </div>
            
            <button class="mx-3 my-1 text-start text-white nav-link" id="v-pills-view-customer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-customer" type="button" role="tab" aria-controls="v-pills-sliders" aria-selected="false">
              <i data-feather="users"></i>
              View-customers
            </button>
            
            <button class="mx-3 my-1 text-start text-white nav-link" id="v-pills-view-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-order" type="button" role="tab" aria-controls="v-pills-sliders" aria-selected="false">
              <i data-feather="truck"></i>
              View-orders
            </button>
            
            <button style="display: none;" class="mx-3 my-1 text-start text-white nav-link" id="v-pills-view-payments-tab" data-bs-toggle="pill" data-bs-target="#v-pills-view-payments" type="button" role="tab" aria-controls="v-pills-sliders" aria-selected="false">
              <i data-feather="credit-card"></i>
              View-payments
            </button>

            <button style="display: none;" class="mx-3 my-1 text-start text-white nav-link" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-sliders" aria-selected="false">
              <i data-feather="chevron-down"></i>
              Users
            </button>
          </div>
          <!-- side nav end -->
          <!-- main page -->
          <div class="tab-content" id="v-pills-tabContent">
            <!-- insert brand -->
            <div class="tab-pane fade" id="v-pills-insert-brand-name" role="tabpanel" aria-labelledby="v-pills-insert-brand-name-tab" tabindex="0">
              <div class="me-3">
              <?php
                if(isset($_POST['submit_insert_brand'])) 
                {
                  if($_SERVER['REQUEST_METHOD']=='POST')
                  {
                    $brand_name = $_POST['brand_name'];
                    $brand_description = $_POST['brand_description'];

                    $sql_insert_brand = "INSERT INTO `product_brand` (`brand_id`, `brand_name`, `brand_description`) VALUES (NULL, '$brand_name', '$brand_description')";
                    $result_insert_brand = mysqli_query($conn, $sql_insert_brand);
                    echo <<<alert
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Brand details added <strong>Successfully</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <script>
                    document.addEventListener("DOMContentLoaded",()=>{
                      let nav_link = document.getElementsByClassName("nav-link")
                      let tab_pane = document.getElementsByClassName("tab-pane")
                      nav_link[0].classList.remove("active")
                      tab_pane[13].classList.remove("active")
                      tab_pane[13].classList.remove("show")
                      nav_link[4].click()
                      nav_link[5].click()
                    })
                    </script>
                    alert;
                  } 
                }
                ?>
                <div style="width: 55%; margin: auto;" class="mt-5 mb-3 p-1 px-3 page_title">Insert Brand</div>
                  <form action="/frames/frames_admin/admin.php" method="post" style="width: 50%; margin: auto;">
                    <div class="mb-3">
                      <label for="brand_name" class="form-label">Brand Name</label>
                      <input type="text" class="form-control" name="brand_name" id="brand_name">
                    </div>
                    
                    <div class="mb-3">
                      <label for="brand_description" class="form-label">Brand Description</label>
                      <textarea class="form-control" name="brand_description" id="brand_description" rows="5"></textarea>
                    </div>
                    
                    <div style="display:flex; justify-content:center;">
                      <button type="submit" name="submit_insert_brand" value="submit_insert_brand" class="btn btn-primary m-2 p-2 px-3">Insert Brand</button>
                      <button type="reset" class="btn btn-secondary m-2 p-2 px-5">Reset</button>
                    </div>
                  </form>
                </div>
              </div>
            <!-- insert brand end -->

            <!-- view brand -->
            <!-- delete product brand modal -->
            <?php
              if(isset($_POST['submit_delete_product_brand']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $delete_product_brand_id = $_POST['delete_product_brand_id'];

                  $sql_delete_product_brand = "DELETE FROM `product_brand` WHERE `product_brand`.`brand_id` = $delete_product_brand_id";
                  $result_delete_product_brand = mysqli_query($conn, $sql_delete_product_brand);

                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Brand deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[4].click()
                        nav_link[6].click()
                      })
                      </script>
                  alert;

                }
              }
              if(isset($_POST['cancel_delete_product_brand']))
              {
                echo <<<alert
                  <script>
                  document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[4].click()
                    nav_link[6].click()
                  })
                  </script>
                alert;
              }
            ?>

            <div class="modal fade" id="delete_product_brand" tabindex="-1" aria-labelledby="delete_product_brandLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_product_brandLabel">Are you sure you want to delete this brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="delete_product_brand_id" name="delete_product_brand_id">

                      <div class="mb-3 d-flex justify-content-center">
                      <button name="submit_delete_product_brand" value="submit_delete_product_brand" type="submit" class="mx-3 btn btn-danger">Yes</button>
                      <button name="cancel_delete_product_brand" value="cancel_delete_product_brand" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete product brand modal end -->

            <!-- edit product brand modal -->
            <?php

              if(isset($_POST['submit_update_product_brand']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $edit_product_brand_id = $_POST['edit_product_brand_id'];
                  $edit_product_brand_name = $_POST['edit_product_brand_name'];
                  $edit_product_brand_description = $_POST['edit_product_brand_description'];

                  $sql_update_product_brand = "UPDATE `product_brand` SET `brand_name` = '$edit_product_brand_name', `brand_description` = '$edit_product_brand_description' WHERE `product_brand`.`brand_id` = $edit_product_brand_id";
                  $result_update_product_brand = mysqli_query($conn, $sql_update_product_brand);
                  
                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Brand details updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[4].click()
                        nav_link[6].click()
                      })
                      </script>
                  alert;

                }
              }
            ?>

            <div class="modal fade" id="edit_product_brand" tabindex="-1" aria-labelledby="edit_product_brandLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_product_brandLabel">Edit brand details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="edit_product_brand_id" name="edit_product_brand_id">

                      <div class="mb-3">
                        <label for="edit_product_brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="edit_product_brand_name" name="edit_product_brand_name">
                      </div>

                      <div class="mb-3">
                        <label for="edit_product_brand_description" class="form-label">Brand Description</label>
                        <input type="text" class="form-control" id="edit_product_brand_description" name="edit_product_brand_description">
                      </div>

                      <div class="mb-3">
                      <button name="submit_update_product_brand" value="submit_update_product_brand" type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit product brand modal end -->

            <div class="tab-pane fade" id="v-pills-view-brand-name" role="tabpanel" aria-labelledby="v-pills-view-brand-name-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Brands</div>
                <div class="form_container">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="p-3">Brand Id</th>
                        <th scope="col" class="p-3">Brand Title</th>
                        <th scope="col" class="p-3">Brand Description</th>
                        <th scope="col" class="p-3">Delete Brand</th>
                        <th scope="col" class="p-3">Edit Brand</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql_view_product_brand = "SELECT * FROM `product_brand`";
                        $result_view_product_brand = mysqli_query($conn,$sql_view_product_brand);
                        while($row_view_product_brand = mysqli_fetch_assoc($result_view_product_brand))
                        {
                          $view_brand_id = $row_view_product_brand['brand_id'];
                          $view_brand_name = $row_view_product_brand['brand_name'];
                          $view_brand_description = $row_view_product_brand['brand_description'];
                          echo <<<tr
                          <tr>
                            <td scope="col" class="p-3">$view_brand_id</td>
                            <td scope="col" class="p-3">$view_brand_name</td>
                            <td scope="col" class="p-3">$view_brand_description</td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button id="$view_brand_id" class="px-3 delete_product_brand btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product_brand">Delete</button></div></td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button class="px-3 edit_product_brand btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit_product_brand">Edit</button></div></td>
                          </tr>
                          tr;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- view brand end -->

            <!-- insert product material -->
            <div class="tab-pane fade" id="v-pills-insert-product-material" role="tabpanel" aria-labelledby="v-pills-insert-product-material-tab" tabindex="0">
              <div class="me-3">
              <?php
                if(isset($_POST['submit_insert_product_material'])) 
                {
                  if($_SERVER['REQUEST_METHOD']=='POST')
                  {
                    $product_material_name = $_POST['product_material_name'];

                    $sql_insert_product_material = "INSERT INTO `product_material` (`material_id`, `material_name`) VALUES (NULL, '$product_material_name')";
                    $result_insert_product_material = mysqli_query($conn, $sql_insert_product_material);
                    echo <<<alert
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      New product material added <strong>Successfully</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <script>
                    document.addEventListener("DOMContentLoaded",()=>{
                      let nav_link = document.getElementsByClassName("nav-link")
                      let tab_pane = document.getElementsByClassName("tab-pane")
                      nav_link[0].classList.remove("active")
                      tab_pane[13].classList.remove("active")
                      tab_pane[13].classList.remove("show")
                      nav_link[7].click()
                      nav_link[8].click()
                    })
                    </script>
                    alert;
                  } 
                }
                ?>
                <div style="width: 55%; margin: auto;" class="mt-5 mb-3 p-1 px-3 page_title">Insert Product Material</div>
                  <form action="/frames/frames_admin/admin.php" method="post" style="width: 50%; margin: auto;">
                    <div class="mb-3">
                      <label for="product_material_name" class="form-label">Material Name</label>
                      <input type="text" class="form-control" name="product_material_name" id="product_material_name">
                    </div>

                    <div style="display:flex; justify-content:center;">
                      <button type="submit" name="submit_insert_product_material" value="submit_insert_product_material" class="btn btn-primary m-2 p-2 px-3">Insert Product Material</button>
                      <button type="reset" class="btn btn-secondary m-2 p-2 px-5">Rest</button>
                    </div>
                  </form>
              </div>
            </div>
            <!-- insert product material end -->

            <!-- view product material -->

            <!-- delete product material modal -->
            <?php
              if(isset($_POST['submit_delete_product_material']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $delete_product_material_id = $_POST['delete_product_material_id'];

                  $sql_delete_product_material = "DELETE FROM `product_material` WHERE `product_material`.`material_id` = $delete_product_material_id";
                  $result_delete_product_material = mysqli_query($conn, $sql_delete_product_material);

                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product material deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[7].click()
                        nav_link[9].click()
                      })
                      </script>
                  alert;

                }
              }
              if(isset($_POST['cancel_delete_product_material']))
              {
                echo <<<alert
                  <script>
                  document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[7].click()
                    nav_link[9].click()
                  })
                  </script>
                alert;
              }
            ?>

            <div class="modal fade" id="delete_product_material" tabindex="-1" aria-labelledby="delete_product_materialLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_product_materialLabel">Are you sure you want to delete this product material</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="delete_product_material_id" name="delete_product_material_id">

                      <div class="mb-3 d-flex justify-content-center">
                      <button name="submit_delete_product_material" value="submit_delete_product_material" type="submit" class="mx-3 btn btn-danger">Yes</button>
                      <button name="cancel_delete_product_material" value="cancel_delete_product_material" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete product material modal end -->

            <!-- edit product material modal -->
            <?php

              if(isset($_POST['submit_update_product_material']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $edit_product_material_id = $_POST['edit_product_material_id'];
                  $edit_product_material_name = $_POST['edit_product_material_name'];

                  $sql_update_product_material = "UPDATE `product_material` SET `material_name` = '$edit_product_material_name' WHERE `product_material`.`material_id` = $edit_product_material_id";
                  $result_update_product_material = mysqli_query($conn, $sql_update_product_material);
                  
                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product material updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[7].click()
                        nav_link[9].click()
                      })
                      </script>
                  alert;

                }
              }
            ?>

            <div class="modal fade" id="edit_product_material" tabindex="-1" aria-labelledby="edit_product_materialLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_product_materialLabel">Edit product material</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="edit_product_material_id" name="edit_product_material_id">

                      <div class="mb-3">
                        <label for="edit_product_material_name" class="form-label">Material Name</label>
                        <input type="text" class="form-control" id="edit_product_material_name" name="edit_product_material_name">
                      </div>

                      <div class="mb-3">
                      <button name="submit_update_product_material" value="submit_update_product_material" type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit product material modal end -->

            <div class="tab-pane fade" id="v-pills-view-product-material" role="tabpanel" aria-labelledby="v-pills-view-product-material-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Product Material</div>
                <div class="form_container">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="p-3">Product Material Id</th>
                        <th scope="col" class="p-3">Product Material Name</th>
                        <th scope="col" class="p-3">Delete Product Material</th>
                        <th scope="col" class="p-3">Edit Product Material</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql_view_product_material = "SELECT * FROM `product_material`";
                        $result_view_product_material = mysqli_query($conn,$sql_view_product_material);
                        while($row_view_product_material = mysqli_fetch_assoc($result_view_product_material))
                        {
                          $view_material_id = $row_view_product_material['material_id'];
                          $view_material_name = $row_view_product_material['material_name'];
                          echo <<<tr
                          <tr>
                            <td scope="col" class="p-3">$view_material_id</td>
                            <td scope="col" class="p-3">$view_material_name</td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button id="$view_material_id" class="px-3 delete_product_material btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product_material">Delete</button></div></td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button class="px-3 edit_product_material btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit_product_material">Edit</button></div></td>
                          </tr>
                          tr;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- view product material end -->

            <!-- insert color -->
            <div class="tab-pane fade" id="v-pills-insert-product-color" role="tabpanel" aria-labelledby="v-pills-insert-product-color-tab" tabindex="0">
              <div class="me-3">
                <?php

                  if(isset($_POST['submit_insert_product_color'])) 
                  {
                    if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                      $product_color_name = $_POST['product_color_name'];
                      $product_color_code = $_POST['product_color_code'];
                      $sql_insert_product_color = "INSERT INTO `product_color` (`color_id`, `color_name`, `color`) VALUES (NULL, '$product_color_name', '$product_color_code')";
                      $result_insert_product_color = mysqli_query($conn, $sql_insert_product_color);
                      echo <<<alert
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        New product colour added <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
  
                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[10].click()
                        nav_link[11].click()
                      })
                      </script>
                      alert;
                    } 
                  }
                ?>
                <div style="width: 55%; margin: auto;" class="mt-5 mb-3 p-1 px-3 page_title">Insert Product color</div>
                <form action="/frames/frames_admin/admin.php" method="POST" style="width: 50%; margin: auto;">
                  <div class="mb-3">
                    <label for="product_color_name" class="form-label">Color Name</label>
                    <input type="text" class="form-control" id="product_color_name" name="product_color_name">
                  </div>
                  
                  <div class="mb-3">
                    <label for="product_color_code" class="form-label">Color picker</label>
                    <input type="color" class="form-control form-control-color" id="product_color_code" name="product_color_code" value="#000000" title="Choose your color">
                  </div>
                  
                  <div style="display:flex; justify-content:center;">
                    <button type="submit" name="submit_insert_product_color" value="submit_insert_product_color" class="btn btn-primary m-2 p-2 px-3">Insert Product Color</button>
                    <button type="reset" class="btn btn-secondary m-2 p-2 px-5">Rest</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- insert color end -->

            <!-- view color -->
            <!-- delete product color modal -->
            <?php
              if(isset($_POST['submit_delete_product_color']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $delete_product_color_id = $_POST['delete_product_color_id'];

                  $sql_delete_product_color = "DELETE FROM `product_color` WHERE `product_color`.`color_id` = $delete_product_color_id";
                  $result_delete_product_color = mysqli_query($conn, $sql_delete_product_color);

                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product colour deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[10].click()
                        nav_link[12].click()
                      })
                      </script>
                  alert;

                }
              }
              if(isset($_POST['cancel_delete_product_color']))
              {
                echo <<<alert
                  <script>
                  document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[10].click()
                    nav_link[12].click()
                  })
                  </script>
                alert;
              }
            ?>

            <div class="modal fade" id="delete_product_color" tabindex="-1" aria-labelledby="delete_product_colorLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_product_colorLabel">Are you sure you want to delete this product color</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="delete_product_color_id" name="delete_product_color_id">

                      <div class="mb-3 d-flex justify-content-center">
                      <button name="submit_delete_product_color" value="submit_delete_product_color" type="submit" class="mx-3 btn btn-danger">Yes</button>
                      <button name="cancel_delete_product_color" value="cancel_delete_product_color" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete product color modal end -->

            <!-- edit product color modal -->
            <?php
              if(isset($_POST['submit_update_product_color']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $edit_product_color_id = $_POST['edit_product_color_id'];
                  $edit_product_color_name = $_POST['edit_product_color_name'];
                  $edit_product_color_code = $_POST['edit_product_color_code'];

                  $sql_update_product_color = "UPDATE `product_color` SET `color_name` = '$edit_product_color_name', `color` = '$edit_product_color_code' WHERE `product_color`.`color_id` = $edit_product_color_id";
                  $result_update_product_color = mysqli_query($conn, $sql_update_product_color);
                  
                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product colour updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[10].click()
                        nav_link[12].click()
                      })
                      </script>
                  alert;
                }
              }
            ?>

            <div class="modal fade" id="edit_product_color" tabindex="-1" aria-labelledby="edit_product_colorLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_product_colorLabel">Edit product color</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="edit_product_color_id" name="edit_product_color_id">

                      <div class="mb-3">
                        <label for="edit_product_color_name" class="form-label">Color Name</label>
                        <input type="text" class="form-control" id="edit_product_color_name" name="edit_product_color_name">
                      </div>
                      
                      <div class="mb-3">
                        <label for="edit_product_color_code" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color" id="edit_product_color_code" name="edit_product_color_code" value="#000000" title="Choose your color">
                      </div>

                      <div class="mb-3">
                      <button name="submit_update_product_color" value="submit_update_product_color" type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit product color modal end -->

            <div class="tab-pane fade" id="v-pills-view-product-color" role="tabpanel" aria-labelledby="v-pills-view-product-color-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Product Color</div>
                <div class="form_container">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="p-3">Color Id</th>
                        <th scope="col" class="p-3">Color Name</th>
                        <th scope="col" class="p-3">Color</th>
                        <th scope="col" class="p-3 text-center">Delete Color</th>
                        <th scope="col" class="p-3 text-center">Edit Color</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql_view_product_color = "SELECT * FROM `product_color`";
                        $result_view_product_color = mysqli_query($conn,$sql_view_product_color);
                        while($row_view_product_color = mysqli_fetch_assoc($result_view_product_color))
                        {
                          $view_color_id = $row_view_product_color['color_id'];
                          $view_color_name = $row_view_product_color['color_name'];
                          $view_color = $row_view_product_color['color'];
                          echo <<<tr
                          <tr>
                            <td scope="col" class="p-3">$view_color_id</td>
                            <td scope="col" class="p-3">$view_color_name</td>
                            <td scope="col" class="p-3"><div style="width:5em; height:1.5em; background-color:$view_color; border-radius:12% / 50%; border: 1px solid black;" ></div></td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button id="$view_color_id" class="px-3 delete_product_color btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product_color">Delete</button></div></td>
                            <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button class="px-3 edit_product_color btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit_product_color">Edit</button></div></td>
                          </tr>
                          tr;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- view color end -->

            <!-- Add product -->
            <?php
              if(isset($_POST['insert_product'])) 
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $sql_check_product_duplication = "SELECT * FROM `products`";
                    $result_check_product_duplication = mysqli_query($conn,$sql_check_product_duplication);
                    $row_check_product_duplication = mysqli_fetch_assoc($result_check_product_duplication);

                    if (isset($row_check_product_duplication['model_no']) && isset($row_check_product_duplication['model_no']))
                    {
                      $product_duplication_model_no = $row_check_product_duplication['model_no'];
                      $product_duplication_product_color = $row_check_product_duplication['product_color'];
                    }

                    $brand = $_POST['brand'];
                    $model_no = $_POST['model_no'];
                    $product_type = $_POST['product_type'];
                    $product_colour = $_POST['product_colour'];
                    $gender = $_POST['gender'];
                    $frame_type = $_POST['frame_type'];
                    $frame_shape = $_POST['frame_shape'];
                    $material = $_POST['material'];
                    $product_price = $_POST['product_price'];
                    $product_description = $_POST['product_description'];

                    if ($product_duplication_model_no.$product_duplication_product_color==$model_no.$product_colour)
                    {
                        echo <<<alert
                        <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                          Product with same model and color <strong>already exists.</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                        document.addEventListener("DOMContentLoaded",()=>{
                          let nav_link = document.getElementsByClassName("nav-link")
                          let tab_pane = document.getElementsByClassName("tab-pane")
                          nav_link[0].classList.remove("active")
                          tab_pane[13].classList.remove("active")
                          tab_pane[13].classList.remove("show")
                          nav_link[1].click()
                          nav_link[2].click()
                        })
                        </script>
                        alert;
                    }
                    else
                    {
                        // Get file details
                        $file1 = $_FILES['image1'];
                        $file2 = $_FILES['image2'];
                        $file3 = $_FILES['image3'];

                        // Check if the "downhere" folder exists
                        $targetDirectory = 'downhere/';
                        if (!file_exists($targetDirectory)) {
                            mkdir($targetDirectory, 0777, true);
                        }

                        // Set folder path for the title
                        $targetFolder = $targetDirectory . $model_no . $product_colour . '/';
                        if (!file_exists($targetFolder)) {
                            mkdir($targetFolder, 0777, true);
                        }

                        // Upload and move the first image
                        $fileName1 = $_FILES['image1']['name'];
                        $fileTmpName1 = $_FILES['image1']['tmp_name'];
                        $targetFilePath1 = $targetFolder . $model_no . $product_colour . '1.' . strtolower(pathinfo($fileName1, PATHINFO_EXTENSION));
                        move_uploaded_file($fileTmpName1, $targetFilePath1);

                        // Upload and move the second image
                        $fileName2 = $_FILES['image2']['name'];
                        $fileTmpName2 = $_FILES['image2']['tmp_name'];
                        $targetFilePath2 = $targetFolder . $model_no . $product_colour . '2.' . strtolower(pathinfo($fileName2, PATHINFO_EXTENSION));
                        move_uploaded_file($fileTmpName2, $targetFilePath2);

                        // Upload and move the third image
                        $fileName3 = $_FILES['image3']['name'];
                        $fileTmpName3 = $_FILES['image3']['tmp_name'];
                        $targetFilePath3 = $targetFolder . $model_no . $product_colour . '3.' . strtolower(pathinfo($fileName3, PATHINFO_EXTENSION));
                        move_uploaded_file($fileTmpName3, $targetFilePath3);

                        // Store file details in the database
                        $imagePaths = $targetFilePath1 . ',' . $targetFilePath2 . ',' . $targetFilePath3;
                        $sql = "INSERT INTO products (brand,model_no,product_type,product_color,gender,frame_type,frame_shape,material,product_price,product_description,image_paths) VALUES ('$brand','$model_no','$product_type','$product_colour','$gender','$frame_type','$frame_shape','$material','$product_price','$product_description','$imagePaths')";
                        $conn->query($sql);

                        echo <<<alert
                        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                          Product added <strong>successfully.</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                        document.addEventListener("DOMContentLoaded",()=>{
                          let nav_link = document.getElementsByClassName("nav-link")
                          let tab_pane = document.getElementsByClassName("tab-pane")
                          nav_link[0].classList.remove("active")
                          tab_pane[13].classList.remove("active")
                          tab_pane[13].classList.remove("show")
                          nav_link[1].click()
                          nav_link[2].click()
                        })
                        </script>
                      alert;
                    }
                } 
              }
            ?>

            <div class="tab-pane fade" id="v-pills-insert-product" role="tabpanel" aria-labelledby="v-pills-insert-product-tab" tabindex="0">
              <div class="me-3">
                <div style="width: 55%; margin: auto;" class="mt-3 mb-3 p-1 px-3 page_title">Insert Product</div>
                <div class="form_container">
                  <form action="admin.php" method="POST" enctype="multipart/form-data" style="width: 50%; margin: auto;">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand" class="form-select" id="brand" aria-label="Default select example">
                        <option selected>Open this select brand</option>
                        <?php
                            $sql_view_product_brand = "SELECT * FROM `product_brand`";
                            $result_view_product_brand = mysqli_query($conn,$sql_view_product_brand);
                            $product_brand_count = mysqli_num_rows( $result_view_product_brand);

                            while($row_view_brand_name = mysqli_fetch_assoc($result_view_product_brand))
                            {
                            $view_brand_name = $row_view_brand_name['brand_name'];
                            echo <<<tr
                            <tr>
                                <option value="$view_brand_name">$view_brand_name</option>
                            </tr>
                            tr;
                            }
                        ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="model_no" class="form-label">Model No.</label>
                        <input name="model_no" type="text" class="form-control" id="model_no">
                    </div>

                    <div class="mb-3">
                        <label for="product_type" class="form-label">Product Type</label>
                        <select name="product_type" class="form-select" id="product_type" aria-label="Default select example">
                        <option selected>Open this select type</option>
                        <option value="Eyeglasses">Eyeglasses</option>
                        <option value="Sunglasses">Sunglasses</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_colour" class="form-label">Product Colour</label>
                        <select name="product_colour" class="form-select" id="product_colour" aria-label="Default select example">
                        <option selected>Open this select colour</option>
                        <!-- from db -->
                        <?php
                            $sql_view_product_color = "SELECT * FROM `product_color`";
                            $result_view_product_color = mysqli_query($conn,$sql_view_product_color);
                            $product_color_count = mysqli_num_rows( $result_view_product_color);

                            while($row_view_product_color = mysqli_fetch_assoc($result_view_product_color))
                            {
                            $view_color_name = $row_view_product_color['color_name'];
                            $view_color = $row_view_product_color['color'];
                            echo <<<tr
                            <tr>
                                <option style="background-color:$view_color; color:white;" value="$view_color" >$view_color_name</option>
                            </tr>
                            tr;
                            }
                        ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-select" id="gender" aria-label="Default select example">
                        <option selected>Open this select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="frame_type" class="form-label">Frame Type</label>
                        <select name="frame_type" class="form-select" id="frame_type" aria-label="Default select example">
                        <option selected>Open this select Frame Type</option>
                        <option value="Full Rim">Full Rim</option>
                        <option value="Half Rim">Half Rim</option>
                        <option value="Rimless">Rimless</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="frame_shape" class="form-label">Frame Shape</label>
                        <select name="frame_shape" class="form-select" id="frame_shape" aria-label="Default select example">
                        <option selected>Open this select Frame Shape</option>
                        <option value="Rectangle">Rectangle</option>
                        <option value="Round">Round</option>
                        <option value="Square">Square</option>
                        <option value="Cat Eye">Cat Eye</option>
                        <option value="Wayfarer">Wayfarer</option>
                        <option value="Aviator">Aviator</option>
                        <option value="Geometric">Geometric</option>
                        <option value="Hexagonal">Hexagonal</option>
                        <option value="Oval">Oval</option>
                        <option value="Clubmaster">Clubmaster</option>
                        <option value="Sports">Sports</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="material" class="form-label">Material</label>
                        <select name="material" class="form-select" id="material" aria-label="Default select example">
                        <option selected>Open this select Material</option>
                        <!-- from db -->
                        <?php
                            $sql_view_product_material = "SELECT * FROM `product_material`";
                            $result_view_product_material = mysqli_query($conn,$sql_view_product_material);
                            $product_material_count = mysqli_num_rows( $result_view_product_material);

                            while($row_view_material_name = mysqli_fetch_assoc($result_view_product_material))
                            {
                            $view_material_name = $row_view_material_name['material_name'];
                            echo <<<tr
                            <tr>
                                <option value="$view_material_name">$view_material_name</option>
                            </tr>
                            tr;
                            }
                        ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input name="product_price" type="number" class="form-control" id="product_price">
                    </div>

                    <div class="mb-3">
                        <label for="image_1" class="form-label">Image 1</label>
                        <input type="file" accept="image/*" class="form-control" name="image1" id="image1">
                    </div>

                    <div class="mb-3">
                        <label for="image_2" class="form-label">Image 2</label>
                        <input type="file" accept="image/*" class="form-control" name="image2" id="image1">
                    </div>

                    <div class="mb-3">
                        <label for="image_3" class="form-label">Image 3</label>
                        <input type="file" accept="image/*" class="form-control" name="image3" id="image1">
                    </div>

                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description</label>
                        <textarea name="product_description" class="form-control" id="product_description" rows="3"></textarea>
                    </div>

                    <div style="display:flex; justify-content:center;">
                        <button name="insert_product" value="insert_product" type="submit" class="btn btn-primary m-2 p-2 px-3">Insert Product</button>
                        <button type="reset" class="btn btn-secondary m-2 p-2 px-3">Rest</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Add product end -->

            <!-- view product -->
            <!-- edit images modal -->
            <?php
            if(isset($_POST['submit_update_image']))
            {
              if($_SERVER['REQUEST_METHOD']=='POST')
              {
                $old_image_location = $_POST['edit_product_image_location'];
                $new_image = $_FILES['new_image'];

                // Extract the filename from the old image location
                $oldFilename = basename($old_image_location);

                // Generate the new image name based on the old filename
                $newImageName = $oldFilename;

                // Move the new image to the location of the old image
                $newImageLocation = dirname($old_image_location) . '/' . $newImageName;
                move_uploaded_file($new_image['tmp_name'], $newImageLocation);

                echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product images updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[1].click()
                        nav_link[3].click()
                      })
                      </script>
                  alert;

              }
            }
            ?>
            <div class="modal fade" id="edit_product_image" tabindex="-1" aria-labelledby="edit_product_imageLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_product_imageLabel">Edit product image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" id="edit_product_image_location" name="edit_product_image_location">
                      <div class="mb-3">
                        <label for="new_image" class="form-label">New Image</label>
                        <input type="file" accept="image/*" class="form-control" name="new_image" id="new_image">
                      </div>
                      <div class="mb-3 d-flex justify-content-center">
                        <button name="submit_update_image" value="submit_update_image" type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit images modal end -->  

            <!-- view images modal -->
            <div class="modal fade" id="view_product_images" tabindex="-1" aria-labelledby="view_product_imagesLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="view_product_imagesLabel">Product images</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body d-flex justify-content-center">
                    <div class="card mx-1" style="width: 50em;">
                      <img id="view_image_1" name="view_image_1" src="" style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top" alt="...">
                      <div class="card-body">
                      <div class="d-flex justify-content-center"><button class="px-5 edit_product_image btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit_product_image">Edit</button></div>
                      </div>
                    </div>
                    <div class="card mx-1" style="width: 50em;">
                      <img id="view_image_2" name="view_image_2" src="" style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top" alt="...">
                      <div class="card-body">
                      <div class="d-flex justify-content-center"><button class="px-5 edit_product_image btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit_product_image">Edit</button></div>
                      </div>
                    </div>
                    <div class="card mx-1" style="width: 50em;">
                      <img id="view_image_3" name="view_image_3" src="" style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top" alt="...">
                      <div class="card-body">
                      <div class="d-flex justify-content-center"><button class="px-5 edit_product_image btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit_product_image">Edit</button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- view images modal end -->

            <!-- edit product modal -->
            <?php
              if(isset($_POST['submit_update_product']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $edit_product_id = $_POST['edit_product_id'];
                  $edit_brand = $_POST['edit_brand'];
                  $edit_product_type = $_POST['edit_product_type'];
                  $edit_gender = $_POST['edit_gender'];
                  $edit_frame_type = $_POST['edit_frame_type'];
                  $edit_frame_shape = $_POST['edit_frame_shape'];
                  $edit_material = $_POST['edit_material'];
                  $edit_product_price = $_POST['edit_product_price'];
                  $edit_product_description = $_POST['edit_product_description'];
                  

                  $sql_update_product = "UPDATE `products` SET `brand` = '$edit_brand', `product_type` = '$edit_product_type', `product_price` = '$edit_product_price', `gender` = '$edit_gender', `frame_type` = '$edit_frame_type', `frame_shape` = '$edit_frame_shape', `material` = '$edit_material', `product_description` = '$edit_product_description' WHERE `products`.`product_id` = $edit_product_id";
                  $result_update_product = mysqli_query($conn, $sql_update_product);
                  
                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[1].click()
                        nav_link[3].click()
                      })
                      </script>
                  alert;
                }
              }
            ?>

            <div class="modal fade" id="edit_product" tabindex="-1" aria-labelledby="edit_productLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_productLabel">Edit product color</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="edit_product_id" name="edit_product_id">                      
                      <!---->
                      <div class="mb-3">
                          <label for="edit_brand" class="form-label">Brand</label>
                          <select name="edit_brand" class="form-select" id="edit_brand" aria-label="Default select example">
                          <option selected>Open this select brand</option>
                          <?php
                              $sql_view_product_brand = "SELECT * FROM `product_brand`";
                              $result_view_product_brand = mysqli_query($conn,$sql_view_product_brand);
                              $product_brand_count = mysqli_num_rows( $result_view_product_brand);

                              while($row_view_brand_name = mysqli_fetch_assoc($result_view_product_brand))
                              {
                              $view_brand_name = $row_view_brand_name['brand_name'];
                              echo <<<tr
                              <tr>
                                  <option value="$view_brand_name">$view_brand_name</option>
                              </tr>
                              tr;
                              }
                          ?>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_product_type" class="form-label">Product Type</label>
                          <select name="edit_product_type" class="form-select" id="edit_product_type" aria-label="Default select example">
                          <option selected>Open this select type</option>
                          <option value="Eyeglasses">Eyeglasses</option>
                          <option value="Sunglasses">Sunglasses</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_gender" class="form-label">Gender</label>
                          <select name="edit_gender" class="form-select" id="edit_gender" aria-label="Default select example">
                          <option selected>Open this select gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_frame_type" class="form-label">Frame Type</label>
                          <select name="edit_frame_type" class="form-select" id="edit_frame_type" aria-label="Default select example">
                          <option selected>Open this select Frame Type</option>
                          <option value="Full Rim">Full Rim</option>
                          <option value="Half Rim">Half Rim</option>
                          <option value="Rimless">Rimless</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_frame_shape" class="form-label">Frame Shape</label>
                          <select name="edit_frame_shape" class="form-select" id="edit_frame_shape" aria-label="Default select example">
                          <option selected>Open this select Frame Shape</option>
                          <option value="Rectangle">Rectangle</option>
                          <option value="Round">Round</option>
                          <option value="Square">Square</option>
                          <option value="Cat Eye">Cat Eye</option>
                          <option value="Wayfarer">Wayfarer</option>
                          <option value="Aviator">Aviator</option>
                          <option value="Geometric">Geometric</option>
                          <option value="Hexagonal">Hexagonal</option>
                          <option value="Oval">Oval</option>
                          <option value="Clubmaster">Clubmaster</option>
                          <option value="Sports">Sports</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_material" class="form-label">Material</label>
                          <select name="edit_material" class="form-select" id="edit_material" aria-label="Default select example">
                          <option selected>Open this select Material</option>
                          <!-- from db -->
                          <?php
                              $sql_view_product_material = "SELECT * FROM `product_material`";
                              $result_view_product_material = mysqli_query($conn,$sql_view_product_material);
                              $product_material_count = mysqli_num_rows( $result_view_product_material);

                              while($row_view_material_name = mysqli_fetch_assoc($result_view_product_material))
                              {
                              $view_material_name = $row_view_material_name['material_name'];
                              echo <<<tr
                              <tr>
                                  <option value="$view_material_name">$view_material_name</option>
                              </tr>
                              tr;
                              }
                          ?>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="edit_product_price" class="form-label">Product Price</label>
                          <input name="edit_product_price" type="number" class="form-control" id="edit_product_price">
                      </div>

                      <div class="mb-3">
                          <label for="edit_product_description" class="form-label">Product Description</label>
                          <textarea name="edit_product_description" class="form-control" id="edit_product_description" rows="3"></textarea>
                      </div>
                      <!---->

                      <div class="mb-3">
                      <button name="submit_update_product" value="submit_update_product" type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit product modal end -->

            <!-- delete product modal -->
            <?php
                if(isset($_POST['submit_delete_product']))
                {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $delete_product_id = $_POST['delete_product_id'];
                    $sql_retrive_product_location = "SELECT * FROM `products` WHERE `products`.`product_id` = $delete_product_id";
                    $result_retrive_product_location = mysqli_query($conn, $sql_retrive_product_location);

                    if ($result_retrive_product_location->num_rows > 0) {
                        $row = $result_retrive_product_location->fetch_assoc();
                        $imagePath = $row['image_paths'];
                        $imagePaths = explode(",", $row['image_paths']);
                        $imageDir = 'downhere/'.$row['model_no'].$row['product_color'];

                        // Delete the image file from the server
                        foreach ($imagePaths as $imagePath)
                        {
                          $imagePath = trim($imagePath);

                          // Delete the image file from the server
                          if (file_exists($imagePath)) {
                              unlink($imagePath);
                          }
                        }

                        if (is_dir($imageDir)) {
                            rmdir($imageDir);
                        }
                
                        // Delete the image entry from the database
                        $sql_delete_product = "DELETE FROM `products` WHERE `products`.`product_id` = $delete_product_id";
                        $result_delete_product = mysqli_query($conn, $sql_delete_product);
                    }

                    echo <<<alert
                        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Product deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                        document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[1].click()
                        nav_link[3].click()
                        })
                        </script>
                    alert;

                }
                }
                if(isset($_POST['cancel_delete_product']))
                {
                echo <<<alert
                    <script>
                    document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[1].click()
                    nav_link[3].click()
                    })
                    </script>
                alert;
                }
            ?>

            <div class="modal fade" id="delete_product" tabindex="-1" aria-labelledby="delete_productLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_productLabel">Are you sure you want to delete this product color</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                        <input type="hidden" class="form-control" id="delete_product_id" name="delete_product_id">

                        <div class="mb-3 d-flex justify-content-center">
                        <button name="submit_delete_product" value="submit_delete_product" type="submit" class="mx-3 btn btn-danger">Yes</button>
                        <button name="cancel_delete_product" value="cancel_delete_product" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                        </div>

                    </form>
                    </div>
                </div>
                </div>
            </div>
            <!-- delete product modal end -->
            <div class="tab-pane fade" id="v-pills-view-product" role="tabpanel" aria-labelledby="v-pills-view-product-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Product</div>
                <div class="form_container">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                  <th scope="col" class="p-3">Product Id</th>
                  <th scope="col" class="p-3">Brand</th>
                  <th scope="col" class="p-3">Model no.</th>
                  <th scope="col" class="p-3">Product Type</th>
                  <th scope="col" class="p-3">Product Colour</th>
                  <th scope="col" class="p-3">Gender</th>
                  <th scope="col" class="p-3">Frame Type</th>
                  <th scope="col" class="p-3">Frame Shape</th>
                  <th scope="col" class="p-3">Material</th>
                  <th scope="col" class="p-3">Price</th>
                  <th scope="col" class="p-3">Description</th>
                  <th scope="col" class="p-3">View Images</th>
                  <th scope="col" class="p-3">Delete Product</th>
                  <th scope="col" class="p-3">Edit Product</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql_view_product = "SELECT * FROM `products`";
                      $result_view_product = mysqli_query($conn,$sql_view_product);
                      $product_count = mysqli_num_rows($result_view_product);

                      while($row_view_product = mysqli_fetch_assoc($result_view_product))
                      {
                      $view_product_id = $row_view_product['product_id'];
                      $view_brand = $row_view_product['brand'];
                      $view_model_no = $row_view_product['model_no'];
                      $view_product_type = $row_view_product['product_type'];
                      $view_product_color = $row_view_product['product_color'];
                      $view_gender = $row_view_product['gender'];
                      $view_frame_type = $row_view_product['frame_type'];
                      $view_frame_shape = $row_view_product['frame_shape'];
                      $view_material = $row_view_product['material'];
                      $view_product_price = $row_view_product['product_price'];
                      $view_product_description = $row_view_product['product_description'];
                      $view_image_paths = $row_view_product['image_paths'];
                      echo <<<tr
                      <tr>
                          <td scope="col" class="p-3">$view_product_id</td>
                          <td scope="col" class="p-3">$view_brand</td>
                          <td scope="col" class="p-3">$view_model_no</td>
                          <td scope="col" class="p-3">$view_product_type</td>
                          <td scope="col" class="p-3"><div class="d-flex justify-content-center"><div style="width:1.5em; height:1.5em; background-color:$view_product_color; border-radius:50%; border: 1px solid black;" ></div></div></td>
                          <td scope="col" class="p-3">$view_gender</td>
                          <td scope="col" class="p-3">$view_frame_type</td>
                          <td scope="col" class="p-3">$view_frame_shape</td>
                          <td scope="col" class="p-3">$view_material</td>
                          <td scope="col" class="p-3">$view_product_price</td>
                          <td scope="col" class="p-3">$view_product_description<div style="display:none">$view_image_paths</div></td>
                          <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button name="view_product_images" id="view_product_images" class="px-3 view_product_images btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#view_product_images">View</button></div></td>
                          <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button id="$view_product_id" class="px-3 delete_product btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product">Delete</button></div></td>
                          <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button name="edit_product" id="edit_product" class="px-3 edit_product btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit_product">Edit</button></div></td>
                      </tr>
                      tr;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            <!-- view product end -->
              
            <div class="tab-pane fade" id="v-pills-view-sliders" role="tabpanel" aria-labelledby="v-pills-view-sliders-tab" tabindex="0">view sliders</div>
            <div class="tab-pane fade" id="v-pills-insert-sliders" role="tabpanel" aria-labelledby="v-pills-insert-sliders-tab" tabindex="0">Insert sliders</div>

            <!-- view-customer -->
            <!-- delete user modal -->
            <?php
              if(isset($_POST['submit_delete_user']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $delete_user = $_POST['delete_user'];

                  $sql_delete_user = "DELETE FROM `users` WHERE `email` = '$delete_user'";
                  $result_delete_user = mysqli_query($conn, $sql_delete_user);

                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        User Account deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[16].click()
                      })
                      </script>
                  alert;

                }
              }
              if(isset($_POST['cancel_delete_user']))
              {
                echo <<<alert
                  <script>
                  document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[16].click()
                  })
                  </script>
                alert;
              }
            ?>

            <div class="modal fade" id="delete_users" tabindex="-1" aria-labelledby="delete_userLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_userLabel">Are you sure you want to delete this user account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="delete_user" name="delete_user">

                      <div class="mb-3 d-flex justify-content-center">
                      <button name="submit_delete_user" value="submit_delete_user" type="submit" class="mx-3 btn btn-danger">Yes</button>
                      <button name="cancel_delete_user" value="cancel_delete_user" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete user end -->

            <div class="tab-pane fade" id="v-pills-view-customer" role="tabpanel" aria-labelledby="v-pills-view-customer-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Customer</div>
                <div class="form_container">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="p-3"> ID</th>
                        <th scope="col" class="p-3"> Name</th>
                        <th scope="col" class="p-3"> Email</th>
                        <th scope="col" class="p-3"> Mobile no.</th>
                        <th scope="col" class="p-3"> Prescription</th>
                        <th scope="col" class="p-3"> Address</th>
                        <th scope="col" class="p-3"> Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_view_users = "SELECT * FROM `users`";
                            $result_view_users = mysqli_query($conn,$sql_view_users);
                            $users_count = mysqli_num_rows($result_view_users);

                            while($row_view_users = mysqli_fetch_assoc($result_view_users))
                            {
                            $view_users_id = $row_view_users['users_id'];
                            $view_users_name = $row_view_users['name'];
                            $view_users_email = $row_view_users['email'];
                            $view_users_number = $row_view_users['number'];
                            $view_users_prescription = $row_view_users['prescription'];
                            $view_users_address = $row_view_users['address'];

                            echo <<<tr
                            <tr>
                                <td scope="col" class="p-3">$view_users_id</td>
                                <td scope="col" class="p-3">$view_users_name</td>
                                <td scope="col" class="p-3">$view_users_email</td>
                                <td scope="col" class="p-3">$view_users_number</td>
                                <td scope="col" class="p-3">$view_users_prescription</td>
                                <td scope="col" class="p-3">$view_users_address</td>
                                <td scope="col" class="p-3"><div class="d-flex justify-content-center"><button id="$view_users_email" class="px-3 delete_user btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_users">Delete</button></div></td>
                            </tr>
                            tr;
                            }
                          ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- view-customer end -->

            <!-- view-order -->
            <!-- edit order modal -->
            <?php
              if(isset($_POST['submit_update_order']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $update_order_id = $_POST['update_order_id'];
                  $update_order_payment_status = $_POST['update_order_payment_status'];
                  $update_order_order_status = $_POST['update_order_order_status'];

                  $sql_update_order = "UPDATE `orders` SET `payment_status` = '$update_order_payment_status', `delivery_status` = '$update_order_order_status' WHERE `orders`.`order_id` = $update_order_id";
                  $result_update_order = mysqli_query($conn, $sql_update_order);
                  
                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Order updated <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[17].click()
                      })
                      </script>
                  alert;
                }
              }
            ?>

            <div class="modal fade" id="update_orders" tabindex="-1" aria-labelledby="update_ordersLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="update_orderLabel">Update Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="update_order_id" name="update_order_id">

                      <div class="mb-3">
                          <label for="update_order_payment_status" class="form-label">Payment Status</label>
                          <select name="update_order_payment_status" class="form-select" id="update_order_payment_status" aria-label="Default select example">
                          <option value="0">Payment Pending</option>
                          <option value="1">Payment Received</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="update_order_order_status" class="form-label">Order Status</label>
                          <select name="update_order_order_status" class="form-select" id="update_order_order_status" aria-label="Default select example">
                          <option value="Order Received">Order Received</option>
                          <option value="Order Out For Delivery">Order Out For Delivery</option>
                          <option value="Order Completed">Order Completed</option>
                          </select>
                      </div>

                      <div class="mb-3">
                      <button name="submit_update_order" value="submit_update_order" type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- edit order modal end -->

            <!-- delete order modal -->
            <?php
              if(isset($_POST['submit_delete_order']))
              {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                  $delete_order = $_POST['delete_order'];

                  $sql_delete_order = "DELETE FROM `orders` WHERE `order_id` = '$delete_order'";
                  $result_delete_order = mysqli_query($conn, $sql_delete_order);

                  echo <<<alert
                      <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                        Order deleted <strong>Successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      <script>
                      document.addEventListener("DOMContentLoaded",()=>{
                        let nav_link = document.getElementsByClassName("nav-link")
                        let tab_pane = document.getElementsByClassName("tab-pane")
                        nav_link[0].classList.remove("active")
                        tab_pane[13].classList.remove("active")
                        tab_pane[13].classList.remove("show")
                        nav_link[17].click()
                      })
                      </script>
                  alert;

                }
              }
              if(isset($_POST['cancel_delete_order']))
              {
                echo <<<alert
                  <script>
                  document.addEventListener("DOMContentLoaded",()=>{
                    let nav_link = document.getElementsByClassName("nav-link")
                    let tab_pane = document.getElementsByClassName("tab-pane")
                    nav_link[0].classList.remove("active")
                    tab_pane[13].classList.remove("active")
                    tab_pane[13].classList.remove("show")
                    nav_link[17].click()
                  })
                  </script>
                alert;
              }
            ?>

            <div class="modal fade" id="delete_orders" tabindex="-1" aria-labelledby="delete_orderLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_orderLabel">Are you sure you want to delete this order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" style="width: 50%; margin: auto;">
                      <input type="hidden" class="form-control" id="delete_order" name="delete_order">

                      <div class="mb-3 d-flex justify-content-center">
                      <button name="submit_delete_order" value="submit_delete_order" type="submit" class="mx-3 btn btn-danger">Yes</button>
                      <button name="cancel_delete_order" value="cancel_delete_order" type="submit" class="mx-3 btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete order end -->

            <div class="tab-pane fade" id="v-pills-view-order" role="tabpanel" aria-labelledby="v-pills-view-order-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Order</div>
                <div class="form_container">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="p-3">Order ID</th>
                        <th scope="col" class="p-3">Customer Email</th>
                        <th scope="col" class="p-3">Product Model no.</th>
                        <th scope="col" class="p-3">Product Quantity</th>
                        <th scope="col" class="p-3">Order Date</th>
                        <th scope="col" class="p-3">Total Amount</th>
                        <th scope="col" class="p-3">Payment Status</th>
                        <th scope="col" class="p-3">Order Status</th>
                        <th scope="col" class="p-3">Update Order</th>
                        <th scope="col" class="p-3">Delete Order</th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php
                        $sql_view_orders = "SELECT * FROM `orders`";
                        $result_view_orders = mysqli_query($conn, $sql_view_orders);
                        $orders_count = mysqli_num_rows($result_view_orders);

                        while ($row_view_orders = mysqli_fetch_assoc($result_view_orders)) {
                            $view_order_id = $row_view_orders['order_id'];
                            $view_order_customer_email = $row_view_orders['customer_id'];
                            $view_order_product_ids = $row_view_orders['product_ids'];
                            $view_order_product_quantities = $row_view_orders['product_quantities'];
                            $view_order_date = $row_view_orders['order_date_time'];
                            $view_order_total_amount = $row_view_orders['total_amount'];
                            $view_order_payment_status = $row_view_orders['payment_status'];
                            $view_order_status = $row_view_orders['delivery_status'];

                            // Convert product ids and quantities to arrays
                            $product_ids = explode(',', $view_order_product_ids);
                            $product_quantities = explode(',', $view_order_product_quantities);

                            echo <<<tr
                            <tr>
                                <td scope="col" class="p-3 align-middle">$view_order_id</td>
                                <td scope="col" class="p-3 align-middle">$view_order_customer_email</td>
                                <td scope="col" class="p-3 align-middle text-center">
                            tr;
                            // Iterate over product ids and quantities
                            for ($i = 0; $i < count($product_ids); $i++) {
                                $product_id = $product_ids[$i];
                                $product_quantity = $product_quantities[$i];

                                // Fetch product model number using $product_id from database
                                // Replace `products` with your actual table name and `model_no` with the actual column name
                                $sql_product_model = "SELECT model_no FROM `products` WHERE product_id = '$product_id'";
                                $result_product_model = mysqli_query($conn, $sql_product_model);
                                $row_product_model = mysqli_fetch_assoc($result_product_model);
                                $product_model_number = $row_product_model['model_no'];

                                echo $product_model_number . '<br>';
                            }

                            echo '</td>
                                <td scope="col" class="p-3 align-middle text-center">';

                            // Iterate over product quantities
                            for ($i = 0; $i < count($product_quantities); $i++) {
                                echo $product_quantities[$i] . '<br>';
                            }

                            echo <<<tr
                                </td>
                                <td scope="col" class="p-3 align-middle">$view_order_date</td>
                                <td scope="col" class="p-3 align-middle">$view_order_total_amount</td>
                                <td scope="col" class="p-3 align-middle">
                            tr;
                            if ($view_order_payment_status == 1) {
                                echo "Payment Received";
                            } else {
                                echo "Payment Pending";
                            }

                            echo <<<tr
                                </td>
                                <td scope="col" class="p-3 align-middle">$view_order_status</td>
                                <td scope="col" class="p-3 align-middle"><div class="d-flex justify-content-center"><button class="px-3 update_order btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#update_orders">Update</button></div></td>
                                <td scope="col" class="p-3 align-middle"><div class="d-flex justify-content-center"><button id="$view_order_id" class="px-3 delete_order btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_orders">Delete</button></div></td>
                            </tr>
                            tr;
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- view-order end -->

            <!-- view-payments -->
            <div class="tab-pane fade" id="v-pills-view-payments" role="tabpanel" aria-labelledby="v-pills-view-payments-tab" tabindex="0">
              <div class="me-3">
                <div class="mt-5 p-1 px-3 page_title">View Payments</div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" class="p-3">Payment No.</th>
                      <th scope="col" class="p-3">Invoice No.</th>
                      <th scope="col" class="p-3">Amount Paid</th>
                      <th scope="col" class="p-3">Payment Method</th>
                      <th scope="col" class="p-3">Reference No.</th>
                      <th scope="col" class="p-3">Payment Date</th>
                      <th scope="col" class="p-3">Payment Time</th>
                      <th scope="col" class="p-3">Delete Payment Record</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <!-- view-payments end -->

            <!-- Dashboard page -->
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
              <h1 class="py-3 mt-3">Dashboard</h1>
              <div class="dash-card-container me-3 my-3 mb-5" >
                <div class="dash-card m-3">
                  <div class="m-3"><span class="material-symbols-outlined">inventory_2</span></div>
                  <div style="line-height:100%;" class="m-3"><?php echo $product_count; ?><br>Products</div>
                </div>
                <div class="dash-card m-3">
                  <div class="m-3"><span class="material-symbols-outlined">person</span></div>
                  <div style="line-height:100%;" class="m-3"><?php echo $users_count; ?><br>Customers</div>
                </div>
                <div class="dash-card m-3">
                    <div class="m-3"><span class="material-symbols-outlined">star</span></div>
                    <div style="line-height:100%;" class="m-3"><?php echo $product_brand_count; ?><br>Brands</div>
                  </div>
                  <div class="dash-card m-3">
                    <div class="m-3"><span class="material-symbols-outlined">order_approve</span></div>
                    <div style="line-height:100%;" class="m-3"><?php echo $orders_count; ?><br>Orders</div>
                  </div>
                </div>
                <div class="me-3">
                    <div class="page_title page_title_dashboard my-3 p-2">New orders</div>
                    <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" class="p-4">Order No.</th>
                      <th scope="col" class="p-4">Invoice No.</th>
                      <th scope="col" class="p-4">Customer Email</th>
                      <th scope="col" class="p-4">Product Name</th>
                      <th scope="col" class="p-4">Product Quantity</th>
                      <th scope="col" class="p-4">Order Date</th>
                      <th scope="col" class="p-4">Total Amount</th>
                      <th scope="col" class="p-4">Payment Status</th>
                      <th scope="col" class="p-4">Order Status</th>
                      <th scope="col" class="p-4">Delete Order</th>
                    </tr>
                  </thead>
                </table>
                    <div onclick="view_all_order()" style="cursor: pointer; display:flex; color: rgb(13,110,253); font-size: large;" class="my-3 px-4">
                      <div>View all orders </div> 
                      <div><i class="material-symbols-outlined" style="display:inline;">
                      arrow_circle_right
                      </i>
                      </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard page end -->

            <!-- users -->
            <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">9</div>
            <!-- users end -->
          </div>
        </div>
        <!-- main page end -->
    </body>
    <script>feather.replace()</script>
    <script src="script.js"></script>
</html>