
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
        <span class="badge bg-success mb-3">CONTACT US</span>

        <h1 class="fw-bold mb-3">Get in Touch</h1>

        <p class="text-secondary mb-4">
            Have questions or need assistance?
            Feel free to reach out to the ShopEase team.
        </p>

        <div class="mb-3">
            <h5 class="fw-bold">Email</h5>
            <p class="text-secondary">support@shopease.example</p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Customer Support</h5>
            <p class="text-secondary">
                Our team is ready to help with your shopping experience.
            </p>
        </div>

        <a href="<?= base_url('/') ?>" class="btn btn-success rounded-pill mt-3">
            Back to Homepage
        </a>
    </div>
</main>

</body>
</html>
