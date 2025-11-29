    <?php
    session_start();
    include '../BackEnd/database.php';

    if(isset($_POST['done'])){
        header("Location: ../FrontEnd/home.php");
        exit;
    }

    $customer_name = $_SESSION['name'];
    $customer_number = $_SESSION['number'];
    $customer_address = $_SESSION['address'];
    $payment_method = $_SESSION['payment'];

    $total_price = 0;

    // Insert order into database (beginner-friendly)
    if(!empty($customer_name) && !empty($customer_number) && !empty($customer_address) && !empty($payment_method)){
        $userID = $_SESSION['user_id'];
        $sql = "INSERT INTO orders (user_id, name, number, address, paymentMethod)
        VALUES ('$userID', '$customer_name', '$customer_number', '$customer_address', '$payment_method')";

    }
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

            <!-- External CSS -->
            <link rel="stylesheet" href="../Assets/home-con.css">
            <link rel="stylesheet" href="../Assets/aboutus.css">
            <link rel="stylesheet" href="../Assets/Stylesheets/cart.css">

        </head>

    <style>
            body {
                background-color: #fde8a7;
            }
            .summary-box {
                background-color: #ccb080;
                border-radius: 20px;
                padding: 25px;
            }
            .summary-header {
                background-color: #a3804e;
                color: #2f3d0b;
                border-radius: 15px;
                padding: 10px;
                font-weight: bold;
                font-size: 1.3rem;
            }
            .checkout-btn {
                background-color: #5c2621;
                color: white;
                border-radius: 25px;
                padding: 10px 35px;
                font-weight: bold;
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

                </div>
            </div>
        </div>
    </nav>

    <!-- Body -->
    <div class="container my-5" style="background-color: #fde8a7;">

        <div class="summary-box mx-auto col-md-8" style="border: 1px solid black;">

            <div class="summary-header text-center mb-3">
                RECEIPT
            </div>

            <!-- Product Table -->
            <table class="table table-borderless text-dark" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                    </tr>
                </thead>

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

            <!-- Payment Summary -->
            <p class="fw-bold">PAYMENT METHOD: <span class="text-danger"><?= $payment_method ?></span></p>
            <p>AMOUNT TO PAY: <strong>PHP <?= number_format($total_price, 2) ?></strong></p><br>
            <p>NAME: <?= $customer_name ?></p> 
            <p>NUMBER: <?= $customer_number ?></p>
            <br><p>SHIPPING ADDRESS: <?= $customer_address ?></p>
            
            <?php 
            if(mysqli_query($connection, $sql)){
                // Insert successful
                echo "Order saved!";
            } else {
                echo "Error: " . mysqli_error($connection);
            }

            ?>

            <div class="text-center mt-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                    <button class="checkout-btn" name="done">DONE</button>
                </form>
            </div>

        </div>
        <div style="padding: 20px;"></div>
    </div>

        <!--JS script -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>