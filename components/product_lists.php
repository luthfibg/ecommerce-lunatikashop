<div class="container-box">
    <p class="mb-3">No product inserted</p>
    <?php

    $show_product = $conn->prepare("SELECT * FROM `products`");
    $show_product->execute();

    if ($show_product->rowCount() > 0) {
        while ($fetch_products = $show_product->fetch(PDO::FETCH_ASSOC)) {
            # code...
    
            ?>
            <div class="box">
                <img src="assets/images/<?= $fetch_products['image_01']; ?>" alt="Haylou GS">
            </div>
            <?php
        }
    } else {
        # code...
    }
    ?>
</div>