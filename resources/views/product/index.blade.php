@extends('layout.app')

@section('content')
    
        <h1 class="mb-1 font-medium">Product List</h1>

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        
        <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 50px; max-height: 50px;" />
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.view',$product->id) }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $products->links('pagination::bootstrap-5') }}
@endsection
