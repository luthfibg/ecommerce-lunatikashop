<div class="card upd-card image-header p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-card">Update Profile</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control py-2" id="inputUsername" placeholder="Full Name"
                    value="<?= $fetch_profile['name']; ?>">
            </div>
            <div class="mb-3">
                <input type="email" name="email" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control py-2" id="inputEmail" placeholder="Email Address"
                    value="<?= $fetch_profile['email']; ?>">
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control py-2" id="phone" placeholder="Phone Number"
                    value="<?= $fetch_profile['number']; ?>">
            </div>
            <div class="mb-5">
                <input type="password" name="old_password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control py-2" id="inputPassword1" placeholder="Old Password">
            </div>
            <div class="mb-5">
                <input type="password" name="new_password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control py-2" id="inputPassword1" placeholder="New Password">
            </div>
            <div class="mb-5">
                <input type="password" name="confirm_new_password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control py-2" id="inputPassword2" placeholder="Confirm New Password">
            </div>
            <input type="submit" name="user_submit_update" class="btn btn-sm button secondary component-tone mt-5"
                value="Update">
        </form>
    </div>
</div>