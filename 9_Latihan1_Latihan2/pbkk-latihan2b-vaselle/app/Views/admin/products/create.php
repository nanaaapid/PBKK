<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-4">Add Product</h2>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">

    <form action="<?= base_url('admin/products/store') ?>"
          method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="nama_produk"
                   class="form-control"
                   value="<?= old('nama_produk') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="kategori" class="form-select" required>
                <option value="">Select Category</option>
                <option value="Vas Keramik">Vas Keramik</option>
                <option value="Guci Porselen">Guci Porselen</option>
                <option value="Vas Kaca">Vas Kaca</option>
                <option value="Guci Dekoratif">Guci Dekoratif</option>
                <option value="Dekorasi">Dekorasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="deskripsi" class="form-control"
                      rows="4"><?= old('deskripsi') ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (Rp)</label>
            <input type="number" name="harga" class="form-control"
                   min="1" step="0.01"
                   value="<?= old('harga') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stok" class="form-control"
                   min="0" value="<?= old('stok', 0) ?>" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Product Image</label>
            <input type="file" name="foto" class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted">JPG, PNG, WEBP. Maksimal 2 MB.</small>
        </div>

        <button class="btn btn-dark-custom">Save Product</button>

        <a href="<?= base_url('admin/products') ?>"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

<?= $this->endSection() ?>