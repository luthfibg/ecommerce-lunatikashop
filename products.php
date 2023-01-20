<?php

include('components/connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['submit_add_product'])) {
    $name = $_POST['product_name'];
    $name = filter_var(htmlspecialchars($name));
    $price = $_POST['price'];
    $price = filter_var(htmlspecialchars($price));
    $details = $_POST['details'];
    $details = filter_var(htmlspecialchars($details));

    $img1 = $_FILES['img1']['name'];
    $img1 = filter_var(htmlspecialchars($img1));
    $img1_size = $_FILES['img1']['size'];
    $img1_tmp_name = $_FILES['img1']['tmp_name'];
    $img1_path = 'assets/images/products' . $img1;

    $img2 = $_FILES['img2']['name'];
    $img2 = filter_var(htmlspecialchars($img2));
    $img2_size = $_FILES['img2']['size'];
    $img2_tmp_name = $_FILES['img2']['tmp_name'];
    $img2_path = 'assets/images/products' . $img2;

    $img3 = $_FILES['img3']['name'];
    $img3 = filter_var(htmlspecialchars($img3));
    $img3_size = $_FILES['img3']['size'];
    $img3_tmp_name = $_FILES['img3']['tmp_name'];
    $img3_path = 'assets/images/products' . $img3;

    $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
    $select_products->execute([$name]);

    if ($select_products->rowCount() > 0) {
        $message[] = 'Product already exist!';
    } else {
        if ($img1_size > 2000000 or $img2_size > 2000000 or $img3_size > 2000000) {
            $message[] = 'Image exceeds the maximum limit of 2MB';
        } else {
            move_uploaded_file($img1_tmp_name, $img1_path);
            move_uploaded_file($img2_tmp_name, $img2_path);
            move_uploaded_file($img3_tmp_name, $img3_path);

            $insert_product = $conn->prepare("INSERT INTO `products`(name, price, image_01, image_02, image_03, details) VALUES (?,?,?,?,?,?)");
            $insert_product->execute([$name, $price, $img1, $img2, $img3, $details]);

            $message[] = 'New product successfully inserted';
        }
    }
}

$title = 'Product Management';

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
    <link rel="stylesheet" href="../resources/css/product.css">
    <link rel="stylesheet" href="../resources/css/responsive_style.css">
    <link rel="stylesheet" href="../resources/css/theme.css">
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body style="background: var(--dark-base);">
    <?php include 'components/admin_header.php' ?>
    <div class="container ins py-5 mw-100 h-100 pos-absolute d-flex flex-align-center flex-column">
        <?php
        $message = array();
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
        <div class="message">
          <span>' . $message . '</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
          ';
            }
        }
        ?>
        <?php include('components/add_product_card.php'); ?>
    </div>

    <script src="resources/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>