<?php

$title = 'Lunatika Shop';
$header = 'components/admin_header.php';
$content = 'components/update_profile_card.php';
$footer = '';
include('components/connection.php');
include('layouts/update_profile_layout.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $update_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
    $update_name->execute([$name, $admin_id]);

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $select_old_pass = $conn->prepare("SELECT password FROM `admins` WHERE id = ?");
    $select_old_pass->execute([$admin_id]);
    $fetch_previous_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);
    $previous_pass = $fetch_previous_pass['password'];

    $old_pass = $_POST['old_password'];
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = $_POST['new_password'];
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = $_POST['confirm_password'];
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    if ($old_pass == $empty_pass) {
        $message[] = 'Please enter old password';
    } else if ($old_pass != $new_pass) {
        $message[] = 'Old password didn\'t matched';
    } else if ($new_pass != $confirm_pass) {
        $message[] = 'Password didn\'t matched';
    } else {
        if ($new_pass != $empty_pass) {
            $update_pass = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
            $update_pass->execute([$confirm_pass, $admin_id]);
            $message[] = 'Your password changed';
            header('location:dashboard.php');
        } else {
            $message[] = 'Enter new password please';
        }
    }
}

?>