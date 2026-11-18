
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - ShopEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7f8f6;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }

        .navbar .container {
            max-width: 1140px;
        }

        .navbar-brand {
            color: #2d6655 !important;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: -0.5px;
        }

        .navbar-nav .nav-link {
            color: #555;
            font-size: 15px;
            margin: 0 8px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #2d6655;
        }

        .search-box {
            background-color: #f3f5f2;
            border-radius: 30px;
            padding: 5px 12px;
            width: 170px;
            display: flex;
            align-items: center;
        }

        .search-box input {
            background: transparent;
            border: none;
            outline: none;
            box-shadow: none;
            font-size: 14px;
        }

        .search-box input:focus {
            box-shadow: none;
        }

        .search-box button {
            background: transparent;
            border: none;
            padding: 0 5px;
        }

        .product-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .product-card img {
            width: 100%;
            height: 215px;
            object-fit: cover;
        }

        .product-info {
            padding: 15px;
        }

        .product-category {
            color: #777;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .product-info h5 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .product-price {
            color: #2d6655;
            font-weight: bold;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand" href="/">ShopEase.</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>

            <form class="search-box" role="search">
                <input class="form-control" type="search" placeholder="Search products...">
                <button type="submit">⌕</button>
            </form>

        </div>
    </div>
</nav>

<!-- Products -->
<div class="container py-5">

    <h1 class="text-center fw-bold mb-2">Our Products</h1>

    <p class="text-center text-muted mb-5">
        Explore our collection of products.
    </p>

    <div class="row g-4">

        <!-- Product 1 -->
        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600" alt="Wireless Headphone">
                <div class="product-info">
                    <p class="product-category">Electronics</p>
                    <h5>Wireless Headphone</h5>
                    <p class="product-price">Rp 250.000</p>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600" alt="Classic Sneakers">
                <div class="product-info">
                    <p class="product-category">Fashion</p>
                    <h5>Classic Sneakers</h5>
                    <p class="product-price">Rp 850.000</p>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600" alt="Smart Watch">
                <div class="product-info">
                    <p class="product-category">Electronics</p>
                    <h5>Smart Watch</h5>
                    <p class="product-price">Rp 450.000</p>
                </div>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600" alt="Minimalist Backpack">
                <div class="product-info">
                    <p class="product-category">Accessories</p>
                    <h5>Minimalist Backpack</h5>
                    <p class="product-price">Rp 325.000</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
