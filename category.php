<?php

$title = 'Category';
$header = 'components/user_header.php';
$content = 'components/category_inner.php';
$footer = 'components/footer.php';

include('components/connection.php');
include('components/_currency_format.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

if (isset($_POST['add_to_wishlist'])) {

    $pid = $_POST['pid'];
    $pid = filter_var(htmlspecialchars($pid));
    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $price = $_POST['price'];
    $price = filter_var(htmlspecialchars($price));
    $image = $_POST['image'];
    $image = filter_var(htmlspecialchars($image));

    $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
    $check_wishlist_nums->execute([$name, $user_id]);

    $check_cart_nums = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_nums->execute([$name, $user_id]);

    if ($check_wishlist_nums->rowCount() > 0) {
        $message[] = 'Wishlist already exist';
    } elseif ($check_cart_nums->rowCount() > 0) {
        $message[] = 'Cart already exist';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
        $insert_wishlist->execute([$user_id, $pid, $name, $price, $image]);
        $message[] = 'Success add wishlist!';

    }
}

if (isset($_POST['add_to_cart_home'])) {
    if ($user_id == '') {
        header('location:user_login.php');
    } else {

        $pid = $_POST['pid'];
        $pid = filter_var(htmlspecialchars($pid));
        $name = $_POST['name'];
        $name = filter_var(htmlspecialchars($name));
        $price = $_POST['price'];
        $price = filter_var(htmlspecialchars($price));
        $image = $_POST['image'];
        $image = filter_var(htmlspecialchars($image));
        $qty = $_POST['qty'];
        $qty = filter_var(htmlspecialchars($qty));

        $check_cart_nums = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $check_cart_nums->execute([$name, $user_id]);

        if ($check_cart_nums->rowCount() > 0) {
            $message[] = 'Cart already exist';
        } else {

            $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
            $check_wishlist_nums->execute([$name, $user_id]);

            if ($check_wishlist_nums->rowCount() > 0) {
                $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
                $delete_wishlist->execute([$name, $user_id]);
            }
            $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
            $message[] = 'Success add cart!';

        }
        // }
    }
}

include('layouts/category_layout.php');

?>