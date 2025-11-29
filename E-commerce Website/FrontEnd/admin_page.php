<?php
session_start();
include '../BackEnd/database.php';

// Handle update
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    mysqli_query($connection, "UPDATE productitem SET name='$name', price='$price' WHERE id=$id");
    header("Location: ../FrontEnd/product_page.php");
    exit;
}

// Handle delete
if (isset($_POST['delete_product'])) {
    $id = $_POST['id'];
    mysqli_query($connection, "DELETE FROM productitem WHERE id=$id");
    header("Location: ../FrontEnd/product_page.php");
    exit;
}

// Get product to edit if any
$editProduct = null;
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];
    $editProduct = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM productitem WHERE id=$editId"));
}

// Delete Product
$deleteProduct = null;
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteProduct = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM productitem WHERE id=$deleteId"));
}

// Fetch all products
$result = mysqli_query($connection, "SELECT * FROM productitem");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BookshelfPH Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f4e2a0; }
.navbar { background-color: #17473b; }
.logo-img { height: 50px; width: 50px; object-fit: contain; }
.card { background: transparent; border: none; box-shadow: none; }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-2">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
      <img class="logo-img" src="../Assets/img/bookshelf-logo.png" alt="BookshelfPH Logo" style="margin-right: 10px;">
      BOOKSHELFPH
    </a>
  </div>

  <a href="../FrontEnd/index.html" class="btn btn-danger mt-2" style="margin-right: 20px;">LogOut</a>
</nav>

<div class="container py-5">

    <!-- Edit Form -->
    <?php if ($editProduct): ?>
        <div class="mb-5">
            <h3>Edit Product: <?= htmlspecialchars($editProduct['name']) ?></h3>
            <form method="POST" class="row g-3">
                <input type="hidden" name="id" value="<?= $editProduct['id'] ?>">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($editProduct['name']) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?= $editProduct['price'] ?>" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="update_product" class="btn btn-success">Update Product</button>
                    <a href="admin_page.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    <?php endif; ?>

    <!-- Delete Confirmation -->
    <?php if ($deleteProduct): ?>
        <div class="mb-5">
            <h3>Delete Product</h3>
            <p>Are you sure you want to delete <strong><?= htmlspecialchars($deleteProduct['name']) ?></strong>?</p>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $deleteProduct['id'] ?>">
                <button type="submit" name="delete_product" class="btn btn-danger">Yes, Delete</button>
                <a href="admin_page.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    <?php endif; ?>

    <!-- Product List -->
    <h2 class="mb-4">Product List</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-2 col-6">
                <div class="card book-card">
                    <img src="../Assets/img/<?= $row['image'] ?>" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="title"><?= htmlspecialchars($row['name']) ?></p>
                        <p>PHP <?= number_format($row['price'], 2) ?></p>
                        
                        <a href="?edit_id=<?= $row['id'] ?>" class="btn btn-warning mt-2">Edit</a>
                        <a href="?delete_id=<?= $row['id'] ?>" class="btn btn-danger mt-2">Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
