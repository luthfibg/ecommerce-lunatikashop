<?php

if (isset($_POST['add_to_wishlist'])) {
    // if ($user_id == '') {
    //     header('location:user_login.php');
    // } else {

    $pid = $_POST['pid'];
    $pid = filter_var(htmlspecialchars($pid));
    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $price = $_POST['price'];
    $price = filter_var(htmlspecialchars($price));
    $image = $_POST['image'];
    $image = filter_var(htmlspecialchars($image));

    $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
    $check_wishlist_nums->execute([$name, $user_id]);

    $check_cart_nums = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_nums->execute([$name, $user_id]);

    if ($check_wishlist_nums->rowCount() > 0) {
        $message[] = 'Wishlist already exist';
    } elseif ($check_cart_nums->rowCount() > 0) {
        $message[] = 'Cart already exist';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
        $insert_wishlist->execute([$user_id, $pid, $name, $price, $image]);
        $message[] = 'Success add wishlist!';

    }
    // }
}

if (isset($_POST['add_to_cart_home'])) {
    if ($user_id == '') {
        header('location:user_login.php');
    } else {

        $pid = $_POST['pid'];
        $pid = filter_var(htmlspecialchars($pid));
        $name = $_POST['name'];
        $name = filter_var(htmlspecialchars($name));
        $price = $_POST['price'];
        $price = filter_var(htmlspecialchars($price));
        $image = $_POST['image'];
        $image = filter_var(htmlspecialchars($image));
        $qty = $_POST['qty'];
        $qty = filter_var(htmlspecialchars($qty));

        $check_cart_nums = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $check_cart_nums->execute([$name, $user_id]);

        if ($check_cart_nums->rowCount() > 0) {
            $message[] = 'Cart already exist';
        } else {

            $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
            $check_wishlist_nums->execute([$name, $user_id]);

            if ($check_wishlist_nums->rowCount() > 0) {
                $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
                $delete_wishlist->execute([$name, $user_id]);
            } //else {
            //     $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
            //     $insert_wishlist->execute([$user_id, $pid, $name, $price, $qty, $image]);
            //     $message[] = 'Success add wishlist!';
            // }
            $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
            $message[] = 'Success add cart!';

        }
        // }
    }
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

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    <link rel="stylesheet" href="resources/css/user.css">
    <link rel="stylesheet" href="resources/css/admin.css">
    <link rel="stylesheet" href="resources/css/home.css">
    <link rel="stylesheet" href="resources/css/responsive_style.css">
    <link rel="stylesheet" href="resources/css/theme.css">
    <link rel="stylesheet" href="resources/css/swiper_keyboard.css">
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body style="background: var(--dark-base);">
    <?php include($header); ?>
    <!-- header carousel section -->
    <section class="home-bg">
        <div class="home-carousel swiper">
            <div class="swiper-wrapper">
                <?php include($carousel_custom) ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- category section -->
    <section class="home-category container py-3">
        <h2 class="text-center section-title">Kategori</h2>
        <?php include($category); ?>
    </section>
    <!-- products sliding section -->
    <section class="home-products container py-3">
        <h2 class="text-center section-title">Belanja</h2>
        <?php include($products_home_gadget); ?>
        <?php include($products_home_furniture); ?>
        <?php include($products_home_cloth); ?>
        <?php include($products_home_grocery); ?>
        <?php include($products_home_tool); ?>
        <?php include($products_home_service); ?>
    </section>

    <?php include($footer); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="resources/js/swiper-keyboard.js"></script>
    <script src="resources/js/user.js"></script>
    <script src="resources/js/prevent-resubmission.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>