<p class="grand-total p-2 mt-3 text-center mb-5 pb-3">Total Tagihan: <span> Rp
        <?= currency_formatter($grand_total); ?>
        ,-
    </span> </p>

<form action="" method="POST" class="mt-3 mt-sm-5">
    <h4 class="checkout-form-heading text-center mb-3">Kelengkapan Data Pemesan</h4>
    <input type="hidden" name="total_products" value="<?= $total_products; ?>">
    <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
    <div class="d-flex flex-wrap justify-content-center">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="name" maxlength="55" placeholder="Your Name"
                value="<?= $fetch_user['name']; ?>">
            <label for="floatingName">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingPhone" name="phone" placeholder="Your Name"
                onkeypress="if(this.value.length == 14) return false; " value="<?= $fetch_user['number']; ?>">
            <label for="floatingPhone">Nomor Telepon</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com"
                value="<?= $fetch_user['email']; ?>">
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
            <select class="form-select" aria-label="Default select example" id="floatingPayment" name="method">
                <option selected disabled>Pilih Metode Pembayaran</option>
                <optgroup label="Kartu Debit">
                    <option value="kd-bni">BNI</option>
                    <option value="kd-bca">BCA</option>
                    <option value="kd-bni">Mandiri</option>
                    <option value="kd-bca">CIMB Niaga</option>
                </optgroup>
                <optgroup label="E-Wallet">
                    <option value="ew-ovo">OVO</option>
                    <option value="ew-paypal">Paypal</option>
                    <option value="ew-dompetku">Dompetku</option>
                </optgroup>
                <optgroup label="Token">
                    <option value="t-jne">JNE</option>
                    <option value="t-jnt-express">JNT Express</option>
                    <option value="t-alfamart">Alfamart</option>
                    <option value="t-indomart">Indomart</option>
                </optgroup>
                <optgroup label="Lainnya">
                    <option value="cod">Tunai Di Tempat</option>
                    <option value="gerai">Gerai Lunatikashop</option>
                </optgroup>
            </select>
            <label for="floatingPayment">Metode Pembayaran</label>
        </div>
        <input type="submit" value="Konfirmasi Pembelian" class="btn-custom" name="submit_checkout">
    </div>
</form>