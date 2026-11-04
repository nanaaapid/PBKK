<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="section-title">Order Details</h2>

    <a href="<?= base_url('orders') ?>" class="btn btn-outline-secondary">
        Back
    </a>
</div>

<div class="card p-4 mb-4">

    <div class="row">
        <div class="col-md-6">
            <small class="text-muted">Order Number</small>
            <h5><?= esc($order['nomor_pesanan']) ?></h5>

            <small class="text-muted">Recipient</small>
            <p><?= esc($order['nama_penerima']) ?></p>

            <small class="text-muted">Phone Number</small>
            <p><?= esc($order['no_hp']) ?></p>
        </div>

        <div class="col-md-6">
            <small class="text-muted">Order Date</small>
            <p><?= esc($order['created_at']) ?></p>

            <small class="text-muted">Order Status</small>
            <p>
                <span class="badge bg-primary">
                    <?= esc($order['status']) ?>
                </span>
            </p>

            <small class="text-muted">Payment Method</small>
            <p><?= esc($order['metode_pembayaran']) ?></p>
        </div>
    </div>

    <small class="text-muted">Shipping Address</small>
    <p><?= nl2br(esc($order['alamat'])) ?></p>

    <?php if ($order['catatan']): ?>
        <small class="text-muted">Notes</small>
        <p><?= esc($order['catatan']) ?></p>
    <?php endif; ?>

</div>

<div class="card p-4">

    <h5 class="serif mb-3">Ordered Items</h5>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= esc($item['nama_produk']) ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th class="price">
                        Rp <?= number_format($order['total_harga'], 0, ',', '.') ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>

<?= $this->endSection() ?>