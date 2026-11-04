<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-4">Shopping Cart</h2>

<?php if (empty($items)): ?>

    <div class="text-center py-5">
        <i class="fas fa-shopping-bag fa-3x text-secondary mb-3"></i>

        <h4 class="serif">Your cart is empty.</h4>

        <p class="text-muted">Explore our collection and find your favorite piece.</p>

        <a href="<?= base_url('products') ?>" class="btn btn-dark-custom">
            Browse Collection
        </a>
    </div>

<?php else: ?>

    <div class="card p-3">
        <div class="table-responsive">

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($items as $item): ?>
                        <tr>

                            <td>
                                <div class="d-flex align-items-center gap-3">

                                    <?php if ($item['product']['foto']): ?>
                                        <img
                                            src="<?= base_url('uploads/products/'.$item['product']['foto']) ?>"
                                            class="order-image"
                                            alt="Foto produk">
                                    <?php else: ?>
                                        <div class="product-placeholder order-image">
                                            <i class="fas fa-vase"></i>
                                        </div>
                                    <?php endif; ?>

                                    <span class="fw-semibold">
                                        <?= esc($item['product']['nama_produk']) ?>
                                    </span>

                                </div>
                            </td>

                            <td>
                                Rp <?= number_format($item['product']['harga'], 0, ',', '.') ?>
                            </td>

                            <td>
                                <form action="<?= base_url('cart/update') ?>"
                                      method="post" class="d-flex gap-2">
                                    <?= csrf_field() ?>

                                    <input type="number"
                                           name="quantities[<?= $item['product']['id'] ?>]"
                                           value="<?= $item['quantity'] ?>"
                                           min="1"
                                           max="<?= $item['product']['stok'] ?>"
                                           class="form-control"
                                           style="width:85px;">

                                    <button class="btn btn-outline-secondary btn-sm">
                                        Update
                                    </button>
                                </form>
                            </td>

                            <td class="price">
                                Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                            </td>

                            <td>
                                <form action="<?= base_url('cart/remove/'.$item['product']['id']) ?>"
                                      method="post"
                                      onsubmit="return confirm('Hapus produk dari keranjang?')">
                                    <?= csrf_field() ?>

                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

        <div class="text-end mt-3">
            <h5>Total</h5>

            <h3 class="price">
                Rp <?= number_format($total, 0, ',', '.') ?>
            </h3>

            <a href="<?= base_url('products') ?>"
               class="btn btn-outline-secondary">
                Continue Shopping
            </a>

            <a href="<?= base_url('checkout') ?>"
               class="btn btn-dark-custom">
                Proceed to Checkout
            </a>
        </div>

    </div>

<?php endif; ?>

<?= $this->endSection() ?>