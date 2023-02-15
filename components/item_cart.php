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
                <div class="ms-2 me-auto">
                    <div class="img-container">
                        <img src="assets/images/products/<?= $fetch_cart['image']; ?>" alt="pid=<?= $fetch_cart['pid']; ?>"
                            class="image mb-3 mb-5-md" style="width: 4rem;height: 4rem;">
                    </div>
                    <div class="fw-bold">
                        <?= $fetch_cart['name']; ?>
                    </div>
                    Rp
                    <?= currency_formatter($fixed_price); ?>
                    ,-
                </div>
                <span class="badge bg-primary rounded-pill mt-4 me-4">
                    <?= $fetch_cart['quantity']; ?>
                </span>
            </li>
            <?php
        }
    }

    ?>

</ol>