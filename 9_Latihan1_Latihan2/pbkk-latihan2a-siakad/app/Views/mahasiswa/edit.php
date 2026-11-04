<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Edit Mahasiswa</h4>

<?php if ($errors = session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
        <div><?= esc($error) ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="card p-4">
<form action="<?= base_url('mahasiswa/update/'.$mahasiswa['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input name="nim" class="form-control"
               value="<?= old('nim', $mahasiswa['nim']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input name="nama" class="form-control"
               value="<?= old('nama', $mahasiswa['nama']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select">
            <option value="L" <?= $mahasiswa['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= $mahasiswa['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input name="jurusan" class="form-control"
               value="<?= old('jurusan', $mahasiswa['jurusan']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Angkatan</label>
        <input type="number" name="angkatan" class="form-control"
               value="<?= old('angkatan', $mahasiswa['angkatan']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= old('email', $mahasiswa['email']) ?>">
    </div>

    <button class="btn btn-primary">Simpan Perubahan</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?= $this->endSection() ?>