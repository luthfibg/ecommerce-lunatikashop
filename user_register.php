<?php

$title = 'Register';
$header = 'components/user_header.php';
$content = 'components/user_register_card.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/user_register_layout.php');

?>