<?php

$title = 'Product Management';
include('components/connection.php');

session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

include('layouts/placed_orders_layout.php');

if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
    $update_status->execute([$payment_status, $order_id]);

    $message[] = 'Payment Status Updated';
}
?>