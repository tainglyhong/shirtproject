<x-navbar>
    <div class="container">
        <h2>Your Cart</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (empty($cart))
            <p>Your cart is empty.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr id="cart-item-{{ $id }}">
                            <td>
                                <img src="{{ asset($item['image'] ?? 'default.jpg') }}" width="70" height="90"
                                    alt="{{ $item['name'] ?? 'Item image' }}">
                            </td>
                            <td>{{ $item['name'] ?? 'Unknown' }}</td>
                            <td>
                                <div class="quantity-selector">
                                    <button type="button" class="btn qty-decrease"
                                        onclick="updateQuantity({{ $id }}, -1)">-</button>
                                    <input type="number" id="quantity-{{ $id }}"
                                        value="{{ $item['quantity'] ?? 1 }}" min="1" readonly class="qty-input">
                                    <button type="button" class="btn qty-increase"
                                        onclick="updateQuantity({{ $id }}, 1)">+</button>
                                </div>
                            </td>
                            <td>${{ number_format($item['price'] ?? 0, 2) }}</td>
                            <td>
                                <select name="size" id="size-{{ $id }}" class="form-control"
                                    onchange="updateCart({{ $id }})" style="width: 100px;">
                                    @foreach (['S', 'M', 'L', 'XL'] as $size)
                                        <option value="{{ $size }}"
                                            {{ ($item['size'] ?? '') == $size ? 'selected' : '' }}>
                                            {{ $size }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td id="total-{{ $id }}" data-price="{{ $item['price'] ?? 0 }}">
                                ${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}
                            </td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Continue Shopping and Checkout Buttons -->
        <div class="cart-actions">
            <a href="{{ route('Shop') }}" class="btn btn-primary">Continue Shopping</a>
            <button id="checkout-button" class="btn btn-success">Checkout</button>
        </div>
    </div>

    <!-- JavaScript for Quantity and Cart Update -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.getElementById('checkout-button').addEventListener('click', function() {
            fetch('/checkout/create-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    cart: @json($cart)
                })
            }).then(response => response.json()).then(sessionId => {
                var stripe = Stripe('{{ config('services.stripe.key') }}');
                return stripe.redirectToCheckout({
                    sessionId: sessionId
                });
            }).then(result => {
                if (result.error) {
                    alert(result.error.message);
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        });

        function updateQuantity(id, delta) {
            let quantityInput = document.getElementById(`quantity-${id}`);
            let currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + delta;

            if (newQuantity < 1) {
                newQuantity = 1;
            }

            quantityInput.value = newQuantity;
            updateCart(id); // Call the cart update function after quantity change
        }

        function updateCart(id) {
            let quantity = document.getElementById(`quantity-${id}`).value;
            let size = document.getElementById(`size-${id}`).value;

            let price = parseFloat(document.getElementById(`total-${id}`).getAttribute('data-price'));
            let totalElement = document.getElementById(`total-${id}`);

            // Update total price
            totalElement.innerText = `$${(price * quantity).toFixed(2)}`;

            // Send an AJAX request to update the cart
            fetch(`/cart/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: quantity,
                    size: size
                })
            }).then(response => response.json()).then(data => {
                console.log(data.message);
            }).catch(error => {
                console.error('Error updating cart:', error);
            });
        }
    </script>

    <!-- CSS Styling -->
    <style>
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        .btn {
            padding: 8px 12px;
            background-color: #ddd;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #bbb;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .cart-actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</x-navbar>
