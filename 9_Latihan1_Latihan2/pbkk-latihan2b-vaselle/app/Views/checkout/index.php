<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-4">Checkout</h2>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="row g-4">

    <div class="col-md-7">

        <div class="card p-4">
            <h5 class="serif mb-4">Shipping Information</h5>

            <form action="<?= base_url('checkout/place-order') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Recipient Name</label>
                    <input type="text" name="nama_penerima"
                           class="form-control"
                           value="<?= old('nama_penerima', session()->get('nama')) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="no_hp"
                           class="form-control"
                           value="<?= old('no_hp') ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Shipping Address</label>
                    <textarea name="alamat" class="form-control"
                              rows="4" required><?= old('alamat') ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Order Notes (Optional)</label>
                    <textarea name="catatan" class="form-control"
                              rows="2"><?= old('catatan') ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Payment Method</label>

                    <select name="metode_pembayaran" class="form-select" required>
                        <option value="Transfer Bank (Simulasi)">
                            Transfer Bank (Simulasi)
                        </option>

                        <option value="COD">Cash on Delivery (COD)</option>
                    </select>

                    <small class="text-muted">
                        Pembayaran pada aplikasi ini masih berupa simulasi.
                    </small>
                </div>

                <button class="btn btn-dark-custom w-100">
                    Place Order
                </button>

            </form>
        </div>

    </div>

    <div class="col-md-5">

        <div class="card p-4">
            <h5 class="serif mb-3">Order Summary</h5>

            <?php foreach ($items as $item): ?>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <strong><?= esc($item['product']['nama_produk']) ?></strong>
                        <div class="small text-muted">
                            Quantity: <?= $item['quantity'] ?>
                        </div>
                    </div>

                    <span>
                        Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                    </span>
                </div>
            <?php endforeach; ?>

            <hr>

            <div class="d-flex justify-content-between">
                <strong>Total</strong>
                <h5 class="price">
                    Rp <?= number_format($total, 0, ',', '.') ?>
                </h5>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>