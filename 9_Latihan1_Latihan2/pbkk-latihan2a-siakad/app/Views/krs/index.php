<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Kartu Rencana Studi (KRS)</h4>

<?php if ($errors = session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?><div><?= esc($error) ?></div><?php endforeach; ?>
</div>
<?php endif; ?>

<?php if (session()->get('role') === 'admin'): ?>
<div class="card p-4 mb-4">
    <h5>Tambah KRS</h5>

    <form action="<?= base_url('krs/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Mahasiswa</label>
                <select name="mahasiswa_id" class="form-select" required>
                    <option value="">Pilih Mahasiswa</option>
                    <?php foreach ($mahasiswa as $m): ?>
                        <option value="<?= $m['id'] ?>">
                            <?= esc($m['nim'].' - '.$m['nama']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-select" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php foreach ($mataKuliah as $mk): ?>
                        <option value="<?= $mk['id'] ?>">
                            <?= esc($mk['kode_mk'].' - '.$mk['nama_mk']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tahun Akademik</label>
                <input name="tahun_akademik" class="form-control"
                       placeholder="2026/2027" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Semester</label>
                <select name="semester" class="form-select" required>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Tambah KRS</button>
    </form>
</div>
<?php endif; ?>

<div class="card p-3 table-responsive">
<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th>No</th><th>NIM</th><th>Mahasiswa</th>
            <th>Kode MK</th><th>Mata Kuliah</th>
            <th>SKS</th><th>Tahun Akademik</th><th>Semester</th>
            <?php if (session()->get('role') === 'admin'): ?><th>Aksi</th><?php endif; ?>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($krs as $i => $row): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($row['nim']) ?></td>
            <td><?= esc($row['nama_mahasiswa']) ?></td>
            <td><?= esc($row['kode_mk']) ?></td>
            <td><?= esc($row['nama_mk']) ?></td>
            <td><?= esc($row['sks']) ?></td>
            <td><?= esc($row['tahun_akademik']) ?></td>
            <td><?= esc($row['semester']) ?></td>

            <?php if (session()->get('role') === 'admin'): ?>
            <td>
                <form action="<?= base_url('krs/delete/'.$row['id']) ?>"
                      method="post" onsubmit="return confirm('Hapus data KRS?')">
                    <?= csrf_field() ?>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<?= $this->endSection() ?>