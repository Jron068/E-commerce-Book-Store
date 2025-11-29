<?php session_start();
  include '../BackEnd/database.php';


  $sql = 'SELECT * FROM productitem';
  $result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>allproducts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../Assets/product.css">
</head>

<style>
    body {
        background: #f7e29c; /* match your yellow */
    }

    .bg-yellow {
        background: #f7e29c; /* or whatever shade you want */
    }

    .book-card {
        background: transparent !important;  
        border: 1px solid black;
        padding: 10px;
    }

    .card-body {
        background: transparent !important;
        
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


 <!-- Main -->
 <section class="text-center py-5 bg-yellow">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mt-4">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-2 col-6">
                <div class="card book-card">
                    <img src="../Assets/img/<?php echo $row['image']; ?>" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="title"><?php echo $row['name']; ?></p>
                        <p>PHP <?php echo number_format($row['price']); ?></p>
                        
                        <form action="../BackEnd/addtocart.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                            <button type="submit" class="btn btn-dark mt-2" name="cart">BUY NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
