<div class="box g-col-12 g-col-md-6">
    <span class="d-block">
        <span class="keyspan">User ID:&nbsp;</span>
        <?= $fetch_user_accounts['id'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Name:&nbsp;</span>
        <?= $fetch_user_accounts['name'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Email:&nbsp;</span>
        <?= $fetch_user_accounts['email'] ?>
    </span>
    <div class="flex-action d-flex mt-5">
        <!-- <a href="update_profile.php" class="btn btn-sm btn-update">Update</a> -->
        <a href="user_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="btn btn-sm btn-delete"
            onclick="return confirm('Are you sure to delete this user account?'); ">Delete</a>
    </div>
</div>