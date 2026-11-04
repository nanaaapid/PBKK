<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-1">Manage Orders</h2>
<p class="text-muted mb-4">Manage customer orders and delivery status.</p>

<div class="card p-3 table-responsive">

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>Order Number</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>
        </thead>

        <tbody>

            <?php if (empty($orders)): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada pesanan.
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach ($orders as $order): ?>
                <tr>

                    <td class="fw-bold">
                        <?= esc($order['nomor_pesanan']) ?>
                    </td>

                    <td>
                        <?= esc($order['nama_pelanggan']) ?>
                        <div class="small text-muted">
                            <?= esc($order['email']) ?>
                        </div>
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
                        <form action="<?= base_url('admin/orders/update/'.$order['id']) ?>"
                              method="post" class="d-flex gap-2">

                            <?= csrf_field() ?>

                            <select name="status" class="form-select form-select-sm"
                                    style="min-width:160px;">

                                <?php
                                $statuses = [
                                    'Menunggu Konfirmasi',
                                    'Diproses',
                                    'Dikirim',
                                    'Selesai',
                                    'Dibatalkan'
                                ];
                                ?>

                                <?php foreach ($statuses as $status): ?>
                                    <option value="<?= esc($status) ?>"
                                        <?= $order['status'] === $status ? 'selected' : '' ?>>
                                        <?= esc($status) ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>

                            <button class="btn btn-dark-custom btn-sm">
                                Save
                            </button>

                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<?= $this->endSection() ?>