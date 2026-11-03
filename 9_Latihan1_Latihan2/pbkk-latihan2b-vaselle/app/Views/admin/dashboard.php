<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="section-title mb-1">Admin Dashboard</h2>

<p class="text-muted mb-4">
    Manage your Vaselle store and customer orders.
</p>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card admin-stat p-4">
            <small class="text-muted">TOTAL PRODUCTS</small>
            <h2><?= $totalProduk ?></h2>
            <i class="fas fa-vase text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card admin-stat p-4">
            <small class="text-muted">TOTAL ORDERS</small>
            <h2><?= $totalPesanan ?></h2>
            <i class="fas fa-shopping-bag text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card admin-stat p-4">
            <small class="text-muted">CUSTOMERS</small>
            <h2><?= $totalPelanggan ?></h2>
            <i class="fas fa-users text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card admin-stat p-4">
            <small class="text-muted">REVENUE</small>
            <h5 class="mt-2">
                Rp <?= number_format((float) $totalPendapatan, 0, ',', '.') ?>
            </h5>
            <i class="fas fa-chart-line text-secondary"></i>
            <small class="text-muted">Dari pesanan berstatus Selesai</small>
        </div>
    </div>

</div>

<div class="card p-4 mt-4">
    <h5 class="serif">Store Management</h5>
    <p class="text-muted">
        Manage product collections and customer orders.
    </p>

    <div class="d-flex gap-2 flex-wrap">
        <a href="<?= base_url('admin/products') ?>"
           class="btn btn-dark-custom">
            <i class="fas fa-box me-1"></i> Manage Products
        </a>

        <a href="<?= base_url('admin/orders') ?>"
           class="btn btn-outline-dark">
            <i class="fas fa-shopping-bag me-1"></i> Manage Orders
        </a>
    </div>
</div>

<?= $this->endSection() ?>