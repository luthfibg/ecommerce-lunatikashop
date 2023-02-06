<div class="products-gadget-slider swiper py-3 py-5-md">
    <div class="swiper-wrapper">
        <?php

        $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
        $select_products->execute();
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                # code...
                ?>
                <form action="" method="POST" class="slide">
                    <button type="submit" name="add_to_wishlist" class="fas fa-heart"></button>
                    <a href="quickview.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                    <img src="assets/images/products/<?= $fetch_products['image_01']; ?>" alt="" class="image">
                </form>
                <?php
            }
        } else {
            echo '<p class="empty">Nothing product to display</p>';
        }

        ?>
    </div>
</div>