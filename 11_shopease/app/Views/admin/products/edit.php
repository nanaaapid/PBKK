<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product - ShopEase</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm mx-auto" style="max-width:750px;">
        <div class="card-body p-4">

            <h2 class="fw-bold mb-2">Edit Product</h2>

            <p class="text-muted mb-4">
                Update product information.
            </p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form
                action="/admin/products/update/<?= $product['id'] ?>"
                method="post"
                enctype="multipart/form-data"
            >
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Product Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= old('name', $product['name']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>

                    <select name="category_id" class="form-select" required>
                        <?php foreach ($categories as $category): ?>
                            <option
                                value="<?= $category['id'] ?>"
                                <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>
                            >
                                <?= esc($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                    ><?= old('description', $product['description']) ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price (Rp)</label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="<?= old('price', $product['price']) ?>"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stock</label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            min="0"
                            value="<?= old('stock', $product['stock']) ?>"
                            required
                        >
                    </div>
                </div>

                <?php if ($product['image']): ?>
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <br>

                        <img
                            src="/uploads/products/<?= esc($product['image']) ?>"
                            width="150"
                            class="rounded border"
                            alt="Current product image"
                        >
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Replace Image</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <small class="text-muted">
                        Leave empty to keep the current image.
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select" required>
                        <option
                            value="active"
                            <?= $product['status'] === 'active' ? 'selected' : '' ?>
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            <?= $product['status'] === 'inactive' ? 'selected' : '' ?>
                        >
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update Product
                    </button>

                    <a href="/admin/products" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>