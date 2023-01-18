<?php

$title = 'Lunatika Shop';
$header = 'components/admin_header.php';
// $content = 'components/login_card.php';
$footer = 'components/footer.php';
include('components/connection.php');
include('layouts/dashboard_layout.php');

session_start();

if (isset($_POST['submit_login'])) {

    $name = $_POST['name'];
    $name = filter_var(htmlspecialchars($name));
    $pass = sha1($_POST['password']);
    $pass = filter_var(htmlspecialchars($pass));

    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $pass]);

    if ($select_admin->rowCount() > 0) {
        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        $message[] = "you are logged in!";
    } else {
        $message[] = "incorrect username or password!";
    }
}

?>