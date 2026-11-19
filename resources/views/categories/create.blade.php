@extends('layouts.app')

@section('title', 'Add Category | ShopSphere')

@section('content')

<div class="mb-4">
    <h1>Add Category</h1>
    <p class="text-muted">Enter the details of your new category.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    required>

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description</label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="3">{{ old('description') }}</textarea>

                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <hr>

            <button type="submit" class="btn btn-primary">
                Save Category
            </button>

            <a href="{{ route('categories.index') }}"
                class="btn btn-outline-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection