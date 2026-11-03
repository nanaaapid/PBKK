<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4>Edit Nilai</h4>
<p class="text-muted">Perbarui nilai mahasiswa.</p>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4">
    <form action="<?= base_url('nilai/update/'.$nilai['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">ID KRS</label>
            <input type="text" class="form-control"
                   value="<?= esc($nilai['krs_id']) ?>" disabled>
        </div>

        <div class="mb-4">
            <label class="form-label">Nilai Angka</label>
            <input type="number"
                   name="nilai_angka"
                   class="form-control"
                   min="0"
                   max="100"
                   step="0.01"
                   value="<?= old('nilai_angka', $nilai['nilai_angka']) ?>"
                   required>
            <small class="text-muted">
                Nilai huruf akan diperbarui secara otomatis.
            </small>
        </div>

        <button class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan Perubahan
        </button>

        <a href="<?= base_url('nilai') ?>" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

<?= $this->endSection() ?>