<?= view('layout/header', ['title' => 'Riwayat Berhasil']) ?>
<h3 class="mb-3">Riwayat Akses Berhasil</h3>

<?php if (session('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif ?>

<div class="table-responsive">
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Waktu</th>
                <th>Tipe</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $i => $r): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($r['tanggal_akses']) ?></td>
                    <td><?= esc($r['tipe']) ?></td>
                    <td><?= esc($r['nama']) ?></td>
                    <td>
                        <a href="<?= isset($r['id']) ? base_url("riwayat/berhasil/delete/{$r['id']}") : NULL ?>"
                            class="btn btn-sm btn-danger" onclick="return confirm('Hapus riwayat?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modal foto -->
<div class="modal fade" id="fotoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img src="" id="fotoFull" class="w-100">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fotoModal = document.getElementById('fotoModal');
        fotoModal.addEventListener('show.bs.modal', event => {
            const img = event.relatedTarget.getAttribute('data-img');
            fotoModal.querySelector('#fotoFull').src = img;
        });
    });
</script>
<?= view('layout/footer') ?>