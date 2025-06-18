<?= view('layout/header', ['title' => 'Data Anggota']) ?>
<div class="d-flex justify-content-between mb-3">
    <h3>Data Anggota</h3>
    <a href="<?= base_url('anggota/create'); ?>" class="btn btn-primary">Tambah</a>
</div>

<?php if (session('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif ?>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Anggota</th>
                <th>Tipe</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $i => $r): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($r['id']) ?></td>
                    <td><?= esc($r['tipe']) ?></td>
                    <td><?= esc($r['nama']) ?></td>
                    <td>
                        <a href="<?= base_url("anggota/edit/{$r['id']}") ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url("anggota/delete/{$r['id']}") ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= view('layout/footer') ?>