<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Data Mahasiswa</h4>
    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    <?php endif; ?>
</div>

<div class="card p-3 table-responsive">
<table class="table table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>No</th><th>NIM</th><th>Nama</th>
            <th>Jenis Kelamin</th><th>Jurusan</th>
            <th>Angkatan</th><th>Email</th>
            <?php if (session()->get('role') === 'admin'): ?><th>Aksi</th><?php endif; ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($mahasiswa as $i => $m): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= esc($m['nim']) ?></td>
            <td><?= esc($m['nama']) ?></td>
            <td><?= $m['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
            <td><?= esc($m['jurusan']) ?></td>
            <td><?= esc($m['angkatan']) ?></td>
            <td><?= esc($m['email']) ?></td>
            <?php if (session()->get('role') === 'admin'): ?>
            <td>
                <a href="<?= base_url('mahasiswa/edit/'.$m['id']) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <form method="post" action="<?= base_url('mahasiswa/delete/'.$m['id']) ?>"
                      class="d-inline" onsubmit="return confirm('Hapus mahasiswa ini?')">
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