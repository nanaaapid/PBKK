<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <div>
        <h4>Data Nilai Mahasiswa</h4>
        <p class="text-muted">Daftar hasil penilaian akademik mahasiswa.</p>
    </div>

    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('nilai/create') ?>" class="btn btn-primary h-25">
            <i class="fas fa-plus"></i> Input Nilai
        </a>
    <?php endif; ?>
</div>

<div class="card p-3 table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <?php if (session()->get('role') === 'admin'): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($nilai)): ?>
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        Belum ada data nilai.
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach ($nilai as $i => $n): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($n['nim']) ?></td>
                    <td><?= esc($n['nama_mahasiswa']) ?></td>
                    <td><?= esc($n['kode_mk']) ?></td>
                    <td><?= esc($n['nama_mk']) ?></td>
                    <td><?= esc($n['sks']) ?></td>
                    <td><?= esc($n['nilai_angka']) ?></td>
                    <td>
                        <span class="badge bg-success">
                            <?= esc($n['nilai_huruf']) ?>
                        </span>
                    </td>

                    <?php if (session()->get('role') === 'admin'): ?>
                        <td>
                            <a href="<?= base_url('nilai/edit/'.$n['id']) ?>"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="<?= base_url('nilai/delete/'.$n['id']) ?>"
                                  method="post" class="d-inline"
                                  onsubmit="return confirm('Hapus nilai ini?')">
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