<?php

include('../components/connection.php');

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
        header('location:dashboard.php');
    } else {
        $message[] = "incorrect username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Metro UI -->
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../resources/css/admin.css">
    <link rel="stylesheet" href="../resources/css/responsive_style.css">
    <link rel="stylesheet" href="../resources/css/theme.css">
    <title> Lunatika Shop </title>
  </head>
  <body style="background-color: var(--dark-base);">
    <div class="container mw-100 h-100 pos-absolute d-flex flex-justify-center flex-align-center flex-column">
        <?php 
        if (isset($message)) {
          foreach ($message as $message) {
            echo '
            <div class="message w-75 w-50-sm w-25-lg">
              <span>'.$message.'</span>
              <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
          }
        }
        ?>
        <div class="card image-header w-75 w-50-sm w-25-lg p-3">
            <div class="row p-2 d-flex flex-justify-center">
                <p class="title-lvl-3">Admin Login</p>
            </div>
            <div class="row p-2 d-flex flex-column text-center">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input" class="form-control" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="mb-5">
                        <input type="password" name="password" oninput="this.value = this.value.replace(/\s/g, '')" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <input type="submit" name="submit_login" class="button secondary component-tone mt-5" value="Login">
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>