@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-9" style="text-align-last: right;">
            <h1 class="mb-1 font-medium">{{ $product->name }}</h1>
        </div>
         <div class="col-lg-6 col-md-4 col-sm-3" style="text-align-last: right;">
            <a href="{{ route('products.list') }}" class="btn btn-secondary">Product List</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" />
            @else
                <p>No image available</p>
            @endif
        </div>
        <div class="col-md-6">
            <h3>{{ $product->name }}</h3>
            @if ($product->description == null)
                <p><i>No description available</i></p>
            @else
                <p>{!! $product->description !!}</p>
            @endif
            <strong>Price: {{ $product->price }}</strong>
        </div>
    </div>
@endsection