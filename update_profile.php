<?php

$title = 'Lunatika Shop';
$header = 'components/admin_header.php';
$content = 'components/update_profile_card.php';
$footer = '';
include('components/connection.php');
include('layouts/update_profile_layout.php');

$select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
$select_profile->execute([$admin_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

?>