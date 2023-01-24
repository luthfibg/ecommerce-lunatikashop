<?php

$title = 'Product Management';
include('components/connection.php');
include('components/_currency_format.php');

session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

include('layouts/product_items_layout.php');

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);

    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('assets/images/products/' . $fetch_delete_image['image_01']);
    unlink('assets/images/products/' . $fetch_delete_image['image_02']);
    unlink('assets/images/products/' . $fetch_delete_image['image_03']);

    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$delete_id]);

    header('location:view_products.php');
}

?>