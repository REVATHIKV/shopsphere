   @extends('layouts.app')
   @section('title', 'Edit Category | ShopSphere')
   @section('content')

   <div class="mb-4">
       <h1>Edit Category</h1>
       <p class="text-muted">
           Update the details of {{ $category->name }}.
       </p>
   </div>

   <div class="card shadow-sm">
       <div class="card-body p-4">

           <form action="{{ route('categories.update', $category) }}" method="POST">
               @csrf
               @method('PUT')

               <div class="mb-3">
                   <label for="name" class="form-label">Category Name</label>

                   <input
                       type="text"
                       id="name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $category->name) }}"
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
                       rows="3"
                       class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>

                   @error('description')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>

            

               <hr>

               <button type="submit" class="btn btn-primary">
                   Update Category
               </button>

               <a href="{{ route('categories.index') }}"
                   class="btn btn-outline-secondary">
                   Cancel
               </a>

           </form>


       </div>
   </div>

   @endsection