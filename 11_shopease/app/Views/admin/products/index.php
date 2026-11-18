<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management - ShopEase</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Product Management</h1>
            <p class="text-muted">Manage ShopEase products</p>
        </div>

        <a href="/admin/products/create" class="btn btn-primary">
            + Add Product
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
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if (!empty($products)): ?>

                        <?php foreach ($products as $i => $product): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>

                                <td>
                                    <?php if ($product['image']): ?>
                                        <img
                                            src="/uploads/products/<?= esc($product['image']) ?>"
                                            alt="<?= esc($product['name']) ?>"
                                            width="60"
                                            height="60"
                                            style="object-fit:cover"
                                        >
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>

                                <td class="fw-semibold">
                                    <?= esc($product['name']) ?>
                                </td>

                                <td>
                                    <?= esc($product['category_name']) ?>
                                </td>

                                <td>
                                    Rp <?= number_format($product['price'], 0, ',', '.') ?>
                                </td>

                                <td>
                                    <?= esc($product['stock']) ?>
                                </td>

                                <td>
                                    <?php if ($product['status'] === 'active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a
                                            href="/admin/products/edit/<?= $product['id'] ?>"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="/admin/products/delete/<?= $product['id'] ?>"
                                            method="post"
                                            onsubmit="return confirm('Delete this product?')"
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
                            <td colspan="8" class="text-center py-4">
                                No products found.
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