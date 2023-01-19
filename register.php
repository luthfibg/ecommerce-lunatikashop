<?php

$title = 'Lunatika Shop';
$header = '';
$content = 'components/register_card.php';
$footer = '';
include('components/connection.php');
include('layouts/register_layout.php');

session_start();

if (isset($_POST['submit_register'])) {

    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $pass = sha1($_POST['password']);
    $pass = filter_var(htmlspecialchars($pass));
    $conf_pass = sha1($_POST['confirm_password']);
    $conf_pass = filter_var(htmlspecialchars($conf_pass));

    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_admin->execute([$name]);

    if ($select_admin->rowCount() > 0) {
        $message[] = 'User already exists';
    } else {
        if ($name == '' || $name == null) {
            $message[] = 'Username or password cannot empty!';
        } elseif ($pass == '' || $pass == null) {
            $message[] = 'Username or password cannot empty!';
        } else {
            if ($pass != $conf_pass) {
                $message[] = 'Password doesn\'t matched!';
            } else {
                $insert_admin = $conn->prepare("INSERT INTO `admins` (name, password) VALUES (?,?)");
                $insert_admin->execute([$name, $conf_pass]);
                header('location:login.php');
                $message[] = 'New admin registered';
            }
        }
    }
}

?>