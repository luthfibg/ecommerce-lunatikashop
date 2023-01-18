<header class="header">
    <section class="flex">
        <a href="dashboard.php" class="logo">Admin
            <span>Panel</span>
        </a>
        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="products.php">Products</a>
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
            <p><? $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">Update Profile</a>
            <div class="flex-btn">
                <a href="admin_login.php" class="btn btn-info btn-opt">Login</a>
                <a href="admin_register.php" class="btn btn-info btn-opt">Register</a>
            </div>
            <a href="components/admin_logout.php" class="btn btn-danger btn-delete">Logout</a>
        </div>
    </section>
</header>