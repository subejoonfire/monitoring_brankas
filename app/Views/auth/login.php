<?= view('layout/header', ['title' => 'Login Admin']) ?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <?php if (session('error')): ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif ?>
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Masuk Admin</h5>
                <form action="<?= base_url('login'); ?>" method="post">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= view('layout/footer') ?>