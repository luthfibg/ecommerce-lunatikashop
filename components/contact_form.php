<form action="" method="post" class="card p-3">
    <?php
        $user_id;
    ?>
    <input type="text" name="name" id="name" class="form-control" placeholder="Name" maxlength="55" required>
    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" maxlength="55"
        required>
    <textarea class="form-control" name="msg" id="message" cols="30" rows="6" placeholder="Type Message"></textarea>
    <button type="submit" name="send_msg" id="send_msg" class="btn-custom btn-sm form-control mt-5 py-2">
        <i class="fa-regular fa-paper-plane"></i>&nbsp;
        Kirim
    </button>
</form>
<div class="alert alert-info" style="display: none;"></div>