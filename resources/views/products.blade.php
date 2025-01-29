@extends("layouts.default")

@section("title", "WatchCom - Products")

@section("content")
<main class="container py-5">
    <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card shadow-sm rounded-3 h-100">
                    <!-- Upper Container for Image -->
                    <div class="card-img-container" style="height: 250px; overflow: hidden;">
                        <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->title }}" style="height: 100%; width: 100%; object-fit: cover;" />
                    </div>
                    
                    <!-- Lower Container for Details -->
                    <div class="card-body d-flex flex-column" style="height: 250px;">
                        <!-- Clickable Title -->
                        <h5 class="card-title text-primary">
                            <a href="#" class="text-decoration-none text-primary">
                                {{ $product->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="fw-bold text-success">रू{{ number_format($product->price, 2) }}</p>
                        <button class="btn" style="background-color: #3730a3; color: white; border: none; margin-top: auto;">Add to Cart</button>

                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }} <!-- Bootstrap pagination -->
    </div>
</main>
@endsection
