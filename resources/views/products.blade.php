@extends("layouts.default")

@section("title", "WatchCom - Products")

@section("content")
<main class="container py-5">
    <!-- Hero Section -->
    <div class="hero-section mb-5">
        <img src="{{ asset('assets/cover.png') }}" class="w-100 rounded shadow" alt="Cover Image" style="height: 400px; object-fit: cover;">
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center mb-4">
            {{ session('success')['message'] }}
        </div>
    @endif

    <!-- Products Section -->
    <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card shadow-sm rounded-3 h-100">
                    <!-- Product Image -->
                    <div class="card-img-container" style="height: 450px; overflow: hidden;">
                        <img class="img-fluid w-100" src="{{ $product->image }}" alt="{{ $product->title }}" style="height: 100%; object-fit: cover;">
                    </div>
                    
                    <!-- Product Details -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold" style="color: #3730a3;">{{ $product->title }}</h5>
                        <p class="fw-bold text-success fs-5">रू{{ number_format($product->price, 2) }}</p>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-sm w-50 text-white me-2" style="background-color: #3730a3;">
                                Add to Cart
                            </a>
                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-sm w-50 text-white" style="background-color: #3730a3;">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</main>
@endsection