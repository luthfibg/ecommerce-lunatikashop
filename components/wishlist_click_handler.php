<?php

if (isset($_POST['add_to_wishlist'])) {
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
        $check_cart_nums->execute([$user_id, $name]);

        if ($check_cart_nums->rowCount() > 0) {
            $message[] = 'Cart already exist';
        } else {
            $check_wishlist_nums = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
            $check_wishlist_nums->execute([$name, $user_id]);

            if ($check_wishlist_nums->rowCount() > 0) {
                $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
                $delete_wishlist->execute([$name, $user_id]);
            } else {
                $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
                $insert_wishlist->execute([$user_id, $pid, $name, $price, $qty, $image]);
                $message[] = 'Success add wishlist!';
            }
        }
    }
}


?>