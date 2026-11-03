<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-4">Edit Product</h2>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">

    <form action="<?= base_url('admin/products/update/'.$product['id']) ?>"
          method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="nama_produk"
                   class="form-control"
                   value="<?= old('nama_produk', $product['nama_produk']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="kategori" class="form-select" required>

                <?php
                $categories = [
                    'Vas Keramik',
                    'Guci Porselen',
                    'Vas Kaca',
                    'Guci Dekoratif',
                    'Dekorasi'
                ];
                ?>

                <?php foreach ($categories as $category): ?>
                    <option value="<?= esc($category) ?>"
                        <?= $product['kategori'] === $category ? 'selected' : '' ?>>
                        <?= esc($category) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="deskripsi" class="form-control"
                      rows="4"><?= old('deskripsi', $product['deskripsi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (Rp)</label>
            <input type="number" name="harga"
                   class="form-control" min="1" step="0.01"
                   value="<?= old('harga', $product['harga']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stok" class="form-control"
                   min="0" value="<?= old('stok', $product['stok']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Status</label>
            <select name="aktif" class="form-select">
                <option value="1" <?= $product['aktif'] == 1 ? 'selected' : '' ?>>
                    Active
                </option>
                <option value="0" <?= $product['aktif'] == 0 ? 'selected' : '' ?>>
                    Inactive
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>

            <?php if ($product['foto']): ?>
                <img
                    src="<?= base_url('uploads/products/'.$product['foto']) ?>"
                    width="130" class="rounded"
                    alt="Foto produk">
            <?php else: ?>
                <span class="text-muted">No image uploaded.</span>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label class="form-label">Change Image (Optional)</label>
            <input type="file" name="foto" class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
        </div>

        <button class="btn btn-dark-custom">Save Changes</button>

        <a href="<?= base_url('admin/products') ?>"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

<?= $this->endSection() ?>