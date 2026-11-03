<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-4">My Orders</h2>

<div class="card p-3 table-responsive">

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>Order Number</th>
                <th>Date</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>

            <?php if (empty($orders)): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        You have no orders yet.
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach ($orders as $order): ?>
                <tr>
                    <td class="fw-bold">
                        <?= esc($order['nomor_pesanan']) ?>
                    </td>

                    <td>
                        <?= date('d M Y', strtotime($order['created_at'])) ?>
                    </td>

                    <td>
                        Rp <?= number_format($order['total_harga'], 0, ',', '.') ?>
                    </td>

                    <td><?= esc($order['metode_pembayaran']) ?></td>

                    <td>
                        <span class="badge bg-secondary">
                            <?= esc($order['status']) ?>
                        </span>
                    </td>

                    <td>
                        <a href="<?= base_url('orders/'.$order['id']) ?>"
                           class="btn btn-outline-dark btn-sm">
                            View
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<?= $this->endSection() ?>