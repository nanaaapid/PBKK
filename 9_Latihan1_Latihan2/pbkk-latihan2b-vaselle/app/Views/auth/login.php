<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Vaselle</title>

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

        .login-card {
            width: 420px;
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="card login-card shadow-sm p-4">

    <div class="text-center mb-4">
        <h2 class="fw-bold" style="letter-spacing:5px;color:#695348;">
            V A S E L L E
        </h2>
        <p class="text-muted">Welcome back to Vaselle.</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control"
                   value="<?= old('email') ?>" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control" required>
        </div>

        <button class="btn w-100 text-white"
                style="background:#695348;">
            Login
        </button>
    </form>

    <p class="text-center mt-4 mb-0">
        Don't have an account?
        <a href="<?= base_url('register') ?>">Register</a>
    </p>

    <a href="<?= base_url('/') ?>"
       class="text-center text-muted small mt-3">
        Back to Store
    </a>

</div>

</body>
</html>