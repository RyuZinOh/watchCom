@extends("layouts.default")

@section("title", "WatchCom - Products")

@section("content")
<main class="container py-5">
    <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card shadow-sm rounded-3 h-100">
                    <!-- Upper Container for Image -->
                    <div class="card-img-container" style="height: 450px; overflow: hidden;">
                        <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->title }}" style="height: 100%; width: 100%; object-fit: cover;" />
                    </div>
                    
                    <!-- Lower Container for Details -->
                    <div class="card-body d-flex flex-column" style="height: 150px;">
                        <h5 class="card-title" style="color:#3730a3;">
                            {{ $product->title }}
                        </h5>
                        <p class="fw-bold text-success">रू{{ number_format($product->price, 2) }}</p>

                        <!-- Add to Cart and Details Button in a Row -->
                        <div class="d-flex justify-content-between mt-auto">
                            <button class="btn btn-sm" style="background-color: #3730a3; color: white; border: none; width: 48%;">
                                Add to Cart
                            </button>
                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-sm btn-outline-primary" style="background-color: #3730a3; color: white; border: none; width: 48%;">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <div class="d-flex justify-content-center mt-4" >
        {{ $products->links('pagination::bootstrap-5') }} <!-- Bootstrap pagination links -->
    </div>
    

</main>
@endsection
