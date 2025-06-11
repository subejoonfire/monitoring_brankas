<?= view('layout/header', ['title' => 'Dashboard']) ?>
<h3 class="mb-4">Dashboard</h3>
<div class="row g-3">
    <div class="col-md-4">
        <div class="card text-bg-primary shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Data Anggota</h5>
                <p class="display-6"><?= $jmlAnggota ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-success shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Riwayat Berhasil</h5>
                <p class="display-6"><?= $jmlBerhasil ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-danger shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Riwayat Gagal</h5>
                <p class="display-6"><?= $jmlGagal ?></p>
            </div>
        </div>
    </div>
</div>
<?= view('layout/footer') ?>