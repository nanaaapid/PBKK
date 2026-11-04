<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Transkrip Nilai</h4>
        <p class="text-muted mb-0">
            Riwayat hasil studi mahasiswa.
        </p>
    </div>

    <a href="<?= base_url('transkrip') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<!-- Informasi mahasiswa -->
<div class="card p-4 mb-4">
    <div class="row">
        <div class="col-md-6">
            <small class="text-muted">Nama Mahasiswa</small>
            <h5 class="fw-bold"><?= esc($mahasiswa['nama']) ?></h5>

            <small class="text-muted">NIM</small>
            <p><?= esc($mahasiswa['nim']) ?></p>
        </div>

        <div class="col-md-6">
            <small class="text-muted">Program Studi</small>
            <p><?= esc($mahasiswa['jurusan']) ?></p>

            <small class="text-muted">Angkatan</small>
            <p><?= esc($mahasiswa['angkatan']) ?></p>
        </div>
    </div>
</div>

<!-- Ringkasan akademik -->
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card p-4 border-start border-primary border-4">
            <div class="text-primary fw-bold">TOTAL SKS LULUS / DIAMBIL</div>
            <h2 class="fw-bold mt-2"><?= $totalSks ?></h2>
            <small class="text-muted">Total SKS yang sudah memiliki nilai</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4 border-start border-success border-4">
            <div class="text-success fw-bold">INDEKS PRESTASI KUMULATIF</div>
            <h2 class="fw-bold mt-2"><?= number_format($ipk, 2) ?></h2>
            <small class="text-muted">IPK dari seluruh semester yang memiliki nilai</small>
        </div>
    </div>
</div>

<!-- Riwayat nilai per semester -->
<?php if (empty($transkrip)): ?>

    <div class="alert alert-info">
        Belum ada nilai untuk mahasiswa ini.
        Silakan input nilai melalui menu Nilai terlebih dahulu.
    </div>

<?php else: ?>

    <?php foreach ($transkrip as $semester): ?>

        <div class="card p-3 mb-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="mb-1">
                        Semester <?= esc($semester['semester']) ?>
                    </h5>

                    <small class="text-muted">
                        Tahun Akademik <?= esc($semester['tahun_akademik']) ?>
                    </small>
                </div>

                <span class="badge bg-primary fs-6">
                    IPS: <?= number_format($semester['ips'], 2) ?>
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($semester['mata_kuliah'] as $i => $mk): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($mk['kode_mk']) ?></td>
                                <td><?= esc($mk['nama_mk']) ?></td>
                                <td><?= esc($mk['sks']) ?></td>
                                <td><?= esc($mk['nilai_angka']) ?></td>
                                <td>
                                    <span class="badge bg-success">
                                        <?= esc($mk['nilai_huruf']) ?>
                                    </span>
                                </td>
                                <td><?= number_format($mk['bobot'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="table-light">
                        <tr>
                            <th colspan="3">Total</th>
                            <th><?= $semester['total_sks'] ?></th>
                            <th colspan="2">IPS</th>
                            <th><?= number_format($semester['ips'], 2) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end">
                <small class="text-muted">
                    IPK Kumulatif sampai semester ini:
                    <strong><?= number_format($semester['ipk_kumulatif'], 2) ?></strong>
                </small>
            </div>

        </div>

    <?php endforeach; ?>

<?php endif; ?>

<?= $this->endSection() ?>