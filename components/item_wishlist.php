<ol class="list-group list-group-numbered bg-dark mb-3">

    <?php

    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
    $select_wishlist->execute([$user_id]);

    if ($select_wishlist->rowCount() > 0) {
        while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-start bg-dark py-3">
                <div class="d-flex w-100 align-items-center">
                    <div class="img-container">
                        <img src="assets/images/products/<?= $fetch_wishlist['image']; ?>"
                            alt="pid=<?= $fetch_wishlist['pid']; ?>" class="image" style="width: 5rem;height: 5rem;">
                    </div>
                    <div class="me-auto ms-5">
                        <div class="fw-bold">
                            <?= $fetch_wishlist['name']; ?>
                        </div>Rp
                        <?= currency_formatter($fetch_wishlist['price']); ?>
                        ,-
                    </div>
                    <div class="list-action me-3">
                        <a href="wishlist.php?delete=<?= $fetch_wishlist['id']; ?>" class="btn-custom del px-3 py-2">
                            <i class="fa-regular fa-circle-xmark" style="color: var(--component-crimson);"></i>
                        </a>
                        <a href="wishlist.php?upcart=<?= $fetch_wishlist['id']; ?>"
                            class="btn-custom throw-to-cart px-3 py-2 mt-3">
                            <i class="fa-solid fa-cart-shopping" style="color: var(--component-golden);"></i> </a>
                    </div>
                    <!-- <span class="badge bg-primary rounded-pill mt-4 me-4 d-block">new</span> -->
                </div>
            </li>
            <?php
        }
    } else {
        ?>
        <div class="container d-flex justify-content-between flex-column align-items-center">
            <span class="my-5">Wishlist is empty</span>
            <div class="btn mb-5 w-100 w-50-md w-25-lg">Go To Shop</div>
        </div>
        <?php
    }

    ?>

</ol>