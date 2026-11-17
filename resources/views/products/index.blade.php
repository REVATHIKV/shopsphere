@extends('layouts.app')

@section('title', 'Products | ShopSphere')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Add Product
    </a>
</div>

 <form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by product name or SKU..."
            value="{{ $search ?? '' }}"
        >

        <button type="submit" class="btn btn-dark">
            Search
        </button>

        @if (!empty($search))
            <a href="{{ route('products.index') }}"
               class="btn btn-outline-secondary">
                Clear
            </a>
        @endif
    </div>
</form>


<div class="card shadow-sm">

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">

            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($products as $product)

                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td> @if($product->stock_quantity === 0)
                        <span class="badge bg-danger">Out of Stock</span>
                        @elseif($product->stock_quantity <= 5)
                            <span class="badge bg-warning text-dark">Low Stock</span>
                            @else($product->stock_quantity > 5 )
                            <span class="badge bg-success">In Stock</span>
                            @endif
                    </td>

                    <td>
                        <a href="{{ route('products.edit', $product) }}"
                            class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form
                            action="{{ route('products.destroy', $product) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center py-4">
                        No products found. Add your first product!
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>
<div class="mt-4">
    {{ $products->links() }}
</div>
</div>

<a href="{{ route('dashboard') }}"
    class="btn btn-outline-secondary mt-3">
    Back to Dashboard
</a>

@endsection