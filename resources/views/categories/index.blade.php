@extends('layouts.app')

@section('title', 'Categories | ShopSphere')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Add Category
    </a>
</div>


<form action="{{ route('categories.index') }}" method="GET" class="mb-4">

    <div class="row g-2">

        <div class="col-md-5">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search by category name..."
                value="{{ $search ?? '' }}">
        </div>

        

        <div class="col-md-3">
            <button type="submit" class="btn btn-dark">
                Filter
            </button>

            @if (!empty($search) )
            <a href="{{ route('categories.index') }}"
                class="btn btn-outline-secondary">
                Clear
            </a>
            @endif
        </div>

    </div>

</form>



<div class="card shadow-sm">

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">

            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                   
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($categories as $category)

                <tr>
                    <td>{{ $category->name }}</td>
                     

                    <td>
                        <a href="{{ route('categories.edit', $category) }}"
                            class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form
                            action="{{ route('categories.destroy', $category) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                          No Category found. Try changing your search.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>

<a href="{{ route('dashboard') }}"
    class="btn btn-outline-secondary mt-3">
    Back to Dashboard
</a>

@endsection