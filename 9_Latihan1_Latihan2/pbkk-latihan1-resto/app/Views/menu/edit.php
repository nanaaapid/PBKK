<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h4 class="mb-1">Edit Menu</h4>
<p class="text-muted mb-4">Perbarui informasi menu restoran.</p>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">
    <form action="<?= base_url('menu/update/' . $menu['id']) ?>"
          method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control"
                   value="<?= old('nama_menu', $menu['nama_menu']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="Makanan"
                    <?= $menu['kategori'] === 'Makanan' ? 'selected' : '' ?>>
                    Makanan
                </option>

                <option value="Minuman"
                    <?= $menu['kategori'] === 'Minuman' ? 'selected' : '' ?>>
                    Minuman
                </option>

                <option value="Dessert"
                    <?= $menu['kategori'] === 'Dessert' ? 'selected' : '' ?>>
                    Dessert
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control"
                   min="0" step="0.01"
                   value="<?= old('harga', $menu['harga']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"
                      rows="3"><?= old('deskripsi', $menu['deskripsi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Saat Ini</label><br>

            <?php if ($menu['foto']): ?>
                <img src="<?= base_url('uploads/menu/' . $menu['foto']) ?>"
                     width="120" class="rounded mb-2" alt="Foto menu">
            <?php else: ?>
                <p class="text-muted">Belum ada foto.</p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label class="form-label">Ganti Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control"
                   accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan Perubahan
        </button>

        <a href="<?= base_url('menu') ?>" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

<?= $this->endSection() ?>