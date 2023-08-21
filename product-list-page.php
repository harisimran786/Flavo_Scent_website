<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List - Flavo Scent</title>
  <link rel="stylesheet" href="website-theme-folder/css/styles.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
  <!-- Header -->
  <?php include 'website-theme-folder/Header.php'; ?>

  <!-- Product List Page Content -->
  <section class="product-list-page">
    <div class="container">
      <h2>Our Products</h2>
      <div class="product-list">
        <div class="product-item">
          <img src="product1.jpg" alt="Product 1">
          <h3>Product 1</h3>
          <p>Price: $[Price]</p>
          <p>Weight: [Weight]</p>
          <a href="product-page.php?id=1" class="button">View Details</a>
        </div>
        <div class="product-item">
          <img src="product2.jpg" alt="Product 2">
          <h3>Product 2</h3>
          <p>Price: $[Price]</p>
          <p>Weight: [Weight]</p>
          <a href="product-page.php?id=2" class="button">View Details</a>
        </div>
        <!-- Add more product items as needed -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'website-theme-folder/footer.php'; ?>

</body>
</html>
