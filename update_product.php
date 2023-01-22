<?php
include('components/connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

$title = "Product Management";

include('layouts/update_product_layout.php');

?>