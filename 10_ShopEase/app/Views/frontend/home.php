
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #315c4c;
            --primary-dark: #244638;
            --accent: #e9b872;
            --light: #f7f8f4;
            --text: #26352e;
        }

        body {
            font-family: Arial, sans-serif;
            color: var(--text);
            background: #fff;
        }

        .navbar {
            background: #fff;
            padding: 18px 0;
        }

        .navbar-brand {
            color: var(--primary);
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .navbar-brand:hover {
            color: var(--primary-dark);
        }

        .nav-link {
            color: #46534c;
            font-weight: 500;
            margin: 0 8px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
        }

        .search-box {
            border-radius: 30px;
            background: #f3f5f1;
            padding: 8px 15px;
            border: 1px solid #e8ece6;
        }

        .search-box input {
            border: none;
            outline: none;
            background: transparent;
            width: 150px;
        }

        .btn-shop {
            background: var(--primary);
            color: white;
            border-radius: 30px;
            padding: 12px 25px;
            font-weight: 600;
            border: none;
        }

        .btn-shop:hover {
            background: var(--primary-dark);
            color: white;
        }

        .hero {
            background: var(--light);
            padding: 75px 0;
            overflow: hidden;
        }

        .hero-label {
            color: var(--primary);
            background: #e5eee8;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(38px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            color: #68756d;
            font-size: 17px;
            line-height: 1.8;
            max-width: 500px;
            margin-bottom: 28px;
        }

        .hero-image {
            width: 100%;
            height: 390px;
            object-fit: cover;
            border-radius: 24px;
        }

        .section-padding {
            padding: 75px 0;
        }

        .section-title {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #7a857e;
            margin-bottom: 35px;
        }

        .category-card {
            background: var(--light);
            border-radius: 18px;
            padding: 28px 15px;
            height: 100%;
            transition: .2s;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,.07);
        }

        .category-icon {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .category-card h5 {
            font-weight: 700;
            font-size: 17px;
        }

        .category-card p {
            color: #7a857e;
            font-size: 13px;
            margin-bottom: 0;
        }

        .product-card {
            border: 1px solid #edf0eb;
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            transition: .2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0,0,0,.08);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #f5f5f5;
        }

        .product-info {
            padding: 18px;
        }

        .product-label {
            display: inline-block;
            background: #edf3ee;
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .product-info h5 {
            font-size: 17px;
            font-weight: 700;
        }

        .product-category {
            color: #89938d;
            font-size: 13px;
        }

        .product-price {
            color: var(--primary);
            font-weight: 800;
            font-size: 18px;
        }

        .promo {
            background: var(--primary);
            color: white;
            border-radius: 24px;
            padding: 45px;
        }

        .promo h2 {
            font-weight: 800;
        }

        footer {
            background: #20392f;
            color: #e5ece7;
            padding: 45px 0 20px;
        }

        footer a {
            color: #d4ded7;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 50px 0;
            }

            .hero-image {
                height: 280px;
                margin-top: 30px;
            }

            .promo {
                padding: 30px 22px;
            }

            .section-padding {
                padding: 55px 0;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            ShopEase.
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
                </li>
            </ul>

            <form class="d-flex search-box" action="<?= base_url('/') ?>" method="get">
                <input type="search" name="q" placeholder="Search products...">
                <button class="btn p-0" type="submit" aria-label="Search">⌕</button>
            </form>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="hero-label">YOUR EVERYDAY SHOPPING PARTNER</span>

                <h1>
                    Shopping made
                    <span>simple</span> and easy.
                </h1>

                <p>
                    Discover products you'll love at prices you'll enjoy.
                    Find everything you need in one place with ShopEase.
                </p>

                <a href="#products" class="btn btn-shop">
                    Explore Products →
                </a>
            </div>

            <div class="col-lg-6">
                <img
                    src="https://images.unsplash.com/photo-1607082349566-187342175e2f?w=1000"
                    class="hero-image"
                    alt="ShopEase shopping promotion">
            </div>
        </div>
    </div>
</section>

<!-- CATEGORIES -->
<section class="section-padding" id="categories">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Shop by Category</h2>
            <p class="section-subtitle">
                Find what you need from our product collections.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($categories as $category): ?>
                <div class="col-6 col-md-3">
                    <div class="category-card text-center">
                        <div class="category-icon">
                            <?= esc($category['icon']) ?>
                        </div>

                        <h5><?= esc($category['name']) ?></h5>

                        <p><?= esc($category['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section-padding bg-light" id="products">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Featured Products</h2>
            <p class="section-subtitle">
                Explore some of our popular picks.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($products as $product): ?>
                <div class="col-6 col-lg-3">
                    <div class="product-card bg-white">
                        <img
                            src="<?= esc($product['image']) ?>"
                            class="product-image"
                            alt="<?= esc($product['name']) ?>">

                        <div class="product-info">
                            <span class="product-label">
                                <?= esc($product['label']) ?>
                            </span>

                            <p class="product-category mb-2">
                                <?= esc($product['category']) ?>
                            </p>

                            <h5><?= esc($product['name']) ?></h5>

                            <p class="product-price mb-0">
                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?= base_url('#products') ?>" class="btn btn-shop">
                View All Products →
            </a>
        </div>
    </div>
</section>

<!-- PROMOTION BANNER -->
<section class="section-padding">
    <div class="container">
        <div class="promo text-center">
            <h2>Everything You Need, All in One Place.</h2>
            <p class="mt-3 mb-4">
                Enjoy a simpler and more convenient shopping experience with ShopEase.
            </p>
            <a href="#products" class="btn btn-light rounded-pill px-4 py-2 fw-bold">
                Start Shopping
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <h3 class="fw-bold">ShopEase.</h3>
                <p class="mt-3">
                    Your everyday shopping partner.
                    Discover products and enjoy a simple shopping experience.
                </p>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold">Explore</h5>
                <p><a href="<?= base_url('/') ?>">Home</a></p>
                <p><a href="#categories">Categories</a></p>
                <p><a href="#products">Products</a></p>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold">Information</h5>
                <p><a href="<?= base_url('about') ?>">About Us</a></p>
                <p><a href="<?= base_url('contact') ?>">Contact Us</a></p>
            </div>
        </div>

        <hr class="border-secondary mt-4">

        <p class="text-center mb-0 small">
            &copy; <?= date('Y') ?> ShopEase. All rights reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
