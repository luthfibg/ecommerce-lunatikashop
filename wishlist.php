<?php

$title = 'Wishlist';
$header = 'components/user_header.php';
$content = 'components/item_wishlist.php';
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
    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
    $delete_wishlist->execute([$delete_id]);

    header('location:wishlist.php');
}

if (isset($_GET['upcart'])) {

    $default_qty = 1;
    $upto_cart_id = $_GET['upcart'];
    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE id = ?");
    $select_wishlist->execute([$upto_cart_id]);
    $fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC);
    $pid = $fetch_wishlist['pid'];
    $name = $fetch_wishlist['name'];
    $price = $fetch_wishlist['price'];
    $qty = $default_qty;
    $img = $fetch_wishlist['image'];

    $upto_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
    $upto_cart->execute([$user_id, $pid, $name, $price, $qty, $img]);

    $delete_id = $_GET['upcart'];
    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
    $delete_wishlist->execute([$delete_id]);

    header('location:wishlist.php');
}

include('layouts/wishlist_layout.php');

?>