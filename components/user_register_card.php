<div class="card image-header w-75 w-50-sm w-25-lg p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-lvl-3">User Register</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="inputUsername" placeholder="Full Name">
            </div>
            <div class="mb-3">
                <input type="email" name="email" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="inputEmail" placeholder="Email Address">
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="inputPhone" placeholder="Phone Number">
            </div>
            <div class="mb-5">
                <input type="password" name="password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control" id="inputPassword1" placeholder="Password">
            </div>
            <div class="mb-5">
                <input type="password" name="confirm_password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control" id="inputPassword2" placeholder="Confirm Password">
            </div>
            <input type="submit" name="user_submit_register" class="btn btn-sm button secondary component-tone mt-5"
                value="Register">
        </form>
    </div>
</div>