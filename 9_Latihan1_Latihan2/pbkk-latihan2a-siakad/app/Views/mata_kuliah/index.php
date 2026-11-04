<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Data Mata Kuliah</h4>
    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('mata-kuliah/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mata Kuliah
        </a>
    <?php endif; ?>
</div>

<div class="card p-3 table-responsive">
<table class="table table-hover">
    <thead class="table-light">
        <tr><th>No</th><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Semester</th><th>Dosen</th>
        <?php if (session()->get('role') === 'admin'): ?><th>Aksi</th><?php endif; ?></tr>
    </thead>
    <tbody>
    <?php foreach ($mataKuliah as $i => $mk): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($mk['kode_mk']) ?></td>
            <td><?= esc($mk['nama_mk']) ?></td>
            <td><?= esc($mk['sks']) ?></td>
            <td><?= esc($mk['semester']) ?></td>
            <td><?= esc($mk['nama_dosen'] ?? 'Belum ditentukan') ?></td>
            <?php if (session()->get('role') === 'admin'): ?>
            <td>
                <a href="<?= base_url('mata-kuliah/edit/'.$mk['id']) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="<?= base_url('mata-kuliah/delete/'.$mk['id']) ?>" method="post" class="d-inline"
                      onsubmit="return confirm('Hapus mata kuliah ini?')">
                    <?= csrf_field() ?>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<?= $this->endSection() ?>