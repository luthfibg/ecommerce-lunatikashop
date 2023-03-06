<input type="hidden" name="total_products" value="<?= $total_products; ?>">
<input type="hidden" name="total_price" value="<?= $total_price; ?>">
<p class="grand-total p-2 mt-3 text-center mb-3 mb-sm-5">Grand Total: <span> Rp
        <?= currency_formatter($grand_total); ?>
        ,-
    </span> </p>

<form action="" method="POST" class="mt-3 mt-sm-5">
    <div class="d-flex flex-wrap justify-content-center">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="name" maxlength="55"
                placeholder="Your Name">
            <label for="floatingName">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingPhone" name="phone" placeholder="Your Name"
                onkeypress="if(this.value.length == 14) return false; ">
            <label for="floatingPhone">Nomor Telepon</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
            <label for="floatingEmail">Alamat Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddress" name="address" placeholder="Your Address">
            <label for="floatingAddress">Alamat (Nama blok/detail posisi)</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddressStr" name="address_street"
                placeholder="Your Address">
            <label for="floatingAddressStr">Alamat (Nama Jalan)</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddressTw" name="address_town"
                placeholder="Your Address">
            <label for="floatingAddressTw">Kota</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddressPv" name="address_province"
                placeholder="Your Address">
            <label for="floatingAddressPv">Provinsi/Regional</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddressCtr" name="address_country"
                placeholder="Your Address">
            <label for="floatingAddressCtr">Negara</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingAddressPc" name="address_post_code"
                placeholder="Your Address">
            <label for="floatingAddressPc">Kode Pos</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" id="floatingPayment">
                <option selected disabled>Metode Pembayaran</option>
                <option value="cod">Tunai Di Tempat</option>
                <option value="bni">OVO</option>
                <option value="bca">Paypal</option>
                <option value="bni">BNI</option>
                <option value="bca">BCA</option>
            </select>
            <label for="floatingPayment">Metode Pembayaran</label>
        </div>
    </div>
</form>