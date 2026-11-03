<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row g-5 py-4">

    <div class="col-md-6">

        <?php if ($product['foto']): ?>
            <img
                src="<?= base_url('uploads/products/'.$product['foto']) ?>"
                class="img-fluid w-100"
                style="height:480px;object-fit:cover;background:#f7f3ed;"
                alt="<?= esc($product['nama_produk']) ?>">
        <?php else: ?>
            <div class="product-placeholder" style="height:480px;">
                <i class="fas fa-wine-bottle"></i>
            </div>
        <?php endif; ?>

    </div>

    <div class="col-md-6">

        <small class="text-uppercase" style="letter-spacing:3px;color:#a17e57;">
            <?= esc($product['kategori']) ?>
        </small>

        <h1 class="serif mt-3">
            <?= esc($product['nama_produk']) ?>
        </h1>

        <h4 class="price my-3">
            Rp <?= number_format($product['harga'], 0, ',', '.') ?>
        </h4>

        <p class="text-muted">
            <?= nl2br(esc($product['deskripsi'])) ?>
        </p>

        <p>
            <strong>Availability:</strong>

            <?php if ($product['stok'] > 0): ?>
                <span class="text-success">
                    In Stock (<?= $product['stok'] ?> available)
                </span>
            <?php else: ?>
                <span class="text-danger">Out of Stock</span>
            <?php endif; ?>
        </p>

        <?php if ($product['stok'] > 0): ?>

            <form action="<?= base_url('cart/add') ?>" method="post">
                <?= csrf_field() ?>

                <input type="hidden" name="product_id"
                       value="<?= $product['id'] ?>">

                <div class="mb-3" style="max-width:130px;">
                    <label class="form-label">Quantity</label>

                    <input type="number" name="quantity"
                           class="form-control" value="1"
                           min="1" max="<?= $product['stok'] ?>" required>
                </div>

                <button class="btn btn-dark-custom px-4">
                    <i class="fas fa-shopping-bag me-2"></i>
                    Add to Cart
                </button>
            </form>

        <?php endif; ?>

        <a href="<?= base_url('products') ?>"
           class="btn btn-outline-secondary mt-4">
            <i class="fas fa-arrow-left me-1"></i>
            Back to Collection
        </a>

    </div>

</div>

<?= $this->endSection() ?>