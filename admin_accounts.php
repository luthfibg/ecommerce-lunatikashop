<?php

$title = 'Admin Account';
include('components/connection.php');

session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

include('layouts/admin_account_layout.php');



?>