<?php

$select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
$select_products->execute();

?>