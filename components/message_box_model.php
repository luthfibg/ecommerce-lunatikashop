<div class="box g-col-12 g-col-md-6">
    <span class="d-block">
        <span class="keyspan">User ID:&nbsp;</span>
        <?= $fetch_messages['user_id'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Name:&nbsp;</span>
        <?= $fetch_messages['name'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Phone:&nbsp;</span>
        <?= $fetch_messages['number'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Email:&nbsp;</span>
        <?= $fetch_messages['email'] ?>
    </span>
    <span class="d-block">
        <span class="keyspan">User Message:&nbsp;</span>
        <?= $fetch_messages['message'] ?>
    </span>
    <div class="flex-action d-flex mt-5">
        <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" class="btn btn-sm btn-delete"
            onclick="return confirm('Are you sure to delete this message?'); ">Delete</a>
    </div>
</div>