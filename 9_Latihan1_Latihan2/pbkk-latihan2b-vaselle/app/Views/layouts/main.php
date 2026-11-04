<?php
$cart = session()->get('cart') ?? [];
$cartCount = array_sum($cart);
$isAdmin = session()->get('role') === 'admin';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title ?? 'Vaselle') ?> | Vaselle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brown: #695348;
            --dark: #29221e;
            --cream: #f7f3ed;
            --gold: #b18a55;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--dark);
            background: #fff;
        }

        .serif {
            font-family: 'Playfair Display', serif;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid #eee9e2;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            letter-spacing: 5px;
            color: var(--brown);
            text-decoration: none;
        }

        .nav-link {
            color: var(--dark);
            font-size: 14px;
        }

        .nav-link:hover {
            color: var(--gold);
        }

        .btn-dark-custom {
            background: var(--brown);
            border-color: var(--brown);
            color: #fff;
        }

        .btn-dark-custom:hover {
            background: #4b3930;
            color: #fff;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
        }

        .product-card {
            border: 0;
            height: 100%;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: var(--cream);
        }

        .product-placeholder {
            height: 250px;
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b9a99a;
            font-size: 55px;
        }

        .price {
            color: var(--brown);
            font-weight: 700;
        }

        .footer {
            margin-top: 70px;
            padding: 40px 0;
            background: #29221e;
            color: white;
        }

        .admin-stat {
            border-left: 4px solid var(--gold);
        }

        .table th {
            white-space: nowrap;
        }

        .order-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">

        <a href="<?= base_url('/') ?>" class="brand">
            V A S E L L E
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVaselle">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarVaselle">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/products') ?>">
                        Collection
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/cart') ?>">
                        <i class="fas fa-shopping-bag"></i>
                        Cart (<?= $cartCount ?>)
                    </a>
                </li>

                <?php if (session()->get('logged_in')): ?>

                    <?php if ($isAdmin): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/admin') ?>">
                                Dashboard
                            </a>
                        </li>

                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/orders') ?>">
                                My Orders
                            </a>
                        </li>

                    <?php endif; ?>

                    <li class="nav-item">
                        <span class="nav-link">
                            Hi, <?= esc(session()->get('nama')) ?>
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-outline-dark btn-sm px-3"
                           href="<?= base_url('/logout') ?>">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/login') ?>">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-dark-custom btn-sm px-3"
                           href="<?= base_url('/register') ?>">
                            Register
                        </a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

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

</main>

<footer class="footer">
    <div class="container text-center">
        <h3 class="serif">V A S E L L E</h3>
        <p class="small text-white-50 mb-1">
            Curated pieces for timeless spaces.
        </p>
        <small class="text-white-50">
            Copyright &copy; <?= date('Y') ?> Vaselle.
        </small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>