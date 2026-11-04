<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h4 class="mb-1">Dashboard</h4>
<p class="text-muted mb-4">
    Selamat datang di Rasa Resto Management System!
</p>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card border-start border-primary border-4 p-3">
            <div class="text-primary small fw-bold">TOTAL MENU</div>
            <h3 class="fw-bold mt-2"><?= $totalMenu ?></h3>
            <i class="fas fa-book-open text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-start border-success border-4 p-3">
            <div class="text-success small fw-bold">MAKANAN</div>
            <h3 class="fw-bold mt-2"><?= $totalMakanan ?></h3>
            <i class="fas fa-utensils text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-start border-warning border-4 p-3">
            <div class="text-warning small fw-bold">MINUMAN</div>
            <h3 class="fw-bold mt-2"><?= $totalMinuman ?></h3>
            <i class="fas fa-mug-hot text-secondary"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-start border-danger border-4 p-3">
            <div class="text-danger small fw-bold">DESSERT</div>
            <h3 class="fw-bold mt-2"><?= $totalDessert ?></h3>
            <i class="fas fa-ice-cream text-secondary"></i>
        </div>
    </div>

</div>

<div class="card mt-4 p-4">
    <h5>Rasa Resto</h5>
    <p class="text-muted mb-0">
        Sistem informasi manajemen restoran untuk mengelola
        daftar makanan, minuman, harga, dan foto menu.
    </p>

    <div class="mt-3">
        <a href="<?= base_url('menu') ?>" class="btn btn-primary">
            <i class="fas fa-book-open me-1"></i> Lihat Daftar Menu
        </a>
    </div>
</div>

<?= $this->endSection() ?>