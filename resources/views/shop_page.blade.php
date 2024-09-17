<x-navbar>
    <div class="container py-4">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-lg">
                        <a href="{{ route('Products.select', $product->id) }}">
                            <div class="card-image-wrapper">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}"
                                    style="border-radius: 15px; object-fit: cover; height: 350px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->name }}</h5>
                                <p class="card-text text-center" style="font-size: 1.2em;">
                                    ${{ number_format($product->price, 2) }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-navbar>

<style>
    /* Container Padding */
    .container {
        padding-left: 5%;
        padding-right: 5%;
    }

    /* Card Styling */
    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .card-image-wrapper {
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }

    /* Card Title */
    .card-title {
        text-decoration: none;
        font-weight: bold;
        color: #333;
        font-size: 1.2rem;
    }

    /* Card Text */
    .card-text {
        margin-top: 10px;
        font-weight: bold;
        text-decoration: none;
        /* Remove underline */
    }
</style>
