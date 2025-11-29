<?php 
session_start(); 
include '../BackEnd/database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookshelfPH</title>


  <!-- Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

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
<nav class="navbar navbar-expand-lg navbar-dark py-2" style="background:#0c3b35;">
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


 <!-- LOGIN SECTION -->
<section class="d-flex justify-content-center align-items-center vh-100" style="background:#f4e3b2;">
    <div class="card shadow-lg p-4 rounded-4" style="width: 24rem; background: #f4e3b2; ">

        <h2 class="text-center mb-4 fw-bold">Register Your Account</h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-control rounded-pill"
                       placeholder="Enter your Email Address" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill"
                       placeholder="Enter your Password" required>
            </div>

            <!-- Submit -->
            <button type="submit" name="submit" class="btn btn-warning w-100 rounded-pill fw-bold">
                Register
            </button>

        </form>
    </div>
</section>

    <?php 
      if(isset($_POST['submit'])){
      $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
      $password = $_POST['password'];
        if (!empty($username) && !empty($password)) {
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;

          //add to sql
          $sql= "INSERT INTO accounts (username, password) VALUES
          ('$username', '$password')";

          // File path
          $file = '../Assets/index.txt';

          // Write or overwrite file with new registration data
           $handle = fopen($file, 'a');
           $content = "Username: $username\nPassword: $password\n-------------------\n";
           fwrite($handle, $content);
           fclose($handle);

          // Redirect to login page after registering
          if(mysqli_query($connection, $sql)){
            //success connection
            echo "Successfull";
            header('Location: ../FrontEnd/login_page.php');
            exit;
          }else{
            echo "Invalid" . mysqli_error($connection);

          }
        }
      }
    ?>


  <!-- JS -->
  <script src="/FrontEnd/index.js"></script>
</body>
</html>
