<div class="card image-header w-75 w-50-sm w-25-lg p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-card">User Login</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="email" name="email" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="checkEmail" placeholder="Email">
            </div>
            <div class="mb-5">
                <input type="password" name="password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control" id="checkPassword" placeholder="Password">
            </div>
            <input type="submit" name="user_submit_login" class="btn btn-sm button secondary component-tone mt-5"
                value="Login">
        </form>
        <span>Haven't account? <a href="user_register.php">register</a></span>
    </div>
</div>