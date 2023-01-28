<?php

include 'components/connection.php';
$message = array();
if (isset($message)) {
    foreach ($message as $message) {
        echo '
            <div class="message w-75 w-50-sm w-25-lg">
              <span>' . $message . '</span>
              <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
    }
}
?>

<header class="header">
    <section class="flex container py-3">
        <a href="home.php" class="logo">Lunatika
        </a>
        <div class="product-operation">
            <a href="#">
                <i class="fas fa-circle-plus"></i>
                <span class="ms-3">Lunatika</span>
            </a>
            <a href="#" class="mt-3">
                <i class="fas fa-cubes"></i>
                <span class="ms-3">Lunatika Shop</span>
            </a>
            <a href="#" class="mt-3">
                <i class="fas fa-cubes"></i>
                <span class="ms-3">Blogs</span>
            </a>
        </div>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="placed_orders.php">Shop</a>
            <a href="admin_accounts.php">My Orders</a>
            <a href="javascript:;" onclick="menu()" id="product-btn">About</a>
            <a href="user_accounts.php">Contact</a>
            <a href="messages.php">Help Center</a>
        </nav>
        <div class="icons">
            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlists` WHERE user_id = ?");
            $count_wishlist_items->execute();
            $total_wishlist_items = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `carts` WHERE user_id = ?");
            $count_cart_items->execute();
            $total_cart_items = $count_cart_items->rowCount();
            ?>
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p>
                <? $fetch_profile['name']; ?>
            </p>
            <a href="update_profile.php" class="btn btn-sm">Update Profile</a>
            <div class="flex-btn">
                <a href="login.php" class="btn btn-sm btn-opt">Login</a>
                <a href="register.php" class="btn btn-sm btn-opt">Register</a>
            </div>
            <a href="../logout.php" onclick="return confirm('Are you sure logout from this site?');"
                class="btn btn-sm btn-delete">Logout</a>
        </div>
    </section>
</header>