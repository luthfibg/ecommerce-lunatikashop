<?php

$title = 'Contact';
$header = 'components/user_header.php';
$content = 'components/contact_form.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:user_login.php');
}

if (isset($_POST['send_msg'])) {
    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $email = $_POST['email'];
    $email = filter_var(htmlspecialchars($email));
    $phone = $_POST['phone'];
    $phone = filter_var(htmlspecialchars($phone));
    $msg = $_POST['msg'];
    $msg = filter_var(htmlspecialchars($msg));

    $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $select_message->execute([$name, $email, $phone, $msg]);

    if ($select_message->rowCount() > 0) {
        $message[] = 'Message already sent';
    } else {
        $send_message = $conn->prepare("INSERT INTO `messages` (name, email, number, message) VALUES (?, ?, ?, ?)");
        $send_message->execute([$name, $email, $phone, $msg]);

        $message[] = 'Message successfully sent!';
    }

}

include('layouts/contact_layout.php');

?>