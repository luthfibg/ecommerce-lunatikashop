<div class="card image-header w-75 w-50-sm w-25-lg p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-lvl-3">Admin Register</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="flex">
                <div class="mb-3">
                    <input type="text" name="product_name" maxlength="100" data-role="input" class="form-control box"
                        id="productName" placeholder="Product Name (Required)" required>
                </div>
                <div class="mb-5">
                    <input type="number" min="0" max="999999999999" name="price" class="form-control box" id="price"
                        placeholder="Price (Required)" onkeypress="if(this.value.length == 13) return false;" required>
                </div>
                <div class="mb-5">
                    <input type="file" name="img1" class="form-control box" id="img1" placeholder="Product Image 1"
                        accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                </div>
                <div class="mb-5">
                    <input type="file" name="img2" class="form-control box" id="img2" placeholder="Product Image 2"
                        accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                </div>
                <div class="mb-5">
                    <input type="file" name="img3" class="form-control box" id="img3" placeholder="Product Image 3"
                        accept="image/jpg, image/jpeg, image/png, image/webp, image/tiff" required>
                </div>
                <div class="mb-5">
                    <textarea name="details" class="box" maxlength="500" id="details" cols="30" rows="10"
                        placeholder="Product Details" required></textarea>
                </div>
                <input type="submit" name="submit_add_product" class="btn btn-sm secondary component-tone mt-5"
                    value="Insert Product">
            </div>
        </form>
    </div>
</div>