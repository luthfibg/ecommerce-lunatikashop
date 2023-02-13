<?php

$server = 'localhost';
$username = 'root';
$password = 'mluthfi@MySQLU';

try {
  $conn = new PDO("mysql:host=$server;dbname=lunatika_shop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo '
  ';
  // <i class="fa-solid fa-circle-check"></i>

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// function create_unique_id()
// {
//   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//   $characters_length = strlen($characters);
//   $random_string = '';

//   for ($i = 0; $i < 20; $i++) {
//     $random_string .= $characters[mt_rand(0, $characters_length - 1)];
//   }
//   return $random_string;
// }

// if (isset($_COOKIE['user_id'])) {
//   $user_id = $_COOKIE['user_id'];
// } else {
//   setcookie('user_id', create_unique_id(), time() + 60 * 60 * 24 * 30);
// }

?>