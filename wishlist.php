<?php

$title = 'Wishlist';
$header = 'components/user_header.php';
$content = '';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/wishlist_layout.php');

if (isset($_POST['add_to_wishlist'])) {
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

        $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
        $check_wishlist_nums->execute([$user_id, $name]);

        $check_cart_nums = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $check_cart_nums->execute([$user_id, $name]);

        if ($check_wishlist_nums->rowCount() > 0) {
            $message[] = 'Wishlist already exist !';
        } elseif ($check_cart_nums->rowCount() > 0) {
            $message[] = 'Cart already exist';
        } else {
            $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
            $insert_wishlist->execute([$user_id, $pid, $name, $price, $image]);
            $message[] = 'SUccess add wishlist!';
        }
    }
}

?>