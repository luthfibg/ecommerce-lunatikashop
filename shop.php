<?php

$title = 'Shop Display';
$header = 'components/user_header.php';
$latest_row = 'components/products_latest_row.php';
$content = 'components/products_all_row.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/shop_layout.php');

?>