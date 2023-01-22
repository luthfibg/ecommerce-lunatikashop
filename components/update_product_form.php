<?php
$update_id = $_GET['update'];
$show_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
$show_products->execute([$update_id]);

if ($show_products->rowCount() > 0) {
    while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {
        # code...
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="image-container">
                <div class="main-image">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" alt="">
                </div>
                <div class="sub-image">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_02'] ?>" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_03'] ?>" alt="">
                </div>
            </div>
        </form>
        <?php
    }
} else {
    echo '<p class="empty">No product inserted</p>';
}
?>