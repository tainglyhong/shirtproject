<x-navbar>
    <div class="container product-container">
        <div class="product-detail">
            <a href="{{ url()->previous() }}" class="back-icon">
                <i class="bi bi-arrow-left"></i>
            </a>
            <!-- Product Title -->
            <h2 class="product-title">{{ $product->name }}</h2>

            <!-- Product Pricing -->
            <div class="product-pricing">
                <span class="original-price">${{ number_format($product->price, 2) }}</span>
                {{-- <span class="discount-price">-${{ $product->discount_percentage }}%</span>
                <span class="final-price">${{ number_format($product->price, 2) }}</span> --}}
            </div>

            <!-- Product Image & Color Info -->
            <div class="colors-available">
                <h4>Colors available</h4>
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                <p class="color-name">Black</p>
            </div>

            <!-- Size Selection -->
            <div class="product-size">
                <h4>Size</h4>
                <select class="size-select form-control">
                    <option value="">Select available size</option>
                    @foreach ($product->available_sizes as $size)
                        <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
                <p class="size-info">Model is 173 cm tall / 65 kg weight and is wearing size M.</p>
                <p class="size-info">{{ $product->description }}</p>
            </div>

            <!-- Quantity Selector -->
            <div class="quantity-selector">
                <h4>Qty</h4>
                <div class="qty-buttons">
                    <button class="btn qty-decrease" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity-input" name="quantity" value="1" min="1"
                        class="qty-input no-arrows">
                    <button class="btn qty-increase" onclick="increaseQuantity()">+</button>
                </div>
            </div>

            <!-- Add to Cart Button -->
            <div class="add-to-cart">
                <button class="btn btn-primary add-to-cart-btn">Add to Cart</button>
            </div>
        </div>
    </div>
</x-navbar>

<!-- JavaScript for Quantity Buttons -->
<script>
    function increaseQuantity() {
        let qtyInput = document.getElementById('quantity-input');
        let currentQty = parseInt(qtyInput.value);
        if (!isNaN(currentQty)) {
            qtyInput.value = currentQty + 1;
        }
    }

    function decreaseQuantity() {
        let qtyInput = document.getElementById('quantity-input');
        let currentQty = parseInt(qtyInput.value);
        if (!isNaN(currentQty) && currentQty > 1) {
            qtyInput.value = currentQty - 1;
        }
    }
</script>

<!-- CSS Styling -->
<style>
    .product-container {
        max-width: 650px;
        margin: 30px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .product-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* Product Pricing */
    .product-pricing {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .original-price {
        /* text-decoration: line-through; */
        font-size: 18px;
        color: rgb(0, 0, 0);
    }

    .discount-price {
        color: #e74c3c;
        font-size: 16px;
        font-weight: bold;
    }

    .final-price {
        font-size: 20px;
        color: #ff4081;
        font-weight: bold;
    }

    /* Colors */
    .colors-available {
        margin-bottom: 20px;
    }

    .product-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .color-name {
        font-size: 16px;
        font-weight: bold;
    }

    /* Size Selection */
    .product-size h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .size-select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .size-info {
        font-size: 14px;
        color: gray;
    }

    /* Quantity Selector */
    .quantity-selector {
        margin-bottom: 20px;
    }

    .qty-buttons {
        display: flex;
        align-items: center;
    }

    .btn {
        padding: 10px 15px;
        background-color: #ddd;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .qty-input {
        width: 50px;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin: 0 10px;
    }

    .no-arrows {
        /* Hides the up/down arrows on input fields */
        -moz-appearance: textfield;
        -webkit-appearance: none;
        appearance: none;
    }

    .no-arrows::-webkit-inner-spin-button,
    .no-arrows::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Add to Cart Button */
    .add-to-cart {
        text-align: center;
        margin-top: 20px;
    }

    .add-to-cart-btn {
        padding: 12px 25px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }

    .back-icon {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .back-icon i {
        margin-right: 5px;
    }
</style>
