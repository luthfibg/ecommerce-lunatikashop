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

<header class="user_header">
    <section class="flex container py-3">
        <a href="home.php" class="logo">Lunatika
            <i style="color: var(--component-livid);">Shop</i>
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
            <a href="shop.php">Shop</a>
            <a href="my_orders.php">My Orders</a>
            <a href="javascript:;" onclick="menu()" id="product-btn">About</a>
            <a href="contact.php">Contact</a>
            <a href="help.php">Help Center</a>
        </nav>
        <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if ($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <p style="color: var(--light-primary);">
                    <? $fetch_profile['name']; ?>
                </p>
                <a href="update_profile.php" class="btn btn-sm">Update Profile</a>
                <div class="flex-btn">
                    <a href="user_login.php" class="btn btn-sm btn-opt">Login</a>
                    <a href="user_register.php" class="btn btn-sm btn-opt">Register</a>
                </div>
                <a href="../user_logout.php" onclick="return confirm('Are you sure logout from this site?');"
                    class="btn btn-sm btn-delete">Logout</a>
                <?php
            } else {
                ?>
                <p class="when-no-user"><i class="fa-solid fa-person-circle-exclamation"
                        style="color: var(--component-crimson);"></i>&nbsp;User
                    haven't logged in</p>
                <div class="flex-btn">
                    <a href="user_login.php" class="btn btn-sm btn-opt">Login</a>
                    <a href="user_register.php" class="btn btn-sm btn-opt">Register</a>
                </div>
                <?php
            }
            ?>

        </div>
        <div class="icons">
            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_items = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
            ?>
            <a href="search.php" class="search-btn">
                <i class="fas fa-search fa-sm"></i>
            </a>
            <a href="wishlist.php" class="wishlist-btn position-relative ms-3 pe-3">
                <i class="fas fa-heart fa-sm"></i>
                <?php
                if ($total_wishlist_items > 0) {
                    ?>
                    <span class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-warning">
                        <?= $total_wishlist_items; ?>
                        <span class="visually-hidden">wishlist</span>
                    </span>
                    <?php
                }
                ?>
            </a>
            <a href="cart.php" class="cart-btn position-relative ms-0 pe-3">
                <i class="fas fa-shopping-cart fa-sm"></i>
                <?php
                if ($total_cart_items > 0) {
                    ?>
                    <span class="position-absolute top-0 start-80 translate-middle badge rounded-pill bg-warning">
                        <?= $total_cart_items; ?>
                        <span class="visually-hidden">cart</span>
                    </span>
                    <?php
                }
                ?>
            </a>
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="account-btn fas fa-user"></div>
        </div>
    </section>
</header>