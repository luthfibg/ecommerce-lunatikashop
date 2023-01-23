<div class="box">
    <p>User ID:&nbsp;
        <span>
            <?= $fetch_orders['user_id']; ?>
        </span>
    </p>
    <p>Placed on:&nbsp;
        <span>
            <?= $fetch_orders['placed_on']; ?>
        </span>
    </p>
    <p>Customer Name:&nbsp;
        <span>
            <?= $fetch_orders['name']; ?>
        </span>
    </p>
    <p>Email Address:&nbsp;
        <span>
            <?= $fetch_orders['email']; ?>
        </span>
    </p>
    <p>Phone Number:&nbsp;
        <span>
            <?= $fetch_orders['number']; ?>
        </span>
    </p>
    <p>Customer Address:&nbsp;
        <span>
            <?= $fetch_orders['address']; ?>
        </span>
    </p>
    <p>Payment Method:&nbsp;
        <span>
            <?= $fetch_orders['method']; ?>
        </span>
    </p>
    <p>Total Item Ordered:&nbsp;
        <span>
            <?= $fetch_orders['total_products']; ?>
        </span>
    </p>
    <p>Total Price:&nbsp;
        <span>
            <?= $fetch_orders['total_price']; ?>
        </span>
    </p>
    <form action="" method="POST">
        <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
        <select name="payment_status" class="dropdown" id="dropdown-payment">
            <option value="" selected disabled>
                <?= $fetch_orders['payment_status']; ?>
            </option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <div class="flex-action d-flex justify-content-between items-center">
            <input type="submit" value="Update" class="btn btn-sm" name="update_status">
            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="btn btn-sm btn-delete"
                onclick="return confirm('Are you sure to delete this order?'); ">Delete</a>
        </div>
    </form>
</div>