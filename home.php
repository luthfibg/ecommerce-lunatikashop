<?php

// basic attribute
$title = 'Welcome';
$header = 'components/user_header.php';
$footer = 'components/footer.php';

//content attribute
$carousel = 'components/carousel.php';

//assets attribute
$carousel_bg_1 = 'assets/images/slider/wallpaperwatch1.jpg';
$carousel_bg_2 = 'assets/images/slider/wallpaperwatch2.jpg';
$carousel_bg_3 = 'assets/images/slider/wallpaperwatch3.jpg';

include('components/connection.php');

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
include('layouts/home_layout.php');

?>