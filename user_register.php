<?php

$title = 'Register';
$header = 'components/user_header.php';
$content = 'components/user_register_card.php';
$footer = 'components/footer.php';

include('components/connection.php');

session_start();
// $user_id = $_SESSION['user_id'];
// if (!isset($user_id)) {
//     header('location:user_login.php');
// }

include('layouts/user_register_layout.php');

if (isset($_POST['user_submit_register'])) {

    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $email = $_POST['email'];
    $email = filter_var(htmlspecialchars($email));
    $phone = $_POST['phone'];
    $phone = filter_var(htmlspecialchars($phone));
    $password = $_POST['password'];
    $password = filter_var(htmlspecialchars($password));
    $confirm_password = $_POST['confirm_password'];
    $confirm_password = filter_var(htmlspecialchars($confirm_password));

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'User already exist';
    } else {
        if ($password != $confirm_password) {
            $message[] = 'Passsword doesn\'t match';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users` (name, email, number, password) VALUES (?, ?, ?, ?);");
            $insert_user->execute([$name, $email, $phone, $password]);
            $message[] = 'Registration was successful';
        }

    }
}

?>