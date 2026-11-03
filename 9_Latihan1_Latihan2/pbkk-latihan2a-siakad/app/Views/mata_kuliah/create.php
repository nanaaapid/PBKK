<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Tambah Mata Kuliah</h4>

<?php if ($errors = session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?><div><?= esc($error) ?></div><?php endforeach; ?>
</div>
<?php endif; ?>

<div class="card p-4">
<form action="<?= base_url('mata-kuliah/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Kode Mata Kuliah</label>
        <input name="kode_mk" class="form-control" value="<?= old('kode_mk') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mata Kuliah</label>
        <input name="nama_mk" class="form-control" value="<?= old('nama_mk') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">SKS</label>
        <input type="number" name="sks" class="form-control" min="1" max="6" value="<?= old('sks') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Semester</label>
        <input type="number" name="semester" class="form-control" min="1" max="14" value="<?= old('semester') ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Dosen Pengampu</label>
        <select name="dosen_id" class="form-select">
            <option value="">Belum ditentukan</option>
            <?php foreach ($dosen as $d): ?>
                <option value="<?= $d['id'] ?>"><?= esc($d['nama']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('mata-kuliah') ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?= $this->endSection() ?>