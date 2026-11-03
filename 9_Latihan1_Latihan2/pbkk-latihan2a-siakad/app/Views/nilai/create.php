<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Input Nilai Mahasiswa</h4>
<p class="text-muted">Masukkan nilai berdasarkan mata kuliah yang diambil mahasiswa.</p>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">
    <?php if (empty($krs)): ?>
        <div class="alert alert-info">
            Semua data KRS sudah memiliki nilai atau belum ada KRS.
        </div>

        <a href="<?= base_url('nilai') ?>" class="btn btn-secondary">Kembali</a>
    <?php else: ?>
        <form action="<?= base_url('nilai/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Mahasiswa dan Mata Kuliah</label>

                <select name="krs_id" class="form-select" required>
                    <option value="">Pilih data KRS</option>

                    <?php foreach ($krs as $row): ?>
                        <option value="<?= $row['id'] ?>"
                            <?= old('krs_id') == $row['id'] ? 'selected' : '' ?>>
                            <?= esc(
                                $row['nim'] . ' - ' .
                                $row['nama_mahasiswa'] . ' | ' .
                                $row['kode_mk'] . ' - ' .
                                $row['nama_mk']
                            ) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Nilai Angka</label>
                <input type="number"
                       name="nilai_angka"
                       class="form-control"
                       min="0"
                       max="100"
                       step="0.01"
                       value="<?= old('nilai_angka') ?>"
                       required>
                <small class="text-muted">
                    Masukkan nilai antara 0 sampai 100.
                    Nilai huruf akan dihitung otomatis.
                </small>
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan Nilai
            </button>

            <a href="<?= base_url('nilai') ?>" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>