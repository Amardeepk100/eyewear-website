<!DOCTYPE html>
<html lang="en">
<?php 
    include '_dbconnect.php';
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lognin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    // Include the database connection file
    include '_dbconnect.php';

    // Initialize the login status flag
    $login_status = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Perform a query to retrieve the email and password from the database (replace 'users_table' with your table name)
        $sql = "SELECT email, password FROM admin_login WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        // Check if the email exists in the database
        if (mysqli_num_rows($result) === 1) {
            // Fetch the row from the result
            $row = mysqli_fetch_assoc($result);

            // Compare the user's input password with the password stored in the database
            if ($password === $row['password']) {
                // If the passwords match, set the login status flag to "success"
                $login_status = "success";
            } else {
                // If the passwords do not match, set the login status flag to "error"
                $login_status = "error";
            }
        } else {
            // If the email does not exist in the database, set the login status flag to "error"
            $login_status = "error";
        }
    }

    // Check the login status and redirect to the next page if login was successful
    if ($login_status === "success") {
        // Redirect to the next page (replace 'next_page.php' with the URL of the next page)
        $_SESSION['user_email'] = $email; // $email is the email of the logged-in user
        header("Location: admin.php");
        exit();
    }
    ?>
    <div style="width:50%; margin:auto;" class="d-flex flex-column mt-5 pt-5">
        <div class="mt-3 pt-5" style="width:90%; margin:auto">
            <div class="d-flex flex-row align-items-center justify-content-center">
                <div>
                    <div class="logo-container">
                        <img src="../frames_user/assests/logo/logo2.png" style="width:10rem"></img>
                    </div>
                    <div class="text-center mt-0" style="font-family: 'Noto Serif JP', sans-serif; user-select: none;">Elite Eyewear</div>
                </div>
            </div>
        </div>
        <div style="width: 80%; height:90%; margin: auto;overflow:auto;">
            <form id="myForm" method="POST">
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="my-3" style="width:80%;">
                    <button id="login" name="login" value="login" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>