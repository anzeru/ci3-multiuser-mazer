<div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-3">
        <div class="text-center mb-3">
            <img class="img-thumbnail" src="<?= base_url('assets/img/logo/logo.png') ?>">
            <h2 class="mt-2">PT. Padaidi Corp</h2>
        </div>
        <h1>Log in</h1>
        <?= $this->session->flashdata('message') ?>
        <?php unset($_SESSION['message']) ?>
        <form id="form_login" action="" method="post">
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" name="email" id="email" placeholder="Email" required>
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input name="password" id="password" type="password" class="form-control form-control-xl" placeholder="Password" required>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                    Keep me logged in
                </label>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
        </div>
    </div>