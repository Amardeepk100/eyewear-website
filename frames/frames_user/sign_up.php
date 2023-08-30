<!DOCTYPE html>
<html lang="en">
<?php 
include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
<?php
if (isset($_POST['sbutton'])) {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];
        $address = $_POST["address"];
        $prescription = $_POST["prescription"];

        // Validate password
        if ($password !== $confirmPassword) {
                echo <<<alert
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password and Confirm password does not <strong>match</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                alert;
        } else {
            // Passwords match, check if email or phone number already exists

            // SQL query to check if email or phone number already exists
            $checkQuery = "SELECT * FROM users WHERE email = '$email' OR number = '$number'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                echo <<<alert
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email id or Phone number <strong>already</strong> exist.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                alert;
            } else {
                // Email and phone number do not exist, proceed with inserting data

                // SQL query to insert data into table
                $insertQuery = "INSERT INTO users (name, email, number, password, address, prescription)
                                VALUES ('$name', '$email', '$number', '$password', '$address', '$prescription')";

                // Execute the query
                if ($conn->query($insertQuery) === TRUE) {
                    echo <<<alert
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Account created <strong>successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    alert;
                } else {
                    echo "Error inserting data: " . $conn->error;
                }
            }
        }
    }
}
?>
<div class="cart_product_container1 cart_product_container2 mt-3 d-flex flex-column align-items-center" style="width:30%;border-radius:10px">
    <div class="mt-3" style="width:90%; margin: auto">
        <p class="text-center mb-3" style="font-family:; color: rgb(18, 70, 143); font-size: 30px; line-height: 1.4;">Sign-Up</p>
    </div>
    <div style="width: 80%; height:90%; margin: auto;overflow:auto;">
        <form id="myForm" method="POST" action="">
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
            <label for="number" class="form-label">Mobile No.</label>
            <input type="number" class="form-control" id="number" name="number">
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>

            <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3"></textarea>
            </div>

            <div class="mb-3">
            <label for="prescription" class="form-label">Prescription</label>
            <textarea name="prescription" class="form-control" id="prescription" rows="2"></textarea>
            </div>

            <input type="hidden" class="form-control" id="sbutton" name="sbutton">
      </form>
    </div>
    <div class="my-3" style="width:80%; margin: auto">
        <button id="sign-up" name="sign-up" value="sign-up" type="submit" class="btn btn-primary">Sign-up</button>
    </div>
    <script>
    document.getElementById('sign-up').addEventListener('click', function() {
        document.getElementById('sbutton').value = "1"
        document.getElementById('myForm').submit();
    });
    </script>
</div>
<script src="script3.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>