<header class="header">
  <section class="flex flex-justify-between">
    <a href="../product/add_product.php" class="logo navbar">Logo.</a>
    <nav class="empty-space navbar">
      <a href="#">
        <i class="fas fa-search fa-sm"></i>
      </a>
      <a href="#">
        <i class="fas fa-car fa-sm"></i>
      </a>
    </nav>
    <nav class="navbar">
      <a href="../product/add_product.php">
        <i class="fas fa-plus fa-sm"></i>
      </a>
      <a href="../product/view_products.php">
        <i class="fas fa-eye fa-sm"></i>
      </a>
      <?php
      $count_total_cart_items = $conn->prepare("SELECT * FROM `carts` WHERE user_id = ?");
      $count_total_cart_items->execute([$user_id]);
      $total_cart_items = $count_total_cart_items->rowCount();
      ?>
      <a href="#" class="cart-icon">
        <i class="fas fa-shopping-cart fa-sm"></i>
        <span>(<?= $total_cart_items; ?>)</span>
      </a>
    </nav>
  </section>
</header>