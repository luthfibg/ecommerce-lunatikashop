<?php

$title = 'My Orders';
$header = 'components/user_header.php';
$content = 'components/myorder_card.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/myorders_layout.php');

?>