<?php
session_start();

// Clear page
if(isset($_POST['clear_cart'])){
    unset($_SESSION['cart']); // reload page
    header("Location: cart.php"); 
    exit;
}

if(isset($_POST['checkout'])){
    header("Location: ../FrontEnd/user_form.php");
    exit;
}

//back to product page
if(isset($_POST['back'])){
    header("Location: ../FrontEnd/product_page.php");
    exit;
}

// Decreasing
if(isset($_POST['decrease_cart'])){
    $x = $_POST['decrease_cart'];
    if($_SESSION['cart'][$x]['quantity'] > 1){
        $_SESSION['cart'][$x]['quantity'] -= 1;
        }else{
            unset($_SESSION['cart'][$x]);
        }header("Location: cart.php");
            exit;
    }
    
// Increasing
if(isset($_POST['increase_cart'])){
    $y = $_POST['increase_cart'];
    $_SESSION['cart'][$y]['quantity'] += 1;
    header("Location: cart.php");
    exit;
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- External CSS -->
        <link rel="stylesheet" href="../Assets/home-con.css">
        <link rel="stylesheet" href="../Assets/aboutus.css">
        <link rel="stylesheet" href="../Assets/Stylesheets/cart.css">

    </head>

    <style>
        table {
            border-collapse: separate;
            border-spacing: 15px;
            width: 100%;
        }
        td, th {
            vertical-align: middle;
            text-align: center;
            border-radius: 20px;
        }
        .tableHead{
            font-size: 1.2em;
        }
        .product-img {
            border-radius: 6px;
            width: 200px;
            height: auto;
        }
        #shopHead{
            text-align: center;
            background-color: rgba(163, 128, 78, 1);
            border-radius: 20px; padding: 20px;
            color: rgba(72, 78, 11, 1);
            font-weight: bolder;
        }
        .product-img {
        max-width: 100%;
        height: auto;
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
    
<div class="container my-5" id="shopHead">
    <h1 class="mb-4">SHOPPING CART</h1>
    
    <!-- Make table responsive -->
    <div class="table-responsive" style="background-color: rgba(204, 172, 128, 1); border-radius: 20px; padding: 10px;">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th class="tableHead">Product</th>
                    <th class="tableHead">Price</th>
                    <th class="tableHead">Quantity</th>
                    <th class="tableHead">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $total_price = 0;
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $id => $item){
                    if(!is_array($item)) continue;
                    $total = $item['price'] * $item['quantity'];
                    $total_price += $total;

                    echo "<tr>
                        <td>
                            <img class='product-img img-fluid' src='../Assets/img/{$item['image']}' alt='{$item['name']}'><br>
                            <strong>{$item['name']}</strong>
                        </td>
                        <td>PHP ".number_format($item['price'],2)."</td>
                        <td>{$item['quantity']}</td>
                        <td>PHP ".number_format($total,2)."</td>
                        <td>

                        <form method='post' class='d-inline'>
                            <button type='submit' name='decrease_cart' value='{$id}' class='btn btn-sm btn-warning'>-</button>
                        </form>
                        <form method='post' class='d-inline'>
                            <button type='submit' name='increase_cart' value='{$id}' class='btn btn-sm btn-success'>+</button>
                        </form>

                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>Your cart is empty.</td></tr>";
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>PHP <?php echo number_format($total_price,2); ?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-3 flex-wrap">
    <!-- Left side button -->
    <form method="post">
        <button type="submit" name="back" class="btn btn-danger">BACK</button>
        <button type="submit" name="clear_cart" class="btn btn-danger">Clear Cart</button>
    </form>

    <!-- Right side buttons -->
    <div class="d-flex gap-2">
        <form method="post">
            <button type="submit" name="checkout" class="btn btn-primary">Checkout</button>
        </form>
    </div>
</div>

    <!--JS script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>