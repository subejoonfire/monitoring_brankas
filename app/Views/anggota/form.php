<?php
$isEdit = isset($row['id']);
$title = $isEdit ? 'Edit Anggota' : 'Tambah Anggota';
$formUrl = $isEdit ? base_url("anggota/edit/{$row['id']}") : base_url('anggota/create');
$currentTipe = $isEdit ? $row['tipe'] : old('tipe');
?>
<?= view('layout/header', ['title' => $title]) ?>

<div class="card">
    <div class="card-header">
        <h4>Form Anggota</h4>
    </div>
    <div class="card-body">
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= $formUrl ?>" method="post">

            <!-- Nama Field -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama') ? 'is-invalid' : '' ?>"
                    id="nama" name="nama" value="<?= $isEdit ? $row['nama'] : old('nama') ?>">
                <?php if (isset($validation) && $validation->hasError('nama')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ID Field (only shown in edit mode as hidden field) -->
            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <?php endif; ?>

            <!-- Tipe Field -->
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select
                    class="form-control <?= isset($validation) && $validation->hasError('tipe') ? 'is-invalid' : '' ?>"
                    id="tipe" name="tipe" onchange="updateKeyInputType()">
                    <option value="">Pilih Tipe</option>
                    <option value="RFID" <?= $currentTipe == 'RFID' ? 'selected' : '' ?>>RFID</option>
                    <option value="KEYPAD" <?= $currentTipe == 'KEYPAD' ? 'selected' : '' ?>>Keypad</option>
                </select>
                <?php if (isset($validation) && $validation->hasError('tipe')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('tipe') ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Key Field (dynamic type) -->
            <div class="mb-3">
                <label for="key" class="form-label">Key</label>
                <input type="<?= $currentTipe == 'key' ? 'password' : 'text' ?>"
                    class="form-control <?= isset($validation) && $validation->hasError('key') ? 'is-invalid' : '' ?>"
                    id="key" name="key"
                    placeholder=" <?= $currentTipe == 'key' ? 'Masukkan PIN/key' : 'Masukkan ID RFID' ?>">
                <?php if (isset($validation) && $validation->hasError('key')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('key') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
            </div>
        </form>
    </div>
</div>

<script>
    function updateKeyInputType() {
        const tipeSelect = document.getElementById('tipe');
        const keyInput = document.getElementById('key');

        if (tipeSelect.value === 'KEYPAD') {
            keyInput.type = 'password';
            keyInput.placeholder = 'Masukkan PIN/key';
        } else {
            keyInput.type = 'text';
            keyInput.placeholder = 'Masukkan ID RFID';
        }
    }
</script>

<?= view('layout/footer') ?>