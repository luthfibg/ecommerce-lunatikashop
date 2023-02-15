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
include('layouts/wishlist_layout.php');

?>