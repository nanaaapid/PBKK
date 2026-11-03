<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Data Dosen</h4>
    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('dosen/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Dosen
        </a>
    <?php endif; ?>
</div>

<div class="card p-3 table-responsive">
<table class="table table-hover">
    <thead class="table-light">
        <tr><th>No</th><th>NIDN</th><th>Nama</th><th>Email</th><th>Bidang Keahlian</th>
        <?php if (session()->get('role') === 'admin'): ?><th>Aksi</th><?php endif; ?></tr>
    </thead>
    <tbody>
    <?php foreach ($dosen as $i => $d): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($d['nidn']) ?></td>
            <td><?= esc($d['nama']) ?></td>
            <td><?= esc($d['email']) ?></td>
            <td><?= esc($d['bidang_keahlian']) ?></td>
            <?php if (session()->get('role') === 'admin'): ?>
            <td>
                <a href="<?= base_url('dosen/edit/'.$d['id']) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="<?= base_url('dosen/delete/'.$d['id']) ?>" method="post" class="d-inline"
                      onsubmit="return confirm('Hapus dosen ini?')">
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