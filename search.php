<?php

$title = 'Search';
$header = 'components/user_header.php';
$content = 'components/search_input.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/search_layout.php');

?>