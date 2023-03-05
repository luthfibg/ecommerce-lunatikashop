<?php

$title = 'Quick View';
$header = 'components/user_header.php';
$content = 'components/quick_view_item.php';
$footer = 'components/footer.php';

$pid = 0;

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

if (isset($_POST['add_to_wishlist'])) {

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
}

if (isset($_POST['delete_from_wishlist'])) {

    $pid = $_POST['pid'];
    $pid = filter_var(htmlspecialchars($pid));

    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ? AND pid = ?");
    $select_wishlist->execute([$user_id, $pid]);

    while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
        $delete_id = $fetch_wishlist['id'];
        $delete_cart = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
        $delete_cart->execute([$delete_id]);
    }
}

if (isset($_POST['add_to_cart_qv'])) {
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
        $check_cart_nums->execute([$user_id, $name]);

        if ($check_cart_nums->rowCount() > 0) {
            $message[] = 'Cart already exist';
        } else {

            $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
            $message[] = 'Success add to cart!';
        }
    }
}

include('layouts/quick_view_layout.php');

?>