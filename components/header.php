<header class="header">
  <section class="flex">
    <a href="../product/add_product.php" class="logo">Logo.</a>
    <nav class="navbar">
      <a href="../product/add_product.php">
        <i class="fas fa-plus"></i>
      </a>
      <a href="../product/view_products.php">
        <i class="fas fa-eye"></i>
      </a>
      <?php
      $count_total_cart_items = $conn->prepare("SELECT * FROM `carts` WHERE user_id = ?");
      $count_total_cart_items->execute([$user_id]);
      $total_cart_items = $count_total_cart_items->rowCount();
      ?>
      <a href="#" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <span>(<?= $total_cart_items; ?>)</span>
      </a>
    </nav>
  </section>
  <!-- <nav class="navbar">
    <ul class="h-menu mega">
      <li><a href="#">Home</a></li>
      <li>
        <a href="#" class="dropdown-toggle">Products</a>
        <div class="mega-container p-2" data-role="dropdown">
          <div class="row">
            <div class="cell-md-6">
              <h2 class="text-light">Metro UI</h2>
              <p>
                Is an open source toolkit for developing with ...
              </p>
            </div>
            <div class="cell-md-6">
              <h4>Begin with Metro UI</h4>
              <ul class="unstyled-list pl-0">
                <li><a href="#">Getting started</a></li>
                <li><a href="#">Base CSS</a></li>
                <li><a href="#">Components</a></li>
                <li><a href="#">Utilities</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>
      <li>
        <a href="#" class="dropdown-toggle">Support</a>
        <div class="mega-container" data-role="dropdown">
          <ul class="h-menu">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Github</a></li>
            <li><a href="#">Community</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">Cart</a></li>
    </ul>
  </nav> -->
</header>