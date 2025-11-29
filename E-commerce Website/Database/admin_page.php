<?php 
session_start();
include '../BackEnd/database.php';

// OPTIONAL: Restrict access to logged-in admin only
// if (!isset($_SESSION['admin'])) {
//   header("Location: login.php");
//   exit();
//}

$sql = 'SELECT * FROM productitem';
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Manage Products</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .table img { width: 60px; border-radius: 5px; }
  </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4" style="background:#0c3b35;">
  <span class="navbar-brand fw-bold">Admin Dashboard</span>
</nav>

<div class="container py-5">

  <!-- PAGE HEADER -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Product Management</h2>
    <a href="add_product.php" class="btn btn-success">+ Add Product</a>
  </div>

  <!-- PRODUCT TABLE -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price (PHP)</th>
        <th width="180">Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>

        <td>
          <img src="../Assets/img/<?php echo $row['image']; ?>" alt="">
        </td>

        <td><?php echo $row['name']; ?></td>

        <td><?php echo number_format($row['price']); ?></td>

        <td>
          <a href="edit_product.php?id=<?php echo $row['id']; ?>" 
             class="btn btn-primary btn-sm">Edit</a>

          <a href="delete_product.php?id=<?php echo $row['id']; ?>" 
             class="btn btn-danger btn-sm"
             onclick="return confirm('Are you sure?')">
             Delete
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>

  </table>
</div>

</body>
</html>
