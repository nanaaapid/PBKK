<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Rasa Resto') ?> | Rasa Resto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fc;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 225px;
            min-height: 100vh;
            background: #4e73df;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            color: rgba(255,255,255,.85);
            text-decoration: none;
            display: block;
            padding: 13px 20px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: bold;
            padding: 22px 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,.2);
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        .content {
            flex: 1;
            min-width: 0;
        }

        .food-image {
            width: 65px;
            height: 55px;
            object-fit: cover;
            border-radius: 7px;
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
        <div class="sidebar-brand">
            <i class="fas fa-utensils"></i> RASA RESTO
        </div>

        <div class="mt-3">
            <small class="px-3 text-white-50">MENU UTAMA</small>

            <a href="<?= base_url('dashboard') ?>">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>

            <a href="<?= base_url('menu') ?>">
                <i class="fas fa-book-open me-2"></i> Daftar Menu
            </a>

            <?php if (session()->get('role') === 'admin'): ?>
                <a href="<?= base_url('menu/create') ?>">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Menu
                </a>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <small class="px-3 text-white-50">AKUN</small>

            <a href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </aside>

    <main class="content">
        <nav class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= esc($title ?? 'Dashboard') ?></h5>

            <div>
                <i class="fas fa-user-circle me-1 text-primary"></i>
                <?= esc(session()->get('nama')) ?>
                <span class="badge bg-primary ms-1">
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