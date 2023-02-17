<?php

$title = 'My Cart';
$header = 'components/user_header.php';
$content = 'components/item_cart.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart->execute([$delete_id]);

    header('location:cart.php');
}

if (isset($_GET['downto_wishlist'])) {

    $downto_wishlist_id = $_GET['downto_wishlist'];
    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE id = ?");
    $select_cart->execute([$downto_wishlist_id]);
    $fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC);
    $pid = $fetch_cart['pid'];
    $name = $fetch_cart['name'];
    $price = $fetch_cart['price'];
    $img = $fetch_cart['image'];

    $downto_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
    $downto_wishlist->execute([$user_id, $pid, $name, $price, $img]);

    $delete_id = $_GET['downto_wishlist'];
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart->execute([$delete_id]);

    header('location:cart.php');
}

include('layouts/cart_layout.php');

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

?>