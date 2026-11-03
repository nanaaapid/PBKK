<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title ?? 'SIAKAD ITS') ?> | SIAKAD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fc;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 235px;
            min-height: 100vh;
            background: #4e73df;
            color: white;
            flex-shrink: 0;
        }

        .brand {
            padding: 23px 12px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,.2);
        }

        .sidebar a {
            display: block;
            padding: 13px 20px;
            color: rgba(255,255,255,.85);
            text-decoration: none;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar small {
            display: block;
            padding: 20px 20px 5px;
            color: rgba(255,255,255,.55);
        }

        .content {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            padding: 17px 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        .card {
            border: none;
            box-shadow: 0 2px 12px rgba(0,0,0,.04);
        }
    </style>
</head>

<body>
<div class="d-flex">

    <aside class="sidebar">
        <div class="brand">
            <i class="fas fa-graduation-cap"></i> SIAKAD ITS
        </div>

        <small>MENU UTAMA</small>

        <a href="<?= base_url('dashboard') ?>">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <small>AKADEMIK</small>

        <a href="<?= base_url('mahasiswa') ?>">
            <i class="fas fa-user-graduate me-2"></i> Mahasiswa
        </a>

        <a href="<?= base_url('dosen') ?>">
            <i class="fas fa-chalkboard-teacher me-2"></i> Dosen
        </a>

        <a href="<?= base_url('mata-kuliah') ?>">
            <i class="fas fa-book me-2"></i> Mata Kuliah
        </a>

        <a href="<?= base_url('krs') ?>">
            <i class="fas fa-clipboard-list me-2"></i> KRS
        </a>

        <a href="<?= base_url('nilai') ?>">
            <i class="fas fa-graduation-cap me-2"></i> Nilai
        </a>

        <a href="<?= base_url('transkrip') ?>">
            <i class="fas fa-file-alt me-2"></i> Transkrip Nilai
        </a>

        <small>AKUN</small>

        <a href="<?= base_url('logout') ?>">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </aside>

    <main class="content">
        <nav class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= esc($title ?? 'Dashboard') ?></h5>

            <div>
                <i class="fas fa-user-circle text-primary me-1"></i>
                <?= esc(session()->get('nama')) ?>

                <span class="badge bg-primary">
                    <?= esc(session()->get('role')) ?>
                </span>
            </div>
        </nav>

        <div class="container-fluid p-4">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= esc(session()->getFlashdata('success')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= esc(session()->getFlashdata('error')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>

        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>