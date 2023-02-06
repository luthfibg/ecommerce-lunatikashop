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
                    <div class="name">
                        <?= $fetch_products['name']; ?>
                    </div>
                    <div class="d-flex">
                        <div class="price">Rp <span>
                                <?= currency_formatter($fetch_products['price']); ?>
                            </span>,-</div>
                        <input type="number" name="qty" id="input-qty" class="qty" min="1" max="99" value="1"
                            onkeypress="if(this.value.length == 2) return false;">
                        <input type="submit" value="Add To Cart" name="add_to_cart_home">
                    </div>
                </form>
                <?php
            }
        } else {
            echo '<p class="empty">Nothing product to display</p>';
        }

        ?>
    </div>
</div>