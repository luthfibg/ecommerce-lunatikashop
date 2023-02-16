<?php

$title = 'Update Profile';
$header = 'components/user_header.php';
$content = 'components/user_update_profile_card.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location:home.php');
}

include('layouts/user_update_profile_layout.php');

if (isset($_POST['user_submit_update'])) {

    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $email = $_POST['email'];
    $email = filter_var(htmlspecialchars($email));
    $phone = $_POST['phone'];
    $phone = filter_var(htmlspecialchars($phone));

    $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ?, number = ? WHERE id = ?");
    $update_profile->execute([$name, $email, $phone, $user_id]);

    $empty_password = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $select_previous_password = $conn->prepare("SELECT password FROM `users` WHERE id = ?");
    $select_previous_password->execute([$user_id]);
    $fetch_previous_password = $select_previous_password->fetch(PDO::FETCH_ASSOC);
    $previous_password = $fetch_previous_password['password'];

    $old_password = sha1($_POST['old_password']);
    $old_password = filter_var(htmlspecialchars($old_password));
    $new_password = sha1($_POST['new_password']);
    $new_password = filter_var(htmlspecialchars($new_password));
    $confirm_new_password = sha1($_POST['confirm_new_password']);
    $confirm_new_password = filter_var(htmlspecialchars($confirm_new_password));

    if ($old_password == $empty_password) {
        $message[] = 'Old password must be filled';
    } elseif ($old_password != $previous_password) {
        $message[] = 'Old password didn\'t match';
    } elseif ($new_password != $confirm_new_password) {
        $message[] = 'New password didn\'t match';
    } else {
        if ($new_password != $empty_password) {
            $update_password = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_password->execute([$confirm_new_password, $user_id]);
            $message[] = 'Success password update!';
        } else {
            $message[] = 'Enter new password';
        }

    }
}

?>