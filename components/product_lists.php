<?php

$show_product = $conn->prepare("SELECT * FROM `products`");
$show_product->execute();

if ($show_product->rowCount() > 0) {
    while ($fetch_products = $show_product->fetch(PDO::FETCH_ASSOC)) {
        # code...

        ?>
        <div class="card product-card g-col-12 g-col-md-6">
            <img src="assets/images/products/<?= $fetch_products['image_01']; ?>" class="card-img-top" alt="Haylou GS">
            <div class="card-body product-card-body">
                <h5 class="card-title product-card-spec">
                    <?= $fetch_products['name']; ?>
                </h5>
                <h5 class="card-title product-card-spec-price">
                    <span>Rp</span>
                    <?= $fetch_products['price']; ?>
                    <span>,-</span>
                </h5>
                <p class="card-text product-card-spec">
                    <?= $fetch_products['details']; ?>
                </p>
                <div class="flex-action d-flex justify-content-between">
                    <a href="update_product.php?update=<?= $fetch_products['id']; ?>"
                        class="btn btn-sm btn-product mt-5 btn-upload">Update</a>
                    <a href="view_products.php?delete=<?= $fetch_products['id']; ?>"
                        class="btn btn-sm btn-product mt-5 btn-delete"
                        onclick="return confirm('Are you sure to delete this product?')">Delete</a>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p class='mb-3'>No product inserted</p>";
}
?>