<?php

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Metro UI -->
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../resources/css/admin.css">
    <link rel="stylesheet" href="../resources/css/responsive_style.css">
    <link rel="stylesheet" href="../resources/css/theme.css">
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body style="background: var(--dark-base);">
    <!-- <div class="container mw-100 h-100 pos-absolute d-flex flex-align-center flex-column">
        /* <?php
        // if (isset($message)) {
        //    foreach ($message as $message) {
        //       echo '
        // <div class="message">
        //   <span>' . $message . '</span>
        //   <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        // </div>
        //   ';
        //    }
        // }
        ?> */
    </div> -->
    <?php include 'components/admin_header.php' ?>
    <div class="container">
        <section class="dashboard">
            <h3 class="mt-5 mb-3">- - - -</h3>
            <div class="box-container">
                <div class="box">
                    <h3>
                        <?= $fetch_profile['name'] ?>
                    </h3>
                    <p>
                        Operator
                    </p>
                    <a href="update_profile.php" class="btn btn-sm">Update Profile</a>
                </div>

                <div class="box">
                    <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                    $select_pendings->execute(['pending']);

                    while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                        $total_pendings += $fetch_pendings['total_price'];
                    }
                    ?>

                    <h3>
                        <span>Rp</span>
                        <?= $total_pendings; ?>
                        <span>/-</span>
                    </h3>
                    <p>Total Pendings</p>
                    <a href="placed_orders.php" class="btn btn-sm">View Pendings</a>
                </div>
                <div class="box">
                    <?php
                    $total_completes = 0;
                    $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                    $select_completes->execute(['completed']);

                    while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                        $total_completes += $fetch_completes['total_price'];
                    }
                    ?>

                    <h3>
                        <span>Rp</span>
                        <?= $total_completes; ?>
                        <span>/-</span>
                    </h3>
                    <p>Total Completes</p>
                    <a href="placed_orders.php" class="btn btn-sm">View Completed Orders</a>
                </div>
                <div class="box">
                    <?php
                    $select_orders = $conn->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();
                    $num_of_orders = $select_orders->rowCount();
                    ?>

                    <h3><?= $num_of_orders; ?></h3>
                    <p>Total Orders</p>
                    <a href="placed_orders.php" class="btn btn-sm">View Orders</a>
                </div>
                <div class="box">
                    <?php
                    $select_products = $conn->prepare("SELECT * FROM `products`");
                    $select_products->execute();
                    $num_of_products = $select_products->rowCount();
                    ?>

                    <h3><?= $num_of_products; ?></h3>
                    <p>Amount Of Products</p>
                    <a href="placed_products.php" class="btn btn-sm">View Products</a>
                </div>
                <div class="box">
                    <?php
                    $select_users = $conn->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    $num_of_users = $select_users->rowCount();
                    ?>

                    <h3><?= $num_of_users; ?></h3>
                    <p>Amount Of User</p>
                    <a href="user_accounts.php" class="btn btn-sm">View Users</a>
                </div>
                <div class="box">
                    <?php
                    $select_admins = $conn->prepare("SELECT * FROM `admins`");
                    $select_admins->execute();
                    $num_of_admins = $select_admins->rowCount();
                    ?>

                    <h3><?= $num_of_admins; ?></h3>
                    <p>Amount Of Admin</p>
                    <a href="admin_accounts.php" class="btn btn-sm">View Admins</a>
                </div>
                <div class="box">
                    <?php
                    $select_messages = $conn->prepare("SELECT * FROM `messages`");
                    $select_messages->execute();
                    $num_of_messages = $select_messages->rowCount();
                    ?>

                    <h3><?= $num_of_messages; ?></h3>
                    <p>New Messages</p>
                    <a href="messages.php" class="btn btn-sm">View Messages</a>
                </div>
            </div>
        </section>
    </div>

    <script src="resources/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>