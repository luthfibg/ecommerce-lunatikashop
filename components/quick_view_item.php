<form action="" method="POST" class="card item-card d-flex align-items-center flex-wrap px-2 py-2">
    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
    <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
    <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
    <div class="row g-0 px-1 px-md-5 pt-md-3">
        <div class="img-container col-12 col-md-4 mx-md-3 my-md-3">
            <div class="big-img">
                <img src="assets/images/products/<?= $fetch_products['image_01']; ?>" alt="" class="image mb-3 mb-5-md">
            </div>
            <div class="little-imgs d-flex justify-content-center mt-1">
                <img src="assets/images/products/<?= $fetch_products['image_01']; ?>" alt="" class="image mb-3 mb-5-md">
                <img src="assets/images/products/<?= $fetch_products['image_02']; ?>" alt="" class="image mb-3 mb-5-md">
                <img src="assets/images/products/<?= $fetch_products['image_03']; ?>" alt="" class="image mb-3 mb-5-md">
            </div>
        </div>
        <div class="card-body product-card-body col-12 col-md-8 ms-md-5 pb-3 mb-3 mb-md-5">
            <div class="name top-info text-start">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        <?= $fetch_products['name']; ?>
                    </h5>
                    <?php

                    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ? AND pid = ?");
                    $select_wishlist->execute([$user_id, $pid]);
                    if ($select_wishlist->rowCount() > 0) {
                        ?>
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <button type="submit" name="delete_from_wishlist" class="fa-solid fa-heart align-self-end"></button>
                        <?php
                    } else {
                        ?>
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
                        <button type="submit" name="add_to_wishlist" class="fa-regular fa-heart align-self-end"></button>
                        <?php
                    }
                    ?>
                </div>
                <div class="price mt-2 mt-3-md p-2">Rp <span>
                        <?= currency_formatter($fetch_products['price']); ?>
                    </span>,-</div>
            </div>
            <div class="detail-item mt-5">
                <?= $fetch_products['details']; ?>
            </div>
            <div class="d-flex flex-wrap flex-column w-100 mt-3 mt-md-5">
                <div class="d-flex">
                    <input type="text" value="Select Qty" class="form-control mt-2 mt-3-md ps-0" disabled>
                    <input type="number" name="qty" id="input-qty" class="qty form-control mt-2 mt-3-md" min="1"
                        max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                </div>
                <div class="d-flex">
                    <button name="pick_to_purchase" class="btn-custom btn-sm mt-2 mt-3-md me-3 py-2 px-3">
                        <i class="fa-solid fa-bag-shopping"></i>&nbsp;
                        <span>Purchase</span>
                    </button>
                    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                    <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                    <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
                    <button type="submit" name="add_to_cart_qv" class="btn-custom btn-sm mt-2 mt-3-md py-2 px-3">
                        <i class="fa-solid fa-shopping-cart"></i>&nbsp;
                        <span>Add To Cart</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Similiar Products</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>