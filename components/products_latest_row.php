<div class="row products-latest-row py-3 py-5-md">
    <div class="products-row-header mb-3 mb-5-md">Latest Products</div>
    <div class="wrapper d-flex align-items-center flex-wrapp">
        <?php

        $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
        $select_products->execute();
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                # code...
                ?>
                <?php include('components/product_shop_card.php') ?>
                <?php
            }
        } else {
            echo '<p class="empty">Nothing product to display</p>';
        }

        ?>
    </div>
</div>