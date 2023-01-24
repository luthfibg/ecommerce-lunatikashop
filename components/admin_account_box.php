<div class="box g-col-12 g-col-md-6">
    <span class="d-block">
        <span class="keyspan">Admin id:&nbsp;</span>
        <?= $fetch_admin_accounts['id'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">Admin name:&nbsp;</span>
        <?= $fetch_admin_accounts['name'] ?>
    </span>
    <div class="flex-action d-flex mt-5">
        <a href="update_profile.php" class="btn btn-sm btn-update">Update</a>
        <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="btn btn-sm btn-delete"
            onclick="return confirm('Are you sure to delete this admin account?'); ">Delete</a>
    </div>
</div>