<?php

$title = 'About Us';
$header = 'components/user_header.php';
$content = '';
$footer = 'components/footer.php';

$headline_ilustration = 'components/about_headline_ilustration.php';
$text_content = 'components/about_txt_content.php';

include('components/connection.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

include('layouts/about_layout.php');

?>