@extends('layout.app')

@section('content')
    <h1 class="mb-1 font-medium">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="product_id" class="form-label">Product ID <i style="color: red;">*</i></label>
                <input type="text" class="form-control" id="product_id" name="product_id" value="{{ $product->product_id }}" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Product Name <i style="color: red;">*</i></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="price" class="form-label">Price <i style="color: red;">*</i></label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;" />
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a type="button" href="{{ route('products.list') }}" class="btn btn-dark">Back to List</a>
    </form>
@endsection