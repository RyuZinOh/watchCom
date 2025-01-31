@extends("layouts.default")

@section("title", "WatchCom - Cart")

@section("content")
<main class="container py-5">
    <h1 class="mb-4 display-5 fw-bold text-dark">Your Cart</h1>

    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success')['message'] }}
    </div>
@endif


    @if($cartItems->isEmpty())
        <div class="alert alert-warning mb-4">
            Your cart is currently empty.
        </div>
    @else
        <section class="row gy-4">
            @foreach ($cartItems as $item)
                @php
                    $product = App\Models\Products::find($item->product_id);
                @endphp
                <div class="col-12 col-md-8 mx-auto"> 
                    <div class="card shadow-sm border-0 overflow-hidden" style="border-radius: 15px;">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="img-fluid" style="height: 450px; width: 100%; object-fit: cover; border-radius: 15px 0 0 15px;" />
                            </div>

                            <div class="col-md-7">
                                <div class="card-body h-100 p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title fw-bold mb-3">{{ $product->title }}</h5>
                                        <p class="text-success fw-bold mb-3">रू{{ number_format($product->price, 2) }}</p>

                                        <div class="d-flex align-items-center mb-4">
                                            <form action="{{ route('cart.update', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="action" value="decrement">
                                                <button type="submit" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">-</button>
                                            </form>

                                            <span class="mx-3 fw-bold">{{ $item->quantity }}</span>

                                            <form action="{{ route('cart.update', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="action" value="increment">
                                                <button type="submit" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">+</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('cart.remove', $product->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

 
        <div class="mt-5 p-4 bg-light rounded-3 shadow-sm d-flex justify-content-between align-items-center col-12 col-md-8 mx-auto" style="border-radius: 15px;">
            <h4 class="mb-0 fw-bold">Total: <span class="text-success">रू{{ number_format($totalPrice, 2) }}</span></h4>
            <a href="#" class="btn btn-lg text-white" style="background-color: #3730a3; border-radius: 10px;">Proceed to Checkout</a>
        </div>
    @endif
</main>
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-outline-secondary {
        border-radius: 50%;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .btn-outline-secondary:hover {
        background-color: #3730a3;
        color: white;
        border-color: #3730a3;
    }

    .btn-danger {
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .btn-danger:hover {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-lg {
        transition: background-color 0.3s ease;
    }
    .btn-lg:hover {
        background-color: #2c256b !important;
    }
</style>
@endsection

