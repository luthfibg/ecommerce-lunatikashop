<?php

// basic attribute
$title = 'Welcome';
$header = 'components/user_header.php';
$footer = 'components/footer.php';
$wishlist = 'wishlist.php';

//content attribute
$carousel = 'components/carousel.php';
$carousel_custom = 'components/carousel_customized.php';
$category = 'components/category.php';
$products_home_gadget = 'components/products_home[gadget].php';
$products_home_furniture = 'components/products_home[furniture].php';
$products_home_cloth = 'components/products_home[cloth].php';
$products_home_grocery = 'components/products_home[grocery].php';
$products_home_tool = 'components/products_home[tool].php';
$products_home_service = 'components/products_home[service].php';

//assets attribute
$carousel_bg_1 = 'assets/images/slider/wallpaperwatch1.jpg';
$carousel_bg_2 = 'assets/images/slider/wallpaperwatch2.jpg';
$carousel_bg_3 = 'assets/images/slider/wallpaperwatch3.jpg';

include('components/connection.php');
include('components/_currency_format.php');

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
include('layouts/home_layout.php');

?>