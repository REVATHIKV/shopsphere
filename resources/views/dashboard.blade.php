<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopSphere Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h1>ShopSphere</h1>

        <p class="text-muted">
            E-commerce Order Management System
        </p>

        <div class="row g-3 mt-3">
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Total Products</h5>
                    <h2>{{ $productCount }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Low Stock Products</h5>
                    <h2>{{ $lowStockCount }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Total Stock Quantity</h5>
                    <h2>{{ $totakStockCount }}</h2>
                </div>
            </div>
        </div>

       
            <a href="{{ route('products.index' ) }}" class="btn btn-primary mt-4"> Manage Producs</a>
      
    </div>

</body>

</html>