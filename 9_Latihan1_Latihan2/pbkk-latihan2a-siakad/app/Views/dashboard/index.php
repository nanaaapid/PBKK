<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h4>Dashboard</h4>
<p class="text-muted mb-4">
    Selamat datang di Sistem Informasi Akademik ITS.
</p>

<div class="row g-3">

    <div class="col-md-4">
        <div class="card p-4 border-start border-primary border-4">
            <div class="text-primary fw-bold">TOTAL MAHASISWA</div>
            <h2 class="fw-bold mt-2"><?= $totalMahasiswa ?></h2>
            <i class="fas fa-user-graduate text-secondary"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 border-start border-success border-4">
            <div class="text-success fw-bold">TOTAL DOSEN</div>
            <h2 class="fw-bold mt-2"><?= $totalDosen ?></h2>
            <i class="fas fa-chalkboard-teacher text-secondary"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 border-start border-warning border-4">
            <div class="text-warning fw-bold">TOTAL MATA KULIAH</div>
            <h2 class="fw-bold mt-2"><?= $totalMataKuliah ?></h2>
            <i class="fas fa-book text-secondary"></i>
        </div>
    </div>

</div>

<div class="card p-4 mt-4">
    <h5>Sistem Informasi Akademik</h5>
    <p class="text-muted mb-0">
        SIAKAD digunakan untuk mengelola data mahasiswa,
        dosen, mata kuliah, serta kartu rencana studi.
    </p>
</div>

<?= $this->endSection() ?>