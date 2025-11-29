<?php 
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookshelfPH</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="../Assets/home-con.css">
      <link rel="stylesheet" href="../Assets/aboutus.css">
</head>

<style>
    /* Make background uniform */
    body{
        background-color: #f4e2a0;
    }

    /* BOOK CARDS FIX — clean + aligned + responsive */
    .card {
        border: none;
        background-color: #f4e2a0;   /* matches main background */
        border-radius: 12px;
        transition: 0.3s ease;
        height: 100%;
    }

    /* Image sizing equal */
    .card img {
        height: 220px;
        object-fit: cover;
        border-radius: 12px 12px 0 0;
    }

    /* Card text area */
    .card-body{
        background-color: #f4e2a0;
        padding: 12px;
    }

    /* Align text nicer */
    .card-title{
        font-weight: bold;
        color:#31241e;
    }

    /* Button Styling */
    .buy, .btn-primary {
        background-color: #31241e !important;
        color: #f4e2a0;
        width: 100%;
        border-radius: 25px;
        font-size: 14px;
    }

    /* Hover effect to make cards pop */
    .card:hover{
        transform: translateY(-6px);
        box-shadow: 0px 6px 15px rgba(0,0,0,0.25);
    }

    /* Center ratings properly */
    .card-body h5{
        font-size: 15px;
        color:#301616;
        margin-bottom: 10px;
    }

</style>

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

    <div class="container py-4">
        <h1 class="tag-name text-center">BOOKSHELFPH</h1>
        <p class="text-center fw-bold fst-italic">“Books are mirrors: you only see in them what you already have inside you.”</p>
        <hr>
        <p class="text-center fst-italic">Welcome to a space made for dreamers, thinkers, and lifelong learners. 
            Every book you’ll find here has a story worth telling and a lesson worth remembering. 
            Browse through our online store and let your next great reading adventure begin.</p>
        <hr>
    </div>

<div class="container py-4">
    <h2 class="text-center mb-4 fw-bold">Featured Books</h2>

    <div class="row g-4 justify-content-center">

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book1.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book2.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book3.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book4.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book5.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card book-card">
                <img src="../assets/img/book7.png" class="card-img-top" alt="book">
                <div class="card-body text-center">
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="../FrontEnd/product_page.php" class="btn btn-dark w-100">BUY NOW</a>
                </div>
            </div>
        </div>

    </div>
</div>



    
    <!-- Bootstrap JS -->
    <script type="module" src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">

    

    </script>
</body>
</html>
