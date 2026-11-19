   @extends('layouts.app')
   @section('title', 'Products | ShopSphere')
   @section('content')

   <div class="mb-4">
       <h1>Edit Product</h1>
       <p class="text-muted">
           Update the details of {{ $product->name }}.
       </p>
   </div>

   <div class="card shadow-sm">
       <div class="card-body p-4">

           <form action="{{ route('products.update', $product) }}" method="POST">
               @csrf
               @method('PUT')

               <div class="mb-3">
                   <label for="name" class="form-label">Product Name</label>

                   <input
                       type="text"
                       id="name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $product->name) }}"
                       required>

                   @error('name')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>

               <div class="mb-3">
                   <label for="sku" class="form-label">SKU</label>

                   <input
                       type="text"
                       id="sku"
                       name="sku"
                       class="form-control @error('sku') is-invalid @enderror"
                       value="{{ old('sku', $product->sku) }}"
                       required>

                   @error('sku')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                   <label for="category_id" class="form-label">Category</label>

                   <select
                       name="category_id"
                       id="category_id"
                       class="form-select @error('category_id') is-invalid @enderror">
                       <option value="">Select Category</option>

                       @foreach ($categories as $category)
                       <option
                           value="{{ $category->id }}"
                           {{ old('category_id',$product->category_id) == $category->id ? 'selected' : '' }}>
                           {{ $category->name }}
                       </option>
                       @endforeach
                   </select>

                   @error('category_id')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                   <label for="description" class="form-label">Description</label>

                   <textarea
                       id="description"
                       name="description"
                       rows="3"
                       class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>

                   @error('description')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>

               <div class="row">

                   <div class="col-md-6 mb-3">
                       <label for="price" class="form-label">Price (₹)</label>

                       <input
                           type="number"
                           id="price"
                           name="price"
                           step="0.01"
                           min="0.01"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}"
                           required>

                       @error('price')
                       <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="col-md-6 mb-3">
                       <label for="stock_quantity" class="form-label">
                           Stock Quantity
                       </label>

                       <input
                           type="number"
                           id="stock_quantity"
                           name="stock_quantity"
                           min="0"
                           class="form-control @error('stock_quantity') is-invalid @enderror"
                           value="{{ old('stock_quantity', $product->stock_quantity) }}"
                           required>

                       @error('stock_quantity')
                       <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

               </div>

               <hr>

               <button type="submit" class="btn btn-primary">
                   Update Product
               </button>

               <a href="{{ route('products.index') }}"
                   class="btn btn-outline-secondary">
                   Cancel
               </a>

           </form>


       </div>
   </div>

   @endsection