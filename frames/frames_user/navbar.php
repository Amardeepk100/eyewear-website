<?php 
  include '_dbconnect.php';
  session_start()
?>

<?php
if(isset($_POST['login']))
{
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
        $emailOrMobile = $_POST['email-number'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE (email = '$emailOrMobile' OR number = '$emailOrMobile') AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['username'] = $row['name'];
            $loginSuccess = true;

        } else {
          $loginSuccess = false;
        }
  }
}
?>

<!-- edit product login -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="login_modalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="login_modalLabel">Login</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="POST" style="width: 50%; margin: auto;">
        <div class="mb-3">
          <label for="email-number" class="form-label">Email or Mobile No.</label>
          <input type="text" class="form-control" id="email-number" name="email-number">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
        <button name="login" value="login" type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- edit product login end -->
<!-- navigation start -->
<nav id="nav" class="navbar navbar-expand bg-light py-2 px-0 sticky-top" style="box-shadow: 0px -3px 9px 0px #111;">
  <div class="container-fluid">
    <div style="margin:auto; width:70%;">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div>
          <div class="logo-container">
            <img src=assests/logo/logo2.png ></img>
          </div>
          <div class="text-center mt-0" style="font-family: 'Noto Serif JP', sans-serif; user-select: none;">Elite Eyewear</div>
        </div>
        <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php#eyeglasses">EYEGLASSES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php#sunglasses">SUNGLASSES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php#product_cards">OUR COLLECTION</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              MORE
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="home.php#brands">Brands</a></li>
              <li><a class="dropdown-item" href="home.php#brag">What makes us stand apart</a></li>
              <li><a class="dropdown-item" href="home.php#about_us">About us</a></li>
              <li><a class="dropdown-item" href="home.php#testimonials">Testamonials</a></li>
              <li><a class="dropdown-item" href="home.php#contact_us">Contact us</a></li>

              <!-- Add logout link only if user is logged in -->
              <?php if (isset($_SESSION['user_email'])): ?>
                <li><a class="dropdown-item" href="order_history.php">Order History</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout <?php echo $_SESSION['username']?></a></li>
              <?php else: ?>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#login_modal">Login</a></li>
                <li><a class="dropdown-item" href="sign_up.php">Sign-up</a></li>
              <?php endif; ?>

              <!-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#login_modal">Login</a></li>
              <li><a class="dropdown-item" href="sign_up.php">Sign-up</a></li>
              <li><a class="dropdown-item" href="">Logout</a></li> -->
            </ul>
          </li>
        </ul>
        <?php
          $search_results = @$_POST['search'];
          $product_type_home = @$_POST['product_type'];
          $frame_shape_home = @$_POST['frame_shape'];
          $sort = @$_POST['sort_option'];
        ?>
        <form action="search.php" method="post" class="d-flex overflow-hidden" role="search">
          <div class="input-group">
            <input style="width:10rem" autocomplete="off" value="<?php echo $search_results ?>" id="search" name="search" class="form-control search" type="search" placeholder="Search" aria-label="Search">
            <button id="search_button" class="btn btn-outline-secondary" type="submit"><i id="search_icon" data-feather="search"></i></button>
            <button onclick="window.location.href = 'cart.php';" id="cart_button" class="btn btn-outline-secondary" type="button"><i data-feather="shopping-cart"></i></button>
          </div>
        </form>
        <div>
          <button onclick="window.location.href = '3D_try_on.php';" type="button" class="btn btn-primary">
            <div class="text-center mt-0" style="font-family: 'Noto Serif JP', sans-serif; user-select: none;">3D try On</div>
          </button>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- navigation end -->

<div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?php echo isset($loginSuccess) && $loginSuccess ? 'block' : 'none'; ?>">
  <strong>Logged in successfully</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?php echo isset($loginSuccess) && !$loginSuccess ? 'block' : 'none'; ?>">
  <strong>Invalid</strong> email/mobile or password
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>