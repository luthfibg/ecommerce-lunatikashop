<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Metro UI -->
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" href="../resources/css/product.css">
    <link rel="stylesheet" href="../resources/css/sweetalert_custom.css">
    <link rel="stylesheet" href="../resources/css/responsive_style.css">
    <link rel="stylesheet" href="../resources/css/theme.css">
    <title> Lunatika Shop </title>
</head>

<body style="background-color: var(--dark-base);">
    <?php
    include('../components/connection.php');

    // $success_msg[] = 'Sweet Alert Success';
    ?>

    <div class="container-fluid container-header">
        <?php include '../components/header.php'; ?>
    </div>
    <div class="container mw-100 h-100 pos-absolute d-flex flex-justify-center flex-align-center flex-column">
    </div>

    <script src="../resources/js/product.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php include '../components/alert.php' ?>
</body>

</html>