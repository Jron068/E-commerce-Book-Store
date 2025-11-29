<?php
session_start();

// loading of checkout
if(isset($_POST['checkout'])){ 
    $_SESSION['name'] = $_POST['name'] ?? '';
    $_SESSION['number'] = $_POST['number'] ?? '';
    $_SESSION['address'] = $_POST['address'] ?? '';
    $_SESSION['payment'] = $_POST['payment'] ?? '';

    if(!empty($_SESSION['name']) && !empty($_SESSION['address']) && !empty($_SESSION['number'])){
        header("Location: ../FrontEnd/checkout.php");
        exit;
    }else{  // reload page
        header("Location: user_form.php"); 
        exit;
        }
    }

$total_price = 0;


?>



<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Demo</title>
        
        <!-- Bootstrap HTML -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- External CSS -->
        <link rel="stylesheet" href="../Assets/home-con.css">
        <link rel="stylesheet" href="../Assets/aboutus.css">
        <link rel="stylesheet" href="../Assets/Stylesheets/cart.css">
        <link rel="stylesheet" href="../Assets/Stylesheets/user_form.css">

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

            </div>
        </div>
    </div>
</nav>


<div class="container my-5" style="background-color: #fde8a7;">

    <div class="summary-box mx-auto col-md-8" style="border: 1px solid black;">

        <div class="summary-header text-center mb-3">
            Payment & Shipping
        </div>

        <!-- Product Table -->
        <table class="table table-borderless text-dark" style="border: 1px solid black;">

        <!-- Information-->

        <form method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="mb-3">
                <label for="name" class="form-label"><b>NAME:</b></label>
                <input type="text" class="form-control" placeholder="FULLNAME" name="name">
                <label for="number" class="form-label" style="padding-top: 10px;"><b>NUMBER:</b></label>
                <input type="tel" class="form-control" placeholder="+63 991 329 5173" name="number">
                <label for="address" class="form-label" style="padding-top: 10px;"><b>ADDRESS:</b></label>
                <input type="text" class="form-control" placeholder="HOUSE NUMBER / STREET / MUNICIPALITY / PROVINCE" name="address">
            </div>

            <select class="form-select custom-select" style="margin-bottom: 20px;" name="payment" required>
                <option value="" selected disabled hidden>Select Payment Method</option>
                <option value="Pay Maya">Pay Maya</option>
                <option value="GCASH">GCASH</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select>



            <!-- Item Description-->
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): 
                    $total = $item['price'] * $item['quantity'];
                    $total_price += $total;
                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td>PHP <?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr class="fw-bold">
                    <td colspan="2" class="text-start">TOTAL:</td>
                    <td>PHP <?= number_format($total_price, 2) ?></td>
                </tr>
            </tfoot>
        </table>

        <hr>

        <div class="text-center mt-4">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <button class="checkout-btn" name="checkout">CHECKOUT</button>
            </form>
        </div>

    </form>

</div>
    <div style="padding: 20px;"></div>
</div>

<!--JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
