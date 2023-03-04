<div class="row search-product-result py-3 py-5-md w-100">
    <div class="products-result-header mb-3 mb-5-md">Result</div>
    <div class="wrapper d-flex align-items-center justify-content-center flex-wrap px-5 px-md-0 w-100">
        <?php

        if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
            $search_box = $_POST['search_box'];
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%' OR category LIKE '%{$search_box}%' OR price LIKE '%{$search_box}%'");
            $select_products->execute();

            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    ?>
                    <?php include($content_result) ?>
                    <?php
                }
            }
        } else {
            echo '<div class="empty-result"><p class="empty" style="font-size: 1.65rem;color: var(--light-shadow);">Search product to display</p></div>';
        }

        ?>
    </div>
</div>