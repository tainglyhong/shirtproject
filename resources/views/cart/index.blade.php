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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td><img src="{{ asset($item['image']) }}" width="100" height="100"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['size'] }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Continue Shopping Button -->
        <div class="continue-shopping">
            <a href="{{route('Shop')}}" class="btn btn-primary" style="margin-bottom: 16px">Continue Shopping</a>
        </div>
    </div>
</x-navbar>

<!-- CSS for Continue Shopping Button -->
<style>
    .continue-shopping {
        text-align: center;
        margin-top: 20px;
    }

    .continue-shopping .btn {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #0088ff;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .continue-shopping .btn:hover {
        background-color: #1e7cc4;
    }
</style>
