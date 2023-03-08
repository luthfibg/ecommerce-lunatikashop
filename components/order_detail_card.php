<div class="card order-card mx-0 my-5">
    <div class="card-header">
        <h5 class="title-card">
            <?= $fetch_orders['placed_on']; ?>
        </h5>
        <!-- <h5 class="subtitle-card"></h5> -->
    </div>
    <div class="card-body d-flex flex-column">
        <span class="card-title mb-3">Nama Pemesan: <br>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="order-value">
                <?= $fetch_orders['name']; ?>
            </span>
        </span>
        <span class="card-text mb-3">Nomor Telepon: <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">
                <?= $fetch_orders['number']; ?>
            </span> </span>
        <span class="card-text mb-3">Alamat Email: <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">
                <?= $fetch_orders['email']; ?>
            </span> </span>
        <span class="card-text mb-3">Metode Pembayaran: <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">
                <?= $fetch_orders['method']; ?>
            </span> </span>
        <span class="card-text mb-3">Produk Pesanan: <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">
                <?= $fetch_orders['total_products']; ?>
            </span> </span>
        <span class="card-text mb-3">Total Harga: <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">Rp
                <?= currency_formatter($fetch_orders['total_price']); ?>,-
            </span> </span>
        <span class="card-text mb-3">Status <br>&nbsp;&nbsp;&nbsp;&nbsp; <span class="order-value">
                <?= $fetch_orders['payment_status']; ?>
            </span> </span>
        <a href="myorders.php" class="btn-custom mt-3" name="show_details">Kembali</a>
    </div>
</div>