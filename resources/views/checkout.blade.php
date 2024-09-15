<!-- resources/views/checkout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Pay with Stripe</button>
        </form>
    </div>
</body>
</html>
