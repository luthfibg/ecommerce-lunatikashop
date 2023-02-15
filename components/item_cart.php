<ol class="list-group list-group-numbered bg-dark mb-3">

    <?php

    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $select_cart->execute([$user_id]);

    if ($select_cart->rowCount() > 0) {
        while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
            $price = $fetch_cart['price'];
            $qty = $fetch_cart['quantity'];
            $fixed_price = $price * $qty;
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-start bg-dark py-3">
                <div class="d-flex w-100 align-items-center">
                    <div class="img-container">
                        <img src="assets/images/products/<?= $fetch_cart['image']; ?>" alt="pid=<?= $fetch_cart['pid']; ?>"
                            class="image" style="width: 5rem;height: 5rem;">
                    </div>
                    <div class="me-auto ms-5">
                        <div class="fw-bold">
                            <?= $fetch_cart['name']; ?>
                        </div>
                        Rp
                        <?= currency_formatter($fixed_price); ?>
                        ,-
                        <span class="badge bg-primary rounded-pill mb-3 ms-3">
                            &nbsp;
                            <?= $fetch_cart['quantity']; ?>&nbsp;
                        </span>
                    </div>
                    <div class="list-action me-3">
                        <a href="" class="btn-custom del px-3 py-2">
                            <i class="fa-regular fa-circle-xmark" style="color: var(--component-crimson);"></i>
                        </a>
                        <a href="" class="btn-custom throw-to-wishlist px-3 py-2 mt-3">
                            <i class="fa-solid fa-heart" style="color: var(--component-emerald);"></i> </a>
                    </div>
                </div>
            </li>
            <?php
        }
    }

    ?>

</ol>