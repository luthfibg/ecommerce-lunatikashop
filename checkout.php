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
    $method = $_POST['method'];
    $method = filter_var(htmlspecialchars($method));
    $total_products = $_POST['total_products'];
    $total_products = filter_var(htmlspecialchars($total_products));
    $total_price = $_POST['total_price'];
    $total_price = filter_var(htmlspecialchars($total_price));

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $check_cart->execute([$user_id]);
    if ($check_cart->rowCount() > 0) {
        $insert_order = $conn->prepare("INSERT INTO `orders` (user_id, name, number, email, method, address, total_products, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_order->execute([$user_id, $name, $phone, $email, $method, $address, $total_products, $total_price]);

        $delete_cart_items = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart_items->execute([$user_id]);

        $message[] = 'Pesanan berhasil di buat!';
    } else {
        $message[] = 'Keranjangmu masih kosong!';
    }
}

include('layouts/checkout_layout.php');

?>