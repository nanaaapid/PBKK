<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Tambah Mahasiswa</h4>

<?php if ($errors = session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
        <div><?= esc($error) ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="card p-4">
<form action="<?= base_url('mahasiswa/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input name="nim" class="form-control" value="<?= old('nim') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input name="nama" class="form-control" value="<?= old('nama') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
            <option value="">Pilih</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input name="jurusan" class="form-control" value="<?= old('jurusan') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Angkatan</label>
        <input type="number" name="angkatan" class="form-control"
               min="2000" max="2100" value="<?= old('angkatan') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?= $this->endSection() ?>