<div class="box">
    <span class="order-detail">User ID:&nbsp;
        <span>
            <?= $fetch_orders['user_id']; ?>
        </span>
    </span>
    <span class="order-detail">Placed on:&nbsp;
        <span>
            <?= $fetch_orders['placed_on']; ?>
        </span>
    </span>
    <span class="order-detail">Customer Name:&nbsp;
        <span>
            <?= $fetch_orders['name']; ?>
        </span>
    </span>
    <span class="order-detail">Email Address:&nbsp;
        <span>
            <?= $fetch_orders['email']; ?>
        </span>
    </span>
    <span class="order-detail">Phone Number:&nbsp;
        <span>
            <?= $fetch_orders['number']; ?>
        </span>
    </span>
    <span class="order-detail">Customer Address:&nbsp;
        <span>
            <?= $fetch_orders['address']; ?>
        </span>
    </span>
    <span class="order-detail">Payment Method:&nbsp;
        <span>
            <?= $fetch_orders['method']; ?>
        </span>
    </span>
    <span class="order-detail">Total Item Ordered:&nbsp;
        <span>
            <?= $fetch_orders['total_products']; ?>
        </span>
    </span>
    <span class="order-detail">Total Price:&nbsp;
        <span>
            <?= $fetch_orders['total_price']; ?>
        </span>
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