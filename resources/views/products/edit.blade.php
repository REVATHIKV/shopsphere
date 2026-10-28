
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product - ShopSphere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input name="name" class="form-control"
                   value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">SKU</label>
            <input name="sku" class="form-control"
                   value="{{ old('sku', $product->sku) }}">
            @error('sku')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" step="0.01" min="0.01"
                   class="form-control"
                   value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stock Quantity</label>
            <input type="number" name="stock_quantity" min="0"
                   class="form-control"
                   value="{{ old('stock_quantity', $product->stock_quantity) }}">
            @error('stock_quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Update Product</button>
        <a href="{{ route('products.index') }}"
           class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
