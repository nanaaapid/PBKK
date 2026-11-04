<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h4 class="mb-1">Tambah Menu</h4>
<p class="text-muted mb-4">Tambahkan makanan atau minuman baru.</p>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">
    <form action="<?= base_url('menu/store') ?>" method="post"
          enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control"
                   value="<?= old('nama_menu') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="">Pilih kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Dessert">Dessert</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control"
                   min="0" step="0.01" value="<?= old('harga') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"
                      rows="3"><?= old('deskripsi') ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Foto Menu</label>
            <input type="file" name="foto" class="form-control"
                   accept="image/*">
            <small class="text-muted">Format gambar, maksimal 2 MB.</small>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan
        </button>

        <a href="<?= base_url('menu') ?>" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

<?= $this->endSection() ?>