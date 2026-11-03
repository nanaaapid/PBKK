<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Edit Dosen</h4>

<?php if ($errors = session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?><div><?= esc($error) ?></div><?php endforeach; ?>
</div>
<?php endif; ?>

<div class="card p-4">
<form action="<?= base_url('dosen/update/'.$dosen['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">NIDN</label>
        <input name="nidn" class="form-control" value="<?= old('nidn', $dosen['nidn']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Dosen</label>
        <input name="nama" class="form-control" value="<?= old('nama', $dosen['nama']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $dosen['email']) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Bidang Keahlian</label>
        <input name="bidang_keahlian" class="form-control" value="<?= old('bidang_keahlian', $dosen['bidang_keahlian']) ?>">
    </div>

    <button class="btn btn-primary">Simpan Perubahan</button>
    <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?= $this->endSection() ?>