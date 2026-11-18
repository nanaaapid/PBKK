
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - ShopEase</title>
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

        .category-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            height: 100%;
            transition: 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .category-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .category-card h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .category-card p {
            color: #777;
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
                    <a class="nav-link active" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Products</a>
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

<!-- Categories -->
<div class="container py-5">

    <h1 class="text-center fw-bold mb-2">Shop by Category</h1>

    <p class="text-center text-muted mb-5">
        Find what you need from our product collections.
    </p>

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="category-card">
                <div class="category-icon">🎧</div>
                <h5>Electronics</h5>
                <p>Gadgets and technology</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="category-card">
                <div class="category-icon">👕</div>
                <h5>Fashion</h5>
                <p>Style for everyone</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="category-card">
                <div class="category-icon">⌚</div>
                <h5>Accessories</h5>
                <p>Complete your look</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="category-card">
                <div class="category-icon">🏠</div>
                <h5>Home & Living</h5>
                <p>Make yourself at home</p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
