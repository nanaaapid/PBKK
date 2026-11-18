<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Management - ShopEase</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Category Management</h1>
            <p class="text-muted">Manage ShopEase product categories</p>
        </div>

        <a href="/admin/categories/create" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($categories)): ?>

                        <?php foreach ($categories as $i => $category): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>

                                <td class="fw-semibold">
                                    <?= esc($category['name']) ?>
                                </td>

                                <td>
                                    <code><?= esc($category['slug']) ?></code>
                                </td>

                                <td>
                                    <?= esc($category['description'] ?? '-') ?>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a
                                            href="/admin/categories/edit/<?= $category['id'] ?>"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="/admin/categories/delete/<?= $category['id'] ?>"
                                            method="post"
                                            onsubmit="return confirm('Delete this category?')"
                                        >
                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center py-4">
                                No categories found.
                            </td>
                        </tr>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <a href="/" class="btn btn-outline-secondary mt-3">
        Back to Homepage
    </a>

</div>

</body>
</html>