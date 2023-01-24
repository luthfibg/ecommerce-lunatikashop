<div class="box g-col-12 g-col-md-6 g-col-lg-4">
    <span class="order-detail"><span class="keyspan">User ID:&nbsp;</span>
        <span>
            <?= $fetch_orders['user_id']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Placed on:&nbsp;</span>
        <span>
            <?= $fetch_orders['placed_on']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Customer Name:&nbsp;</span>
        <span>
            <?= $fetch_orders['name']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Email Address:&nbsp;</span>
        <span>
            <?= $fetch_orders['email']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Phone Number:&nbsp;</span>
        <span>
            <?= $fetch_orders['number']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Customer Address:&nbsp;</span>
        <span>
            <?= $fetch_orders['address']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Payment Method:&nbsp;</span>
        <span>
            <?= $fetch_orders['method']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Total Item Ordered:&nbsp;</span>
        <span>
            <?= $fetch_orders['total_products']; ?>
        </span>
    </span>
    <span class="order-detail"><span class="keyspan">Total Price:&nbsp;</span>
        Rp&nbsp;
        <span>
            <?= currency_formatter($fetch_orders['total_price']); ?>
        </span>
        -/
    </span>
    <form action="" method="POST" class="mt-5">
        <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
        <select name="payment_status" class="dropdown" id="dropdown-payment">
            <option value="" selected disabled>
                <?= $fetch_orders['payment_status']; ?>
            </option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <div class="flex-action mt-3 d-flex justify-content-between items-center">
            <input type="submit" value="Update" class="btn btn-sm btn-update mt-3" name="update_status">
            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="btn btn-sm btn-delete"
                onclick="return confirm('Are you sure to delete this order?'); ">Delete</a>
        </div>
    </form>
</div>