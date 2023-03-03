<form action="" method="post" class="card p-3">
    <?php
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_user->execute([$user_id]);
    $fetch_users = $select_user->fetch(PDO::FETCH_ASSOC);
    ?>
    <input type="hidden" name="user_id" value="<?= $fetch_users['id']; ?>">
    <input type="text" name="name" id="name" class="form-control" placeholder="Name"
        value="<?= $fetch_users['name']; ?>" maxlength="55" required>
    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number"
        value="<?= $fetch_users['number']; ?>" required>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" maxlength="55"
        value="<?= $fetch_users['email']; ?>" required>
    <textarea class="form-control" name="msg" id="message" cols="30" rows="6" placeholder="Type Message"></textarea>
    <button type="submit" name="send_msg" id="send_msg" class="btn-custom btn-sm form-control mt-5 py-2">
        <i class="fa-regular fa-paper-plane"></i>&nbsp;
        Kirim
    </button>
</form>
<div class="alert alert-info" style="display: none;"></div>