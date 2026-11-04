<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="section-title">Manage Products</h2>
        <p class="text-muted">Manage Vaselle product collection.</p>
    </div>

    <a href="<?= base_url('admin/products/create') ?>"
       class="btn btn-dark-custom">
        <i class="fas fa-plus me-1"></i> Add Product
    </a>
</div>

<div class="card p-3 table-responsive">

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $i => $product): ?>
                <tr>
                    <td><?= $i + 1 ?></td>

                    <td>
                        <div class="d-flex align-items-center gap-2">

                            <?php if ($product['foto']): ?>
                                <img
                                    src="<?= base_url('uploads/products/'.$product['foto']) ?>"
                                    class="order-image"
                                    alt="Foto produk">
                            <?php else: ?>
                                <div class="product-placeholder order-image">
                                    <i class="fas fa-wine-bottle"></i>
                                </div>
                            <?php endif; ?>

                            <?= esc($product['nama_produk']) ?>

                        </div>
                    </td>

                    <td><?= esc($product['kategori']) ?></td>

                    <td>
                        Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                    </td>

                    <td><?= $product['stok'] ?></td>

                    <td>
                        <?php if ($product['aktif']): ?>
                            <span class="badge bg-success">Active</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="<?= base_url('admin/products/edit/'.$product['id']) ?>"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="<?= base_url('admin/products/delete/'.$product['id']) ?>"
                              method="post"
                              class="d-inline"
                              onsubmit="return confirm('Hapus produk ini?')">
                            <?= csrf_field() ?>

                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?= $this->endSection() ?>