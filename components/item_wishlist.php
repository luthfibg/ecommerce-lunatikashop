<?php

$select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
$select_wishlist->execute([$user_id]);
$total_price = 0;

if ($select_wishlist->rowCount() > 0) {
    ?>
    <ol class="list-group list-group-numbered bg-dark mb-3">
        <?php
        while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
            $price = $fetch_wishlist['price'];
            $total_price += $price;
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-start bg-dark py-3">
                <div class="d-flex w-100 align-items-center">
                    <div class="img-container">
                        <img src="assets/images/products/<?= $fetch_wishlist['image']; ?>"
                            alt="pid=<?= $fetch_wishlist['pid']; ?>" class="image" style="width: 5rem;height: 5rem;">
                    </div>
                    <div class="me-auto ms-3 ms-md-5">
                        <div class="fw-bold">
                            <?= $fetch_wishlist['name']; ?>
                        </div>Rp
                        <?= currency_formatter($fetch_wishlist['price']); ?>
                        ,-
                    </div>
                    <div class="list-action me-1 me-md-3">
                        <a href="wishlist.php?delete=<?= $fetch_wishlist['id']; ?>" class="btn-custom del px-3 py-2">
                            <i class="fa-regular fa-circle-xmark" style="color: var(--component-crimson);"></i>
                        </a>
                        <a href="wishlist.php?upcart=<?= $fetch_wishlist['id']; ?>"
                            class="btn-custom throw-to-cart px-3 py-2 mt-2 mt-3-md">
                            <i class="fa-solid fa-cart-shopping" style="color: var(--component-golden);"></i> </a>
                    </div>
                    <!-- <span class="badge bg-primary rounded-pill mt-4 me-4 d-block">new</span> -->
                </div>
            </li>
            <?php
        }
        ?>
    </ol>
    <ol class="list-group bottom-list bg-dark mb-5">
        <li class="list-group-item bottom-list d-flex justify-content-between align-items-start bg-dark py-1 py-md-3">
            <div class="d-flex w-100 align-items-center">
                <div class="img-container d-flex justify-content-center align-items-center"
                    style="width: 5rem;height: 5rem">
                    <i class="fa-solid fa-shopping-cart fa-xl"></i>
                </div>
                <div class="me-auto ms-3 ms-md-5">
                    <div class="fw-bold">
                        Total Harga
                    </div>
                </div>
                <div class="me-auto ms-3">
                    Rp
                    <?= currency_formatter($total_price); ?>
                    ,-
                </div>
                <div class="action-remove me-1 me-md-3">
                    <a href="payment.php" class="btn-custom remove px-3 py-2" style="color: var(--component-crimson);">
                        <i class="fa-solid fa-circle-xmark fa-xl" style="color: var(--component-crimson);"></i>
                        &nbsp; <span class="btn-value">Remove</span>
                    </a>
                </div>
                <div class="action-checkout me-1 me-md-3">
                    <a href="payment.php" class="btn-custom picker px-3 py-2" style="color: var(--light);">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: var(--component-emerald);"></i>
                        &nbsp;<span class="btn-value">Upcart</span>
                    </a>
                </div>
            </div>
        </li>
    </ol>
    <?php
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