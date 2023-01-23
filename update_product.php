<?php
include('components/connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

$title = "Product Management";

include('layouts/update_product_layout.php');

if (isset($_POST['submit_update_product'])) {

    $pid = $_POST['pid'];
    $pid = filter_var(htmlspecialchars($pid));
    $name = $_POST['product_name'];
    $name = filter_var(htmlspecialchars($name));
    $price = $_POST['price'];
    $price = filter_var(htmlspecialchars($price));
    $details = $_POST['details'];
    $details = filter_var(htmlspecialchars($details));

    $update_product = $conn->prepare("UPDATE `products` SET name = ?, details = ?, price = ? WHERE id = ?");
    $update_product->execute([$name, $details, $price, $pid]);

}
?>