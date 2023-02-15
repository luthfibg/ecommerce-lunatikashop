<ol class="list-group list-group-numbered bg-dark mb-3">

    <?php

    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
    $select_wishlist->execute([$user_id]);

    if ($select_wishlist->rowCount() > 0) {
        while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-start bg-dark py-3">
                <div class="ms-2 me-auto">
                    <div class="img-container">
                        <img src="assets/images/products/<?= $fetch_wishlist['image']; ?>"
                            alt="pid=<?= $fetch_wishlist['pid']; ?>" class="image mb-3 mb-5-md"
                            style="width: 4rem;height: 4rem;">
                    </div>
                    <div class="fw-bold">
                        <?= $fetch_wishlist['name']; ?>
                    </div>Rp
                    <?= currency_formatter($fetch_wishlist['price']); ?>
                    ,-
                </div>
                <span class="badge bg-primary rounded-pill mt-4 me-4">new</span>
            </li>
            <?php
        }
    }

    ?>

</ol>