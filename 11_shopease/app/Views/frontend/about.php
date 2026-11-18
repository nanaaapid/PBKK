
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="<?= base_url('/') ?>">
            ShopEase.
        </a>
        <a href="<?= base_url('/') ?>" class="btn btn-outline-success rounded-pill">
            Back to Home
        </a>
    </div>
</nav>

<main class="container py-5">
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        <span class="badge bg-success mb-3">ABOUT US</span>

        <h1 class="fw-bold mb-4">Welcome to ShopEase</h1>

        <p class="text-secondary">
            ShopEase is a web-based online store designed to make
            shopping easier and more convenient for everyone.
        </p>

        <p class="text-secondary">
            Through ShopEase, customers can explore product collections,
            find items that suit their needs, and enjoy a simple shopping
            experience in one place.
        </p>

        <h4 class="fw-bold mt-4">Our Purpose</h4>

        <p class="text-secondary">
            We aim to provide an organized online shopping platform
            where product information and shopping activities can be
            accessed easily.
        </p>

        <a href="<?= base_url('/') ?>" class="btn btn-success rounded-pill mt-3">
            Explore ShopEase
        </a>
    </div>
</main>

</body>
</html>
