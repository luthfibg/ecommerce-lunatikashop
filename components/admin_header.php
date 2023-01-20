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
        <a href="dashboard.php" class="logo">Admin
            <span>Panel</span>
        </a>
        <div class="product-operation">
            <a href="products.php">
                <i class="fas fa-circle-plus"></i>
                <span class="ms-3">Insert Product</span>
            </a>
            <a href="view_products.php" class="mt-3">
                <i class="fas fa-cubes"></i>
                <span class="ms-3">All Product</span>
            </a>
        </div>
        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="javascript:;" onclick="menu()" id="product-btn">Products</a>
            <a href="placed_orders.php">Placed Orders</a>
            <a href="admin_accounts.php">Admin Accounts</a>
            <a href="user_accounts.php">User Accounts</a>
            <a href="messages.php">Messages</a>
        </nav>
        <div class="icons">
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