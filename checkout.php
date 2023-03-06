<?php

$title = 'Checkout';
$header = 'components/user_header.php';
$content = 'components/checkout_form.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

if (isset($_POST['submit_checkout'])) {
    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $phone = $_POST['phone'];
    $phone = filter_var(htmlspecialchars($phone));
    $email = $_POST['email'];
    $email = filter_var(htmlspecialchars($email));
    $address = $_POST['address'] . ', ' . $_POST['address_street'] . ', ' . $_POST['address_town'] . ', ' . $_POST['address_province'] . ', ' . $_POST['address_country'] . ' - ' . $_POST['address_post_code'];
    $address = filter_var(htmlspecialchars($address));
    $payment = $_POST['payment'];
    $payment = filter_var(htmlspecialchars($payment));
}

include('layouts/checkout_layout.php');

?>