<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Daftar Menu</h4>
        <p class="text-muted mb-0">Kelola menu makanan dan minuman restoran.</p>
    </div>

    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('menu/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Menu
        </a>
    <?php endif; ?>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>

                    <?php if (session()->get('role') === 'admin'): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($menus)): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada menu.
                        </td>
                    </tr>
                <?php else: ?>

                    <?php foreach ($menus as $i => $menu): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>

                            <td>
                                <?php if ($menu['foto']): ?>
                                    <img
                                        src="<?= base_url('uploads/menu/' . $menu['foto']) ?>"
                                        class="food-image"
                                        alt="Foto menu">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>

                            <td class="fw-bold">
                                <?= esc($menu['nama_menu']) ?>
                            </td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    <?= esc($menu['kategori']) ?>
                                </span>
                            </td>

                            <td>
                                Rp <?= number_format((float) $menu['harga'], 0, ',', '.') ?>
                            </td>

                            <td><?= esc($menu['deskripsi']) ?></td>

                            <?php if (session()->get('role') === 'admin'): ?>
                                <td>
                                    <a href="<?= base_url('menu/edit/' . $menu['id']) ?>"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="<?= base_url('menu/delete/' . $menu['id']) ?>"
                                          method="post" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        <?= csrf_field() ?>

                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>

                        </tr>
                    <?php endforeach; ?>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>