<?php
$update_id = $_GET['update'];
$show_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
$show_products->execute([$update_id]);

if ($show_products->rowCount() > 0) {
    while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {
        # code...
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="image-container">
                <div class="main-image my-3">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" id="mainImg" alt="">
                </div>
                <div class="sub-image my-3">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" class="subImg" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_02'] ?>" class="subImg" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_03'] ?>" class="subImg" alt="">
                </div>
            </div>
            <div class="card image-header w-100 w-75-sm w-50-lg mb-5">
                <div class="row p-2 d-flex flex-justify-center">
                    <p class="title-lvl-3">Update Product</p>
                </div>
                <div class="row p-3 d-flex flex-column">
                    <div class="flex">
                        <div class="mb-3">
                            <input type="text" name="product_name" maxlength="100" data-role="input" class="form-control box"
                                id="productName" placeholder="Product Name (Required)"
                                onclick="this.style.color='var(--component-livid)'" value="<?= $fetch_products['name']; ?>"
                                required>
                        </div>
                        <div class="mb-5">
                            <input type="number" min="0" max="999999999999" name="price" class="form-control box" id="price"
                                placeholder="Price (Required)" onkeypress="if(this.value.length == 13) return false;"
                                value="<?= $fetch_products['price']; ?>" required>
                        </div>
                        <div class="mb-5">
                            <textarea name="details" class="form-control box" maxlength="5000" id="details" cols="100" rows="10"
                                placeholder="Product Details" required><?= $fetch_products['details'] ?></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="img1" class="text-start">Product Image 1</label>
                            <input type="file" name="img1" class="form-control box" id="img1" placeholder="Product Image 1"
                                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                        </div>
                        <div class="mb-5">
                            <label for="img2" class="text-start">Product Image 2</label>
                            <input type="file" name="img2" class="form-control box" id="img2" placeholder="Product Image 2"
                                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                        </div>
                        <div class="mb-5" class="text-start">
                            <label for="img3">Product Image 3</label>
                            <input type="file" name="img3" class="form-control box" id="img3" placeholder="Product Image 3"
                                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                        </div>
                        <input type="submit" name="submit_add_product" class="btn btn-sm secondary component-tone mt-5 w-100"
                            value="Insert Product">
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
} else {
    echo '<p class="empty">No product inserted</p>';
}
?>

<script src="../resources/js/admin.js"></script>