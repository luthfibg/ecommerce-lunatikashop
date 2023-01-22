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
                <div class="main-image">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" alt="">
                </div>
                <div class="sub-image">
                    <img src="assets/images/products/<?= $fetch_products['image_01'] ?>" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_02'] ?>" alt="">
                    <img src="assets/images/products/<?= $fetch_products['image_03'] ?>" alt="">
                </div>
            </div>
            <span>Update Name</span>
            <input type="text" name="product_name" maxlength="100" data-role="input" class="form-control box" id="productName"
                placeholder="Product Name (Required)" onclick="this.style.color='var(--component-livid)'"
                value="<?= $fetch_products['name']; ?>" required>
            <span>Update Price</span>
            <input type="number" min="0" max="999999999999" name="price" class="form-control box" id="price"
                placeholder="Price (Required)" onkeypress="if(this.value.length == 13) return false;"
                value="<?= $fetch_products['price'] ?>" required>
            <span>Update Details</span>
            <textarea name="details" class="form-control box" maxlength="5000" id="details" cols="100" rows="10"
                placeholder="Product Details" required><?= $fetch_products['details'] ?></textarea>
            <span>Update Image 1</span>
            <input type="file" name="img1" class="form-control box" id="img1" placeholder="Product Image 1"
                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
            <span>Update Image 2</span>
            <input type="file" name="img2" class="form-control box" id="img2" placeholder="Product Image 2"
                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
            <span>Update Image 3</span>
            <input type="file" name="img3" class="form-control box" id="img3" placeholder="Product Image 3"
                accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>

        </form>
        <?php
    }
} else {
    echo '<p class="empty">No product inserted</p>';
}
?>