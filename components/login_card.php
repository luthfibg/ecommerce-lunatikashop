<div class="card image-header w-75 w-50-sm w-25-lg p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-card">Admin Login</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control" id="inputUsername" placeholder="Username">
            </div>
            <div class="mb-5">
                <input type="password" name="password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <input type="submit" name="submit_login" class="button secondary component-tone mt-5 w-100" value="Login">
        </form>
        <span class="mt-3">Haven't account? <a href="register.php">register</a></span>
        <span>OR <a href="user_login.php">login as user</a></span>
    </div>
</div>