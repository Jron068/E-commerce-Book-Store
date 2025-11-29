<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get POST data
$product_id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

// If item already exists, increase qty
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]['quantity'] += 1;
} else {
    $_SESSION['cart'][$product_id] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity' => 1
    ];
}

// Redirect to cart page
header("Location: ../FrontEnd/cart.php");
exit;
?>
