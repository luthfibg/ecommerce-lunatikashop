<?php

$title = 'Welcome';
$header = 'components/user_header.php';
$content = 'components/content';

include('components/connection.php');

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
include('index_layout.php');

?>