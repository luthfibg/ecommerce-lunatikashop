<div class="card login-card image-header p-3">
    <div class="row p-2 d-flex flex-justify-center">
        <p class="title-card">Masuk Akun</p>
    </div>
    <div class="row p-2 d-flex flex-column text-center">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="email" name="email" oninput="this.value = this.value.replace(/\s/g, '')" data-role="input"
                    class="form-control py-2 py-lg-3" id="checkEmail" placeholder="Alamat Email">
            </div>
            <div class="mb-5">
                <input type="password" name="password" oninput="this.value = this.value.replace(/\s/g, '')"
                    class="form-control py-2 py-lg-3" id="checkPassword" placeholder="Kata Sandi">
            </div>
            <input type="submit" name="user_submit_login"
                class="btn btn-sm button secondary component-tone px-5 px-md-5 mt-5" value="Masuk">
        </form>
        <span class="mt-5">Belum punya akun? <a href="user_register.php">daftar</a></span>
    </div>
</div>