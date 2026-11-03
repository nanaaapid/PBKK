<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register | Vaselle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f3ed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .register-card {
            width: 440px;
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="card register-card shadow-sm p-4">

    <div class="text-center mb-4">
        <h2 class="fw-bold" style="letter-spacing:5px;color:#695348;">
            V A S E L L E
        </h2>
        <p class="text-muted">Create your Vaselle account.</p>
    </div>

    <?php if ($errors = session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('register') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= old('nama') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control"
                   value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control" required>
            <small class="text-muted">Minimal 8 karakter.</small>
        </div>

        <div class="mb-4">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="konfirmasi_password"
                   class="form-control" required>
        </div>

        <button class="btn w-100 text-white"
                style="background:#695348;">
            Create Account
        </button>
    </form>

    <p class="text-center mt-4 mb-0">
        Already have an account?
        <a href="<?= base_url('login') ?>">Login</a>
    </p>

</div>

</body>
</html>