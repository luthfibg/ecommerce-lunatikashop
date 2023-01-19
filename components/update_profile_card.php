<?php

?>
<div class="card image-header w-75 w-50-sm w-25-lg p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-lvl-3">Update Admin Profile</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <input type="hidden" name="previous_pass" value="<?= $fetch_profile['password'] ?>">
            <div class="mb-3">
                <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="inputUsername" value="<?= $fetch_profile['name'] ?>" placeholder="
                    Username" required>
            </div>
            <div class="mb-5">
                <input type="password" name="old_password" maxlength="20"
                    oninput="this.value = this.value.replace(/\s/g, '')" class="form-control" id="inputNewPassword1"
                    placeholder="Old Password" required>
            </div>
            <div class="mb-5">
                <input type="password" name="new_password" maxlength="20"
                    oninput="this.value = this.value.replace(/\s/g, '')" class="form-control" id="inputNewPassword1"
                    placeholder="New Password" required>
            </div>
            <div class="mb-5">
                <input type="password" name="confirm_new_password" maxlength="20"
                    oninput="this.value = this.value.replace(/\s/g, '')" class="form-control" id="inputNewPassword2"
                    placeholder="Confirm New Password" required>
            </div>
            <input type="submit" name="submit_login" class="button secondary component-tone mt-5" value="Update">
        </form>
    </div>
</div>