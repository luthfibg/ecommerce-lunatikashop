<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Metro UI -->
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="resources/css/user.css">
    <link rel="stylesheet" href="resources/css/user_2.css">
    <link rel="stylesheet" href="resources/css/responsive_style.css">
    <link rel="stylesheet" href="resources/css/theme.css">
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body style="background: var(--dark-base);">
    <?php include($header) ?>
    <div class="container checkout-container">

        <?php
        $message = array();
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
        <div class="message">
          <span>' . $message . '</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
          ';
            }
        }
        ?>
        <h4 class="checkout-heading mt-5 text-center">Pesananan Anda</h4>
        <div class="display-orders d-flex flex-wrap justify-content-center align-items-start pt-3">
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
                while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                    $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $cart_items[] = $fetch_cart['name'] . '(' . $fetch_cart['quantity'] . ')-';
                    $total_products = implode($cart_items);
                    ?>
                    <p class="mt-2 mb-0">
                        <?= $fetch_cart['name']; ?> <span class="mb-0"> Rp
                            <?= currency_formatter($fetch_cart['price']); ?> ,- &nbsp; x
                            <?= $fetch_cart['quantity']; ?>
                        </span>
                    </p>
                    <?php
                }
            } else {
                ?>
                <div class="container empty-holder d-flex justify-content-between flex-column align-items-center">
                    <h4 class="my-5">Keranjang kosong...</h4>
                    <a href="shop.php" class="btn-custom py-3 mb-5 w-75 w-25-md">Berbelanja</a href="shop.php">
                </div>
                <?php
            }
            ?>
        </div>
        <?php include($content) ?>
    </div>
    <?php include($footer) ?>

    <script src="resources/js/user.js"></script>
    <script src="resources/js/prevent-resubmission.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>