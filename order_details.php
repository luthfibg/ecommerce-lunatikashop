<?php

$title = 'My Orders';
$header = 'components/user_header.php';
$content = 'components/order_detail_card.php';
$empty_holder = 'components/myorders_empty.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/order_details_layout.php');

?>