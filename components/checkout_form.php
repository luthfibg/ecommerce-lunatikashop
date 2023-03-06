<input type="hidden" name="total_products" value="<?= $total_products; ?>">
<input type="hidden" name="total_price" value="<?= $total_price; ?>">
<p class="grand-total p-2 mt-3 text-center">Grand Total: <span> Rp
        <?= currency_formatter($grand_total); ?>
        ,-
    </span> </p>

<form action="" method="POST">
    <div class="d-flex flex-column">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="name" maxlength="55"
                placeholder="Your Name">
            <label for="floatingName">Full Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingPhone" name="phone" placeholder="Your Name"
                onkeypress="if(this.value.length == 14) return false; ">
            <label for="floatingPhone">Phone Number</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
            <label for="floatingEmail">Email Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingAddress" name="address" placeholder="Your Address">
            <label for="floatingAddress">Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
            <label for="floatingEmail">Email address</label>
        </div>
    </div>
</form>