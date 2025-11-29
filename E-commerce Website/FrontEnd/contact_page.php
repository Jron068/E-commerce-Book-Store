<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <!-- External CSS -->
     <link rel="stylesheet" href="../Assets/home-con.css">
       <link rel="stylesheet" href="../Assets/aboutus.css">
</head>
<body>
 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-2" style="background:#0c3b35;">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center fw-bold" style="font-size:1.8em;" href="#">
            <img class="logo-img" src="../Assets/img/bookshelf-logo.png" 
                 style="width: 2em; height: auto; margin-right: 10px;" alt="BookshelfPH Logo">
            BOOKSHELFPH
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav align-items-center">

                <a class="nav-link mx-2" href="../FrontEnd/home.php">Home</a>
                <a class="nav-link mx-2" href="../FrontEnd/aboutus_page.html">About</a>
                <a class="nav-link mx-2" href="../FrontEnd/product_page.php">Products</a>
                <a class="nav-link mx-2" href="../FrontEnd/contact_page.php">Contact</a>

                <!-- Cart Icon -->
                <a class="nav-link mx-2" href="cart.php">
                    <img class="logo-img" src="../Assets/img/carts.png" alt="Cart" style="width: 2.5em; height:auto;">
                </a>

                <a href="../FrontEnd/index.html" class="btn btn-danger mt-2" style="margin-right: 20px;">LogOut</a>

            </div>
        </div>
    </div>
</nav>


    <div class="container mt-5">
        <div class="row">
            <!-- Left Column: Contact Form -->
            <div class="col-md-6">
                <h3 class="contact text-start mb-1 mt-4 fw-bold fs-2">Contact Us</h3>
                <hr>
                <p class="text-start fst-italic">
                    Please don't hesitate to reach out to us whenever you need assistance.<br>
                    We’ll make sure to respond to you promptly.
                </p>
                <hr>

                <div class="rounded bg-custom p-4">
                    <form>
                        <!-- Name -->
                        <div class="mb-3">
                            <label class="contact fs-5 form-label">Name</label>
                            <input type="text" class="form-control form-color" placeholder="Enter your name">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="contact fs-5 form-label">Email</label>
                            <input type="email" class="form-control form-color" placeholder="Enter your email">
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label class="contact fs-5 form-label">Message</label>
                            <textarea class="form-control form-color" rows="4" placeholder="Write your message"></textarea>
                        </div>

                        <button type="submit" class="sendM btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Info Cards -->
            <div class="col-md-4 offset-md-1 mt-5">
                <!-- Card 1 -->
                <div class="p-3 mb-3 rounded bg-custom1">
                    <h5>Address</h5>
                    <p>123 Main Street, City, Country</p>
                </div>
                <!-- Card 2 -->
                <div class="p-3 mb-3 rounded bg-custom1">
                    <h5>Phone</h5>
                    <p>+123 456 7890</p>
                </div>
                <!-- Card 3 -->
                <div class="p-3 mb-3 rounded bg-custom1">
                    <h5>Email</h5>
                    <p>info@example.com</p>
                </div>
                <!-- Card 4 -->
                <div class="p-3 mb-3 rounded bg-custom1">
                    <h5>Open</h5>
                    <p>8:00 am - 8:00 pm</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script type="module" src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
