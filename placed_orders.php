<?php

$title = 'Product Management';
include('components/connection.php');

session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

include('layouts/placed_orders_layout.php');

?>