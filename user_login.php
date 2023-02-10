<?php

$title = 'Login';
$header = 'components/user_header.php';
$content = 'components/user_login_card.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();

if (!isset($_SESSION[$user_id])) {
    $user_id = $_SESSION[$user_id];
} else {
    $user_id = '';
}

include('layouts/user_login_layout.php');

?>