<?php
session_start();
include '../BackEnd/database.php';

$adminEmail = "admin@1234";
$adminPass = "root";




if (isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $file = '../Assets/index.txt';
    
    // Query the user
    $sql = "SELECT * FROM accounts WHERE username = '$email' LIMIT 1";
    $result = mysqli_query($connection, $sql);

    //account that direct to admin
    if($email==$adminEmail && $password ==$adminPass){
        header("Location: ../FrontEnd/admin_page.php");
        exit;
    }

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $password ) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: ../FrontEnd/home.php");
            exit;
        } else {
             echo "<script>alert('The password you entered is incorrect. Please try again.')</script>;";
          }
    } else {
         echo "<script>alert('The password you entered is incorrect. Please try again.')</script>;";
      }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | BookshelfPH</title>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- External CSS -->
    <link rel="stylesheet" href="../Assets/home-con.css">
    <link rel="stylesheet" href="../Assets/login.css">

  <!-- Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-2" style="background:#0c3b35; ">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand bookshelf fw-bold d-flex align-items-center" style="font-size:1.8em;">
            <img class="logo-img" src="../Assets/img/bookshelf-logo.png" 
                 style="width: 2em; height: auto; margin-right: 10px;">
            BOOKSHELFPH
        </a>

        <!-- Hamburger Button -->
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </button>

        <!-- MENU ITEMS -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav text-end">

                <a class="btn btn-primary my-2" href="login_page.php">Login</a>
                <a class="btn btn-outline-light my-2 ms-lg-2" href="registration_page.php">Register</a>

            </div>
        </div>
    </div>
</nav>



  <div class="d-flex justify-content-center align-items-center vh-100 bg-#f4e3b2;">
    <div class="card shadow-lg p-4 rounded-4" style="width: 23rem; background-color: #f4e3b2; ">

        <h3 class="text-center mb-4 fw-bold">Login</h3>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control rounded-pill" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control rounded-pill" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold" name="login">
                Login
            </button>

            <p class="text-center mt-3 mb-0">
                <small>Don't have an account? <a href="#">Sign Up</a></small>
            </p>
        </form>

    </div>
</div>



  <!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <script src="index.js"></script>
</body>
</html>
