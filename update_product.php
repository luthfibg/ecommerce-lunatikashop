<?php
include('components/connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

$title = "Product Management";

include('layouts/update_product_layout.php');

if (isset($_POST['submit_update_product'])) {

    $pid = $_POST['pid'];
    $pid = filter_var(htmlspecialchars($pid));
    $name = $_POST['product_name'];
    $name = filter_var(htmlspecialchars($name));
    $price = $_POST['price'];
    $price = filter_var(htmlspecialchars($price));
    $details = $_POST['details'];
    $details = filter_var(htmlspecialchars($details));

    $update_product = $conn->prepare("UPDATE `products` SET name = ?, details = ?, price = ? WHERE id = ?");
    $update_product->execute([$name, $details, $price, $pid]);

    $old_img1 = $_POST['old_image1'];
    $img1 = $_FILES['img1']['name'];
    $img1 = filter_var(htmlspecialchars($img1));
    $img1_size = $_FILES['img1']['size'];
    $img1_tmp_name = $_FILES['img1']['tmp_name'];
    $img1_path = 'assets/images/products/' . $img1;

    if (!empty($img1)) {
        if ($img1_size > 2000000) {
            $message[] = 'Image exceeds the maximum limit of 2MB';
        } else {
            $update_img1 = $conn->prepare("UPDATE `products` SET image_01 = ? WHERE id = ?");
            $update_img1->execute([$img1, $pid]);
            move_uploaded_file($img1_tmp_name, $img1_path);
            unlink('assets/images/products/' . $old_img1);

            $message[] = "Image product updated";
        }
    }

    $old_img2 = $_POST['old_image2'];
    $img2 = $_FILES['img2']['name'];
    $img2 = filter_var(htmlspecialchars($img2));
    $img2_size = $_FILES['img2']['size'];
    $img2_tmp_name = $_FILES['img2']['tmp_name'];
    $img2_path = 'assets/images/products/' . $img2;

    if (!empty($img2)) {
        if ($img2_size > 2000000) {
            $message[] = 'Image exceeds the maximum limit of 2MB';
        } else {
            $update_img2 = $conn->prepare("UPDATE `products` SET image_02 = ? WHERE id = ?");
            $update_img2->execute([$img2, $pid]);
            move_uploaded_file($img2_tmp_name, $img2_path);
            unlink('assets/images/products/' . $old_img2);

            $message[] = "Image product updated";
        }
    }

    $old_img3 = $_POST['old_image3'];
    $img3 = $_FILES['img3']['name'];
    $img3 = filter_var(htmlspecialchars($img3));
    $img3_size = $_FILES['img3']['size'];
    $img3_tmp_name = $_FILES['img3']['tmp_name'];
    $img3_path = 'assets/images/products/' . $img3;

    if (!empty($img3)) {
        if ($img3_size > 2000000) {
            $message[] = 'Image exceeds the maximum limit of 2MB';
        } else {
            $update_img3 = $conn->prepare("UPDATE `products` SET image_03 = ? WHERE id = ?");
            $update_img3->execute([$img3, $pid]);
            move_uploaded_file($img3_tmp_name, $img3_path);
            unlink('assets/images/products/' . $old_img3);

            $message[] = "Image product updated";
        }
    }

    $message[] = 'Product successfully updated';

}
?>