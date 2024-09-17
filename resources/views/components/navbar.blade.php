<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playwrite Cuba:wght@400;700&display=swap">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Document</title>
</head>
<style>
    /* Custom navbar styling */
    .navbar-brand img {
        width: 40px;
        height: 40px;
    }

    .navbar-brand span {
        font-weight: bold;
        font-size: 1.5rem;
        margin-left: 0.5rem;
    }

    .navbar-nav .nav-link {
        padding-right: 20px;
        padding-left: 20px;
    }

    .fa-shopping-cart {
        font-size: 1.2rem;
    }

    .cart-drawer {
        position: fixed;
        top: 0;
        right: -100%;
        width: 400px;
        height: 100%;
        background-color: white;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
        transition: right 0.3s ease-in-out;
        z-index: 1050;
        padding: 20px;
    }

    .cart-drawer.active {
        right: 0;
    }

    .cart-content {
        overflow-y: auto;
        height: 100%;
    }

    .cart-content h2 {
        margin-bottom: 20px;
    }
</style>

<body>
    <!-- resources/views/layouts/navbar.blade.php -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Left side: Logo and Name -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH0PqLcLimn5Y7eqH3WT1HFPneM__hTCwAsg&s"
                    alt="Logo" style="width: 40px; height: 40px;">
                <span class="ms-2 fw-bold"
                    style="color: #000000; font-size: 1.75rem; font-family: 'Playwrite Cuba', sans-serif;">LifeFootball
                    Store</span>
            </a>

            <!-- Center content: Home, Shop, About Us, Contact -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" style="font-weight: 500; margin-right: 15px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Shop') }}"
                            style="font-weight: 500; margin-right: 15px;">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight: 500; margin-right: 15px;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight: 500; margin-right: 15px;">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Right side: Login, Register, Cart -->
            <div class="d-flex align-items-center me-4">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="font-weight: 500;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="font-weight: 500;">Register</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link"><i class="bi bi-box-arrow-left"></i>
                                    Logout</button>
                                {{-- <a class="nav-link" href="{{ route('logout') }}" style="font-weight: 500;">Logout</a> --}}
                            </form>
                        </li>
                    @endauth

                    <!-- Cart Icon -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}" id="cartIcon" style="position: relative;">
                            <i class="bi bi-basket" style="font-size: 1.5rem;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    {{ $slot }}

</body>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <div>
            <a href="https://www.facebook.com/lifefootballclub" class="me-4 text-reset">
                <i class="bi bi-facebook">Facebook</i>
            </a>
            <a href="https://youtube.com/@LIFEFC_SHV" class="me-4 text-reset">
                <i class="bi bi-youtube">Youtube</i>
            </a>
            <a href="https://www.instagram.com/lifefc_shv" class="me-4 text-reset">
                <i class="bi bi-instagram">Instagram</i>
            </a>
        </div>
    </section>

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Life football club
                    </h6>
                    <p>
                        Mondul 3, Sankat 2, Phreah Sihanouk, Sihanoukville, Kingdom of Cambodia
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i>Cambodia, Sihanoukville (city)</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        admin@fc.lifeun.edu.kh
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="https://www.lifefootballclub.com/">lifefootballclub.com</a>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartIcon = document.getElementById('cartIcon');
        const cartDrawer = document.getElementById('cartDrawer');

        cartIcon.addEventListener('click', function(event) {
            event.preventDefault();
            cartDrawer.classList.toggle('active');
        });

        // Optional: Close cart drawer when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!cartDrawer.contains(event.target) && !cartIcon.contains(event.target)) {
                cartDrawer.classList.remove('active');
            }
        });
    });
</script>


</html>
