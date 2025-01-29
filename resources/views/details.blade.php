@extends("layouts.default")

@section("title", "WatchCom - Product Details")

@section("content")
<main class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Product Image -->
            <div class="card shadow-sm rounded-3">
                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->title }}" style="object-fit: cover; height: 100%; width: 100%;" />
            </div>
        </div>

        <div class="col-md-6">
            <!-- Product Title & Price -->
            <h1>{{ $product->title }}</h1>
            <p class="fw-bold text-success">रू{{ number_format($product->price, 2) }}</p>

            <!-- Product Description -->
            <p class="text-muted">{{ $product->description }}</p>

            <!-- Add to Cart Button -->
            <button class="btn" style="background-color: #3730a3; color: white; border: none;">Add to Cart</button>

            <!-- Go Back Button -->
            <div class="mt-3">
                <a href="{{ route('home') }}" class="btn btn-outline-primary" style="background-color: #3730a3; color: white; border: none;">Go back to Products</a>
            </div>
        </div>
    </div>
</main>
@endsection
