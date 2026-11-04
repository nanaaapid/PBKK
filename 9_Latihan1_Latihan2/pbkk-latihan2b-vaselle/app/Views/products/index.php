<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="text-center py-5 mb-4"
     style="background:#f7f3ed;">

    <p class="text-uppercase small" style="letter-spacing:4px;color:#a17e57;">
        Timeless Home Collection
    </p>

    <h1 class="serif display-4">Objects of Elegance</h1>

    <p class="text-muted">
        Discover carefully curated vases and decorative pieces.
    </p>

    <a href="#collection" class="btn btn-dark-custom px-4">
        Explore Collection
    </a>
</div>

<div id="collection">

    <div class="text-center mb-4">
        <p class="text-uppercase small" style="letter-spacing:3px;color:#a17e57;">
            Our Collection
        </p>

        <h2 class="section-title">Selected Pieces</h2>

        <p class="text-muted">
            A statement piece for your timeless space.
        </p>
    </div>

    <div class="row g-4">

        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada produk tersedia.</p>
            </div>
        <?php endif; ?>

        <?php foreach ($products as $product): ?>
            <div class="col-md-4 col-sm-6">

                <div class="card product-card">

                    <a href="<?= base_url('products/'.$product['id']) ?>"
                       class="text-decoration-none">

                        <?php if ($product['foto']): ?>
                            <img
                                src="<?= base_url('uploads/products/'.$product['foto']) ?>"
                                class="product-image"
                                alt="<?= esc($product['nama_produk']) ?>">
                        <?php else: ?>
                            <div class="product-placeholder">
                                <i class="fas fa-wine-bottle"></i>
                            </div>
                        <?php endif; ?>

                    </a>

                    <div class="card-body px-0">

                        <small class="text-muted text-uppercase">
                            <?= esc($product['kategori']) ?>
                        </small>

                        <h5 class="serif mt-2">
                            <?= esc($product['nama_produk']) ?>
                        </h5>

                        <p class="price">
                            Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                        </p>

                        <?php if ($product['stok'] > 0): ?>
                            <a href="<?= base_url('products/'.$product['id']) ?>"
                               class="btn btn-outline-dark btn-sm px-3">
                                View Details
                            </a>
                        <?php else: ?>
                            <span class="badge bg-secondary">Out of Stock</span>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
</div>

<?= $this->endSection() ?>