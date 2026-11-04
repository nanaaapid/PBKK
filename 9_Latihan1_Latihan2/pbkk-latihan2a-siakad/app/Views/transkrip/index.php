<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h4 class="mb-1">Transkrip Nilai Mahasiswa</h4>

<p class="text-muted mb-4">
    Pilih mahasiswa untuk melihat riwayat akademik dan IPK.
</p>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($mahasiswa)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach ($mahasiswa as $i => $m): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($m['nim']) ?></td>
                        <td class="fw-bold"><?= esc($m['nama']) ?></td>
                        <td><?= esc($m['jurusan']) ?></td>
                        <td><?= esc($m['angkatan']) ?></td>
                        <td>
                            <a href="<?= base_url('transkrip/' . $m['id']) ?>"
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> Lihat Transkrip
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>