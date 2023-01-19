<?php

$title = 'Lunatika Shop';
$header = '';
$content = 'components/register_card.php';
$footer = '';
include('components/connection.php');
include('layouts/register_layout.php');

session_start();

// if (isset($_POST['submit_register'])) {

//     $name = $_POST['name'];
//     $name = filter_var(htmlspecialchars($name));
//     $pass = sha1($_POST['password']);
//     $pass = filter_var(htmlspecialchars($pass));

//     $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
//     $select_admin->execute([$name, $pass]);

//     if ($select_admin->rowCount() > 0) {
//         $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
//         $_SESSION['admin_id'] = $fetch_admin_id['id'];
//         $message[] = "you are logged in!";
//         header('location:dashboard.php');
//     } else {
//         $message[] = "incorrect username or password!";
//     }
// }

?>